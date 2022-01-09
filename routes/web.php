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
Route::get('/profile', [penggunaController::class, 'profile'])->name('profile');

Route::get('/createPengguna', [penggunaController::class, 'createPengguna'])->name('create pengguna');
Route::post('/createPengguna', [penggunaController::class, 'registerPengguna'])->name('register pengguna');
Route::get('/updatePengguna/{id}', [penggunaController::class, 'updatePengguna'])->name('update pengguna');
Route::post('/updatePengguna', [penggunaController::class, 'updatePenggunaFinal'])->name('update pengguna final');
Route::get('/deletePengguna/{id}', [penggunaController::class, 'deletePengguna'])->name('delete pengguna');

Route::get('/login', [penggunaController::class, 'login'])->name('login');
Route::post('/login', [penggunaController::class, 'loginQuery'])->name('loginQuery');
Route::get('/logout', [penggunaController::class, 'logout'])->name('logout');
Route::get('/home', [penggunaController::class, 'home'])->name('home');


Route::get('/insertBab/{id}', [penggunaController::class, 'createBab'])->name('create bab');
Route::post('/insertBab', [penggunaController::class, 'uploadBab'])->name('upload bab');
Route::get('/updateBab/{id}', [penggunaController::class, 'updateBab'])->name('update bab');
Route::get('/deleteBab/{id}', [penggunaController::class, 'deleteBab'])->name('delete bab');
Route::post('/updateBab', [penggunaController::class, 'updateBabFinal'])->name('update bab final');

Route::get('/createKelas', [penggunaController::class, 'createKelas'])->name('create kelas');
Route::post('/createKelas', [penggunaController::class, 'uploadKelas'])->name('upload kelas');
Route::get('/deleteKelas/{id}', [penggunaController::class, 'deleteKelas'])->name('delete kelas');
Route::get('/updateKelas/{id}', [penggunaController::class, 'updateKelas'])->name('update kelas');
Route::post('/updateKelas', [penggunaController::class, 'updateKelasFinal'])->name('update kelas final');

Route::get('/insertMapel', [penggunaController::class, 'createMapel'])->name('create mapel');
Route::get('/lihatMapel/{id}', [penggunaController::class, 'lihatMapel'])->name('lihat mapel');
Route::get('/lihatMapelGuru/{id}', [penggunaController::class, 'lihatMapelGuru'])->name('lihat mapel guru');
Route::post('/insertMapel', [penggunaController::class, 'uploadMapel'])->name('upload mapel');
Route::get('/updateMapel/{id}', [penggunaController::class, 'updateMapel'])->name('update mapel');
Route::post('/updateMapel', [penggunaController::class, 'updateMapelFinal'])->name('update mapel final');
Route::get('/deletemapel/{id}', [penggunaController::class, 'deleteMapel'])->name('delete mapel');
Route::get('/assignMapel/{id}', [penggunaController::class, 'assignMapelProcess'])->name('assign mapel');
Route::post('/assignMapel', [penggunaController::class, 'assignMapelFinal'])->name('assign mapel final');
Route::post('/updateDeskripsi', [penggunaController::class, 'updateDeskripsi'])->name('update deskripsi');

Route::post('/assignSiswa', [penggunaController::class, 'assignSiswaFinal'])->name('assign siswa final');

Route::get('/createTugas/{id}', [penggunaController::class, 'createTugas'])->name('create tugas');
Route::post('/createTugas', [penggunaController::class, 'createTugasFinal'])->name('create tugas final');

Route::get('/tugas/{id}', [penggunaController::class, 'menuTugas'])->name('menu tugas');
Route::get('/tugas/submit/{id}', [penggunaController::class, 'menuTugasProcess'])->name('menu tugas process');
Route::get('/hapusTugas/{id}', [penggunaController::class, 'hapusTugas'])->name('hapus tugas');
Route::post('/tugas/submit', [penggunaController::class, 'submitTugas'])->name('submit tugas');
Route::get('/cekTugas/{id}', [penggunaController::class, 'cekTugas'])->name('cek tugas');
Route::get('/downloadTugas/{id}', [penggunaController::class, 'downloadTugas'])->name('download tugas');
Route::post('/nilaiTugas', [penggunaController::class, 'nilaiTugas'])->name('nilai tugas');

Route::get('/createMateri/{id}', [penggunaController::class, 'createMateri'])->name('create materi');
Route::post('/createMateri', [penggunaController::class, 'uploadMateri'])->name('upload materi');
Route::get('/lihatMateri/{id}', [penggunaController::class, 'lihatMateri'])->name('lihat materi');
Route::get('/hapusMateri/{id}', [penggunaController::class, 'hapusMateri'])->name('hapus materi');
