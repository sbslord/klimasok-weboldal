<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Név')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email cím')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true) // ← egyediség kezelése
                    ->maxLength(255),

                Toggle::make('is_admin')
                    ->label('Admin jogosultság')
                    ->required(),

                DateTimePicker::make('email_verified_at')
                    ->label('Email ellenőrizve'),

                TextInput::make('phone')
                    ->label('Telefonszám')
                    ->tel()
                    ->maxLength(20),

                TextInput::make('password')
                    ->label('Jelszó')
                    ->password()
                    ->required(fn ($record) => !$record) // csak új rekordnál kötelező
                    ->minLength(8)
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
            ]);
    }
}
