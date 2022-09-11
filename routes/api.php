<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StreamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class,'login'])->name('auth.login');
Route::post('/register', [AuthController::class,'register'])->name('auth.register');

Route::prefix('streams')->name('streams.')->group(function (){

    Route::get('/',[StreamController::class,'index'])->name('index');
    Route::get('/{stream}',[StreamController::class,'show'])->name('show');
});
