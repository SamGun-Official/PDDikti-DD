@extends('kampus.home')

@section('content')
    <div class="flex flex-col mx-4">
        <form action="{{ route('kampus.mahasiswa.insert') }}" method="post">
            @csrf

            <div class="font-bold text-4xl">Mahasiswa</div>
            <table>
                <tr>
                    <td>NRP Mahasiswa</td>
                    <td>:</td>
                    <td><input type="text" name="nrp_mahasiswa"></td>
                    @if ($errors->get('nrp_mahasiswa'))
                        <p class="text-red-700">
                            {{ $errors->first('nrp_mahasiswa') }}
                        </p>
                    @endif
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><input type="text" name="nama_lengkap"></td>
                    @if ($errors->get('nama_lengkap'))
                        <p class="text-red-700">
                            {{ $errors->first('nama_lengkap') }}
                        </p>
                    @endif
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <select name="jenis_kelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @if ($errors->get('jenis_kelamin'))
                            <p class="text-red-700">
                                {{ $errors->first('jenis_kelamin') }}
                            </p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_lahir"></td>
                    @if ($errors->get('tanggal_lahir'))
                        <p class="text-red-700">
                            {{ $errors->first('tanggal_lahir') }}
                        </p>
                    @endif
                </tr>
                <tr>
                    <td>Asal Kampus</td>
                    <td>:</td>
                    <td><input type="text" name="asal_kampus"></td>
                    @if ($errors->get('asal_kampus'))
                        <p class="text-red-700">
                            {{ $errors->first('asal_kampus') }}
                        </p>
                    @endif
                </tr>
                <tr>
                    <td>Jenjang</td>
                    <td>:</td>
                    <td>
                        <select name="jenjang">
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        @if ($errors->get('jenjang'))
                            <p class="text-red-700">
                                {{ $errors->first('jenjang') }}
                            </p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Semester Awal</td>
                    <td>:</td>
                    <td>
                        <select name="semester_awal">
                            @foreach ($periode as $item)
                                <option value="{{ $item->jenis_semester . ' ' . $item->tahun_ajaran }}">
                                    {{ $item->jenis_semester . ' ' . $item->tahun_ajaran }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->get('semester_awal'))
                            <p class="text-red-700">
                                {{ $errors->first('semester_awal') }}
                            </p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <select name="status">
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                            <option value="Lulus">Lulus</option>
                        </select>
                        @if ($errors->get('status'))
                            <p class="text-red-700">
                                {{ $errors->first('status') }}
                            </p>
                        @endif
                    </td>
                </tr>
            </table>
            <button type="submit" class="bg-blue-500 px-2 py-4 rounded">Submit</button>
        </form>
    </div>
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
                <th class="border">Action</th>
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
                    <td class="border">
                        <form action="{{ route('kampus.mahasiswa.update', $item->nrp_mahasiswa) }}" method="post">
                            @csrf
                            <button class="bg-blue-500 px-2 py-4 rounded">Update</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
