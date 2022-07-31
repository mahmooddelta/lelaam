<?php

namespace App\Filament\Resources\Blog;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\Blog\CategoryResource\Pages;
use App\Filament\Resources\Blog\CategoryResource\RelationManagers\PostsRelationManager;
use App\Models\Blog\Category;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use RalphJSmit\Filament\SEO\SEO;
use function __;
use function auth;
use function str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $slug = 'blog/categories';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->label(__('general.blog_categories.fields.name'))
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::persian_slug($state))),

                        TextInput::make('slug')
                            ->disabled()
                            ->label(__('general.blog_categories.fields.slug'))
                            ->required()
                            ->unique(Category::class, 'slug', fn($record) => $record),

                        RichEditor::make('description')
                            ->label(__('general.blog_categories.fields.description'))
                            ->columnSpan([
                                'sm' => 2,
                            ]),

                        TextInput::make('position')
                            ->label(__('general.blog_categories.fields.position'))
                            ->numeric(),

                        Toggle::make('is_visible')
                            ->label(__('general.blog_categories.fields.is_visible'))
                            ->helperText(__('general.blog_categories.placeholder.is_visible'))
                            ->default(true),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => fn(?Category $record) => $record === null ? 3 : 2,
                    ]),
                Grid::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Placeholder::make('created_at')
                                    ->label(__('general.created_at'))
                                    ->content(fn(?Category $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                Placeholder::make('updated_at')
                                    ->label(__('general.updated_at'))
                                    ->content(fn(?Category $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                            ])
                            ->hidden(fn(?Category $record) => $record === null),
                        Card::make()
                            ->schema([
                                Placeholder::make("Search Engine Optimization")
                                    ->label(__('general.SEO.title')),
                                SEO::make(),
                            ])
                        ,
                    ])
                    ->columns(1)
                    ->columnSpan([
                        'sm' => fn(?Category $record) => $record === null ? 3 : 1,
                    ]),
            ])
            ->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return static::$model::query()
            ->latest();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('general.blog_categories.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                BadgeColumn::make('position')
                    ->colors(['primary'])
                    ->label(__('general.blog_categories.fields.position'))
                    ->sortable()
                    ->searchable(),

                BooleanColumn::make('is_visible')
                    ->label(__('general.blog_categories.fields.is_visible'))
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->label(__('general.updated_at'))
                    ->date()
                    ->sortable()
                    ->formatStateUsing(fn(Category $record): ?string => $record?->updated_at->diffForHumans())
                    ->toggleable(),
            ])->filters([
                TernaryFilter::make('is_visible')
                    ->label(__('general.blog_categories.filters.status'))
                    ->placeholder(__('general.blog_categories.filters.status_placeholder'))
                    ->trueLabel(__('general.blog_categories.filters.visible'))
                    ->falseLabel(__('general.blog_categories.filters.not_visible')),
            ])->actions([
                Action::make('status')
                    ->label(__('general.actions.status'))
                    ->icon('heroicon-o-refresh')
                    ->color('primary')
                    ->visible(fn(Category $record): bool => auth()->user()?->can('update', $record))
                    ->action(fn(Category $record) => $record->update(['is_visible' => ! $record->is_visible]))
                    ->requiresConfirmation(),

                EditAction::make(),
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

                DeleteBulkAction::make(),
            ])->reorderable('position');
    }

    public static function getRelations(): array
    {
        return [
            PostsRelationManager::class,
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

    public static function getLabel(): ?string
    {
        return __('general.blog_categories.title');
    }

    public static function getPluralLabel(): ?string
    {
        return __('general.blog_categories.title_plural');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('nav.blog');
    }
}
