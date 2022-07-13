<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;

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
    return view('login');
});

Route::get('/registerView', function () {
    return view('register');
})->name('registerView');


Route::get('/loginView', function () {
    return view('login');
})->name('loginView');

Route::get('/home', function () {
    return view('home/index');
})->name('home');

Route::post('/register', [UserController::class, 'store'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
