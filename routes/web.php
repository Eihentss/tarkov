<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TarkovController;


/*
use App\Http\Controllers\TarkovController;
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);




Route::get('/tarkov/ammo', [TarkovController::class, 'fetchAmmo'])->name('tarkov.ammo');
Route::get('/tarkov/task', [TarkovController::class, 'fetchTasks'])->name('tarkov.task');
Route::get('/items', [TarkovController::class, 'items']);


Route::get('/', [TarkovController::class, 'items']);
