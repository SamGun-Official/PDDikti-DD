@extends('dosen.home')

@section('content')
    <div class="flex flex-col mx-4">
        <form action="{{ route('dosen.nilai.insert') }}" method="post">
            @csrf

            <div class="font-bold text-4xl">Dosen</div>
            <table>
                <tr>
                    <td>Mata Kuliah</td>
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
                                    {{ $item->nrp_mahasiswa }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nilai UTS</td>
                    <td>:</td>
                    <td><input type="number" min="0" max="100" name="nilai_uts"></td>
                </tr>
                <tr>
                    <td>Nilai UAS</td>
                    <td>:</td>
                    <td><input type="number" min="0" max="100" name="nilai_uas"></td>
                </tr>
                <tr>
                    <td>Nilai AKHIR</td>
                    <td>:</td>
                    <td><input type="number"min="0" max="100" name="nilai_akhir"></td>
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
                <th class="border">Nilai UTS</th>
                <th class="border">Nilai UAS</th>
                <th class="border">Nilai Akhir</th>
                <th class="border">Asal Kampus</th>
                <th class="border">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @forelse ($nilai as $item)
                <tr>
                    <td class="border">{{ $item->kode_matkul }}</td>
                    <td class="border">{{ $item->nrp_mahasiswa }}</td>
                    <td class="border">{{ $item->nilai_uts }}</td>
                    <td class="border">{{ $item->nilai_uas }}</td>
                    <td class="border">{{ $item->nilai_akhir }}</td>
                    <td class="border">{{ $item->asal_kampus }}</td>
                    <td class="border">
                        <form action="{{ route('dosen.nilai.update', ['id' => $i]) }}" method="post">
                            @csrf
                            <button class="bg-blue-500 px-2 py-4 rounded">Edit</button>
                        </form>
                        <form action="{{ route('dosen.nilai.delete', [$item->kode_matkul, $item->nrp_mahasiswa]) }}"
                            method="post">
                            @csrf
                            <button class="bg-red-500 px-2 py-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @empty
                <tr>
                    <td>data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
