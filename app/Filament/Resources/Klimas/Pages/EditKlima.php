<?php

namespace App\Filament\Resources\Klimas\Pages;

use App\Filament\Resources\Klimas\KlimaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKlima extends EditRecord
{
    protected static string $resource = KlimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
