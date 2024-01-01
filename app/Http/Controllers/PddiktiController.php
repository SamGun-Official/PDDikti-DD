<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PddiktiController extends Controller
{
    function home(): View
    {
        return view('pddikti.home');
    }

    function dosen(): View
    {
        return view('pddikti.dosen');
    }

    function update_dosen()
    {
    }

    function kelas(): View
    {
        return view('pddikti.kelas');
    }

    function mahasiswa(): View
    {
        return view('pddikti.mahasiswa');
    }

    function mata_kuliah(): View
    {
        return view('pddikti.mata-kuliah');
    }

    function nilai(): View
    {
        return view('pddikti.nilai');
    }

    function periode(): View
    {
        return view('pddikti.periode');
    }
}
