@extends('pddikti.home')

@section('content')
    <div class="mx-4 font-bold text-4xl">Dosen</div>
@endsection

@section('table')
    <table>
        <thead>
            <tr>
                <th class="border">NIDN Dosen</th>
                <th class="border">NIK</th>
                <th class="border">Nama Lengkap</th>
                <th class="border">Jenis Kelamin</th>
                <th class="border">Email</th>
                <th class="border">Tanggal Lahir</th>
                <th class="border">Asal Kampus</th>
                <th class="border">Jabatan Fungsional</th>
                <th class="border">Pendidikan Terakhir</th>
                <th class="border">Ikatan Kerja</th>
                <th class="border">Program Studi</th>
                <th class="border">Status</th>
                <th class="border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dosen as $item)
                <tr>
                    <td class="border">{{ $item->nidn_dosen }}</td>
                    <td class="border">{{ $item->nik }}</td>
                    <td class="border">{{ $item->nama_lengkap }}</td>
                    <td class="border">{{ $item->jenis_kelamin }}</td>
                    <td class="border">{{ $item->email }}</td>
                    <td class="border">{{ date('d/m/Y', strtotime($item->tanggal_lahir)) }}</td>
                    <td class="border">{{ $item->asal_kampus }}</td>
                    <td class="border">{{ $item->jabatan_fungsional }}</td>
                    <td class="border">{{ $item->pendidikan_terakhir }}</td>
                    <td class="border">{{ $item->ikatan_kerja }}</td>
                    <td class="border">{{ $item->program_studi }}</td>
                    <td class="border">{{ $item->status }}</td>
                    <td class="border">
                        <form action="{{ route('pddikti.dosen.update', $item->nidn_dosen) }}" method="post">
                            @csrf
                            <button class="bg-blue-500 px-2 py-4 rounded">Update</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>data kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
