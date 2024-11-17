<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vote;

class VoteSeeder extends Seeder
{
    public function run()
    {
        Vote::create([
            'candidate_id' => 1,
            'user_id' => 1,
        ]);

        Vote::create([
            'candidate_id' => 2,
            'user_id' => 2,
        ]);
    }
}
