<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    function home(): View
    {
        return view('kampus.home');
    }

    function dosen(): View
    {
        return view('kampus.dosen');
    }

    function insert_dosen()
    {
    }

    function update_dosen()
    {
    }

    function kelas(): View
    {
        return view('kampus.kelas');
    }

    function insert_kelas()
    {
    }

    function update_kelas()
    {
    }

    function delete_kelas()
    {
    }

    function mahasiswa(): View
    {
        return view('kampus.mahasiswa');
    }

    function insert_mahasiswa()
    {
    }

    function update_mahasiswa()
    {
    }

    function delete_mahasiswa()
    {
    }

    function mata_kuliah(): View
    {
        return view('kampus.mata-kuliah');
    }

    function insert_mata_kuliah()
    {
    }

    function update_mata_kuliah()
    {
    }

    function delete_mata_kuliah()
    {
    }

    function nilai(): View
    {
        return view('kampus.nilai');
    }

    function periode(): View
    {
        return view('kampus.periode');
    }

    function insert_periode()
    {
    }

    function update_periode()
    {
    }

    function delete_periode()
    {
    }
}
