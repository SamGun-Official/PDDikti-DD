@extends('main')

@section('title', 'PDDikti')

@section('nav')
    <div class="px-4 py-2 space-x-4">
        <a class="text-blue-500 underline" href="{{ route('pddikti.home') }}">Home</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.dosen') }}">Dosen</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.kelas') }}">Kelas</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.mahasiswa') }}">Mahasiswa</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.mata-kuliah') }}">Mata Kuliah</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.nilai') }}">Nilai</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.periode') }}">Periode</a>
        <a class="text-blue-500 underline" href="{{ url('/') }}">Logout</a>
    </div>
@endsection

@section('content')
    <div class="flex flex-col items-center">
        <h1 class="font-bold text-2xl mb-8">Home PDDikti</h1>
        <form action="{{ route('syncpddikti') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 px-4 py-4 rounded font-bold text-xl">Update</button>
        </form>
    </div>
@endsection
