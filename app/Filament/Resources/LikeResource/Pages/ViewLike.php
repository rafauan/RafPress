<?php

namespace App\Filament\Resources\LikeResource\Pages;

use App\Filament\Resources\LikeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLike extends ViewRecord
{
    protected static string $resource = LikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
