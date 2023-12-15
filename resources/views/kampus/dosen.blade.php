@extends('kampus.home')

@section('content')
    <h1>Dosen</h1>

    <form action="" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
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
                <th>ID</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kevin Setiono S.Kom., M.Kom.</td>
                <td>1</td>
                <td>
                    <button>Non Aktif</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Iwan Chandra S.Kom., M.Kom.</td>
                <td>1</td>
                <td>
                    <button>Non Aktif</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
