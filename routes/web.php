<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return redirect('/login');});
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('candidates', [\App\Http\Controllers\WebController::class,'candidatePage']);
    Route::post('/vote/{candidateId}', [\App\Http\Controllers\VoteController::class, 'vote'])->middleware('auth');
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/thanks', function () {return view('thanks');});
});
