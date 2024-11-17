<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SessionVote;

class SessionVoteSeeder extends Seeder
{
    public function run()
    {
        SessionVote::create([
            'name' => 'Angkatan 23',
            'status' => 'active',
        ]);

        SessionVote::create([
            'name' => 'Angkatan 24',
            'status' => 'inactive',
        ]);
    }
}
