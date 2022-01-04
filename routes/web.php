<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\penggunaController;

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
    return view('contents.welcome');
});
Route::get('/login', [penggunaController::class, 'login'])->name('login');
Route::post('/login', [penggunaController::class, 'loginQuery'])->name('loginQuery');
Route::get('/logout', [penggunaController::class, 'logout'])->name('logout');
Route::get('/home', [penggunaController::class, 'home'])->name('home');
Route::get('/insertMapel', [penggunaController::class, 'createMapel'])->name('create mapel');
Route::post('/insertMapel', [penggunaController::class, 'uploadMapel'])->name('upload mapel');
Route::get('/insertBab/{id}', [penggunaController::class, 'createBab'])->name('create bab');
Route::post('/insertBab', [penggunaController::class, 'uploadBab'])->name('upload bab');
Route::get('/createKelas', [penggunaController::class, 'createKelas'])->name('create kelas');
Route::post('/createKelas', [penggunaController::class, 'uploadKelas'])->name('upload kelas');
Route::get('/assignMapel', [penggunaController::class, 'assignMapel'])->name('assign mapel');
Route::get('/assignMapel/{id}', [penggunaController::class, 'assignMapelProcess'])->name('assign mapel process');
Route::post('/assignMapel', [penggunaController::class, 'assignMapelFinal'])->name('assign mapel final');