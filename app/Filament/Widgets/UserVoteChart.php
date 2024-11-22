<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class UserVoteChart extends ChartWidget
{
    protected static ?string $heading = 'User Voting Status';

    protected function getData(): array
    {
        $votedCount = User::where('is_voted', "true")->count();
        $notVotedCount = User::where('is_voted', "no")->count();

        return [
            'labels' => ['Voted', 'Not Voted'],
            'datasets' => [
                [
                    'data' => [$votedCount, $notVotedCount],
                    'backgroundColor' => ['#4CAF50', '#F44336'],
                    'borderColor' => ['#4CAF50', '#F44336'],
                    'borderWidth' => 1,
                ],
            ],
        ];
    }
    protected function getType(): string
    {
        return 'doughnut';
    }
}
