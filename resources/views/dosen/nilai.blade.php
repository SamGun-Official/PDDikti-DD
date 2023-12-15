@extends('dosen.home')

@section('content')
    <h1>Nilai</h1>

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
                <td>Nilai</td>
                <td>:</td>
                <td><input type="number" name="nilai"></td>
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
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>IN982</td>
                <td>220116919</td>
                <td>100</td>
            </tr>
            <tr>
                <td>IN982</td>
                <td>220116921</td>
                <td>100</td>
            </tr>
            <tr>
                <td>IN982</td>
                <td>220116928</td>
                <td>100</td>
            </tr>
            <tr>
                <td>IN920</td>
                <td>220116919</td>
                <td>100</td>
            </tr>
            <tr>
                <td>IN920</td>
                <td>220116928</td>
                <td>100</td>
            </tr>
        </tbody>
    </table>
@endsection
