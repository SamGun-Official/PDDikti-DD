@extends('main')

@section('title', 'PDDikti')

@section('nav')
    <a href="{{ route('pddikti.home') }}">Home</a>
    <a href="{{ route('pddikti.dosen') }}">Dosen</a>
    <a href="{{ route('pddikti.mahasiswa') }}">Mahasiswa</a>
    <a href="{{ route('pddikti.mata-kuliah') }}">Mata Kuliah</a>
    <a href="{{ route('pddikti.nilai') }}">Nilai</a>
    <a href="{{ route('pddikti.periode') }}">Periode</a>
    <a href="{{ url('/') }}">Logout</a>
@endsection

@section('content')
    <h1>Home PDDikti</h1>
@endsection
