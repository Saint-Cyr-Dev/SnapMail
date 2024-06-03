<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [MessageController::class, 'create'])->name('messages.create');
Route::post('/', [MessageController::class, 'store'])->name('messages.store');
Route::get('/message/{token}', [MessageController::class, 'show'])->name('messages.show');

