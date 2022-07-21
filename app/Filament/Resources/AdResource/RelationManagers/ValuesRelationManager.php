<?php

namespace App\Filament\Resources\AdResource\RelationManagers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use function __;

class ValuesRelationManager extends RelationManager
{
    protected static string $relationship = 'values';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('general.attribute_values.fields.name'))
                    ->required(),
                Forms\Components\Hidden::make('attribute_id'),
                Forms\Components\Toggle::make('is_active')
                    ->label(__('general.attribute_values.fields.is_active'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('attribute.name')
                    ->label(__('general.attribute_values.fields.attribute_id'))
                    ->searchable(),

                TextColumn::make('name')
                    ->label(__('general.attribute_values.fields.name'))
                    ->searchable()
                    ->sortable(),

                BooleanColumn::make('is_active')
                    ->label(__('general.attribute_values.fields.is_active'))
                    ->sortable(),
            ])
            ->filters([
                Filter::make('is_active')
                    ->label(__('general.attribute_values.filters.visible'))
                    ->query(fn(Builder $query): Builder => $query->whereIsActive(true)),
                Filter::make('not_active')
                    ->label(__('general.attribute_values.filters.not_visible'))
                    ->query(fn(Builder $query): Builder => $query->whereIsActive(false)),
            ])
            ->headerActions([
                AttachAction::make()
                    ->form(fn(Tables\Actions\AttachAction $action): array => [
                        Select::make('attribute_id')
                            ->relationship('attribute', 'name')
                            ->label(__('general.attributes.title'))
                            ->options(Attribute::whereFrontendType('select')->whereHas('values')->pluck('name', 'id')->toArray())
                            ->reactive(),
                        $action->getRecordSelect()
                            ->label(__('general.attribute_values.title'))
                            ->options(function(callable $get) {
                                $attribute = $get('attribute_id');
                                if ($attribute) {
                                    return AttributeValue::whereAttributeId($attribute)->pluck('name', 'id')->toArray();
                                }

                                return [];
                            })->visible(fn(callable $get): bool => ! is_null($get('attribute_id'))),
                    ])->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getTitle(): string
    {
        return __('general.attribute_values.title_plural');
    }

    public static function getPluralRecordLabel(): string
    {
        return __('general.attribute_values.title_plural');
    }
}
