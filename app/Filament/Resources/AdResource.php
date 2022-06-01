<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdResource\Pages;
use App\Filament\Resources\AdResource\RelationManagers;
use App\Models\Ad;
use App\Models\Attribute;
use App\Models\Category;
use Filament\Forms\Components\BelongsToSelect;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use RalphJSmit\Filament\SEO\SEO;
use function __;
use function count;
use function is_null;
use function now;

class AdResource extends Resource
{
    protected static ?string $model = Ad::class;

    protected static ?string $navigationIcon = 'heroicon-o-mail';

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
                                                                   ->reactive()
                                                                   ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::persian_slug($state))),
                                                               TextInput::make('slug')
                                                                   ->label(__('general.categories.fields.slug'))
                                                                   ->disabled()
                                                                   ->required()
                                                                   ->unique(Ad::class, 'slug', fn($record) => $record),
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
                                                  ->columnSpan(2),
                                          ]),
                             $layout::make()
                                 ->schema([
                                              Grid::make()
                                                  ->schema([
                                                               BelongsToSelect::make('category_id')
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
                                                                       if (! is_null($get('category_id'))) {
                                                                           return static::generateInputs(Category::with('attributes')
                                                                                                             ->find($get('category_id'))->attributes);
                                                                       }

                                                                       return [];
                                                                   })
                                                                   ->visible(fn(callable $get, Component $livewire) => $livewire instanceof Pages\CreateAd
                                                                       && ! is_null($get('category_id'))
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

                                                               BelongsToSelect::make('district_id')
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
                                              BelongsToSelect::make('currency_id')
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
                'text' => TextInput::make('attributes.'.$attribute->id)
                    ->label($attribute->name)
                    ->required(),
                'number' => TextInput::make('attributes.'.$attribute->id)
                    ->label($attribute->name)
                    ->numeric()
                    ->required(),
                'checkbox' => Checkbox::make('attributes.'.$attribute->id)
                    ->label($attribute->name)
                    ->inline()
                    ->required(),
                'radio' => Radio::make('attributes.'.$attribute->id)
                    ->label($attribute->name)
                    ->options($attribute->values)
                    ->required(),
                'select' => Select::make('values.'.$attribute->id)
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
                          Tables\Columns\TextColumn::make('created_at')
                              ->label(__('general.created_at'))
                              ->toggleable()
                              ->formatStateUsing(fn(Ad $record) => $record->created_at->diffForHumans()),
                      ])
            ->filters([
                          Tables\Filters\TernaryFilter::make('is_published')
                              ->label(__('general.ads.filters.status'))
                              ->placeholder(__('general.ads.filters.status_placeholder'))
                              ->trueLabel(__('general.ads.filters.published'))
                              ->falseLabel(__('general.ads.filters.not_published')),
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
                      ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AttributesRelationManager::class,
            RelationManagers\ValuesRelationManager::class,
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAds::route('/'),
            'create' => Pages\CreateAd::route('/create'),
            'edit' => Pages\EditAd::route('/{record}/edit'),
        ];
    }
}
