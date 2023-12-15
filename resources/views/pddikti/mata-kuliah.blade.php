@extends('pddikti.home')

@section('content')
    <h1>Mata Kuliah</h1>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Semester</th>
                <th>Dosen</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>IN982</td>
                <td>Distributed Database</td>
                <td>INF</td>
                <td>7</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <td>IN920</td>
                <td>Ethical Hacking</td>
                <td>INF</td>
                <td>7</td>
                <td>2</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>
@endsection
