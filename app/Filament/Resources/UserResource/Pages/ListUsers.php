<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Exports\UsersExport;
use App\Filament\Resources\UserResource;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExcelImportAction::make()
                ->color('success')
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
                    $data['password'] = Hash::make($data['password'] ?? 'inmedamikom');
                    return $data;
                })
                ->afterImport(function (array $data) {
                    \Filament\Notifications\Notification::make()
                        ->title('Import Berhasil')
                        ->body('Data berhasil diimpor. Total baris: ' . count($data))
                        ->success()
                        ->send();
                })
                ->sampleExcel(
                    sampleData: [
                        [
                            'name' => 'Jane Doe',
                            'email' => 'jane.doe@example.com',
                            'password' => 'password123',
                            'unique_code' => 'UNIQUE123',
                            'role' => 'admin',
                            'is_voted' => 0,
                            'session_id' => 1,
                        ],
                        [
                            'name' => 'John Smith',
                            'email' => 'john.smith@example.com',
                            'password' => 'securepass',
                            'unique_code' => 'CODE456',
                            'role' => 'user',
                            'is_voted' => 1,
                            'session_id' => 2,
                        ],
                    ],
                    fileName: 'user_template.xlsx',
                    sampleButtonLabel: 'Download User Template'
                ),
            Actions\Action::make('Export')
                ->action(fn () => Excel::download(new UsersExport(
                    $this->table->paginated(false)->getRecords()
                ), 'orders.csv'))
                ->icon('heroicon-o-arrow-down-on-square'),
            Actions\CreateAction::make(),
        ];
    }
}
