@extends('main')

@section('title', 'Login')

@section('nav')
    <h1>LOGIN</h1>
@endsection

@section('content')
    <form action="{{ url('/login') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <button>Login</button>
    </form>
@endsection
