<?php

namespace App\Filament\Resources\SessionVoteResource\Pages;

use App\Filament\Resources\SessionVoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSessionVote extends EditRecord
{
    protected static string $resource = SessionVoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
