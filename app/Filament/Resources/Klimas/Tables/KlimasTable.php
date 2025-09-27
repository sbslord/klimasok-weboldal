<?php

namespace App\Filament\Resources\Klimas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KlimasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('brand_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('price')
                    ->money()
                    ->sortable(),
                TextColumn::make('cooling_capacity')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('heating_capacity')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('seer')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('scop')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('noise_level')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('warranty_years')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('heating_min_temp')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('heating_max_temp')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cooling_min_temp')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cooling_max_temp')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('wifi_enabled')
                    ->boolean(),
                TextColumn::make('refrigerant_type')
                    ->searchable(),
                IconColumn::make('extra_filter')
                    ->boolean(),
                IconColumn::make('h_tarifa')
                    ->boolean(),
                IconColumn::make('in_stock')
                    ->boolean(),
                IconColumn::make('featured')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
