<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\KomikController;
use App\Http\Controllers\ReservationController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [KomikController::class, 'index']);

Route::get('/action', [GenreController::class, 'indexAction']);

Route::get('/adventure', [GenreController::class, 'indexAdventure']);

Route::get('/drama', [GenreController::class, 'indexDrama']);

Route::get('/reservations', [ReservationController::class, 'index']);

// Route::get('/receipt', function () {
//     return view('halaman-invoice');
// });

Route::get('/login', function () {
    return view('halaman-login');
});

Route::post('/prosesLogin', [UserController::class, 'cekUser']);

Route::get('/reservations/{id}', [ReservationController::class, 'show']);

Route::get('/detail/{id}', [KomikController::class, 'detail']);

Route::post('/prosesReservasi', [ReservationController::class, 'create']);

Route::get('/admin', [UserController::class, 'indexAdmin']);

Route::get('/admin/addKomik', [KomikController::class, 'create']);

Route::post('/admin/store', [KomikController::class, 'store']);

Route::post('/admin/edit', [KomikController::class, 'storeEdit']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/delete/{id}', [KomikController::class, 'destroy']);

Route::post('/edit/{id}', [KomikController::class, 'edit']);

Route::get('/admin/allUser',[UserController::class, 'getAllUser']);

Route::post('/edit/isadmin/{id}', [userController::class, 'setIsAdmin']);

Route::post('/delete/user/{id}', [userController::class, 'destroy']);

Route::get('/admin/transaction/{id}',[ReservationController::class, 'adminShow']);