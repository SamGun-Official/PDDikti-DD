@extends('main')

@section('title', 'Dosen')

@section('nav')
    <a href="{{ route('dosen.home') }}">Home</a>
    <a href="{{ route('dosen.kelas') }}">Kelas</a>
    <a href="{{ route('dosen.mata-kuliah') }}">Mata Kuliah</a>
    <a href="{{ route('dosen.nilai') }}">Nilai</a>
@endsection

@section('content')
    <h1>Home Dosen</h1>
@endsection
