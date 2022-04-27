<?php

use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CollectionController::class, 'index']);
Route::get('/filter', [CollectionController::class, 'filter']);
Route::get('/pluck', [CollectionController::class, 'pluck']);
Route::get('/contains', [CollectionController::class, 'contains']);
Route::get('/contains-empty', [CollectionController::class, 'contains']);
Route::get('/groupby', [CollectionController::class, 'groupby']);
Route::get('/sortby', [CollectionController::class, 'sortby']);
Route::get('/partition', [CollectionController::class, 'partition']);
Route::get('/reject', [CollectionController::class, 'reject']);
Route::get('/wherein', [CollectionController::class, 'wherein']);
Route::get('/chunk', [CollectionController::class, 'chunk']);
Route::get('/count', [CollectionController::class, 'count']);
Route::get('/first', [CollectionController::class, 'first']);
Route::get('/tap', [CollectionController::class, 'tap']);
