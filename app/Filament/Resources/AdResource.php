<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Events\AdPublishStatusChangedEvent;
use App\Filament\Resources\AdResource\Pages;
use App\Filament\Resources\AdResource\RelationManagers;
use App\Models\Ad;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Scopes\AdNotExpiredScope;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use RalphJSmit\Filament\SEO\SEO;
use function __;
use function count;
use function is_null;
use function now;
use function str;

class AdResource extends Resource
{
    protected static ?string $model = Ad::class;

    protected static ?string $navigationIcon = 'heroicon-o-speakerphone';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::getFormSchema(Card::class))
            ->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    private static function getFormSchema(string $layout = Grid::class): array
    {
        return [
            Group::make()
                ->schema([
                    $layout::make()
                        ->schema([
                            Grid::make()
                                ->schema([
                                    TextInput::make('title')
                                        ->label(__('general.ads.fields.title'))
                                        ->required()
                                        ->columnSpan(2),
                                    TextInput::make('slug')
                                        ->label(__('general.categories.fields.slug'))
                                        ->required()
                                        ->unique(Ad::class, 'slug', fn($record) => $record)
                                        ->columnSpan(2)
                                        ->visibleOn(Pages\EditAd::class),
                                ]),
                        ]),
                    $layout::make()
                        ->schema([
                            RichEditor::make('desc')
                                ->toolbarButtons([
                                    'bold',
                                    'bulletList',
                                    'h2',
                                    'h3',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'undo',
                                ])
                                ->label(__('general.ads.fields.desc'))
                                ->required()
                                ->columnSpan(2)
                                ->extraAttributes([ 'x-init' => "\$nextTick(() => { document.querySelector('trix-editor').style.color = 'black'; })"]),
                        ]),
                    $layout::make()
                        ->schema([
                            Grid::make()
                                ->schema([
                                    Select::make('category_id')
                                        ->label(__('general.ads.fields.category_id'))
                                        ->required()
                                        ->relationship('category', 'name')
                                        ->exists('categories', 'id')
                                        ->columnSpan(2)
                                        ->searchable()
                                        ->preload()
                                        ->reactive(),
                                    Section::make('attributes')
                                        ->heading(__('general.ads.placeholders.attribute_values_section'))
                                        ->collapsible()
                                        ->columns(2)
                                        ->schema(function (callable $get): array {
                                            if (!is_null($get('category_id'))) {
                                                return static::generateInputs(Category::with('attributes')
                                                    ->find($get('category_id'))->attributes);
                                            }

                                            return [];
                                        })
                                        ->visible(fn(callable $get, Component $livewire) => $livewire instanceof Pages\CreateAd
                                            && !is_null($get('category_id'))
                                            && count(Category::with('attributes')
                                                ->find($get('category_id'))->attributes) > 0),
                                ]),
                        ])
                        ->columns(1),
                    $layout::make()
                        ->schema([
                            Grid::make()
                                ->schema([
                                    TextInput::make('address')
                                        ->label(__('general.ads.fields.address'))
                                        ->required()
                                        ->maxLength(255),

                                    Select::make('district_id')
                                        ->label(__('general.ads.fields.district_id'))
                                        ->relationship('district', 'name')
                                        ->exists('districts', 'id')
                                        ->required(),
                                ]),
                        ])
                        ->columns(1),
                    $layout::make()
                        ->schema([
                            Grid::make()
                                ->schema([
                                    SpatieMediaLibraryFileUpload::make('media')
                                        ->label(__('general.ads.fields.media'))
                                        ->collection('ads')
                                        ->enableReordering()
                                        ->multiple()
                                        ->columnSpan(2),
                                ]),
                        ])
                        ->columns(1),
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
                                ->content(fn(?Ad $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                            Placeholder::make('updated_at')
                                ->label(__('general.updated_at'))
                                ->content(fn(?Ad $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                        ])
                        ->columns(1),
                    $layout::make()
                        ->schema([
                            TextInput::make('price')
                                ->label(__('general.ads.fields.price'))
                                ->numeric()
                                ->required(),
                            Select::make('currency_id')
                                ->label(__('general.ads.fields.currency_id'))
                                ->relationship('currency', 'name')
                                ->exists('currencies', 'id')
                                ->required(),
                            TextInput::make('phone_number')
                                ->tel()
                                ->required()
                                ->label(__('general.ads.fields.phone_number')),
                            Toggle::make('is_published')
                                ->label(__('general.ads.fields.is_published'))
                                ->default(true),
                        ])
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

    private static function generateInputs(Collection $collection): array
    {
        return $collection->map(function (Attribute $attribute) {
            return match ($attribute->frontend_type) {
                'text' => TextInput::make('attributes.' . $attribute->id)
                    ->label($attribute->name)
                    ->required(),
                'number' => TextInput::make('attributes.' . $attribute->id)
                    ->label($attribute->name)
                    ->numeric()
                    ->required(),
                'checkbox' => Checkbox::make('attributes.' . $attribute->id)
                    ->label($attribute->name)
                    ->inline()
                    ->required(),
                'radio' => Radio::make('attributes.' . $attribute->id)
                    ->label($attribute->name)
                    ->options($attribute->values)
                    ->required(),
                'select' => Select::make('values.' . $attribute->id)
                    ->options($attribute->values()
                        ->pluck('name', 'id', 'attribute_id')
                        ->toArray() ?? [])
                    ->label($attribute->name)
                    ->required()
            };
        })->flatten()->toArray();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('general.ads.fields.user_id'))
                    ->default(__('general.ads.placeholders.no_user'))
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('general.ads.fields.category_id'))
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('general.ads.fields.title'))
                    ->limit(50)
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->formatStateUsing(fn(Ad $record): string => $record->price && $record->currency_id ? "{$record->price} {$record?->currency?->name}" : __('general.ads.placeholders.negotiable'))
                    ->label(__('general.ads.fields.price'))
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label(__('general.ads.fields.phone_number'))
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('district.name')
                    ->label(__('general.ads.fields.district_id'))
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_published')
                    ->label(__('general.ads.fields.is_published'))
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_sold')
                    ->label(__('general.ads.fields.is_sold'))
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('general.created_at'))
                    ->toggleable()
                    ->formatStateUsing(fn(Ad $record) => $record->created_at->diffForHumans()),
                Tables\Columns\TextColumn::make('expires_at')
                    ->label(__('general.expires_at'))
                    ->toggleable()
                    ->formatStateUsing(fn(Ad $record) => $record->expires_at->isPast() ? __('general.ads.filters.expired') . ' در ' . $record->expires_at->diffForHumans() : $record->expires_at->longRelativeToNowDiffForHumans()),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label(__('general.ads.filters.status'))
                    ->placeholder(__('general.ads.filters.status_placeholder'))
                    ->trueLabel(__('general.ads.filters.published'))
                    ->falseLabel(__('general.ads.filters.not_published')),
                Tables\Filters\TernaryFilter::make('is_sold')
                    ->label(__('general.ads.filters.status'))
                    ->placeholder(__('general.ads.filters.status_placeholder'))
                    ->trueLabel(__('general.ads.filters.sold'))
                    ->falseLabel(__('general.ads.filters.not_sold')),
                Tables\Filters\SelectFilter::make('category_id')
                    ->label(__('general.ads.filters.category'))
                    ->options(Category::pluck('name', 'id')->toArray()),
                Tables\Filters\SelectFilter::make('district_id')
                    ->label(__('general.ads.filters.district'))
                    ->relationship('district', 'name'),
                Tables\Filters\TernaryFilter::make('is_chat_enabled')
                    ->label(__('general.ads.filters.chat_status'))
                    ->placeholder(__('general.ads.filters.chat_status_placeholder'))
                    ->trueLabel(__('general.ads.filters.chat_enabled'))
                    ->falseLabel(__('general.ads.filters.chat_disabled')),
                Tables\Filters\Filter::make('created_at_on')
                    ->form([
                        DatePicker::make('create_on')
                            ->label(__('general.ads.filters.created_on')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['create_on'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '=', $date),
                            );
                    }),
                Tables\Filters\Filter::make('updated_at_on')
                    ->form([
                        DatePicker::make('updated_at')
                            ->label(__('general.ads.filters.updated_on')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['updated_at'],
                                fn(Builder $query, $date): Builder => $query->whereDate('updated_at', '=', $date),
                            );
                    }),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->label(__('general.ads.filters.created_from')),
                        DatePicker::make('created_until')
                            ->default(now())
                            ->label(__('general.ads.filters.created_until')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                Tables\Filters\Filter::make('updated_at')
                    ->form([
                        DatePicker::make('updated_from')
                            ->label(__('general.ads.filters.updated_from')),
                        DatePicker::make('updated_until')
                            ->default(now())
                            ->label(__('general.ads.filters.updated_until')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['updated_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('updated_at', '>=', $date),
                            )
                            ->when(
                                $data['updated_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('updated_at', '<=', $date),
                            );
                    }),
                Tables\Filters\TernaryFilter::make('expires_at')
                    ->label(__('general.ads.filters.expired_label'))
                    ->placeholder(__('general.ads.filters.expired_placeholder'))
                    ->trueLabel(__('general.ads.filters.expired'))
                    ->falseLabel(__('general.ads.filters.not_expired'))
                    ->queries(
                        true: fn(Builder $query) => $query->expired(),
                        false: fn(Builder $query) => $query->notExpired(),
                        blank: fn(Builder $query) => $query,
                    ),
                Tables\Filters\SelectFilter::make('user_id')
                    ->label(__('general.ads.filters.user'))
                    ->options(User::pluck('name', 'id')->prepend('مهمان', '0')->toArray()),
            ])
            ->actions([
                Action::make('status')
                    ->label(__('general.actions.status'))
                    ->icon('heroicon-o-refresh')
                    ->color('primary')
                    ->visible(fn(Ad $record): bool => auth()->user()?->can('update', $record))
                    ->action(function (Ad $record) {
                        broadcast(new AdPublishStatusChangedEvent($record))->toOthers();

                        return $record->update(
                            [
                                'is_published' => !$record->is_published,
                                'published_at' => !$record->is_published ? now()->toDateTimeString() : null,
                            ]);
                    }),
                Action::make('is_sold')
                    ->label(fn(Ad $record) => $record->is_sold ? __('general.actions.not_sold') : __('general.actions.sold'))
                    ->icon('heroicon-o-check')
                    ->color('primary')
                    ->visible(fn(Ad $record): bool => auth()->user()?->can('update', $record))
                    ->requiresConfirmation()
                    ->action(fn(Ad $record) => $record->update(['is_sold' => !$record->is_sold,])),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                BulkAction::make('status')
                    ->label(__('general.actions.status'))
                    ->icon('heroicon-o-refresh')
                    ->color('primary')
                    ->visible(fn(Ad $record): bool => auth()->user()?->can('update', $record))
                    ->action(fn(Collection $records) => $records->each(function ($record) {
                        broadcast(new AdPublishStatusChangedEvent($record));

                        return $record->update(
                            [
                                'is_published' => !$record->is_published,
                                'published_at' => !$record->is_published ? now()->toDateTimeString() : null,
                            ]);
                    }))
                    ->deselectRecordsAfterCompletion()
                    ->requiresConfirmation(),
                BulkAction::make('is_sold')
                    ->label(fn(Ad $record) => $record->is_sold ? __('general.actions.not_sold') : __('general.actions.sold'))
                    ->icon('heroicon-o-check')
                    ->color('primary')
                    ->visible(fn(Ad $record): bool => auth()->user()?->can('update', $record))
                    ->requiresConfirmation()
                    ->deselectRecordsAfterCompletion()
                    ->action(fn(Collection $records) => $records->each(fn($record) => $record->update(['is_sold' => !$record->is_sold,]))),
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
                    ->additionalColumnsAddButtonLabel(__('general.export.additional_columns_add_button_label')), // Label for additional columns' add button,
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AttributesRelationManager::class,
            RelationManagers\ValuesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAds::route('/'),
            'create' => Pages\CreateAd::route('/create'),
            'edit' => Pages\EditAd::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('general.ads.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.ads.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.leelam');
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::todayCreated()->notPublished()->count();
    }

    public static function getEloquentQuery(): Builder
    {
        return static::$model::query()->latest('created_at')->withoutGlobalScope(AdNotExpiredScope::class);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'user.name', 'category.name', 'phone_number', 'district.name'];
    }
}
