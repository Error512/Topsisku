<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sessioncontroller;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\ProjectPostController;
use App\Http\Controllers\DbPostController;
use App\Http\Controllers\KriteriaPostcontroller;
use App\Http\Controllers\HitungPostcontroller;
use App\Http\Controllers\DeleteController;
use App\Models\post;
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




//Route Login
Route::get('/logins',[SessionController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[SessionController::class, 'login']);
Route::post('/logout',[SessionController::class, 'logout']);


//Route Logout
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);


Route::view('/', 'landing');
//Resource Route
Route::resource('/projects', ProjectPostController::class)->middleware('auth');

Route::resource('/cosben', KriteriaPostController::class)->middleware('auth');

Route::resource('/hitung', HitungPostController::class)->middleware('auth');

Route::resource('/projects/db/{post:id}', DbPostController::class)->middleware('auth');

Route::post('/projects/delete', [DeleteController::class, 'delete'])->middleware('auth');



Route::resource('/projects/kriteria/{post:id}', KriteriaPostController::class)->middleware('auth');

