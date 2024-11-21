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
        return 'pie';
    }

    protected function getData(): array
    {
        $candidates = Candidate::all();

        $data = $candidates->mapWithKeys(function ($candidate) {
            return [$candidate->name => Vote::where('candidate_id', $candidate->id)->count()];
        });

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [
                [
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                    ],
                    'borderColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ];
    }
}
