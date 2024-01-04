@extends('kampus.home')

@section('content')
    <h1>Mata Kuliah</h1>

    <form action="" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td>
                    <input type="number" name="semester">
                </td>
            </tr>
            <tr>
                <td>SKS</td>
                <td>:</td>
                <td>
                    <input type="number" name="sks">
                </td>
            </tr>
            <tr>
                <td>Dosen</td>
                <td>:</td>
                <td>
                    <select name="dosen">
                        <option value="1">Kevin Setiono S.Kom., M.Kom.</option>
                        <option value="2">Iwan Chandra S.Kom., M.Kom.</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button>Submit</button>
                </td>
            </tr>
        </table>
        <hr>
    </form>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>Kode matkul</th>
                <th>Nama matkul</th>
                <th>Kode kelas</th>
                <th>Periode</th>
                <th>nidn dosen</th>
                <th>sks</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mata_kuliah as $item)
                <tr>
                    <td>{{$item->kode_matkul}}</td>
                    <td>{{$item->nama_matkul}}</td>
                    <td>{{$item->kode_kelas}}</td>
                    <td>{{$item->id_periode}}</td>
                    <td>{{$item->nidn_dosen}}</td>
                    <td>{{$item->sks}}</td>
                    <td><button>non aktif</button></td>
                </tr>
            @empty
                <tr><td>data kosong</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
