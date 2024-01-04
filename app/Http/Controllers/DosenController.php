<?php

namespace App\Http\Controllers;

use App\Models\istts_dosen\Kelas as Istts_dosenKelas;
use App\Models\istts_dosen\MataKuliah as Istts_dosenMataKuliah;
use App\Models\istts_dosen\Nilai as Istts_dosenNilai;
use App\Models\istts_kampus\MataKuliah as Istts_kampusMataKuliah;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Nilai;
use App\Models\pddikti\Mahasiswa as PddiktiMahasiswa;
use DateTime;
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
        $kelas = Istts_dosenKelas::all();
        return view('dosen.kelas', ["kelas" => $kelas]);
    }

    function mata_kuliah(): View
    {
        $mata_kuliah = Istts_dosenMataKuliah::all();
        return view('dosen.mata-kuliah', ["mata_kuliah" => $mata_kuliah]);
    }

    function nilai(): View
    {
        $nilai = Istts_dosenNilai::all();
        $mata_kuliah = Istts_dosenMataKuliah::select('kode_matkul', 'nama_matkul')->get();
        $mahasiswa = PddiktiMahasiswa::select('nrp_mahasiswa')->get();
        // dd($mahasiswa);
        return view('dosen.nilai', compact("nilai", "mata_kuliah", "mahasiswa"));
        // return view('dosen.nilai');
    }

    function insert_nilai(Request $request)
    {
        $data = $request->validate([
            'kode_matkul' => 'required',
            'nrp_mahasiswa' => 'required',
            'nilai_uts' => 'required|min:0|max:100',
            'nilai_uas' => 'required|min:0|max:100',
            'nilai_akhir' => 'required|min:0|max:100',
        ]);
        $asal = Istts_dosenMataKuliah::where('kode_matkul' , '=', $data['kode_matkul'])->select('asal_kampus')->get();
        // dd($asal[0]->asal_kampus);

        $connection = "istts_dosen";
        try {
            DB::connection($connection)->beginTransaction();
                Istts_dosenNilai::create([
                    'kode_matkul' => $data['kode_matkul'],
                    'nrp_mahasiswa' => $data['nrp_mahasiswa'],
                    'nilai_uts' => $data['nilai_uts'],
                    'nilai_uas' => $data['nilai_uas'],
                    'nilai_akhir' => $data['nilai_akhir'],
                    'asal_kampus' => $asal[0]->asal_kampus,
                    // 'created_at' => now(),
                    // 'updated_at' => now(),

                ]);
                DB::connection($connection)->commit();
        } catch (\Throwable $e) {
            DB::connection($connection)->rollBack();
            return back()->with("error", $e);
        }
        // DB::raw('commit;');

        return back()->with('success', 'Nilai berhasil ditambahkan');
    }

    function update_nilai($kode, $nrp)
    {
        $nilai = Istts_dosenNilai::where('kode', $kode)->where('nrp', $nrp)->first();

        $data = request()->validate([
            'nilai' => 'required|min:0|max:100',
        ]);

        $nilai->update($data);

        DB::raw('commit;');

        return back()->with('success', 'Nilai berhasil diubah');
    }

    function delete_nilai($kode, $nrp)
    {
        $nilai = Istts_dosenNilai::where('kode', $kode)->where('nrp', $nrp)->first();
        $nilai->delete();

        DB::raw('commit;');

        return back()->with('success', 'Nilai berhasil dihapus');
    }
}
