<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('candidates', [\App\Http\Controllers\WebController::class,'candidatePage']);
