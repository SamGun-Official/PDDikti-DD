@extends('kampus.home')

@section('content')
    <div class="flex flex-col mx-4">
        <form action="{{ route('kampus.dosen.insert') }}" method="post">
            @csrf

            <div class="font-bold text-4xl">Dosen</div>
            <table>
                <tr>
                    <td>NIDN Dosen</td>
                    <td>:</td>
                    <td><input type="text" name="nidn_dosen"></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><input type="text" name="nik"></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><input type="text" name="nama_lengkap"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <select name="jenis_kelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_lahir"></td>
                </tr>
                <tr>
                    <td>Asal Kampus</td>
                    <td>:</td>
                    <td><input type="text" name="asal_kampus"></td>
                </tr>
                <tr>
                    <td>Jabatan Fungsional</td>
                    <td>:</td>
                    <td><input type="text" name="jabatan_fungsional"></td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>:</td>
                    <td>
                        <select name="pendidikan_terakhir">
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ikatan Kerja</td>
                    <td>:</td>
                    <td>
                        <select name="ikatan_kerja">
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td>
                        <select name="program_studi">
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Informatika">Informatika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Sistem Informasi Bisnis">Sistem Informasi Bisnis</option>
                            <option value="Informatika Profesional">Informatika Profesional</option>
                            <option value="Desain Produk">Desain Produk</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><input type="checkbox" name="status"></td>
                </tr>
            </table>
            <button class="bg-blue-500 px-2 py-4 rounded">Submit</button>
        </form>
    </div>
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
                        <form action="{{ route('kampus.dosen.update', $item->nidn_dosen) }}" method="post">
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
