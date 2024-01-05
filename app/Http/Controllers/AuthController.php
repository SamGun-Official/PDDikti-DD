<?php

namespace App\Http\Controllers;

use App\Models\istts_dosen\User as Istts_dosenUser;
use App\Models\istts_kampus\User as Istts_kampusUser;
use App\Models\pddikti\User as PddiktiUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage(): View
    {
        return view('login');
    }

    public function registerPage(): View
    {
        return view('register');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $list_dosen = DB::connection("istts_dosen")->table("users")->where("username", $request->username)->first();
        if ($list_dosen != null) {
            $password = Hash::check($request->password, $list_dosen->password);
            if ($password && $list_dosen->role == "dosen" && $list_dosen->status == "Active") {
                return redirect()->route('dosen.home');
            } else {
                return back()->with('error', 'Gagal login!');
            }
        }

        $list_baa = DB::connection("istts_kampus")->table("users")->where("username", $request->username)->first();
        if ($list_baa != null) {
            $password = Hash::check($request->password, $list_baa->password);
            if ($password && $list_baa->role == "baa" && $list_baa->status == "Active") {
                return redirect()->route('kampus.home');
            } else {
                return back()->with('error', 'Gagal login!');
            }
        }

        $list_pddikti = DB::connection("pddikti")->table("users")->where("username", $request->username)->first();
        if ($list_pddikti != null) {
            $password = Hash::check($request->password, $list_pddikti->password);
            if ($password && $list_pddikti->role == "pddikti" && $list_pddikti->status == "Active") {
                return redirect()->route('pddikti.home');
            } else {
                return back()->with('error', 'Gagal login!');
            }
        }

        return back()->with('error', 'Gagal login!');
    }

    public function register(Request $request): RedirectResponse
    {
        $connection = "";
        if ($request->role == 'dosen') {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:istts_dosen.users',
                'email' => 'required|email|unique:istts_dosen.users',
                'password' => 'required|min:8',
                'password_confirmation' => 'required',
                'role' => 'required|in:pddikti,baa,dosen',
            ]);
            $connection = env('DB_CONNECTION_ISTTSDOSEN', '');
        } else if ($request->role == 'baa') {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:istts_kampus.users',
                'email' => 'required|email|unique:istts_kampus.users',
                'password' => 'required|min:8',
                'password_confirmation' => 'required',
                'role' => 'required|in:pddikti,baa,dosen',
            ]);
            $connection = env('DB_CONNECTION_ISTTSKAMPUS', '');
        } else if ($request->role == 'pddikti') {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:pddikti.users',
                'email' => 'required|email|unique:pddikti.users',
                'password' => 'required|min:8',
                'password_confirmation' => 'required',
                'role' => 'required|in:pddikti,baa,dosen',
            ]);
            $connection = env('DB_CONNECTION_PDDIKTI', '');
        } else {
            return back()->with('error', 'Role invalid!');
        }

        try {
            DB::connection($connection)->beginTransaction();
            Istts_dosenUser::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status' => "Active",
            ]);

            DB::connection($connection)->commit();
            return redirect()->route('login')->with('success', 'Berhasil register!');
        } catch (\Throwable $e) {
            DB::connection($connection)->rollBack();
            return back()->with("error", $e);
        }
    }
}
