<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExcelImportAction::make()
                ->color('primary') // Warna tombol Import
                ->validateUsing([
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'password' => 'nullable|string',
                    'unique_code' => 'nullable|string',
                    'role' => 'required|string',
                    'is_voted' => 'nullable|boolean',
                    'session_id' => 'nullable|exists:session_votes,id',
                ])
                ->beforeImport(function (array $data) {
                    // Mutasi data sebelum proses import
                    $data['password'] = bcrypt($data['password'] ?? 'default_password'); // Hash password
                    return $data;
                })
                ->afterImport(function (array $data) {
                    \Filament\Notifications\Notification::make()
                        ->title('Import Berhasil')
                        ->body('Data berhasil diimpor. Total baris: ' . count($data))
                        ->success()
                        ->send();
                }),
            Actions\CreateAction::make(),
        ];
    }
}
