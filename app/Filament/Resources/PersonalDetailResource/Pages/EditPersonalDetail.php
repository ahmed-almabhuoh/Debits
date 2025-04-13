<?php

namespace App\Filament\Resources\PersonalDetailResource\Pages;

use App\Filament\Resources\PersonalDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonalDetail extends EditRecord
{
    protected static string $resource = PersonalDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
