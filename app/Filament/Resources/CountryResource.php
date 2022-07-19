<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use function __;
use function str;

class CountryResource extends Resource
{

    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe';
    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('general.countries.fields.name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_code')
                    ->label(__('general.countries.fields.phone_code'))
                    ->tel()
                    ->required()
                    ->maxLength(5),
                Forms\Components\TextInput::make('iso3')
                    ->label(__('general.countries.fields.iso3'))
                    ->required()
                    ->helperText(__('general.countries.placeholders.iso3_helper'))
                    ->maxLength(3),
                Toggle::make('status')
                    ->label(__('general.countries.fields.status'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('general.countries.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\BooleanColumn::make('status')
                    ->label(__('general.countries.fields.status'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('phone_code')
                    ->label(__('general.countries.fields.phone_code'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('iso3')
                    ->label(__('general.countries.fields.iso3'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('status')
                    ->label(__('general.categories.filters.visible'))
                    ->query(fn(Builder $query): Builder => $query->whereStatus(true)),
                Tables\Filters\Filter::make('no_status')
                    ->label(__('general.categories.filters.not_visible'))
                    ->query(fn(Builder $query): Builder => $query->whereStatus(false)),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('delete')
                    ->label(__('general.delete_bulk'))
                    ->action(fn(Collection $records) => $records->each(fn(Country $record) => $record->delete()))
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->color('danger'),

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
                    ->additionalColumnsAddButtonLabel(__('general.export.additional_columns_add_button_label')) // Label for additional columns' add button,
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\StatesRelationManager::class,
            RelationManagers\DistrictsRelationManager::class,
        ];
    }

    public static function getLabel(): string
    {
        return __('general.countries.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.countries.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.location');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
