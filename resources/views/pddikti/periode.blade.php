@extends('pddikti.home')

@section('content')
    <h1>Periode</h1>
@endsection

@section('table')
    <table border="1">
        <thead>
            <tr>
                <th>Periode</th>
                <th>semester</th>
                <th>tahun ajaran</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($periode as $item)
            <tr>
                <td>{{$item->id_periode}}</td>
                <td>{{$item->jenis_semester}}</td>
                <td>{{$item->tahun_ajaran}}</td>
                <td></td>
                <td><button>cancel</button></td>
            </tr>
            @empty
                <tr><td>data kosong</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
