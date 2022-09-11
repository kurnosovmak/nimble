<?php

use App\Http\Controllers\StreamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;







Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'show'])->name('show');
});
Route::prefix('streams')->name('streams.')->group(function () {

    Route::post('/', [StreamController::class, 'store'])->name('store');
});
