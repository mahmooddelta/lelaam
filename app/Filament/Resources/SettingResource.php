<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use function __;
use function str;

class SettingResource extends Resource
{

    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?int $navigationSort = 1000;
    protected static ?string $recordTitleAttribute = 'key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->label(__('general.settings.fields.key'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('value')
                    ->label(__('general.settings.fields.value'))
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label(__('general.settings.fields.key')),
                Tables\Columns\TextColumn::make('value')
                    ->label(__('general.settings.fields.value')),
                Tables\Columns\TextColumn::make('created_at')
                    ->formatStateUsing(fn(Setting $record) => $record->created_at->diffForHumans()),
                Tables\Columns\TextColumn::make('updated_at')
                    ->formatStateUsing(fn(Setting $record) => $record->updated_at->diffForHumans()),
            ])
            ->filters([
                //
            ])->bulkActions([
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
        return __('general.settings.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.settings.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.setting');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
