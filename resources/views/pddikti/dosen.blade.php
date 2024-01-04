@extends('pddikti.home')

@section('content')
    <h1>Dosen</h1>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>NIDN Dosen</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Asal Kampus</th>
                <th>Jabatan Fungsional</th>
                <th>Pedidikan Terakhir</th>
                <th>Ikatan Kerja</th>
                <th>Program Studi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dosen as $item)
            <tr>
                <td>{{$item->nidn_dosen}}</td>
                    <td>{{$item->nik}}</td>
                    <td>{{$item->nama_lengkap}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->tanggal_lahir}}</td>
                    <td>{{$item->asal_kampus}}</td>
                    <td>{{$item->jabatan_fungsional}}</td>
                    <td>{{$item->pendidikan_terakhir}}</td>
                    <td>{{$item->ikatan_kerja}}</td>
                    <td>{{$item->program_studi}}</td>
                    <td>{{$item->status}}</td>
            </tr>
            @empty
                <tr><td>data kosong</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
