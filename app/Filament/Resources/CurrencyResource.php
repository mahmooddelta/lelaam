<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\CurrencyResource\Pages;
use App\Filament\Resources\CurrencyResource\RelationManagers;
use App\Models\Currency;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;

class CurrencyResource extends Resource
{
    protected static ?string $model = Currency::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?int $navigationSort = 999;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('general.currencies.fields.name'))
                    ->required(),
                TextInput::make('symbol')
                    ->label(__('general.currencies.fields.symbol'))
                    ->required(),
                Toggle::make('is_active')
                    ->label(__('general.currencies.fields.is_active'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('symbol')
                    ->label(__('general.currencies.fields.symbol'))
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('general.currencies.fields.name'))
                    ->searchable(),
                BooleanColumn::make('is_active')
                    ->label(__('general.currencies.fields.is_active')),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label(__('general.reports.filters.is_active.label'))
                    ->placeholder(__('general.reports.filters.is_active.label_placeholder'))
                    ->trueLabel(__('general.reports.filters.is_active.is_active'))
                    ->falseLabel(__('general.reports.filters.is_active.is_inactive')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCurrencies::route('/'),
        ];
    }

    public static function getLabel(): string
    {
        return __('general.currencies.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.currencies.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.setting');
    }

    public static function getEloquentQuery(): Builder
    {
        return static::$model::latest();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'symbol'];
    }
}
