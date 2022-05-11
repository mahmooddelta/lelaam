<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;
use Livewire\Component;
use RalphJSmit\Filament\SEO\SEO;
use function __;
use function is_null;

class PostResource extends Resource {
	
	protected static ?string $model = Post::class;
	
	protected static ?string $navigationIcon       = 'heroicon-o-mail';
	protected static ?int    $navigationSort       = 3;
	protected static ?string $recordTitleAttribute = 'title';
	
	public static function form (Form $form): Form {
		return $form
			->schema(static::getFormSchema(Card::class))
			->columns([
				          'sm' => 3,
				          'lg' => null,
			          ]);
	}
	
	private static function getFormSchema (string $layout = Grid::class): array {
		return [
			Group::make()
				->schema([
					         $layout::make()
						         ->schema([
							                  Grid::make()
								                  ->schema([
									                           Forms\Components\TextInput::make('title')
										                           ->label(__('general.posts.fields.title'))
										                           ->required()
										                           ->reactive()
										                           ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::persian_slug($state))),
									                           TextInput::make('slug')
										                           ->label(__('general.categories.fields.slug'))
										                           ->disabled()
										                           ->required()
										                           ->unique(Post::class, 'slug', fn ($record) => $record),
									
									                           Forms\Components\MarkdownEditor::make('desc')
										                           ->toolbarButtons([
											                                            'blockquote',
											                                            'bold',
											                                            'bulletList',
											                                            'codeBlock',
											                                            'h2',
											                                            'h3',
											                                            'italic',
											                                            'link',
											                                            'orderedList',
											                                            'redo',
											                                            'strike',
											                                            'undo',
										                                            ])
										                           ->label(__('general.posts.fields.desc'))
										                           ->maxLength(2000)
										                           ->columnSpan(2),
								                           ]),
						                  ])
						         ->columns([
							                   'sm' => 2,
						                   ]),
					         $layout::make()
						         ->schema([
							                  Grid::make()
								                  ->schema([
									                           BelongsToSelect::make('category_id')
										                           ->label(__('general.posts.fields.category_id'))
										                           ->relationship('category', 'name')
										                           ->columnSpan(2)
										                           ->searchable()
										                           ->preload()
										                           ->reactive(),
									                           Forms\Components\Section::make(__('general.posts.placeholders.attribute_values_section'))
										                           ->collapsible()
										                           ->columns(2)
										                           ->schema(function (callable $get): array {
											                           $inputs = [];
											                           if ( !is_null($get('category_id')) ) {
												                           Category::with('attributes')
													                           ->find($get('category_id'))->attributes->map(function (Attribute $attribute) use (&$inputs) {
														                           if ( $attribute->frontend_type === 'text' ) {
															                           $inputs[] = TextInput::make('attributes.' . $attribute->id)
																                           ->label($attribute->name)
																                           ->required();
														                           } elseif ( $attribute->frontend_type === 'number' ) {
															                           $inputs[] = TextInput::make('attributes.' . $attribute->id)
																                           ->label($attribute->name)
																                           ->numeric()
																                           ->required();
														                           } elseif ( $attribute->frontend_type === 'checkbox' ) {
															                           $inputs[] = Checkbox::make('attributes.' . $attribute->id)
																                           ->label($attribute->name)
																                           ->inline()
																                           ->required();
														                           } elseif ( $attribute->frontend_type === 'radio' ) {
															                           $inputs[] = Radio::make('attributes.' . $attribute->id)
																                           ->label($attribute->name)
																                           ->options($attribute->values)
																                           ->required();
														                           } elseif ( $attribute->frontend_type === 'color' ) {
															                           $inputs[] = ColorPicker::make('attributes.' . $attribute->id)
																                           ->label($attribute->name)
																                           ->required();
														                           } elseif ( $attribute->frontend_type === 'select' ) {
															                           $inputs [] = Select::make('values.' . $attribute->name)
																                           ->options($attribute->values()
																	                                     ->pluck('name', 'id', 'attribute_id')
																	                                     ->toArray() ?? [])
																                           ->label($attribute->name)
																                           ->required();
														                           }
													                           });
											                           }
											
											                           return $inputs;
										                           })
										                           ->visible(fn (callable $get, Component $livewire) => $livewire instanceof Pages\CreatePost && !is_null($get('category_id'))),
								                           ]),
						                  ])
						         ->columns(1),
					         $layout::make()
						         ->schema([
							                  Grid::make()
								                  ->schema([
									                           Forms\Components\TextInput::make('address')
										                           ->label(__('general.posts.fields.address'))
										                           ->required()
										                           ->maxLength(255),
									
									                           Forms\Components\BelongsToSelect::make('district_id')
										                           ->label(__('general.posts.fields.district_id'))
										                           ->relationship('district', 'name')
										                           ->exists('districts', 'id')
										                           ->required(),
								                           ]),
						                  ])
						         ->columns(1),
					         $layout::make()
						         ->schema([
							                  Grid::make()
								                  ->schema([
									                           Forms\Components\SpatieMediaLibraryFileUpload::make('media')
										                           ->label(__('general.posts.fields.media'))
										                           ->collection('posts')
										                           ->enableReordering()
										                           ->multiple()
										                           ->columnSpan(2),
								                           ]),
						                  ])
						         ->columns(1),
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
								                  ->content(fn (?Post $record): string => $record ? $record->created_at->diffForHumans() : '-'),
							                  Placeholder::make('updated_at')
								                  ->label(__('general.updated_at'))
								                  ->content(fn (?Post $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
						                  ])
						         ->columns(1),
					         $layout::make()
						         ->schema([
							                  Forms\Components\TextInput::make('price')
								                  ->label(__('general.posts.fields.price'))
								                  ->numeric()
								                  ->required(),
							                  Forms\Components\BelongsToSelect::make('currency_id')
								                  ->label(__('general.posts.fields.currency_id'))
								                  ->relationship('currency', 'name')
								                  ->exists('currencies', 'id')
								                  ->required(),
							                  Forms\Components\TextInput::make('phone_number')
								                  ->tel()
								                  ->required()
								                  ->label(__('general.posts.fields.phone_number')),
							                  Toggle::make('is_published')
								                  ->label(__('general.posts.fields.is_published'))
								                  ->default(true),
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
	
	public static function table (Table $table): Table {
		return $table
			->columns([
				          Tables\Columns\TextColumn::make('category.name')
					          ->label(__('general.posts.fields.category_id'))
					          ->searchable()
					          ->sortable(),
				          Tables\Columns\TextColumn::make('title')
					          ->label(__('general.posts.fields.title'))
					          ->searchable()
					          ->sortable(),
				          Tables\Columns\TextColumn::make('price')
					          ->label(__('general.posts.fields.price'))
					          ->searchable()
					          ->sortable(),
				          Tables\Columns\TextColumn::make('currency.name')
					          ->label(__('general.posts.fields.currency_id'))
					          ->searchable()
					          ->sortable(),
				          Tables\Columns\TextColumn::make('phone_number')
					          ->label(__('general.posts.fields.phone_number'))
					          ->searchable()
					          ->sortable(),
				          Tables\Columns\TextColumn::make('desc')
					          ->label(__('general.posts.fields.desc')),
				          Tables\Columns\TextColumn::make('address')
					          ->label(__('general.posts.fields.address')),
				          Tables\Columns\TextColumn::make('district.name')
					          ->label(__('general.posts.fields.district_id'))
					          ->searchable()
					          ->sortable(),
				          Tables\Columns\BooleanColumn::make('is_published')
					          ->label(__('general.posts.fields.is_published'))
					          ->searchable()
					          ->sortable(),
				          Tables\Columns\TextColumn::make('created_at')
					          ->date(),
				          Tables\Columns\TextColumn::make('updated_at')
					          ->date(),
				          Tables\Columns\TextColumn::make('deleted_at')
					          ->date(),
			          ])
			->filters([
				          //
			          ]);
	}
	
	public static function getRelations (): array {
		return [
			RelationManagers\AttributesRelationManager::class,
			RelationManagers\ValuesRelationManager::class,
		];
	}
	
	public static function getLabel (): string {
		return __('general.posts.title');
	}
	
	public static function getPluralLabel (): string {
		return __('general.posts.title_plural');
	}
	
	protected static function getNavigationGroup (): ?string {
		return __('nav.leelam');
	}
	
	public static function getPages (): array {
		return [
			'index' => Pages\ListPosts::route('/'),
			'create' => Pages\CreatePost::route('/create'),
			'edit' => Pages\EditPost::route('/{record}/edit'),
		];
	}
}
