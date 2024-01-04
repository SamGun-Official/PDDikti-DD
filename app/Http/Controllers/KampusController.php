<?php

namespace App\Http\Controllers;

use App\Models\istts_kampus\Dosen;
use App\Models\istts_kampus\Kelas;
use App\Models\istts_kampus\Mahasiswa;
use App\Models\istts_kampus\MataKuliah;
use App\Models\istts_kampus\Nilai;
use App\Models\istts_kampus\Periode;
use App\Models\pddikti\Dosen as PddiktiDosen;
use Illuminate\Contracts\View\View;

class KampusController extends Controller
{
    function home(): View
    {
        return view('kampus.home');
    }

    function dosen(): View
    {
        $dosen = Dosen::all();
        // dd($dosen);
        return view('kampus.dosen', compact("dosen"));
    }

    function insert_dosen()
    {
        $data = request()->validate([
            'nidn_dosen' => 'required',
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required',
            'asal_kampus' => 'required',
            'jabatan_fungsional' => 'required',
            'pendidikan_terakhir' => 'required',
            'ikatan_kerja' => 'required',
            'program_studi' => 'required',
            'status' => 'required',
        ]);

        PddiktiDosen::create([
            'nidn_dosen' => $data['nidn_dosen'],
            'nik' => $data['nik'],
            'nama_lengkap' => $data['nama_lengkap'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'email' => $data['email'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'asal_kampus' => $data['asal_kampus'],
            'jabatan_fungsional' => $data['jabatan_fungsional'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir'],
            'ikatan_kerja' => $data['ikatan_kerja'],
            'program_studi' => $data['program_studi'],
            'status' => $data['status'],
        ]);

        return back()->with('success', 'Dosen berhasil ditambahkan');
    }

    function update_dosen($nidn_dosen)
    {
        $dosen = PddiktiDosen::find($nidn_dosen);

        $dosen->update([
            'status' => $dosen->status === 'Aktif' ? 'Non-Aktif' : 'Aktif',
        ]);

        return back()->with('success', 'Dosen berhasil diubah');
    }

    function kelas(): View
    {
        $kelas = Kelas::orderBy('kode_matkul')->orderBy('nrp_mahasiswa')->get();
        $mata_kuliah = MataKuliah::all();
        $mahasiswa = Mahasiswa::all();
        // dd($kelas);
        return view('kampus.kelas', compact("kelas", "mata_kuliah", "mahasiswa"));
    }

    function insert_kelas()
    {
        $data = request()->validate([
            'kode_matkul' => 'required',
            'nrp_mahasiswa' => 'required',
            'asal_kampus' => 'required',
        ]);

        Kelas::create([
            'kode_matkul' => $data['kode_matkul'],
            'nrp_mahasiswa' => $data['nrp_mahasiswa'],
            'asal_kampus' => $data['asal_kampus']
        ]);

        return back()->with('success', 'Kelas berhasil ditambahkan');
    }

    function update_kelas()
    {
        // NOT USED
    }

    function delete_kelas($kode_matkul, $nrp_mahasiswa)
    {
        Kelas::where('kode_matkul', $kode_matkul)->where('nrp_mahasiswa', $nrp_mahasiswa)->delete();
        return back()->with('success', 'Kelas berhasil dihapus');
    }

    function mahasiswa(): View
    {
        $mahasiswa = Mahasiswa::orderBy('nrp_mahasiswa')->get();
        $periode = Periode::orderBy('id_periode')->get();
        // dd($mahasiswa);
        return view('kampus.mahasiswa', compact("mahasiswa", "periode"));
    }

    function insert_mahasiswa()
    {
        $data = request()->validate([
            'nrp_mahasiswa' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'asal_kampus' => 'required',
            'jenjang' => 'required',
            'semester_awal' => 'required',
            'status' => 'required',
        ]);

        Mahasiswa::create([
            'nrp_mahasiswa' => $data['nrp_mahasiswa'],
            'nama_lengkap' => $data['nama_lengkap'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'asal_kampus' => $data['asal_kampus'],
            'jenjang' => $data['jenjang'],
            'semester_awal' => $data['semester_awal'],
            'status' => $data['status'],
        ]);

        return back()->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    function update_mahasiswa($nrp_mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nrp_mahasiswa);

        $mahasiswa->update([
            'status' => $mahasiswa->status === 'Aktif' ? 'Non-Aktif' : 'Aktif',
        ]);

        return back()->with('success', 'Mahasiswa berhasil diubah');
    }

    function delete_mahasiswa($nrp_mahasiswa)
    {
        // NOT USED
        Mahasiswa::where('nrp_mahasiswa', $nrp_mahasiswa)->delete();
        return back()->with('success', 'Mahasiswa berhasil dihapus');
    }

    function mata_kuliah(): View
    {
        $mata_kuliah = MataKuliah::join('periode', 'mata_kuliah.id_periode', 'periode.id_periode')
            ->join('mv_dosen', 'mata_kuliah.nidn_dosen', 'mv_dosen.nidn_dosen')
            ->get(['mata_kuliah.*', 'periode.tahun_ajaran', 'periode.jenis_semester', 'mv_dosen.nama_lengkap']);
        $periode = Periode::orderBy('id_periode')->get();
        $dosen = Dosen::all();
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

        MataKuliah::create([
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
        $mata_kuliah = MataKuliah::find($kode_matkul);

        MataKuliah::where('kode_matkul', $kode_matkul)->update([
            'status' => !$mata_kuliah->status,
        ]);
        return back()->with('success', 'Mata Kuliah berhasil diubah');
    }

    function delete_mata_kuliah($kode_matkul)
    {
        MataKuliah::where('kode_matkul', $kode_matkul)->delete();
        return back()->with('success', 'Mata Kuliah berhasil dihapus');
    }

    function nilai(): View
    {
        $nilai = Nilai::all();
        // dd($nilai);
        return view('kampus.nilai', compact("nilai"));
    }

    function periode(): View
    {
        $periode = Periode::orderBy('id_periode')->get();
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

        Periode::create([
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
        $periode = Periode::find($id_periode);
        return back()->with('success', 'Status Periode berhasil diubah');
    }

    function delete_periode($id_periode)
    {
        Periode::where('id_periode', $id_periode)->delete();
        return back()->with('success', 'Periode berhasil dihapus');
    }
}
