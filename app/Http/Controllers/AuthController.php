<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function loginPage(): View
    {
        return view('login');
    }

    function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'dosen') {
                return redirect()->route('dosen.home');
            } else if ($user->role == 'baa') {
                return redirect()->route('kampus.home');
            } else if ($user->role == 'pddikti') {
                return redirect()->route('pddikti.home');
            } else {
                return back()->with('error', 'Role invalid!');
            }
        } else {
            return back()->with('error', 'Gagal login!');
        }
    }
}
