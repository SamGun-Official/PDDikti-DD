@extends('main')

@section('title', 'Dosen')

@section('nav')
    <div class="px-4 py-2 space-x-4">
        <a class="text-blue-500 underline" href="{{ route('dosen.home') }}">Home</a>
        <a class="text-blue-500 underline" href="{{ route('dosen.kelas') }}">Kelas</a>
        <a class="text-blue-500 underline" href="{{ route('dosen.mata-kuliah') }}">Mata Kuliah</a>
        <a class="text-blue-500 underline" href="{{ route('dosen.nilai') }}">Nilai</a>
        <a class="text-blue-500 underline" href="{{ url('/') }}">Logout</a>
    </div>
@endsection

@section('content')
    <div class="flex flex-col items-center">
        <h1 class="font-bold text-2xl mb-8">Home Dosen</h1>
        <form action="{{ route('syncdosen') }}" method="POST">
            <button type="submit" class="bg-blue-500 px-4 py-4 rounded font-bold text-xl">Update</button>
        </form>
    </div>
@endsection
