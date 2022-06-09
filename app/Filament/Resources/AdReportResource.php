<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdReportResource\Pages;
use App\Filament\Resources\AdReportResource\RelationManagers;
use App\Models\Ad;
use App\Models\AdReport;
use App\Models\ReportType;
use App\Models\User;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use function __;

class AdReportResource extends Resource
{
    protected static ?string $model = AdReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-report';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                         BelongsToSelect::make('user_id')
                             ->label(__('general.reports.fields.user_id'))
                             ->relationship('user', 'name')
                             ->exists(User::class, 'id')
                             ->searchable()
                             ->preload()
                             ->required(),

                         BelongsToSelect::make('ad_id')
                             ->label(__('general.reports.fields.ad_id'))
                             ->relationship('ad', 'title')
                             ->exists(Ad::class, 'id')
                             ->searchable()
                             ->preload()
                             ->required(),

                         BelongsToSelect::make('report_type_id')
                             ->label(__('general.reports.fields.report_type_id'))
                             ->relationship('reportType', 'name')
                             ->exists(ReportType::class, 'id')
                             ->searchable()
                             ->preload()
                             ->required(),

                         Select::make('status')
                             ->label(__('general.reports.fields.status'))
                             ->options(AdReport::STATUS)
                             ->searchable()
                             ->required(),

                         RichEditor::make('description')
                             ->label(__('general.reports.fields.description'))
                             ->required()
                             ->columnSpan(2),

                         Toggle::make('is_active')
                             ->default(false)
                             ->label(__('general.reports.fields.is_active')),
                     ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                          TextColumn::make('ad.title')
                              ->label(__('general.reports.fields.ad_id'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          TextColumn::make('user.name')
                              ->label(__('general.reports.fields.user_id'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          TextColumn::make('reportType.name')
                              ->label(__('general.reports.fields.report_type_id'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          BadgeColumn::make('status')
                              ->enum(AdReport::STATUS)
                              ->label(__('general.reports.fields.status'))
                              ->toggleable()
                              ->sortable(),

                          BooleanColumn::make('is_active')
                              ->label(__('general.reports.fields.is_active'))
                              ->toggleable()
                              ->sortable(),
                      ])
            ->filters([
                          SelectFilter::make('user_id')
                              ->label(__('general.reports.filters.user.label'))
                              ->placeholder(__('general.reports.filters.user.label_placeholder'))
                              ->searchable()
                              ->options(User::pluck('name', 'id')->toArray()),

                          SelectFilter::make('ad_id')
                              ->label(__('general.reports.filters.ad.label'))
                              ->placeholder(__('general.reports.filters.ad.label_placeholder'))
                              ->searchable()
                              ->options(Ad::pluck('title', 'id')->toArray()),

                          SelectFilter::make('report_type_id')
                              ->label(__('general.reports.filters.report_type.label'))
                              ->placeholder(__('general.reports.filters.report_type.label_placeholder'))
                              ->searchable()
                              ->options(ReportType::pluck('name', 'id')->toArray()),

                          TernaryFilter::make('is_active')
                              ->label(__('general.reports.filters.is_active.label'))
                              ->placeholder(__('general.reports.filters.is_active.label_placeholder'))
                              ->trueLabel(__('general.reports.filters.is_active.is_active'))
                              ->falseLabel(__('general.reports.filters.is_active.is_inactive')),
                      ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAdReports::route('/'),
        ];
    }

    public static function getLabel(): string
    {
        return __('general.reports.title');
    }

    public static function getPluralLabel(): string
    {
        return __('general.reports.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.leelam');
    }
}
