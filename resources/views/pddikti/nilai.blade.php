@extends('pddikti.home')

@section('content')
    <h1>Nilai</h1>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>Mata kuliah</th>
                <th>Nama Mahasiswa</th>
                <th>Nilai uts</th>
                <th>Nilai uas</th>
                <th>Nilai akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($nilai as $item)
            <tr>
                <td>{{$item->kode_matkul}}</td>
                <td>{{$item->nrp_mahasiswa}}</td>
                <td>{{$item->nilai_uts}}</td>
                <td>{{$item->nilai_uas}}</td>
                <td>{{$item->nilai_akhir}}</td>
            </tr>
            @empty
                <tr><td>data kosong</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
