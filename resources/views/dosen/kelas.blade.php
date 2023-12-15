@extends('dosen.home')

@section('content')
    <h1>Kelas</h1>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>IN982</td>
                <td>220116919</td>
            </tr>
            <tr>
                <td>IN982</td>
                <td>220116921</td>
            </tr>
            <tr>
                <td>IN982</td>
                <td>220116928</td>
            </tr>
            <tr>
                <td>IN920</td>
                <td>220116919</td>
            </tr>
            <tr>
                <td>IN920</td>
                <td>220116928</td>
            </tr>
        </tbody>
    </table>
@endsection
