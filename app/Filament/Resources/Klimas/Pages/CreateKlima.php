<?php

namespace App\Filament\Resources\Klimas\Pages;

use App\Filament\Resources\Klimas\KlimaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKlima extends CreateRecord
{
    protected static string $resource = KlimaResource::class;
	
	protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id(); // automatikusan beállítja a user_id-t
        return $data;
    }
}
