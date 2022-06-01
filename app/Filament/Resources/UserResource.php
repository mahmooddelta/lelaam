<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use function __;
use function trans;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 21;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getLabel(): string
    {
        return trans('general.users.title');
    }

    public static function getPluralLabel(): string
    {
        return trans('general.users.title_plural');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('nav.users_roles');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                         Forms\Components\TextInput::make('name')
                             ->label(__('general.users.fields.name'))
                             ->required()
                             ->maxLength(255),

                         Forms\Components\TextInput::make('email')
                             ->label(__('general.users.fields.email'))
                             ->email()
                             ->required()
                             ->maxLength(255),

                         Forms\Components\TextInput::make('phone')
                             ->label(__('general.users.fields.phone'))
                             ->tel()
                             ->maxLength(20),

                         Forms\Components\TextInput::make('password')
                             ->label(__('general.users.fields.password'))
                             ->password()
                             ->required()
                             ->maxLength(255)
                             ->dehydrateStateUsing(fn($state) => ! empty($state) ? Hash::make($state) : ""),

                         Forms\Components\BelongsToSelect::make('state_id')
                             ->label(__('general.users.fields.state_id'))
                             ->relationship('state', 'name')
                             ->nullable(),

                         Forms\Components\BelongsToManyMultiSelect::make('roles')
                             ->relationship('roles', 'name')
                             ->label(trans('general.users.fields.roles')),
                     ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                          Tables\Columns\TextColumn::make('name')
                              ->label(__('general.users.fields.name'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          Tables\Columns\TextColumn::make('email')
                              ->label(__('general.users.fields.email'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          Tables\Columns\BooleanColumn::make('email_verified_at')
                              ->label(__('general.users.fields.email_verified_at'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          Tables\Columns\TextColumn::make('phone')
                              ->label(__('general.users.fields.phone'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          Tables\Columns\BooleanColumn::make('phone_verified_at')
                              ->label(__('general.users.fields.phone_verified_at'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          Tables\Columns\TextColumn::make('state.name')
                              ->label(__('general.users.fields.name'))
                              ->searchable()
                              ->sortable()
                              ->toggleable(),

                          Tables\Columns\TextColumn::make('created_at')
                              ->label(__('general.created_at'))
                              ->searchable()
                              ->sortable()
                              ->toggleable()
                              ->formatStateUsing(fn(User $record) => $record->created_at->diffForHumans() ?? ''),

                          Tables\Columns\TextColumn::make('updated_at')
                              ->label(__('general.updated_at'))
                              ->searchable()
                              ->sortable()
                              ->toggleable()
                              ->formatStateUsing(fn(User $record) => $record->updated_at->diffForHumans() ?? ''),
                      ])
            ->filters([
                          Tables\Filters\TernaryFilter::make('email_verified_at')
                              ->nullable()
                              ->label(__('general.users.filters.email.status'))
                              ->placeholder(__('general.users.filters.email.status_placeholder'))
                              ->trueLabel(__('general.users.filters.email.verified'))
                              ->falseLabel(__('general.users.filters.email.unverified'))
                              ->queries(
                                  true : fn(Builder $query) => $query->whereNotNull('email_verified_at'),
                                  false: fn(Builder $query) => $query->whereNull('email_verified_at'),
                                  blank: fn(Builder $query) => $query,
                              ),
                          Tables\Filters\TernaryFilter::make('phone_verified_at')
                              ->nullable()
                              ->label(__('general.users.filters.phone.status'))
                              ->placeholder(__('general.users.filters.phone.status_placeholder'))
                              ->trueLabel(__('general.users.filters.phone.verified'))
                              ->falseLabel(__('general.users.filters.phone.unverified'))
                              ->queries(
                                  true : fn(Builder $query) => $query->whereNotNull('phone_verified_at'),
                                  false: fn(Builder $query) => $query->whereNull('phone_verified_at'),
                                  blank: fn(Builder $query) => $query,
                              ),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
