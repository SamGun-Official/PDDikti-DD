<?php

namespace App\Http\Controllers;

use App\Models\istts_dosen\Kelas;
use App\Models\istts_dosen\MataKuliah;
use App\Models\istts_dosen\Nilai;
use App\Models\pddikti\Mahasiswa as PddiktiMahasiswa;
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
        $kelas = Kelas::all();
        return view('dosen.kelas', compact("kelas"));
    }

    function mata_kuliah(): View
    {
        $mata_kuliah = MataKuliah::all();
        return view('dosen.mata-kuliah', compact("mata_kuliah"));
    }

    function nilai(): View
    {
        $nilai = Nilai::all();
        $mata_kuliah = MataKuliah::get(['kode_matkul', 'nama_matkul']);
        $mahasiswa = PddiktiMahasiswa::get('nrp_mahasiswa');
        // dd($mahasiswa);
        return view('dosen.nilai', compact("nilai", "mata_kuliah", "mahasiswa"));
    }

    function insert_nilai()
    {
        $data = request()->validate([
            'kode_matkul' => 'required',
            'nrp_mahasiswa' => 'required',
            'nilai_uts' => 'required|min:0|max:100',
            'nilai_uas' => 'required|min:0|max:100',
            'nilai_akhir' => 'required|min:0|max:100',
        ]);
        $asal = MataKuliah::where('kode_matkul', $data['kode_matkul'])->get('asal_kampus');

        $connection = "istts_dosen";
        try {
            DB::connection($connection)->beginTransaction();
            Nilai::create([
                'kode_matkul' => $data['kode_matkul'],
                'nrp_mahasiswa' => $data['nrp_mahasiswa'],
                'nilai_uts' => $data['nilai_uts'],
                'nilai_uas' => $data['nilai_uas'],
                'nilai_akhir' => $data['nilai_akhir'],
                'asal_kampus' => $asal[0]->asal_kampus,
            ]);
            DB::connection($connection)->commit();
            DB::connection('istts_kampus')->statement("CALL update_tabel('mv_nilai', 'f')");
            DB::connection('istts_kampus')->commit();
            DB::connection('pddikti')->statement("CALL update_tabel('mv_nilai', 'c')");
            DB::connection('pddikti')->commit();
        } catch (\Throwable $e) {
            DB::connection($connection)->rollBack();
            return back()->with("error", $e);
        }

        return back()->with('success', 'Nilai berhasil ditambahkan');
    }

    function update_nilai(Request $request)
    {
        // dd($request->id);
        $id = $request->id;
        $nilai = Nilai::all();
        $temp = $nilai[$id];
        $request->session()->put('temp', $temp);
        return view('dosen.editnilai');
        // return back()->with('success', 'Nilai berhasil diubah');
    }

    function update_editnilai(Request $request)
    {
        $nilai = $request->session()->get('temp');
        $nilai_akhir = $request->nilai_akhir;
        if ($nilai_akhir < 0) {
            $nilai_akhir = 0;
        } else if ($nilai_akhir > 100) {
            $nilai_akhir = 100;
        }
        // dd($nilai);
        $connection = "istts_dosen";
        try {
            DB::connection($connection)->beginTransaction();
            Nilai::where(['kode_matkul' => $nilai->kode_matkul, 'nrp_mahasiswa' => $nilai->nrp_mahasiswa])
                ->update(['nilai_akhir' => $nilai_akhir]);

            DB::connection($connection)->commit();
            DB::connection('istts_kampus')->statement("CALL update_tabel('mv_nilai', 'f')");
            DB::connection('istts_kampus')->commit();
            DB::connection('pddikti')->statement("CALL update_tabel('mv_nilai', 'c')");
            DB::connection('pddikti')->commit();
        } catch (\Throwable $e) {
            DB::connection($connection)->rollBack();
            return back()->with("error", $e);
        }
        return redirect()->route('dosen.nilai');
        // return back()->with('success', 'Nilai berhasil diubah');
    }

    function delete_nilai($kode_matkul, $nrp_mahasiswa)
    {
        $connection = "istts_dosen";
        try {
            DB::connection($connection)->beginTransaction();
            Nilai::where(['kode_matkul' => $kode_matkul, 'nrp_mahasiswa' => $nrp_mahasiswa])->delete();

            DB::connection($connection)->commit();
            DB::connection('istts_kampus')->statement("CALL update_tabel('mv_nilai', 'f')");
            DB::connection('istts_kampus')->commit();
            DB::connection('pddikti')->statement("CALL update_tabel('mv_nilai', 'c')");
            DB::connection('pddikti')->commit();
        } catch (\Throwable $th) {
            DB::connection($connection)->rollBack();
            return back()->with("error", $th);
        }

        return back()->with('success', 'Nilai berhasil dihapus');
    }
}
