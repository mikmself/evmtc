<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/candidate', function () {
    return view('candidate');
});
Route::get('/thanks', function () {
    return view('thanks');
});
