@extends('dosen.home')

@section('content')
    <h1>Nilai</h1>

    <form action="{{route('dosen.nilai.insert')}}" method="post">
        @csrf
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
                            {{ $item->nrp_mahasiswa}}
                        </option>

                    @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nilai UTS</td>
                <td>:</td>
                <td><input type="number" name="nilai_uts"></td>
            </tr>
            <tr>
                <td>Nilai UAS</td>
                <td>:</td>
                <td><input type="number" name="nilai_uas"></td>
            </tr>
            <tr>
                <td>Nilai AKHIR</td>
                <td>:</td>
                <td><input type="number" name="nilai_akhir"></td>
            </tr>
            <tr>
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
                <th>Kode Matkul</th>
                <th>NRP mahasiswa</th>
                <th>Nilai Uts</th>
                <th>Nilai Uas</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($nilai as $item)
            <tr>
                <td>{{$item->kode_matkul}}</td>
                <td>{{$item->nrp_mahasiswa}}</td>
                <td>{{$item->nilai_uts}}</td>
                <td>{{$item->nilai_uas}}</td>
                <td>{{$item->nilai_akhir}}</td>
            </tr>
           @empty
            <tr>
                <td>data kosong</td>
            </tr>
           @endforelse
        </tbody>
    </table>
@endsection
