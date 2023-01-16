<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sessioncontroller;
use App\Http\Controllers\RegisterController;
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










Route::get('/add', function () {
    return view('components.addproject');
});


Route::get('/db', function () {
    return view('components.db');
});

Route::get('/cosben', function () {
    return view('components.cosben');
});


Route::get('/hitung', function () {
    return view('components.hitung');
});




Route::get('/',[SessionController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[SessionController::class, 'login']);
Route::post('/logout',[SessionController::class, 'logout']);



Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);




Route::get('/main',[DashboardController::class, 'index'])->middleware('auth');