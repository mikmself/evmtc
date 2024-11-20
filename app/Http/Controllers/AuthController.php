<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('identifier', 'password');
            $this->authService->login($credentials['identifier'], $credentials['password']);
            return Redirect::to('/candidates')->with('sweetalert', 'Login berhasil!');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            if ($errorMessage === 'You cannot log in after voting.') {
                return Redirect::back()->withErrors([
                    'status' => 'error',
                    'message' => $errorMessage
                ])->with('sweetalert', 'Login gagal! Anda tidak dapat masuk setelah memilih.');
            }
            return Redirect::back()->withErrors([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ])->with('sweetalert', 'Login gagal! Periksa kembali kredensial Anda.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/')->with('sweetalert', 'You have successfully logged out!');
    }
}
