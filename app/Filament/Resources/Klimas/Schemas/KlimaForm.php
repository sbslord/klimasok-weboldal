<?php

namespace App\Filament\Resources\Klimas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\Brand;

class KlimaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('brand_id')
                    ->label('Márka')
                    ->options(Brand::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('name')
                    ->label('Név')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('Kép')
                    ->image()
                    ->nullable(),

                TextInput::make('price')
                    ->label('Ár')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('$'),

                Textarea::make('description')
                    ->label('Leírás')
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('cooling_capacity')
                    ->label('Hűtőteljesítmény (kW)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('heating_capacity')
                    ->label('Fűtőteljesítmény (kW)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('seer')
                    ->label('SEER')
                    ->numeric()
                    ->nullable(),

                TextInput::make('scop')
                    ->label('SCOP')
                    ->numeric()
                    ->nullable(),

                TextInput::make('noise_level')
                    ->label('Zajszint (dB)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('warranty_years')
                    ->label('Garancia (év)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('heating_min_temp')
                    ->label('Fűtés min hőmérséklet (°C)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('heating_max_temp')
                    ->label('Fűtés max hőmérséklet (°C)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('cooling_min_temp')
                    ->label('Hűtés min hőmérséklet (°C)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('cooling_max_temp')
                    ->label('Hűtés max hőmérséklet (°C)')
                    ->numeric()
                    ->nullable(),

                Toggle::make('wifi_enabled')
                    ->label('WiFi támogatás')
                    ->required()
                    ->default(false),

                TextInput::make('refrigerant_type')
                    ->label('Hűtőközeg típusa')
                    ->nullable()
                    ->maxLength(255),

                Toggle::make('extra_filter')
                    ->label('Extra szűrő')
                    ->required()
                    ->default(false),

                Toggle::make('h_tarifa')
                    ->label('H tarifa támogatás')
                    ->required()
                    ->default(false),

                Toggle::make('in_stock')
                    ->label('Raktáron')
                    ->required()
                    ->default(true),

                Toggle::make('featured')
                    ->label('Kiemelt')
                    ->required()
                    ->default(false),
            ]);
    }
}
