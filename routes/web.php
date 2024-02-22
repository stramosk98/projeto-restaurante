<?php

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

use App\Http\Controllers\RestaurantController;

Route::get('/', [RestaurantController::class, 'index']);

Route::get('/reservas/create', [RestaurantController::class, 'create'])->middleware('auth');

Route::get('/reservas/{$id}}', [RestaurantController::class, 'show']);

Route::post('/reservas', [RestaurantController::class, 'store']);

Route::get('/dashboard', [RestaurantController::class, 'dashboard'])->middleware('auth');

Route::delete('/reservas/{id}', [RestaurantController::class, 'destroy']);