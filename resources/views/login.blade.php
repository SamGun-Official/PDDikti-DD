@extends('main')

@section('title', 'Login')

@section('content')
    <div class="flex flex-col">
        @if (session()->has('error'))
            <div class="alert alert-error text-red-700">
                <span>{{ session()->get('error') }}</span>
            </div>
        @endif
        <form action="{{ route('doLogin') }}" class="max-w-lg w-full border-2 rounded-xl px-8 bg-white" method="POST">
            <h1 class="w-full text-center my-8 text-2xl font-bold">LOGIN PDDIKTI</h1>
            @csrf
            <div class="flex flex-col gap-y-2 mb-8">
                <div class="flex items-center justify-between gap-x-5">
                    <span class="w-3/4">Username</span>
                    <div class="w-full flex justify-end items-center">
                        <span class="mr-3">:</span>
                        <input type="text" name="username" id="username" class="border border-slate-700 rounded-lg p-1 w-full max-w-64" value="{{ old('username') }}">
                    </div>
                </div>
                @if ($errors->get('name'))
                    <p class="text-red-700">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <div class="flex items-center justify-between gap-x-5">
                    <span class="w-3/4">Password</span>
                    <div class="w-full flex justify-end items-center">
                        <span class="mr-3">:</span>
                        <input type="password" name="password" id="password" class="border border-slate-700 rounded-lg p-1 w-full max-w-64" value="{{ old('password') }}">
                    </div>
                </div>
                @if ($errors->get('name'))
                    <p class="text-red-700">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>
            <button type="submit" class="border border-slate-300 bg-sky-100 rounded-lg p-4 font-bold w-full text-lg">Login</button>
            <hr class="my-4 border-slate-400">
            <div class="text-center mt-4 mb-8">Belum punya akun? <a href="{{ route('register') }}" class="underline font-bold">Daftar sekarang!</a></div>
        </form>
    </div>
@endsection
