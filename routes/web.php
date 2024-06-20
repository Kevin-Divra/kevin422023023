<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/sport', function () {
    return view('pages.plp');
})->name('plp');

Route::get('/sport/{i}', function () {
    return view('pages.pdp');
})->name('pdp');