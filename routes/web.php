<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\PddiktiController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/doLogin', [AuthController::class, 'login'])->name('doLogin');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/doRegister', [AuthController::class, 'register'])->name('doRegister');

Route::prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'home'])->name('dosen.home');
    Route::get('/kelas', [DosenController::class, 'kelas'])->name('dosen.kelas');
    Route::get('/mata-kuliah', [DosenController::class, 'mata_kuliah'])->name('dosen.mata-kuliah');

    Route::get('/nilai', [DosenController::class, 'nilai'])->name('dosen.nilai');
    Route::post('/nilai', [DosenController::class, 'insert_nilai'])->name('dosen.nilai.insert');
    Route::post('/nilai/update', [DosenController::class, 'update_nilai'])->name('dosen.nilai.update');
    Route::post('/nilai/edit', [DosenController::class, 'update_editnilai'])->name('dosen.nilai.edit');
    Route::post('/nilai/delete/{kode_matkul}/{nrp_mahasiswa}', [DosenController::class, 'delete_nilai'])->name('dosen.nilai.delete');
    Route::post('/syncdosen', [DosenController::class, 'syncdosen'])->name('syncdosen');
});

Route::prefix('kampus')->group(function () {
    Route::get('/', [KampusController::class, 'home'])->name('kampus.home');

    Route::get('/dosen', [KampusController::class, 'dosen'])->name('kampus.dosen');
    Route::post('/dosen', [KampusController::class, 'insert_dosen'])->name('kampus.dosen.insert');
    Route::post('/dosen/update/{nidn_dosen}', [KampusController::class, 'update_dosen'])->name('kampus.dosen.update');

    Route::get('/kelas', [KampusController::class, 'kelas'])->name('kampus.kelas');
    Route::post('/kelas', [KampusController::class, 'insert_kelas'])->name('kampus.kelas.insert');
    Route::post('/kelas/update/{kode_matkul}/{nrp_mahasiswa}', [KampusController::class, 'update_kelas'])->name('kampus.kelas.update');
    Route::post('/kelas/delete/{kode_matkul}/{nrp_mahasiswa}', [KampusController::class, 'delete_kelas'])->name('kampus.kelas.delete');

    Route::get('/mahasiswa', [KampusController::class, 'mahasiswa'])->name('kampus.mahasiswa');
    Route::post('/mahasiswa', [KampusController::class, 'insert_mahasiswa'])->name('kampus.mahasiswa.insert');
    Route::post('/mahasiswa/update/{nrp_mahasiswa}', [KampusController::class, 'update_mahasiswa'])->name('kampus.mahasiswa.update');
    Route::post('/mahasiswa/delete/{nrp_mahasiswa}', [KampusController::class, 'delete_mahasiswa'])->name('kampus.mahasiswa.delete');

    Route::get('/mata-kuliah', [KampusController::class, 'mata_kuliah'])->name('kampus.mata-kuliah');
    Route::post('/mata-kuliah', [KampusController::class, 'insert_mata_kuliah'])->name('kampus.mata-kuliah.insert');
    Route::post('/mata-kuliah/update/{kode_matkul}', [KampusController::class, 'update_mata_kuliah'])->name('kampus.mata-kuliah.update');
    Route::post('/mata-kuliah/delete/{kode_matkul}', [KampusController::class, 'delete_mata_kuliah'])->name('kampus.mata-kuliah.delete');

    Route::get('/nilai', [KampusController::class, 'nilai'])->name('kampus.nilai');

    Route::get('/periode', [KampusController::class, 'periode'])->name('kampus.periode');
    Route::post('/periode', [KampusController::class, 'insert_periode'])->name('kampus.periode.insert');
    Route::post('/periode/update/{id_periode}', [KampusController::class, 'update_periode'])->name('kampus.periode.update');
    Route::post('/periode/delete/{id_periode}', [KampusController::class, 'delete_periode'])->name('kampus.periode.delete');
    Route::post('/synckampus', [KampusController::class, 'synckampus'])->name('synckampus');
});

Route::prefix('pddikti')->group(function () {
    Route::get('/', [PddiktiController::class, 'home'])->name('pddikti.home');

    Route::get('/dosen', [PddiktiController::class, 'dosen'])->name('pddikti.dosen');
    Route::post('/dosen/update/{nidn_dosen}', [PddiktiController::class, 'update_dosen'])->name('pddikti.dosen.update');

    Route::get('/kelas', [PddiktiController::class, 'kelas'])->name('pddikti.kelas');
    Route::post('/kelas/update', [PddiktiController::class, 'update_kelas'])->name('pddikti.kelas.update');

    Route::get('/mahasiswa', [PddiktiController::class, 'mahasiswa'])->name('pddikti.mahasiswa');

    Route::get('/mata-kuliah', [PddiktiController::class, 'mata_kuliah'])->name('pddikti.mata-kuliah');
    Route::post('/mata-kuliah/update', [PddiktiController::class, 'update_mata_kuliah'])->name('pddikti.mata-kuliah.update');

    Route::get('/nilai', [PddiktiController::class, 'nilai'])->name('pddikti.nilai');
    Route::get('/periode', [PddiktiController::class, 'periode'])->name('pddikti.periode');
    Route::post('/syncpddikti', [PddiktiController::class, 'syncpddikti'])->name('syncpddikti');
});
