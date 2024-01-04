@extends('dosen.home')

@section('content')
    <h1>Kelas</h1>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
           @forelse ($kelas as $item)
            <tr>
                <td>{{$item->kode_matkul}}</td>
                <td>{{$item->nrp_mahasiswa}}</td>
            </tr>
           @empty
            <tr>
                <td>data kosong</td>
            </tr>
           @endforelse
        </tbody>
    </table>
@endsection
