@extends('dosen.home')

@section('content')
    <form action="{{ route('dosen.nilai.edit') }}" method="post">
        @csrf
        Input Nilai : <input type="number" value="0" min="0" max="100" name="nilai_akhir">
        <button class="bg-blue-500 px-2 py-4 rounded">Edit Nilai</button>
    </form>
@endsection
