<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Nilai;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    function home(): View
    {
        return view('dosen.home');
    }

    function kelas(): View
    {
        $kelas = DB::connection('istts_dosen')->table('mv_kelas')->get();
        // dd($kelas);
        return view('dosen.kelas', ["kelas" => $kelas]);
    }

    function mata_kuliah(): View
    {
        $mata_kuliah = DB::connection('istts_dosen')->table('mv_mata_kuliah')->get();
        // dd($mata_kuliah);
        return view('dosen.mata-kuliah', ["mata_kuliah" => $mata_kuliah]);
    }

    function nilai(): View
    {
        $nilai = DB::connection('istts_dosen')->table('nilai')->get();
        // dd($nilai);
        return view('dosen.nilai', ["nilai" => $nilai]);

        // return view('dosen.nilai');
    }

    function insert_nilai(Request $request)
    {
        $data = $request->validate([
            'mata-kuliah' => 'required',
            'mahasiswa' => 'required',
            'nilai' => 'required|min:0|max:100',
        ]);

        Nilai::create([
            'kode' => $data['mata-kuliah'],
            'nrp' => $data['mahasiswa'],
            'nilai' => $data['nilai'],
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Nilai berhasil ditambahkan');
    }

    function update_nilai($kode, $nrp)
    {
        $nilai = Nilai::where('kode', $kode)->where('nrp', $nrp)->first();

        $data = request()->validate([
            'nilai' => 'required|min:0|max:100',
        ]);

        $nilai->update($data);

        DB::raw('commit;');

        return back()->with('success', 'Nilai berhasil diubah');
    }

    function delete_nilai($kode, $nrp)
    {
        $nilai = Nilai::where('kode', $kode)->where('nrp', $nrp)->first();
        $nilai->delete();

        DB::raw('commit;');

        return back()->with('success', 'Nilai berhasil dihapus');
    }
}
