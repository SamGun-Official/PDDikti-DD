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
    <div class="flex flex-col items-center">
        <h1 class="font-bold text-2xl mb-8">Home Kampus</h1>
        <form action="{{ route('synckampus') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 px-4 py-4 rounded font-bold text-xl">Update</button>
        </form>
    </div>
@endsection
