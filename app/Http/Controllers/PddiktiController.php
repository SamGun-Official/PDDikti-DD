<?php

namespace App\Http\Controllers;

use App\Models\pddikti\Dosen;
use App\Models\pddikti\Kelas;
use App\Models\pddikti\Mahasiswa;
use App\Models\pddikti\MataKuliah;
use App\Models\pddikti\Nilai;
use App\Models\pddikti\Periode;
use Illuminate\Contracts\View\View;

class PddiktiController extends Controller
{
    function home(): View
    {
        return view('pddikti.home');
    }

    function dosen(): View
    {
        $dosen = Dosen::all();
        return view('pddikti.dosen', compact("dosen"));
    }

    function update_dosen($nidn_dosen)
    {
        $dosen = Dosen::find($nidn_dosen);

        $dosen->update([
            'status' => $dosen->status === 'Aktif' ? 'Non-Aktif' : 'Aktif',
        ]);

        return back()->with('success', 'Dosen berhasil diubah');
    }

    function mahasiswa(): View
    {
        $mahasiswa = Mahasiswa::all();
        return view('pddikti.mahasiswa', compact("mahasiswa"));
    }

    function mata_kuliah(): View
    {
        $mata_kuliah =  MataKuliah::join('dosen', 'mv_mata_kuliah.nidn_dosen', 'dosen.nidn_dosen')
            ->join('mv_periode', 'mv_mata_kuliah.id_periode', 'mv_periode.id_periode')
            ->get(['mv_mata_kuliah.*', 'mv_periode.jenis_semester', 'mv_periode.tahun_ajaran', 'dosen.nama_lengkap']);
        // dd($mata_kuliah);
        return view('pddikti.mata-kuliah', compact("mata_kuliah"));
    }

    function nilai(): View
    {
        $nilai =  Nilai::join('mv_mahasiswa', 'mv_nilai.nrp_mahasiswa', 'mv_mahasiswa.nrp_mahasiswa')
            ->get(['mv_nilai.*', 'mv_mahasiswa.nama_lengkap']);
        // dd($nilai);
        return view('pddikti.nilai', compact("nilai"));
    }

    function periode(): View
    {
        $periode = Periode::all();
        return view('pddikti.periode', compact("periode"));
    }
}
