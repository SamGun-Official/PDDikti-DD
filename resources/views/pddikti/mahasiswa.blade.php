@extends('pddikti.home')

@section('content')
    <h1>Mahasiswa</h1>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>NRP</th>
                <th>Nama Lengkap</th>
                <th>Jenis kelamin</th>
                <th>Tanggal lahir</th>
                <th>asal kampus</th>
                <th>Jenjang</th>
                <th>Semester awal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $item)
            <tr>
                <td>{{$item->nrp_mahasiswa}}</td>
                <td>{{$item->nama_lengkap}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>{{$item->tanggal_lahir}}</td>
                <td>{{$item->asal_kampus}}</td>
                <td>{{$item->jenjang}}</td>
                <td>{{$item->semester_awal}}</td>
                <td>{{$item->status}}</td>
                <td><button>non aktif</button></td>
            </tr>
        @empty
            <tr><td>Data kosong</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
