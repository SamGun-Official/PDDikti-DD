@extends('main')

@section('title', 'Register')

@section('content')
    <div class="flex flex-col">
        @if (session()->has('error'))
            <div class="alert alert-error text-red-700">
                <span>{{ session()->get('error') }}</span>
            </div>
        @endif
        <form action="{{ route('doRegister') }}" class="max-w-xl w-full border-2 rounded-xl px-8 bg-white" method="POST">
            <h1 class="w-full text-center my-8 text-2xl font-bold">REGISTRASI PDDIKTI</h1>
            @csrf
            <div class="flex flex-col gap-y-2 mb-8">
                <div class="flex items-center justify-between gap-x-5">
                    <span class="w-3/4">Nama Lengkap</span>
                    <div class="w-full flex justify-end items-center">
                        <span class="mr-3">:</span>
                        <input type="text" name="name" id="name" class="border border-slate-700 rounded-lg p-1 w-full max-w-64" value="{{ old('name') }}">
                    </div>
                </div>
                @if ($errors->get('name'))
                    <p class="text-red-700">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <div class="flex items-center justify-between gap-x-4">
                    <span class="w-3/4">Username</span>
                    <div class="w-full flex justify-end items-center">
                        <span class="mr-3">:</span>
                        <input type="text" name="username" id="username" class="border border-slate-700 rounded-lg p-1 w-full max-w-64" value="{{ old('username') }}">
                    </div>
                </div>
                @if ($errors->get('username'))
                    <p class="text-red-700">
                        {{ $errors->first('username') }}
                    </p>
                @endif
                <div class="flex items-center justify-between gap-x-4">
                    <span class="w-3/4">Email</span>
                    <div class="w-full flex justify-end items-center">
                        <span class="mr-3">:</span>
                        <input type="email" name="email" id="email" class="border border-slate-700 rounded-lg p-1 w-full max-w-64" value="{{ old('email') }}">
                    </div>
                </div>
                @if ($errors->get('email'))
                    <p class="text-red-700">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <div class="flex items-center justify-between gap-x-4">
                    <span class="w-3/4">Password</span>
                    <div class="w-full flex justify-end items-center">
                        <span class="mr-3">:</span>
                        <input type="password" name="password" id="password" class="border border-slate-700 rounded-lg p-1 w-full max-w-64" value="{{ old('password') }}">
                    </div>
                </div>
                @if ($errors->get('password'))
                    <p class="text-red-700">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                <div class="flex items-center justify-between gap-x-4">
                    <span class="w-3/4">Konfirmasi Password</span>
                    <div class="w-full flex justify-end items-center">
                        <span class="mr-3">:</span>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="border border-slate-700 rounded-lg p-1 w-full max-w-64" value="{{ old('password_confirmation') }}">
                    </div>
                </div>
                @if ($errors->get('password_confirmation'))
                    <p class="text-red-700">
                        {{ $errors->first('password_confirmation') }}
                    </p>
                @endif
                <div class="flex items-center justify-between gap-x-4">
                    <span class="w-3/4">Role</span>
                    <div class="w-full flex justify-end items-center">
                        <span class="mr-3">:</span>
                        <select name="role" id="role" class="border border-slate-700 rounded-lg px-1 py-1.5 w-full max-w-64">
                            <option disabled selected>-- Pilih Role --</option>
                            <option value="pddikti">PDDikti</option>
                            <option value="baa">BAA</option>
                            <option value="dosen">Dosen</option>
                        </select>
                    </div>
                </div>
                @if ($errors->get('role'))
                    <p class="text-red-700">
                        {{ $errors->first('role') }}
                    </p>
                @endif
            </div>
            <button type="submit" class="border border-slate-300 bg-sky-100 rounded-lg p-4 font-bold w-full text-lg">Register</button>
            <hr class="my-4 border-slate-400">
            <div class="text-center mt-4 mb-8">Sudah punya akun? <a href="{{ route('login') }}" class="underline font-bold">Login sekarang!</a></div>
        </form>
    </div>
@endsection
