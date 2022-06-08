<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportTypeResource\Pages;
use App\Filament\Resources\ReportTypeResource\RelationManagers;
use App\Models\ReportType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use function __;

class ReportTypeResource extends Resource
{
    protected static ?string $model = ReportType::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                         Forms\Components\TextInput::make('name')
                             ->label(__('general.report_types.fields.name'))
                             ->required()
                             ->maxLength(255),

                         Forms\Components\Toggle::make('is_active')
                             ->label(__('general.report_types.fields.is_active'))
                             ->required()
                             ->default(true),

                         Forms\Components\RichEditor::make('description')
                             ->label(__('general.report_types.fields.description'))
                             ->maxLength(16777215)
                             ->columnSpan(2),
                     ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                          Tables\Columns\TextColumn::make('name')
                              ->label(__('general.report_types.fields.name'))
                              ->sortable()
                              ->searchable(),
                          Tables\Columns\TextColumn::make('description')
                              ->label(__('general.report_types.fields.description'))
                              ->toggleable()
                              ->limit(60),
                          Tables\Columns\BooleanColumn::make('is_active')
                              ->label(__('general.report_types.fields.is_active'))
                              ->sortable()
                              ->toggleable(),
                      ])
            ->filters([
                          Tables\Filters\TernaryFilter::make('is_active')
                              ->label(__('general.report_types.filters.is_active.status'))
                              ->placeholder(__('general.report_types.filters.is_active.status_placeholder'))
                              ->trueLabel(__('general.report_types.filters.is_active.is_active'))
                              ->falseLabel(__('general.report_types.filters.is_active.is_inactive')),
                      ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReportTypes::route('/'),
            'create' => Pages\CreateReportType::route('/create'),
            'edit' => Pages\EditReportType::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('general.report_types.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.report_types.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.leelam');
    }

}
