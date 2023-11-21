<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;

/*
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
    return view('auth.login');
});


Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user');
    Route::get('/user/delete/{id}', 'delete')->name('deleteUser');
    Route::get('/user/edit/{id}', 'edit')->name('editUser');
    Route::post('/user/update/{id}', 'update')->name('updateUser');
});

Route::get('/gallery/tambah', [GalleryController::class, 'create'])->name('gallery.tambah');
Route::get('/gallery/detail', [GalleryController::class, 'details'])->name('gallery.detail');
Route::get('/gallery/{id}', [GalleryController::class, 'delete'])->name('gallery.hapus');
Route::resource('gallery', GalleryController::class);