@extends('pddikti.home')

@section('content')
    <div class="mx-4 font-bold text-4xl">Mahasiswa</div>
@endsection

@section('table')
    <table>
        <thead>
            <tr>
                <th class="border">NRP Mahasiswa</th>
                <th class="border">Nama Lengkap</th>
                <th class="border">Jenis Kelamin</th>
                <th class="border">Tanggal Lahir</th>
                <th class="border">Asal Kampus</th>
                <th class="border">Jenjang</th>
                <th class="border">Semester Awal</th>
                <th class="border">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $item)
                <tr>
                    <td class="border">{{ $item->nrp_mahasiswa }}</td>
                    <td class="border">{{ $item->nama_lengkap }}</td>
                    <td class="border">{{ $item->jenis_kelamin }}</td>
                    <td class="border">{{ date('d/m/Y', strtotime($item->tanggal_lahir)) }}</td>
                    <td class="border">{{ $item->asal_kampus }}</td>
                    <td class="border">{{ $item->jenjang }}</td>
                    <td class="border">{{ $item->semester_awal }}</td>
                    <td class="border">{{ $item->status }}</td>
                </tr>
            @empty
                <tr>
                    <td>Data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
