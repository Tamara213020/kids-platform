<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\BadgesRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\CertificatesRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\CoursesRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getModelLabel(): string
    {
        return __('resources.labels.user');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.labels.users');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('resources.fields.name'))
                    ->required(),
                Forms\Components\TextInput::make('role')
                    ->label(__('resources.fields.role'))
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label(__('resources.fields.email'))
                    ->email()
                    ->required(),
                Forms\Components\DateTimePicker::make('email_verified_at')
                    ->label(__('resources.fields.email_verified_at')),
                Forms\Components\TextInput::make('password')
                    ->label(__('resources.fields.password'))
                    ->password()
                    ->required(),
                Forms\Components\TextInput::make('profile_photo_path')
                    ->label(__('resources.fields.profile_photo_path')),

                Forms\Components\Textarea::make('two_factor_secret')
                    ->label(__('resources.fields.two_factor_secret'))
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('two_factor_recovery_codes')
                    ->label(__('resources.fields.two_factor_recovery_codes'))
                    ->columnSpanFull(),

                Forms\Components\DateTimePicker::make('two_factor_confirmed_at')
                    ->label(__('resources.fields.two_factor_confirmed_at')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('resources.fields.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->label(__('resources.fields.role'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('resources.fields.email'))
                    ->searchable(),
                //                Tables\Columns\TextColumn::make('email_verified_at')
                //                    ->label(__('resources.fields.email_verified_at'))
                //                    ->dateTime()
                //                    ->sortable(),
                //                Tables\Columns\TextColumn::make('current_team_id')
                //                    ->label(__('resources.fields.current_team_id'))
                //                    ->numeric()
                //                    ->sortable(),
                //                Tables\Columns\TextColumn::make('profile_photo_path')
                //                    ->label(__('resources.fields.profile_photo_path'))
                //                    ->searchable(),
                //                Tables\Columns\TextColumn::make('created_at')
                //                    ->label(__('resources.fields.created_at'))
                //                    ->dateTime()
                //                    ->sortable()
                //                    ->toggleable(isToggledHiddenByDefault: true),
                //                Tables\Columns\TextColumn::make('updated_at')
                //                    ->label(__('resources.fields.updated_at'))
                //                    ->dateTime()
                //                    ->sortable()
                //                    ->toggleable(isToggledHiddenByDefault: true),
                //                Tables\Columns\TextColumn::make('two_factor_confirmed_at')
                //                    ->label(__('resources.fields.two_factor_confirmed_at'))
                //                    ->dateTime()
                //                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label(__('resources.actions.view')),
                Tables\Actions\EditAction::make()
                    ->label(__('resources.actions.edit')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label(__('resources.actions.delete')),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CoursesRelationManager::class,
            BadgesRelationManager::class,
            CertificatesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
