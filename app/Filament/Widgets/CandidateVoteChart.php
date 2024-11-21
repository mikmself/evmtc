<?php

namespace App\Filament\Widgets;

use App\Models\Candidate;
use App\Models\Vote;
use Filament\Widgets\ChartWidget;

class CandidateVoteChart extends ChartWidget
{
    protected static ?string $heading = 'Vote Comparison';

    protected function getType(): string
    {
        return 'pie'; // Mengatur jenis chart menjadi pie
    }

    protected function getData(): array
    {
        // Ambil semua kandidat
        $candidates = Candidate::all();

        // Buat array data votes untuk setiap kandidat
        $data = $candidates->mapWithKeys(function ($candidate) {
            return [$candidate->name => Vote::where('candidate_id', $candidate->id)->count()];
        });

        return [
            'labels' => $data->keys()->toArray(), // Nama kandidat
            'datasets' => [
                [
                    'data' => $data->values()->toArray(), // Jumlah vote tiap kandidat
                ],
            ],
        ];
    }
}
