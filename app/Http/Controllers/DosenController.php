<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    function home(): View
    {
        return view('dosen.home');
    }

    function kelas(): View
    {
        return view('dosen.kelas');
    }

    function mata_kuliah(): View
    {
        return view('dosen.mata-kuliah');
    }

    function nilai(): View
    {
        return view('dosen.nilai');
    }

    function insert_nilai()
    {
    }

    function update_nilai()
    {
    }

    function delete_nilai()
    {
    }
}
