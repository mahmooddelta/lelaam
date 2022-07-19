<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Enums\FrontEndTypes;
use App\Filament\Resources\AttributeResource\Pages;
use App\Filament\Resources\AttributeResource\RelationManagers;
use App\Models\Attribute;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Validation\Rule;
use function __;
use function array_keys;
use function str;

class AttributeResource extends Resource
{

    protected static ?string $model = Attribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-list';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'name';

    public Attribute $attribute;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('general.attributes.fields.name'))
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('frontend_type')
                    ->options(Attribute::FRONT_END_TYPES)
                    ->label(__('general.attributes.fields.front_end_type'))
                    ->required()
                    ->rules([
                        Rule::in(array_keys(Attribute::FRONT_END_TYPES)),
                    ]),
                Forms\Components\Toggle::make('is_active')
                    ->label(__('general.attributes.fields.is_active'))
                    ->helperText(__('general.status_helper'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('general.attributes.fields.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('frontend_type')
                    ->label(__('general.attributes.fields.front_end_type'))
                    ->enum(Attribute::FRONT_END_TYPES),

                Tables\Columns\BooleanColumn::make('is_active')
                    ->label(__('general.attributes.fields.is_active'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label(__('general.reports.filters.is_active.label'))
                    ->placeholder(__('general.reports.filters.is_active.label_placeholder'))
                    ->trueLabel(__('general.reports.filters.is_active.is_active'))
                    ->falseLabel(__('general.reports.filters.is_active.is_inactive')),
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
                    ->additionalColumnsAddButtonLabel(__('general.export.additional_columns_add_button_label')) // Label for additional columns' add button,
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ValuesRelationManager::class,
        ];
    }

    public static function getLabel(): string
    {
        return __('general.attributes.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.attributes.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.leelam');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttributes::route('/'),
            'create' => Pages\CreateAttribute::route('/create'),
            'edit' => Pages\EditAttribute::route('/{record}/edit'),
        ];
    }
}
