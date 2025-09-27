<?php

namespace App\Filament\Resources\Klimas\Pages;

use App\Filament\Resources\Klimas\KlimaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKlimas extends ListRecords
{
    protected static string $resource = KlimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
