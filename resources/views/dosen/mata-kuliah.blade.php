@extends('dosen.home')

@section('content')
    <h1>Mata Kuliah</h1>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>Kode Matkul</th>
                <th>Nama Matkul</th>
                <th>Kode Kelas</th>
                <th>Periode</th>
                <th>Nama Dosen</th>
                <th>SKS</th>
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
            </tr>
           @empty
            <tr>
                <td>data kosong</td>
            </tr>
           @endforelse
        </tbody>
    </table>
@endsection
