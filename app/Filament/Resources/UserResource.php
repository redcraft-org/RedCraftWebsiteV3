<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Form\Components\TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->max(255)
                    ->disableAutocomplete()
                    ->placeholder(__('Name')),

                Form\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->max(255)
                    ->disableAutocomplete()
                    ->placeholder(__('Email')),

                Form\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->disableAutocomplete()
                    ->placeholder(__('Password')),

                Form\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->disableAutocomplete()
                    ->placeholder(__('Confirm Password')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
            ])
            ->filters([
                //
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
