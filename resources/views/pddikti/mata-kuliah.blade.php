@extends('pddikti.home')

@section('content')
    <div class="mx-4 font-bold text-4xl">
        <div>Mata Kuliah</div>
        <form action="{{ route('pddikti.mata-kuliah.update') }}" method="post">
            @csrf
            <button class="bg-blue-500 px-2 py-4 rounded">Update</button>
        </form>
    </div>
@endsection

@section('table')
    <table>
        <thead>
            <tr>
                <th class="border">Kode Matkul</th>
                <th class="border">Nama Matkul</th>
                <th class="border">Kode Kelas</th>
                <th class="border">ID Periode</th>
                <th class="border">NIDN Dosen</th>
                <th class="border">SKS</th>
                <th class="border">Asal Kampus</th>
                <th class="border">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mata_kuliah as $item)
                <tr>
                    <td class="border">{{ $item->kode_matkul }}</td>
                    <td class="border">{{ $item->nama_matkul }}</td>
                    <td class="border">{{ $item->kode_kelas }}</td>
                    <td class="border">{{ $item->id_periode }}</td>
                    <td class="border">{{ $item->nidn_dosen }}</td>
                    <td class="border">{{ $item->sks }}</td>
                    <td class="border">{{ $item->asal_kampus }}</td>
                    <td class="border">{{ $item->status ? 'Aktif' : 'Non-Aktif' }}</td>
                </tr>
            @empty
                <tr>
                    <td>data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
