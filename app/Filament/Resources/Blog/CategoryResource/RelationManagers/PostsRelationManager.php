<?php

namespace App\Filament\Resources\Blog\CategoryResource\RelationManagers;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\Blog\PostResource;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Str;
use function __;
use function auth;
use function is_null;
use function now;
use function request;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label(__('general.blog_posts.fields.title'))
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::persian_slug($state))),

                TextInput::make('slug')
                    ->label(__('general.blog_posts.fields.slug'))
                    ->disabled()
                    ->required()
                    ->unique(Post::class, 'slug', fn($record) => $record),

                RichEditor::make('content')
                    ->label(__('general.blog_posts.fields.content'))
                    ->required()
                    ->columnSpan([
                        'sm' => 2,
                    ]),

                Select::make('blog_category_id')
                    ->label(__('general.blog_posts.fields.category_id'))
                    ->relationship('category', 'name')
                    ->default(Category::whereSlug(request()?->query('ownerRecord'))->value('id'))
                    ->preload()
                    ->searchable()
                    ->required(),

                SpatieTagsInput::make('tags')
                    ->label(__('general.blog_posts.fields.tags'))
                    ->hint(__('general.blog_posts.placeholders.tags'))
                    ->required(),

                Card::make()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('media')
                            ->label(__('general.blog_posts.fields.media'))
                            ->collection('blog')
                            ->enableReordering()
                            ->multiple()
                            ->image()
                            ->columnSpan(2),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('general.blog_posts.fields.title'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label(__('general.blog_posts.fields.user_id'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label(__('general.blog_posts.fields.category_id'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label(__('general.blog_posts.fields.published_at'))
                    ->toggleable()
                    ->formatStateUsing(fn(Post $record) => is_null($record->published_at) ? 'نشر نشده است!' : $record?->published_at?->diffForHumans()),
            ])->filters([
                TernaryFilter::make('published_at')
                    ->label(__('general.ads.filters.status'))
                    ->placeholder(__('general.ads.filters.status_placeholder'))
                    ->trueLabel(__('general.ads.filters.published'))
                    ->falseLabel(__('general.ads.filters.not_published'))
                    ->queries(
                        true: fn(Builder $query) => $query->published(),
                        false: fn(Builder $query) => ! $query->published(),
                        blank: fn(Builder $query) => $query,
                    ),

                SelectFilter::make('category_id')
                    ->label(__('general.ads.filters.category'))
                    ->options(Category::pluck('name', 'id')->toArray()),

                SelectFilter::make('user_id')
                    ->label(__('general.ads.filters.user'))
                    ->options(User::pluck('name', 'id')->toArray()),
            ])
            ->headerActions([
                CreateAction::make()
                    ->action(null)
                    ->url(PostResource::getUrl('create', ['ownerRecord' => request()->segment(4)])),
            ])
            ->actions([
                Action::make('status')
                    ->label(__('general.actions.status'))
                    ->icon('heroicon-o-refresh')
                    ->color('primary')
                    ->visible(fn(Post $record): bool => auth()->user()?->can('update_blog::post', $record))
                    ->action(fn(Post $record) => $record->update(['published_at' => is_null($record->published_at) ? now() : null]))
                    ->requiresConfirmation(),

                EditAction::make(),
            ])
            ->bulkActions([
                BulkAction::make('status')
                    ->label(__('general.actions.status'))
                    ->icon('heroicon-o-refresh')
                    ->color('primary')
                    ->visible(fn(Post $record): bool => auth()->user()?->can('delete_any_blog::post', $record))
                    ->action(fn(Collection $records) => $records->each(fn($record) => $record->update(['published_at' => is_null($record->published_at) ? now() : null,])))
                    ->deselectRecordsAfterCompletion()
                    ->requiresConfirmation(),

                FilamentExportBulkAction::make('export')
                    ->label(__('general.export.bulk_action_button_label'))
                    ->fileName(str(Post::class)->after("App\Models\\"))
                    ->fileNameFieldLabel(__('general.export.file_name_field_label')) // Label for file name input
                    ->formatFieldLabel(__('general.export.format_field_label')) // Label for format input
                    ->pageOrientationFieldLabel(__('general.export.page_orientation_field_label')) // Label for page orientation input
                    ->filterColumnsFieldLabel(__('general.export.filters_column_field_label')) // Label for filter columns input
                    ->additionalColumnsFieldLabel(__('general.export.additional_columns_field_label')) // Label for additional columns input
                    ->additionalColumnsTitleFieldLabel(__('general.export.additional_columns_title_field_label')) // Label for additional columns' title input
                    ->additionalColumnsDefaultValueFieldLabel(__('general.export.additional_columns_default_value_field_label')) // Label for additional columns' default value input
                    ->additionalColumnsAddButtonLabel(__('general.export.additional_columns_add_button_label')), // Label for additional columns' add button,
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRecordLabel(): ?string
    {
        return __('general.blog_categories.relations.post');
    }

    public static function getPluralRecordLabel(): ?string
    {
        return __('general.blog_categories.relations.posts');
    }
}
