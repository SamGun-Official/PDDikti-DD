@extends('kampus.home')

@section('content')
    <div class="flex flex-col mx-4">
        <form action="{{ route('kampus.periode.insert') }}" method="post">
            @csrf

            <div class="font-bold text-4xl">Periode</div>
            <table>
                <tr>
                    <td>ID Periode</td>
                    <td>:</td>
                    <td><input type="text" name="id_periode" value="{{ old('id_periode') }}"></td>
                </tr>
                <tr>
                    <td>Asal Kampus</td>
                    <td>:</td>
                    <td><input type="text" name="asal_kampus" value="{{ old('asal_kampus') }}"></td>
                </tr>
                <tr>
                    <td>Jenis Semester</td>
                    <td>:</td>
                    <td>
                        <select name="jenis_semester">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td><input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}"></td>
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
                <th class="border">ID Periode</th>
                <th class="border">Asal Kampus</th>
                <th class="border">Jenis Semester</th>
                <th class="border">Tahun Ajaran</th>
                <th class="border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($periode as $item)
                <tr>
                    <td class="border">{{ $item->id_periode }}</td>
                    <td class="border">{{ $item->asal_kampus }}</td>
                    <td class="border">{{ $item->jenis_semester }}</td>
                    <td class="border">{{ $item->tahun_ajaran }}</td>
                    <td class="border">
                        <form action="{{ route('kampus.periode.delete', $item->id_periode) }}" method="post">
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
