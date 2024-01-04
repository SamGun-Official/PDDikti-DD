@extends('kampus.home')

@section('content')
    <h1>Kelas</h1>

    <form action="" method="post">
        @csrf
        <table>
            <tr>
                <td>Mata Kuliah</td>
                <td>:</td>
                <td>
                    <select name="mata-kuliah">
                        <option value="IN982">IN982 - Distributed Database</option>
                        <option value="IN920">IN920 - Ethical Hacking</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mahasiswa</td>
                <td>:</td>
                <td>
                    <select name="mahasiswa">
                        <option value="220116919">220116919</option>
                        <option value="220116921">220116921</option>
                        <option value="220116928">220116928</option>
                    </select>
                </td>
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
                <th>Mata Kuliah</th>
                <th>Mahasiswa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelas as $item)
                <tr>
                    <td>{{$item->kode_matkul}}</td>
                    <td>{{$item->nrp_mahasiswa}}</td>
                    <td><button>cancel</button></td>
                </tr>
            @empty
                <tr><td>data kosong</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
