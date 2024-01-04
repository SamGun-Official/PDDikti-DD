@extends('kampus.home')

@section('content')
    <div class="flex flex-col mx-4">
        <form action="{{ route('kampus.kelas.insert') }}" method="post">
            @csrf

            <div class="font-bold text-4xl">Kelas</div>
            <table>
                <tr>
                    <td>Kode Matkul</td>
                    <td>:</td>
                    <td>
                        <select name="kode_matkul">
                            @foreach ($mata_kuliah as $item)
                                <option value="{{ $item->kode_matkul }}">
                                    {{ $item->kode_matkul . ' - ' . $item->nama_matkul }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mahasiswa</td>
                    <td>:</td>
                    <td>
                        <select name="nrp_mahasiswa">
                            @foreach ($mahasiswa as $item)
                                <option value="{{ $item->nrp_mahasiswa }}">
                                    {{ $item->nrp_mahasiswa . ' - ' . $item->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Asal Kampus</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="asal_kampus">
                    </td>
                </tr>
            </table>
            <button class="bg-blue-500 px-2 py-4 rounded">Submit</button>
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
                <th class="border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelas as $item)
                <tr>
                    <td class="border">{{ $item->kode_matkul }}</td>
                    <td class="border">{{ $item->nrp_mahasiswa }}</td>
                    <td class="border">{{ $item->asal_kampus }}</td>
                    <td class="border">
                        <form action="{{ route('kampus.kelas.delete', [$item->kode_matkul, $item->nrp_mahasiswa]) }}"
                            method="post">
                            @csrf
                            <button class="bg-blue-500 px-2 py-4 rounded">Delete</button>
                        </form>
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
