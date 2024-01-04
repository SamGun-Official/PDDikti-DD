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

class KampusController extends Controller
{
    function home(): View
    {
        return view('kampus.home');
    }

    function dosen(): View
    {
        $dosen = DB::connection('istts_kampus')->table('mv_dosen')->get();
        // dd($dosen);
        return view('kampus.dosen', ["dosen" => $dosen]);

        // return view('kampus.dosen');
    }

    function insert_dosen(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
        ]);

        Dosen::create([
            'nama' => $data['nama'],
            'status' => 1,
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Dosen berhasil ditambahkan');
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

    function update_status_dosen($id)
    {
        $dosen = Dosen::find($id);

        $dosen->update([
            'status' => !$dosen->status,
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Status Dosen berhasil diubah');
    }

    function kelas(): View
    {
        // $kelas = Kelas::all();
        // return view('kampus.kelas', ["kelas" => $kelas]);

        return view('kampus.kelas');
    }

    function insert_kelas(Request $request)
    {
        $data = $request->validate([
            'mata-kuliah' => 'required',
            'mahasiswa' => 'required',
        ]);

        Kelas::create([
            'kode' => $data['mata-kuliah'],
            'nrp' => $data['mahasiswa'],
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Kelas berhasil ditambahkan');
    }

    function update_kelas()
    {
        // NOT POSSIBLE?
    }

    function delete_kelas($kode, $nrp)
    {
        $kelas = Kelas::where('kode', $kode)->where('nrp', $nrp)->first();
        $kelas->delete();

        DB::raw('commit;');

        return back()->with('success', 'Kelas berhasil dihapus');
    }

    function mahasiswa(): View
    {
        return view('kampus.mahasiswa');
    }

    function insert_mahasiswa(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'status' => 1,
        ]);

        // $nrp = generateNRP();

        Mahasiswa::create([
            // 'nrp' => $nrp,
            'nama' => $data['nama'],
            'status' => $data['status'],
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    function update_mahasiswa($nrp)
    {
        $mahasiswa = Mahasiswa::find($nrp);

        $data = request()->validate([
            'nama' => 'required',
        ]);

        $mahasiswa->update($data);

        DB::raw('commit;');

        return back()->with('success', 'Mahasiswa berhasil diubah');
    }

    function update_status_mahasiswa($nrp)
    {
        $mahasiswa = Mahasiswa::find($nrp);

        $mahasiswa->update([
            'status' => !$mahasiswa->status,
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Status Mahasiswa berhasil diubah');
    }

    function delete_mahasiswa()
    {
        // NOT POSSIBLE?
    }

    function mata_kuliah(): View
    {
        // $mata_kuliah = MataKuliah::all();
        // return view('kampus.mata-kuliah', ["mata_kuliah" => $mata_kuliah]);

        return view('kampus.mata-kuliah');
    }

    function insert_mata_kuliah()
    {
        $data = request()->validate([
            'nama' => 'required',
            'semester' => 'required|min:0|max:9',
            'sks' => 'required|min:1|max:6',
            'dosen' => 'required',
        ]);

        // $kode = generateKode();

        MataKuliah::create([
            // 'kode' => $kode,
            'nama' => $data['nama'],
            'semester' => $data['semester'],
            'sks' => $data['sks'],
            'id_dosen' => $data['dosen'],
            'status' => 1,
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    function update_mata_kuliah($kode)
    {
        $mata_kuliah = MataKuliah::find($kode);

        $data = request()->validate([
            'nama' => 'required',
            'semester' => 'required|min:0|max:9',
            'sks' => 'required|min:1|max:6',
            'dosen' => 'required',
        ]);

        $mata_kuliah->update($data);

        DB::raw('commit;');

        return back()->with('success', 'Mata Kuliah berhasil diubah');
    }

    function delete_mata_kuliah($kode)
    {
        $mata_kuliah = MataKuliah::find($kode);
        $mata_kuliah->delete();

        DB::raw('commit;');

        return back()->with('success', 'Mata Kuliah berhasil dihapus');
    }

    function nilai(): View
    {
        $nilai = Nilai::all();
        return view('kampus.nilai', ["nilai" => $nilai]);
    }

    function periode(): View
    {
        $periode = Periode::all();
        return view('kampus.periode', ["periode" => $periode]);
    }

    function insert_periode()
    {
        $data = request()->validate([
            'periode' => 'required',
        ]);

        Periode::create([
            'periode' => $data['periode'],
            'status' => 1,
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Periode berhasil ditambahkan');
    }

    function update_periode($periode)
    {
        $periode = Periode::find($periode);
        $periode->update([
            'status' => !$periode->status,
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Status Periode berhasil diubah');
    }

    function delete_periode($periode)
    {
        $periode = Periode::find($periode);
        $periode->delete();

        DB::raw('commit;');

        return back()->with('success', 'Periode berhasil dihapus');
    }
}
