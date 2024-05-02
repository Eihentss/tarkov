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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::get('/tarkov', [TarkovController::class, 'index'])->name('tarkov.index');
Route::get('/tarkov/about', [TarkovController::class, 'about'])->name('tarkov.about');
Route::get('/tarkov/profile/{username}', [TarkovController::class, 'userProfile'])->name('tarkov.profile');
Route::get('/tarkov/inventory', [TarkovController::class, 'inventory'])->name('tarkov.inventory');
Route::get('/tarkov/ammo', [TarkovController::class, 'fetchAmmo'])->name('tarkov.ammo');
Route::get('/items', [TarkovController::class, 'items']);
