<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
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
        $dosen = DB::connection('pddikti')->table('dosen')->get();
        // dd($dosen);
        return view('pddikti.dosen', ["dosen" => $dosen]);
    }

    function update_dosen($id)
    {
        $dosen = Dosen::find($id);

        $data = request()->validate([
            'nama' => 'required',
        ]);

        $dosen->update($data);

        DB::raw('commit;');

        return back()->with('success', 'Dosen berhasil diubah');
    }

    function kelas(): View
    {
        $kelas = Kelas::all();
        return view('pddikti.kelas', ["kelas" => $kelas]);
    }

    function mahasiswa(): View
    {
        $mahasiswa = DB::connection('pddikti')->table('mv_mahasiswa')->get();
        // dd($mahasiswa);
        return view('pddikti.mahasiswa', ["mahasiswa" => $mahasiswa]);
    }

    function mata_kuliah(): View
    {
        $mata_kuliah = DB::connection('pddikti')->table('mv_mata_kuliah')->get();
        // dd($mata_kuliah);
        return view('pddikti.mata-kuliah', ["mata_kuliah" => $mata_kuliah]);
    }

    function nilai(): View
    {
        $nilai = DB::connection('pddikti')->table('mv_nilai')->get();
        // dd($nilai);
        return view('pddikti.nilai', ["nilai" => $nilai]);
    }

    function periode(): View
    {
        $periode = DB::connection('pddikti')->table('mv_periode')->get();
        // dd($periode);
        return view('pddikti.periode', ["periode" => $periode]);
    }
}
