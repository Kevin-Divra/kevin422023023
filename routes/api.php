<?php

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SportController;

Route::prefix('user')->group(function () {
    Route::get('/users', function () {
        return $request->user();
    });
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
});

Route::Resource('sport', SportController::class, [
    'only' => [
        'index',
        'show'
    ]
]);

Route::resource('sport', SportController::class, [
    'except' => [
        'index',
        'show'
    ]
])->middleware(['auth:api']);