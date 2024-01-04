@extends('kampus.home')

@section('content')
    <h1>Dosen</h1>

    <form action="" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
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
                <th>Action</th>
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
                    <td>
                        <button>Non Aktif</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
