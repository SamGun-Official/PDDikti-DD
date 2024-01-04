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
        $kelas = DB::connection('istts_kampus')->table('kelas')->get();
        // dd($kelas);
        return view('kampus.kelas', ["kelas" => $kelas]);
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
        $mahasiswa = DB::connection('istts_kampus')->table('mahasiswa')->get();
        // dd($mahasiswa);
        return view('kampus.mahasiswa', ["mahasiswa" => $mahasiswa]);
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

    function update_status_mahasiswa($nrp_mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nrp_mahasiswa);

        $mahasiswa->update([
            'status' => !$mahasiswa->status,
        ]);

        DB::raw('commit;');

        return back()->with('success', 'Status Mahasiswa berhasil diubah');
    }

    function delete_mahasiswa($nrp_mahasiswa)
    {
        // NOT USED
        DB::connection('istts_kampus')->table('mahasiswa')->where('nrp_mahasiswa', $nrp_mahasiswa)->first();
        return back()->with('success', 'Mahasiswa berhasil dihapus');
    }

    function mata_kuliah(): View
    {
        $mata_kuliah = DB::connection('istts_kampus')->table('mata_kuliah')
            ->join('periode', 'mata_kuliah.id_periode', 'periode.id_periode')
            ->join('mv_dosen', 'mata_kuliah.nidn_dosen', 'mv_dosen.nidn_dosen')
            ->get(['mata_kuliah.*', 'periode.tahun_ajaran', 'periode.jenis_semester', 'mv_dosen.nama_lengkap']);
        $periode = DB::connection('istts_kampus')->table('periode')->orderBy('id_periode')->get();
        $dosen = DB::connection('istts_kampus')->table('mv_dosen')->get();
        // dd($mata_kuliah);
        return view('kampus.mata-kuliah', compact("mata_kuliah", "periode", "dosen"));
    }

    function insert_mata_kuliah()
    {
        $data = request()->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'kode_kelas' => 'required',
            'id_periode' => 'required',
            'nidn_dosen' => 'required',
            'sks' => 'required|min:1|max:6',
            'asal_kampus' => 'required',
        ]);

        $status = request()->status;

        DB::connection('istts_kampus')->table('mata_kuliah')->insert([
            'kode_matkul' => $data['kode_matkul'],
            'nama_matkul' => $data['nama_matkul'],
            'kode_kelas' => $data['kode_kelas'],
            'id_periode' => $data['id_periode'],
            'nidn_dosen' => $data['nidn_dosen'],
            'sks' => $data['sks'],
            'asal_kampus' => $data['asal_kampus'],
            'status' => $status ? 1 : 0,
        ]);

        return back()->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    function update_mata_kuliah($kode_matkul)
    {
        $mata_kuliah = DB::connection('istts_kampus')->table('mata_kuliah')->where('kode_matkul', $kode_matkul)->first();

        DB::connection('istts_kampus')->table('mata_kuliah')->where('kode_matkul', $kode_matkul)->update([
            'status' => !$mata_kuliah->status,
        ]);
        return back()->with('success', 'Mata Kuliah berhasil diubah');
    }

    function delete_mata_kuliah($kode_matkul)
    {
        DB::connection('istts_kampus')->table('mata_kuliah')->where('kode_matkul', $kode_matkul)->delete();
        return back()->with('success', 'Mata Kuliah berhasil dihapus');
    }

    function nilai(): View
    {
        $nilai = DB::connection('istts_kampus')->table('mv_nilai')->get();
        // dd($nilai);
        return view('kampus.nilai', ["nilai" => $nilai]);
    }

    function periode(): View
    {
        $periode = DB::connection('istts_kampus')->table('periode')->orderBy('id_periode')->get();
        // dd($periode);
        return view('kampus.periode', compact("periode"));
    }

    function insert_periode()
    {
        $data = request()->validate([
            'id_periode' => 'required',
            'asal_kampus' => 'required',
            'jenis_semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        DB::connection('istts_kampus')->table('periode')->insert([
            'id_periode' => $data['id_periode'],
            'asal_kampus' => $data['asal_kampus'],
            'jenis_semester' => $data['jenis_semester'],
            'tahun_ajaran' => $data['tahun_ajaran'],
        ]);

        return back()->with('success', 'Periode berhasil ditambahkan');
    }

    function update_periode($id_periode)
    {
        // NOT USED
        $periode = DB::connection('istts_kampus')->table('periode')->where('id_periode', $id_periode)->first();
        return back()->with('success', 'Status Periode berhasil diubah');
    }

    function delete_periode($id_periode)
    {
        DB::connection('istts_kampus')->table('periode')->where('id_periode', $id_periode)->delete();
        return back()->with('success', 'Periode berhasil dihapus');
    }
}
