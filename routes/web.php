<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TabadminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengumumanController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('auth.login');
        Route::post('/login', 'authenticate')->name('authenticate');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'createRegister')->name('createRegister');
    });
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::resource('/pengaduan', PengaduanController::class);
    Route::get('/tabadmin', [TabadminController::class, 'index'])->name('tabadmin');
    Route::get('/tabadmin/tanggapan/{id}', [TabadminController::class, 'create'])->name('tabadmin.tanggapan');
    
    Route::delete('/pengaduan/{id}', [TabadminController::class, 'delete'])->name('pengaduan.delete');
    // Route::post('/index', [PengaduanController::class, 'store'])->name('pengaduan.store');
    
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
    Route::get('/pengumuman/tambah', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumuman/{id}', [PengumumanCOntroller::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'delete'])->name('pengumuman.delete');
});

