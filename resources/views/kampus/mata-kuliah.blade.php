@extends('kampus.home')

@section('content')
    <h1>Mata Kuliah</h1>

    <form action="" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="jurusan">
                        <option value="INF">INF</option>
                        <option value="SIB">SIB</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td>
                    <input type="number" name="semester">
                </td>
            </tr>
            <tr>
                <td>Dosen</td>
                <td>:</td>
                <td>
                    <select name="dosen">
                        <option value="1">Kevin Setiono S.Kom., M.Kom.</option>
                        <option value="2">Iwan Chandra S.Kom., M.Kom.</option>
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
                <th>Kode</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Semester</th>
                <th>Dosen</th>
                <th>Status</th>
                <th>Action</th>
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
                <td>
                    <button>Non Aktif</button>
                </td>
            </tr>
            <tr>
                <td>IN920</td>
                <td>Ethical Hacking</td>
                <td>INF</td>
                <td>7</td>
                <td>2</td>
                <td>1</td>
                <td>
                    <button>Non Aktif</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
