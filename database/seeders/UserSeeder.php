<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'unique_code' => '22SA11A139',
            'role' => 'user',
            'is_voted' => 'no',
            'session_id' => '1'
        ]);

        $panitia = ["didi","aksana","wiqor","putri","hanan","gina","rafik","taufik","widya","kana","nurul","zhafira","sabita"];
        foreach ($panitia as $name) {
            User::create([
                'name' => $name,
                'email' => strtolower($name) . '@example.com',
                'password' => Hash::make('password'),
                'unique_code' => strtoupper(substr($name, 0, 2) . rand(1000, 9999)),
                'role' => 'user',
                'is_voted' => 'no',
                'session_id' => '1'
            ]);
        }
    }
}
