<?php

namespace App\Filament\Resources\Klimas;

use App\Filament\Resources\Klimas\Pages\CreateKlima;
use App\Filament\Resources\Klimas\Pages\EditKlima;
use App\Filament\Resources\Klimas\Pages\ListKlimas;
use App\Filament\Resources\Klimas\Schemas\KlimaForm;
use App\Filament\Resources\Klimas\Tables\KlimasTable;
use App\Models\Klima;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KlimaResource extends Resource
{
    protected static ?string $model = Klima::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return KlimaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KlimasTable::configure($table);
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
            'index' => ListKlimas::route('/'),
            'create' => CreateKlima::route('/create'),
            'edit' => EditKlima::route('/{record}/edit'),
        ];
    }
}
