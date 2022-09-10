<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers\AttributesRelationManager;
use App\Filament\Resources\CategoryResource\RelationManagers\ChildrenRelationManager;
use App\Models\Category;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use RalphJSmit\Filament\SEO\SEO;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $slug = 'categories';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::getFormSchema(Card::class))
            ->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    private static function getFormSchema(string $layout = Grid::class)
    {
        return [
            Group::make()
                ->schema([
                    $layout::make()
                        ->schema([
                            Grid::make()
                                ->schema([
                                    TextInput::make('name')
                                        ->label(__('general.categories.fields.name'))
                                        ->required()
                                        ->reactive()
                                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::persian_slug($state))),

                                    TextInput::make('slug')
                                        ->label(__('general.categories.fields.slug'))
                                        ->disabled()
                                        ->required()
                                        ->unique(Category::class, 'slug', fn($record) => $record),
                                ]),

                            Select::make('parent_id')
                                ->label(__('general.categories.fields.parent_id'))
                                ->relationship('parent', 'name', fn(Builder $query) => $query->whereNull('parent_id'))
                                ->searchable()
                                ->placeholder('Select parent category'),

                            Toggle::make('is_visible')
                                ->label(__('general.categories.fields.is_visible'))
                                ->default(true),

                            RichEditor::make('description')
                                ->label(__('general.categories.fields.description'))
                                ->columnSpan(2),
                        ])
                        ->columns([
                            'sm' => 2,
                        ]),
                ])
                ->columnSpan([
                    'sm' => 2,
                ]),
            Group::make()
                ->schema([
                    $layout::make()
                        ->schema([
                            Placeholder::make('created_at')
                                ->label(__('general.created_at'))
                                ->content(fn(?Category $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                            Placeholder::make('updated_at')
                                ->label(__('general.updated_at'))
                                ->content(fn(?Category $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                        ])
//                        ->visible(fn(Component $livewire): bool => ! $livewire instanceof ChildrenRelationManager)
                        ->columns(1),
                    $layout::make()
                        ->schema([
                            Placeholder::make("Search Engine Optimization")
                                ->label(__('general.SEO.title')),
                            SEO::make(),
                        ])
                        ->columns(1),
                ])
                ->columnSpan(1),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return Category::query()
            ->with('children')
            ->withCount('children')
            ->orderByDesc('children_count');
    }

    public static function getLabel(): string
    {
        return __('general.categories.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.categories.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.leelam');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('general.categories.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('parent.name')
                    ->label(__('general.categories.fields.parent_id'))
                    ->searchable()
                    ->sortable()
                    ->default(__('general.categories.placeholders.no_parent'))
                    ->toggleable(),
                TextColumn::make('children_count')
                    ->counts('children')
                    ->label(__('general.categories.placeholders.num_children'))
                    ->sortable()
                    ->toggleable()
                    ->visible(fn(Component $livewire): bool => ! $livewire instanceof ChildrenRelationManager),
                Tables\Columns\BadgeColumn::make('position')
                    ->colors(['primary'])
                    ->label(__('general.categories.fields.position'))
                    ->sortable()
                    ->searchable(),
                BooleanColumn::make('is_visible')
                    ->label(__('general.categories.fields.is_visible'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('updated_at')
                    ->label(__('general.updated_at'))
                    ->date()
                    ->sortable()
                    ->formatStateUsing(fn(?Category $record): ?string => $record?->updated_at->diffForHumans())
                    ->toggleable(),
            ])
            ->filters([
                TernaryFilter::make('is_visible')
                    ->label(__('general.categories.filters.status'))
                    ->placeholder(__('general.categories.filters.status_placeholder'))
                    ->trueLabel(__('general.categories.filters.visible'))
                    ->falseLabel(__('general.categories.filters.not_visible')),
                TernaryFilter::make('parent_id')
                    ->nullable()
                    ->label(__('general.categories.filters.parent_status'))
                    ->placeholder(__('general.categories.filters.parent_status_placeholder'))
                    ->trueLabel(__('general.categories.filters.parent'))
                    ->falseLabel(__('general.categories.filters.child'))
                    ->queries(
                        true: fn(Builder $query) => $query->whereNull('parent_id'),
                        false: fn(Builder $query) => $query->whereNotNull('parent_id'),
                        blank: fn(Builder $query) => $query,
                    ),
            ])
            ->actions([
                Action::make('status')
                    ->label(__('general.actions.status'))
                    ->icon('heroicon-o-refresh')
                    ->color('primary')
                    ->visible(fn(Category $record): bool => auth()->user()?->can('update', $record))
                    ->action(fn(Category $record) => $record->update(['is_visible' => ! $record->is_visible])),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                BulkAction::make('status')
                    ->label(__('general.actions.status'))
                    ->icon('heroicon-o-refresh')
                    ->color('primary')
                    ->visible(fn(Category $record): bool => auth()->user()?->can('update', $record))
                    ->action(fn(Collection $records) => $records->each(fn($record) => $record->update(['is_visible' => ! $record->is_visible])))
                    ->deselectRecordsAfterCompletion()
                    ->requiresConfirmation(),

                FilamentExportBulkAction::make('export')
                    ->label(__('general.export.bulk_action_button_label'))
                    ->fileName(str(self::$model)->after("App\Models\\"))
                    ->fileNameFieldLabel(__('general.export.file_name_field_label')) // Label for file name input
                    ->formatFieldLabel(__('general.export.format_field_label')) // Label for format input
                    ->pageOrientationFieldLabel(__('general.export.page_orientation_field_label')) // Label for page orientation input
                    ->filterColumnsFieldLabel(__('general.export.filters_column_field_label')) // Label for filter columns input
                    ->additionalColumnsFieldLabel(__('general.export.additional_columns_field_label')) // Label for additional columns input
                    ->additionalColumnsTitleFieldLabel(__('general.export.additional_columns_title_field_label')) // Label for additional columns' title input
                    ->additionalColumnsDefaultValueFieldLabel(__('general.export.additional_columns_default_value_field_label')) // Label for additional columns' default value input
                    ->additionalColumnsAddButtonLabel(__('general.export.additional_columns_add_button_label')), // Label for additional columns' add button

                Tables\Actions\DeleteBulkAction::make(),
            ])->reorderable('position');
    }

    public static function getRelations(): array
    {
        return [
            AttributesRelationManager::class,
            ChildrenRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug'];
    }
}
