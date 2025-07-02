<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('publish')
                ->label('Publish')
                ->icon('heroicon-o-cursor-arrow-rays')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update(['status' => 'published']);
                    Notification::make()
                        ->title('Post has been published')
                        ->success()
                        ->send();
                })
                ->visible(fn () => $this->record->status !== 'published'),
        ];
    }
}
