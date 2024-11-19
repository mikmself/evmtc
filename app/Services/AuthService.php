<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(string $identifier, string $password)
    {
        // Cek apakah identifier adalah email atau unique_code
        $user = User::where('email', $identifier)
            ->orWhere('unique_code', $identifier)
            ->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw new \Exception('Invalid credentials');
        }

        Auth::login($user);
        return $user;
    }
}
