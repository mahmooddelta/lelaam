<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages\CreateCategory;
use App\Filament\Resources\CategoryResource\Pages\EditCategory;
use App\Filament\Resources\CategoryResource\Pages\ListCategories;
use App\Models\Category;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use RalphJSmit\Filament\SEO\SEO;

class CategoryResource extends Resource {
	
	protected static ?string $model = Category::class;
	
	protected static ?string $slug = 'categories';
	
	protected static ?string $recordTitleAttribute = 'name';
	
	protected static ?string $navigationGroup = 'Lelaam';
	
	protected static ?string $navigationIcon = 'heroicon-o-tag';
	
	protected static ?int $navigationSort = 1;
	
	public static function form (Form $form): Form {
		return $form
			->schema(static::getFormSchema(Card::class))
			->columns([
				          'sm' => 3,
				          'lg' => null,
			          ]);
	}
	
	private static function getFormSchema (string $layout = Grid::class) {
		return [
			Group::make()
				->schema([
					         $layout::make()
						         ->schema([
							                  Grid::make()
								                  ->schema([
									                           TextInput::make('name')
										                           ->required()
										                           ->reactive()
										                           ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
									                           TextInput::make('slug')
										                           ->disabled()
										                           ->required()
										                           ->unique(Category::class, 'slug', fn ($record) => $record),
								                           ]),
							                  BelongsToSelect::make('parent_id')
								                  ->label('Parent')
								                  ->relationship('parent', 'name', fn (Builder $query) => $query->where('parent_id', null))
								                  ->searchable()
								                  ->placeholder('Select parent category'),
							                  Toggle::make('is_visible')
								                  ->label('Visible to customers.')
								                  ->default(true),
							                  MarkdownEditor::make('description')
								                  ->label('Description')
								                  ->columnSpan(2),
						                  ])
						         ->columns([
							                   'sm' => 2,
						                   ]),
				         ])
				->columnSpan([
					             'sm' => 2,
				             ]),
			Group::make()
				->schema([
					         $layout::make()
						         ->schema([
							                  Placeholder::make('created_at')
								                  ->label('Created at')
								                  ->content(fn (?Category $record): string => $record ? $record->created_at->diffForHumans() : '-'),
							                  Placeholder::make('updated_at')
								                  ->label('Last modified at')
								                  ->content(fn (?Category $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
						                  ])
						         ->columns(1),
					         $layout::make()
						         ->schema([
							                  Placeholder::make("Search Engine Optimization"),
							                  SEO::make(),
						                  ])
						         ->columns(1),
				         ])
				->columnSpan(1),
		];
	}
	
	public static function getEloquentQuery (): Builder {
		return Category::query()
			->whereNull('parent_id')
			->with('children');
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('name')
					          ->label('Name')
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
				          Tables\Columns\TextColumn::make('parent.name')
					          ->label('Parent')
					          ->searchable()
					          ->sortable()
					          ->default('No Parent')
					          ->toggleable(),
				          Tables\Columns\TextColumn::make('children.count')
					          ->counts('children')
					          ->label('Children')
					          ->sortable()
					          ->default(0)
					          ->toggleable(),
				          Tables\Columns\BooleanColumn::make('is_visible')
					          ->label('Visibility')
					          ->sortable()
					          ->toggleable(),
				          Tables\Columns\TextColumn::make('updated_at')
					          ->label('Updated Date')
					          ->date()
					          ->sortable()
					          ->toggleable(),
			          ])
			->filters([
				          Tables\Filters\Filter::make('is_visible')
					          ->label('Visible')
					          ->query(fn (Builder $query): Builder => $query->whereIsVisible(true)),
				          Tables\Filters\Filter::make('is_not_visible')
					          ->label('Not Visible')
					          ->query(fn (Builder $query): Builder => $query->whereIsVisible(false)),
			          ])
			->bulkActions([
				              Tables\Actions\BulkAction::make('delete')
					              ->action(fn (Collection $records) => $records->each(fn (Category $record) => $record->delete()))
					              ->icon('heroicon-o-trash')
					              ->requiresConfirmation()
					              ->color('danger'),
			              ]);
	}
	
	public static function getRelations (): array {
		return [];
	}
	
	public static function getPages (): array {
		return [
			'index' => ListCategories::route('/'),
			'create' => CreateCategory::route('/create'),
			'edit' => EditCategory::route('/{record}/edit'),
		];
	}
}
