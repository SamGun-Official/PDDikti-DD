@extends('kampus.home')

@section('content')
    <h1>Mahasiswa</h1>

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
                <th>NRP</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>220116919</td>
                <td>Ignatius Odi</td>
                <td>1</td>
                <td>
                    <button>Non Aktif</button>
                </td>
            </tr>
            <tr>
                <td>220116921</td>
                <td>John Louis Airlangga</td>
                <td>1</td>
                <td>
                    <button>Non Aktif</button>
                </td>
            </tr>
            <tr>
                <td>220116928</td>
                <td>Samuel Gunawan</td>
                <td>1</td>
                <td>
                    <button>Non Aktif</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
