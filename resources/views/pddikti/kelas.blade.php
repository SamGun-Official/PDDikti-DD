@extends('pddikti.home')

@section('content')
    <div class="mx-4 font-bold text-4xl">Kelas</div>
@endsection

@section('table')
    <table>
        <thead>
            <tr>
                <th class="border">Kode Matkul</th>
                <th class="border">Nama Matkul</th>
                <th class="border">Kode Kelas</th>
                <th class="border">Periode</th>
                <th class="border">Nama Dosen</th>
                <th class="border">SKS</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mata_kuliah as $item)
                <tr>
                    <td class="border">{{ $item->kode_matkul }}</td>
                    <td class="border">{{ $item->nama_matkul }}</td>
                    <td class="border">{{ $item->kode_kelas }}</td>
                    <td class="border">{{ $item->jenis_semester . ' ' . $item->tahun_ajaran }}</td>
                    <td class="border">{{ $item->nama_lengkap }}</td>
                    <td class="border">{{ $item->sks }}</td>
                </tr>
            @empty
                <tr>
                    <td>data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
