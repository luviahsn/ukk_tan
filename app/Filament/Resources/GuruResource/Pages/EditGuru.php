<?php

namespace App\Filament\Resources\GuruResource\Pages;

use App\Filament\Resources\GuruResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuru extends EditRecord
{
    protected static string $resource = GuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
            ->before(function ($record, \Filament\Actions\DeleteAction $action){
                if($record->pkl()->exist()) {
                    \Filament\Notifications\Notification::make()
                        ->title('Gagal Menghapus!')
                        ->body('Guru ini masih digunakan dalam data PKL. Hapus data PKL terkait terlebih dahulu.')
                        ->danger()
                        ->send();

                    $action->halt(); //menghentikan eksekusi tanpa error
                }
            })
        ];
    }

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
