<?php

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
    return redirect('kampus');
});

Route::prefix('dosen')->group(function () {
    Route::get('/', function () {
        return view('dosen.home');
    })->name('dosen.home');
    Route::get('/kelas', function () {
        return view('dosen.kelas');
    })->name('dosen.kelas');
    Route::get('/mata-kuliah', function () {
        return view('dosen.mata-kuliah');
    })->name('dosen.mata-kuliah');
    Route::get('/nilai', function () {
        return view('dosen.nilai');
    })->name('dosen.nilai');
});

Route::prefix('kampus')->group(function () {
    Route::get('/', function () {
        return view('kampus.home');
    })->name('kampus.home');
    Route::get('/dosen', function () {
        return view('kampus.dosen');
    })->name('kampus.dosen');
    Route::get('/kelas', function () {
        return view('kampus.kelas');
    })->name('kampus.kelas');
    Route::get('/mahasiswa', function () {
        return view('kampus.mahasiswa');
    })->name('kampus.mahasiswa');
    Route::get('/mata-kuliah', function () {
        return view('kampus.mata-kuliah');
    })->name('kampus.mata-kuliah');
    Route::get('/nilai', function () {
        return view('kampus.nilai');
    })->name('kampus.nilai');
    Route::get('/periode', function () {
        return view('kampus.periode');
    })->name('kampus.periode');
});

Route::prefix('pddikti')->group(function () {
    Route::get('/', function () {
        return view('pddikti.home');
    })->name('pddikti.home');
    Route::get('/dosen', function () {
        return view('pddikti.dosen');
    })->name('pddikti.dosen');
    Route::get('/mahasiswa', function () {
        return view('pddikti.mahasiswa');
    })->name('pddikti.mahasiswa');
    Route::get('/mata-kuliah', function () {
        return view('pddikti.mata-kuliah');
    })->name('pddikti.mata-kuliah');
    Route::get('/nilai', function () {
        return view('pddikti.nilai');
    })->name('pddikti.nilai');
    Route::get('/periode', function () {
        return view('pddikti.periode');
    })->name('pddikti.periode');
});
