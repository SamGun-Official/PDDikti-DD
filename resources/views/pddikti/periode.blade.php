@extends('pddikti.home')

@section('content')
    <div class="mx-4 font-bold text-4xl">Periode</div>
@endsection

@section('table')
    <table>
        <thead>
            <tr>
                <th class="border">ID Periode</th>
                <th class="border">Asal Kampus</th>
                <th class="border">Jenis Semester</th>
                <th class="border">Tahun Ajaran</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($periode as $item)
                <tr>
                    <td class="border">{{ $item->id_periode }}</td>
                    <td class="border">{{ $item->asal_kampus }}</td>
                    <td class="border">{{ $item->jenis_semester }}</td>
                    <td class="border">{{ $item->tahun_ajaran }}</td>
                </tr>
            @empty
                <tr>
                    <td>data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
