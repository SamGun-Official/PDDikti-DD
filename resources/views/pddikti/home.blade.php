@extends('main')

@section('title', 'PDDikti')

@section('nav')
    <div class="px-4 py-2 space-x-4">
        <a class="text-blue-500 underline" href="{{ route('pddikti.home') }}">Home</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.dosen') }}">Dosen</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.mahasiswa') }}">Mahasiswa</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.mata-kuliah') }}">Mata Kuliah</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.nilai') }}">Nilai</a>
        <a class="text-blue-500 underline" href="{{ route('pddikti.periode') }}">Periode</a>
        <a class="text-blue-500 underline" href="{{ url('/') }}">Logout</a>
    </div>
@endsection

@section('content')
    <h1>Home PDDikti</h1>
@endsection
