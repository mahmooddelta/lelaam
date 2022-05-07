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
use function __;

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
										                           ->label(__('general.categories.fields.name'))
										                           ->required()
										                           ->reactive()
										                           ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
									
									                           TextInput::make('slug')
										                           ->label(__('general.categories.fields.slug'))
										                           ->disabled()
										                           ->required()
										                           ->unique(Category::class, 'slug', fn ($record) => $record),
								                           ]),
							
							                  BelongsToSelect::make('parent_id')
								                  ->label(__('general.categories.fields.parent_id'))
								                  ->relationship('parent', 'name', fn (Builder $query) => $query->where('parent_id', null))
								                  ->searchable()
								                  ->placeholder('Select parent category'),
							
							                  Toggle::make('is_visible')
								                  ->label(__('general.categories.fields.is_visible'))
								                  ->default(true),
							
							                  MarkdownEditor::make('description')
								                  ->label(__('general.categories.fields.description'))
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
								                  ->label(__('general.created_at'))
								                  ->content(fn (?Category $record): string => $record ? $record->created_at->diffForHumans() : '-'),
							                  Placeholder::make('updated_at')
								                  ->label(__('general.updated_at'))
								                  ->content(fn (?Category $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
						                  ])
						         ->columns(1),
					         $layout::make()
						         ->schema([
							                  Placeholder::make("Search Engine Optimization")
								                  ->label(__('general.SEO.title')),
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
	
	public static function getLabel (): string {
		return __('general.categories.title');
	}
	
	public static function getPluralLabel (): string {
		return __('general.categories.title_plural');
	}
	
	protected static function getNavigationGroup (): ?string {
		return __('nav.leelam');
	}
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('name')
					          ->label(__('general.categories.fields.name'))
					          ->searchable()
					          ->sortable()
					          ->toggleable(),
				          Tables\Columns\TextColumn::make('parent.name')
					          ->label(__('general.categories.fields.parent_id'))
					          ->searchable()
					          ->sortable()
					          ->default(__('general.categories.placeholders.no_parent'))
					          ->toggleable(),
				          Tables\Columns\TextColumn::make('children.count')
					          ->counts('children')
					          ->label(__('general.categories.placeholders.num_children'))
					          ->sortable()
					          ->default(0)
					          ->toggleable(),
				          Tables\Columns\BooleanColumn::make('is_visible')
					          ->label(__('general.categories.fields.is_visible'))
					          ->sortable()
					          ->toggleable(),
				          Tables\Columns\TextColumn::make('updated_at')
					          ->label(__('general.updated_at'))
					          ->date()
					          ->sortable()
					          ->toggleable(),
			          ])
			->filters([
				          Tables\Filters\Filter::make('is_visible')
					          ->label(__('general.categories.filters.visible'))
					          ->query(fn (Builder $query): Builder => $query->whereIsVisible(true)),
				          Tables\Filters\Filter::make('is_not_visible')
					          ->label(__('general.categories.filters.not_visible'))
					          ->query(fn (Builder $query): Builder => $query->whereIsVisible(false)),
			          ])
			->bulkActions([
				              Tables\Actions\BulkAction::make('delete')
					              ->label(__('general.delete_bulk'))
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
