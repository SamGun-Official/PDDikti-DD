@extends('pddikti.home')

@section('content')
    <div class="mx-4 font-bold text-4xl">
        <div>Kelas</div>
        <form action="{{ route('pddikti.kelas.update') }}" method="post">
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
                <th class="border">NRP Mahasiswa</th>
                <th class="border">Asal Kampus</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelas as $item)
                <tr>
                    <td class="border">{{ $item->kode_matkul }}</td>
                    <td class="border">{{ $item->nrp_mahasiswa }}</td>
                    <td class="border">{{ $item->asal_kampus }}</td>
                </tr>
            @empty
                <tr>
                    <td>data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
