<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Attribute;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Validation\Rule;
use function __;
use function array_keys;

class AttributesRelationManager extends RelationManager
{
    protected static string $relationship = 'attributes';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('general.attributes.fields.name'))
                    ->required()
                    ->maxLength(191),
                Select::make('frontend_type')
                    ->options(Attribute::FRONT_END_TYPES)
                    ->label(__('general.attributes.fields.front_end_type'))
                    ->required()
                    ->rules([
                        Rule::in(array_keys(Attribute::FRONT_END_TYPES)),
                    ]),
                Toggle::make('is_active')
                    ->label(__('general.attributes.fields.is_active'))
                    ->helperText(__('general.status_helper'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('general.attributes.fields.name'))
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('frontend_type')
                    ->label(__('general.attributes.fields.front_end_type'))
                    ->enum(Attribute::FRONT_END_TYPES),

                BooleanColumn::make('is_active')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRecordLabel(): string
    {
        return __('general.attributes.title');
    }

    public static function getPluralRecordLabel(): string
    {
        return __('general.attributes.title_plural');
    }
}
