@extends('main')

@section('title', 'Kampus')

@section('nav')
    <a href="{{ route('kampus.home') }}">Home</a>
    <a href="{{ route('kampus.dosen') }}">Dosen</a>
    <a href="{{ route('kampus.kelas') }}">Kelas</a>
    <a href="{{ route('kampus.mahasiswa') }}">Mahasiswa</a>
    <a href="{{ route('kampus.mata-kuliah') }}">Mata Kuliah</a>
    <a href="{{ route('kampus.nilai') }}">Nilai</a>
    <a href="{{ route('kampus.periode') }}">Periode</a>
    <a href="{{ url('/') }}">Logout</a>
@endsection

@section('content')
    <h1>Home Kampus</h1>
@endsection
