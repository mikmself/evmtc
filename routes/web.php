<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/vote/{candidateId}', [\App\Http\Controllers\VoteController::class, 'vote'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('candidates', [\App\Http\Controllers\WebController::class,'candidatePage']);
