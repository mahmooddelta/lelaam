<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\DistrictResource\Pages;
use App\Filament\Resources\DistrictResource\RelationManagers;
use App\Models\Country;
use App\Models\District;
use App\Models\State;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Collection;
use function __;
use function str;

class DistrictResource extends Resource
{

    protected static ?string $model = District::class;

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';

    protected static ?int $navigationSort = 13;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->label(__('general.districts.fields.country_id'))
                    ->options(Country::select('id', 'name')
                        ->pluck('name', 'id')
                        ->toArray())
                    ->reactive()
                    ->afterStateHydrated(fn(callable $set) => $set('state_id', null))
                    ->required()
                    ->exists('countries', 'id'),

                Forms\Components\Select::make('state_id')
                    ->relationship('state', 'name')
                    ->label(__('general.districts.fields.state_id'))
                    ->options(function(callable $get) {
                        $country = $get('country_id');
                        if (! $country) {
                            State::select(['name', 'id', 'country_id'])
                                ->pluck('name', 'id', 'country_id')
                                ->toArray();
                        }

                        return State::select(['id', 'name'])
                            ->whereCountryId($country)
                            ->get()
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->required()
                    ->exists('states', 'id'),

                Forms\Components\TextInput::make('name')
                    ->label(__('general.districts.fields.name'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('general.districts.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('state.name')
                    ->label(__('general.districts.fields.state_id'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('country.name')
                    ->label(__('general.districts.fields.country_id'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('delete')
                    ->action(fn(Collection $records) => $records->each(fn(District $record) => $record->delete()))
                    ->label(__('general.delete_bulk'))
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
            //
        ];
    }

    public static function getLabel(): string
    {
        return __('general.districts.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.districts.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.location');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDistricts::route('/'),
            'create' => Pages\CreateDistrict::route('/create'),
            'edit' => Pages\EditDistrict::route('/{record}/edit'),
        ];
    }
}
