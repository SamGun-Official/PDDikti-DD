@extends('kampus.home')

@section('content')
    <div class="flex flex-col mx-4">
        <form action="{{ route('kampus.mata-kuliah.insert') }}" method="post">
            @csrf

            <div class="font-bold text-4xl">Mata Kuliah</div>
            <table>
                <tr>
                    <td>Kode Matkul</td>
                    <td>:</td>
                    <td><input type="text" name="kode_matkul"></td>
                </tr>
                <tr>
                    <td>Nama Matkul</td>
                    <td>:</td>
                    <td><input type="text" name="nama_matkul"></td>
                </tr>
                <tr>
                    <td>Kode Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="kode_kelas"></td>
                </tr>
                <tr>
                    <td>ID Periode</td>
                    <td>:</td>
                    <td>
                        <select name="id_periode">
                            @foreach ($periode as $item)
                                <option value="{{ $item->id_periode }}">
                                    {{ $item->jenis_semester . ' ' . $item->tahun_ajaran }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>NIDN Dosen</td>
                    <td>:</td>
                    <td>
                        <select name="nidn_dosen">
                            @foreach ($dosen as $item)
                                <option value="{{ $item->nidn_dosen }}">
                                    {{ $item->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td>:</td>
                    <td>
                        <input type="number" min="1" max="6" name="sks">
                    </td>
                </tr>
                <tr>
                    <td>Asal Kampus</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="asal_kampus">
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <input type="checkbox" name="status">
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
                <th class="border">Nama Matkul</th>
                <th class="border">Kode Kelas</th>
                <th class="border">ID Periode</th>
                <th class="border">NIDN Dosen</th>
                <th class="border">SKS</th>
                <th class="border">Asal Kampus</th>
                <th class="border">Status</th>
                <th class="border">Action</th>
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
                    <td class="border">
                        <form action="{{ route('kampus.mata-kuliah.update', $item->kode_matkul) }}" method="post">
                            @csrf
                            <button class="bg-blue-500 px-2 py-4 rounded">Update</button>
                        </form>
                        <form action="{{ route('kampus.mata-kuliah.delete', $item->kode_matkul) }}" method="post">
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
