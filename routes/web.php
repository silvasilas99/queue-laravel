<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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

Route::get('/', [GameController::class, 'index'])->name('index');
Route::get('/create', [GameController::class, 'create'])->name('create');
Route::post('/store', [GameController::class, 'store'])->name('store');
Route::get('/get_csv', [GameController::class, 'getCsvFile'])->name('get_csv');
