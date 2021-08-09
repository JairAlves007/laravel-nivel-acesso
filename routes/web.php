<?php

use App\Http\Controllers\EditalController;
use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');
Route::get('/doc/create', [EditalController::class, 'create'])->middleware('auth');
Route::get('/user/authorize/{id}', [UserController::class, 'authorizeUser'])->middleware('auth');
Route::post('/create', [EditalController::class, 'store'])->middleware('auth');