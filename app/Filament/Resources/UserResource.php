<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Facades\FilamentNotification;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use function __;
use function str;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 21;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('general.users.fields.name'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label(__('general.users.fields.email'))
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label(__('general.users.fields.phone'))
                    ->tel()
                    ->maxLength(20),

                TextInput::make('password')
                    ->label(__('general.users.fields.password'))
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => ! empty($state) ? Hash::make($state) : ""),

                Select::make('state_id')
                    ->label(__('general.users.fields.state_id'))
                    ->relationship('state', 'name')
                    ->nullable(),

                MultiSelect::make('roles')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->label(trans('general.users.fields.roles')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('general.users.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('email')
                    ->label(__('general.users.fields.email'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                BooleanColumn::make('email_verified_at')
                    ->label(__('general.users.fields.email_verified_at'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('phone')
                    ->label(__('general.users.fields.phone'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                BooleanColumn::make('phone_verified_at')
                    ->label(__('general.users.fields.phone_verified_at'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('roles.name')
                    ->formatStateUsing(fn($state) => $state ? str($state)->replace('_', ' ')->title() : 'بدون نقش')
                    ->colors(['primary'])
                    ->label(__('general.users.fields.roles'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('state.name')
                    ->label(__('general.users.fields.state_id'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label(__('general.created_at'))
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->formatStateUsing(fn(User $record) => $record->created_at->diffForHumans() ?? ''),

                TextColumn::make('updated_at')
                    ->label(__('general.updated_at'))
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->formatStateUsing(fn(User $record) => $record->updated_at->diffForHumans() ?? ''),
            ])
            ->filters([
                TernaryFilter::make('email_verified_at')
                    ->nullable()
                    ->label(__('general.users.filters.email.status'))
                    ->placeholder(__('general.users.filters.email.status_placeholder'))
                    ->trueLabel(__('general.users.filters.email.verified'))
                    ->falseLabel(__('general.users.filters.email.unverified'))
                    ->queries(
                        true: fn(Builder $query) => $query->whereNotNull('email_verified_at'),
                        false: fn(Builder $query) => $query->whereNull('email_verified_at'),
                        blank: fn(Builder $query) => $query,
                    ),
                TernaryFilter::make('phone_verified_at')
                    ->nullable()
                    ->label(__('general.users.filters.phone.status'))
                    ->placeholder(__('general.users.filters.phone.status_placeholder'))
                    ->trueLabel(__('general.users.filters.phone.verified'))
                    ->falseLabel(__('general.users.filters.phone.unverified'))
                    ->queries(
                        true: fn(Builder $query) => $query->whereNotNull('phone_verified_at'),
                        false: fn(Builder $query) => $query->whereNull('phone_verified_at'),
                        blank: fn(Builder $query) => $query,
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('ban')
                    ->label(__('general.users.actions.ban.label'))
                    ->icon('heroicon-o-lock-closed')
                    ->requiresConfirmation()
                    ->modalWidth('sm')
                    ->form(function() {
                        return [
                            TextInput::make('comment')
                                ->label(__('general.users.actions.ban.comment')),

                            DateTimePicker::make('expired_at')
                                ->label(__('general.users.actions.ban.expires_at'))
                                ->visible(fn(callable $get) => ! $get('permanent')),

                            Checkbox::make('permanent')
                                ->label(__('general.users.actions.ban.permanent'))
                                ->reactive()
                                ->default(true),
                        ];
                    })
                    ->action(function(User $record, array $data) {
                        if ($record->isNotBanned()) {
                            $record->ban([
                                'comment' => $data['comment'],
                                'expired_at' => $data['expired_at'] ?? null,
                            ]);
                            FilamentNotification::notify('success', __('general.users.actions.ban.messages.success'));
                        } else {
                            FilamentNotification::notify('error', __('general.users.actions.ban.messages.error'));
                        }
                    }),
                Tables\Actions\Action::make('unban')
                    ->label(__('general.users.actions.unban.label'))
                    ->icon('heroicon-o-lock-open')
                    ->requiresConfirmation()
                    ->action(function(Model $record) {
                        $record->unban();
                        FilamentNotification::notify('success', __('general.users.actions.unban.messages.success'));
                    }),
            ])
            ->bulkActions([
                BulkAction::make('banned_at')
                    ->label(__('general.users.actions.ban.label'))
                    ->icon('heroicon-o-lock-closed')
                    ->requiresConfirmation()
                    ->modalWidth('sm')
                    ->form(function() {
                        return [
                            TextInput::make('comment')
                                ->label(__('general.users.actions.ban.comment')),

                            DateTimePicker::make('expired_at')
                                ->label(__('general.users.actions.ban.expires_at'))
                                ->visible(fn(callable $get) => ! $get('permanent')),

                            Checkbox::make('permanent')
                                ->label(__('general.users.actions.ban.permanent'))
                                ->reactive()
                                ->default(true),
                        ];
                    })
                    ->action(function(Collection $records, array $data) {
                        $records->each(function(User $record) use ($data) {
                            if ($record->isNotBanned()) {
                                $record->ban([
                                    'comment' => $data['comment'],
                                    'expired_at' => $data['expired_at'] ?? null,
                                ]);
                                FilamentNotification::notify('success', __('general.users.actions.ban.messages.success_plural'));
                            } else {
                                FilamentNotification::notify('error', __('general.users.actions.ban.messages.error_plural'));
                            }
                        });
                        FilamentNotification::notify('success', 'کاربر بلاک شد.');
                    }),
                BulkAction::make('unban')
                    ->label(__('general.users.actions.unban.plural_label'))
                    ->icon('heroicon-o-lock-open')
                    ->requiresConfirmation()
                    ->action(function(Collection $records) {
                        $records->each->unban();
                        FilamentNotification::notify('success', __('general.users.actions.unban.messages.success_plural'));
                    }),
                FilamentExportBulkAction::make('export')
                    ->label(__('general.export.bulk_action_button_label'))
                    ->fileName(str(self::$model)->after("App\Models\\"))
                    ->fileNameFieldLabel(__('general.export.file_name_field_label')) // Label for file name input
                    ->formatFieldLabel(__('general.export.format_field_label')) // Label for format input
                    ->pageOrientationFieldLabel(__('general.export.page_orientation_field_label')) // Label for page orientation input
                    ->filterColumnsFieldLabel(__('general.export.filters_column_field_label')) // Label for filter columns input
                    ->additionalColumnsFieldLabel(__('general.export.additional_columns_field_label')) // Label for additional columns input
                    ->additionalColumnsTitleFieldLabel(__('general.export.additional_columns_title_field_label')) // Label for additional columns' title input
                    ->additionalColumnsDefaultValueFieldLabel(__('general.export.additional_columns_default_value_field_label')) // Label for additional columns' default value input
                    ->additionalColumnsAddButtonLabel(__('general.export.additional_columns_add_button_label')), // Label for additional columns' add button
                Tables\Actions\DeleteBulkAction::make(),
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
}
