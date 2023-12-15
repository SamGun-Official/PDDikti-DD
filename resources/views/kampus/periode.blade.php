@extends('kampus.home')

@section('content')
    <h1>Periode</h1>

    <form action="" method="post">
        @csrf
        <table>
            <tr>
                <td>Periode</td>
                <td>:</td>
                <td><input type="number" name="periode"></td>
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
                <th>Periode</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>20221</td>
                <td>0</td>
                <td>
                    <button>Aktifkan</button>
                </td>
            </tr>
            <tr>
                <td>20222</td>
                <td>0</td>
                <td>
                    <button>Aktifkan</button>
                </td>
            </tr>
            <tr>
                <td>20231</td>
                <td>1</td>
                <td>
                    <button disabled>Aktifkan</button>
                </td>
            </tr>
            <tr>
                <td>20232</td>
                <td>0</td>
                <td>
                    <button>Aktifkan</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
