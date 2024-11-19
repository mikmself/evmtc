<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
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

            return Redirect::to('/candidates');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ])->with('sweetalert', 'Login gagal! Periksa kembali kredensial Anda.');
        }
    }
}
