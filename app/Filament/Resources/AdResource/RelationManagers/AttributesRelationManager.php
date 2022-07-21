<?php

namespace App\Filament\Resources\AdResource\RelationManagers;

use App\Models\Attribute;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Validation\Rule;
use function __;
use function array_keys;

class AttributesRelationManager extends RelationManager
{
    protected static string $relationship = 'attributes';

    protected static ?string $recordTitleAttribute = 'name';

    protected function getEditFormSchema(): array
    {
        return [
            TextInput::make('value')
                ->label(__('general.ads.relations.attributes.value'))
                ->required(),
        ];
    }

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
                    ->label(__('general.ads.relations.attributes.attribute_id'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('value')
                    ->label(__('general.ads.relations.attributes.value'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                AttachAction::make()
                    ->form(fn(Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect()
                            ->placeholder(__('general.ads.placeholders.attributes_relation_manager_select'))
                            ->required()
                            ->options(Attribute::whereNot('frontend_type', 'select')->pluck('name', 'id')->toArray()),
                        TextInput::make('value')
                            ->label(__('general.ads.relations.attributes.value'))
                            ->required(),
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
        return __('general.attributes.title_plural');
    }

    public static function getRecordLabel(): string
    {
        return __('general.attributes.title');
    }
}
