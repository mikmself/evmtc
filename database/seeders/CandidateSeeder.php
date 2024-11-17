<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        Candidate::create([
            'name' => 'John Doe',
            'vision' => 'To lead with integrity and transparency.',
            'mission' => 'To improve the community through effective policies.',
            'motto' => 'Unity and Progress',
            'photo' => 'john_doe.jpg',
        ]);

        Candidate::create([
            'name' => 'Jane Smith',
            'vision' => 'To create a better future for all.',
            'mission' => 'To support education and healthcare initiatives.',
            'motto' => 'Hope and Change',
            'photo' => 'jane_smith.jpg',
        ]);
    }
}
