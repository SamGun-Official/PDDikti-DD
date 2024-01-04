<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
use App\Models\pddikti\Dosen as PddiktiDosen;
use App\Models\pddikti\Kelas as PddiktiKelas;
use App\Models\pddikti\Mahasiswa as PddiktiMahasiswa;
use App\Models\pddikti\MataKuliah as PddiktiMataKuliah;
use App\Models\pddikti\Nilai as PddiktiNilai;
use App\Models\pddikti\Periode as PddiktiPeriode;
use App\Models\Periode;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PddiktiController extends Controller
{
    function home(): View
    {
        return view('pddikti.home');
    }

    function dosen(): View
    {
        $dosen = PddiktiDosen::all();
        return view('pddikti.dosen', ["dosen" => $dosen]);
    }

    function update_dosen($id)
    {
        $dosen = PddiktiDosen::find($id);

        $data = request()->validate([
            'nama' => 'required',
        ]);

        $dosen->update($data);

        DB::raw('commit;');

        return back()->with('success', 'Dosen berhasil diubah');
    }

    // function kelas(): View
    // {
    //     $kelas = PddiktiKelas::all();
    //     return view('pddikti.kelas', ["kelas" => $kelas]);
    // }

    function mahasiswa(): View
    {
        $mahasiswa = PddiktiMahasiswa::all();
        return view('pddikti.mahasiswa', ["mahasiswa" => $mahasiswa]);
    }

    function mata_kuliah(): View
    {
        $mata_kuliah =  PddiktiMataKuliah::join('dosen', 'mv_mata_kuliah.nidn_dosen', '=','dosen.nidn_dosen')
        ->get(['mv_mata_kuliah.*','dosen.nama_lengkap']);
        // dd($mata_kuliah);
        return view('pddikti.mata-kuliah', ["mata_kuliah" => $mata_kuliah]);
    }

    function nilai(): View
    {
        $nilai = PddiktiNilai::all();
        // dd($nilai);
        $nilai =  PddiktiNilai::join('mv_mahasiswa', 'mv_nilai.nrp_mahasiswa', '=','mv_mahasiswa.nrp_mahasiswa')
        ->get(['mv_nilai.*','mv_mahasiswa.nama_lengkap']);
        return view('pddikti.nilai', ["nilai" => $nilai]);
    }

    function periode(): View
    {
        $periode = PddiktiPeriode::all();
        return view('pddikti.periode', ["periode" => $periode]);
    }
}
