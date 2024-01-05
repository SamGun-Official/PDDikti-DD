<?php

namespace App\Http\Controllers;

use App\Models\pddikti\Dosen;
use App\Models\pddikti\Kelas;
use App\Models\pddikti\Mahasiswa;
use App\Models\pddikti\MataKuliah;
use App\Models\pddikti\Nilai;
use App\Models\pddikti\Periode;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

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
        try {
            DB::connection('pddikti')->beginTransaction();
            $dosen = Dosen::find($nidn_dosen);
            $dosen->update([
                'status' => $dosen->status === 'Aktif' ? 'Non-Aktif' : 'Aktif',
            ]);

            DB::connection('pddikti')->commit();
            // DB::connection('istts_kampus')->statement("CALL update_tabel('mv_dosen', 'f')");
        } catch (\Throwable $th) {
            DB::connection('pddikti')->rollBack();
            return back()->with('error', $th);
        }

        return back()->with('success', 'Dosen berhasil diubah');
    }

    function kelas(): View
    {
        $kelas = Kelas::all();
        // dd($kelas);
        return view('pddikti.kelas', compact("kelas"));
    }

    function update_kelas()
    {
        try {
            DB::connection('pddikti')->beginTransaction();
            DB::connection('pddikti')->statement("CALL update_tabel('mv_kelas', 'c')");
            DB::connection('pddikti')->commit();
        } catch (\Throwable $th) {
            DB::connection('pddikti')->rollBack();
            return back()->with('error', $th);
        }

        return back()->with('success', 'Berhasil update kelas');
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

    function update_mata_kuliah()
    {
        try {
            DB::connection('pddikti')->beginTransaction();
            DB::connection('pddikti')->statement("CALL update_tabel('mv_mata_kuliah', 'c')");
            DB::connection('pddikti')->commit();
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        return back()->with('success', 'Berhasil update mata kuliah');
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

    function syncpddikti()
    {
        DB::connection('istts_kampus')->statement("CALL update_tabel('mv_dosen', 'f')");
        return back()->with('success', 'Berhasil sync semua data PDDikti!');
    }
}
