@extends('main')

@section('title', 'Kampus')

@section('nav')
    <div class="px-4 py-2 space-x-4">
        <a class="text-blue-500 underline" href="{{ route('kampus.home') }}">Home</a>
        <a class="text-blue-500 underline" href="{{ route('kampus.dosen') }}">Dosen</a>
        <a class="text-blue-500 underline" href="{{ route('kampus.kelas') }}">Kelas</a>
        <a class="text-blue-500 underline" href="{{ route('kampus.mahasiswa') }}">Mahasiswa</a>
        <a class="text-blue-500 underline" href="{{ route('kampus.mata-kuliah') }}">Mata Kuliah</a>
        <a class="text-blue-500 underline" href="{{ route('kampus.nilai') }}">Nilai</a>
        <a class="text-blue-500 underline" href="{{ route('kampus.periode') }}">Periode</a>
        <a class="text-blue-500 underline" href="{{ url('/') }}">Logout</a>
    </div>
@endsection

@section('content')
    <h1>Home Kampus</h1>
@endsection
