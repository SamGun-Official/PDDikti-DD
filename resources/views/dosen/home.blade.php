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
    <h1>Home Dosen</h1>
    <form action="{{ route('sync.dosen')}}"><Button>UPDATE</Button></form>
@endsection
