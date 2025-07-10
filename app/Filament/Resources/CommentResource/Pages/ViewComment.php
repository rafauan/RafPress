<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ViewComment extends ViewRecord
{
    protected static string $resource = CommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('approve')
                ->label('Approve comment')
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update(['is_approved' => true]);

                    Notification::make()
                        ->title('Comment has been approved')
                        ->success()
                        ->icon('heroicon-o-check-circle')
                        ->send();

                    // Filament v3 reactive refresh
                    $this->refreshFormData(['is_approved']);
                })
                ->visible(fn () => !$this->record->is_approved),
        ];
    }
}
