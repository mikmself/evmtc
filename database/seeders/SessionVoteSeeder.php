<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SessionVote;

class SessionVoteSeeder extends Seeder
{
    public function run()
    {
        SessionVote::create([
            'name' => 'Presidential Election 2024',
            'status' => 'active',
        ]);

        SessionVote::create([
            'name' => 'Local Council Vote 2024',
            'status' => 'inactive',
        ]);
    }
}
