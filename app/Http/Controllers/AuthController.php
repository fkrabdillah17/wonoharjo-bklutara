<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::user() != null) {
            return back();
        } else {
            return view('login.index');
        }
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required|string|exists:users,username',
            'password' => 'required|string'
        ];

        $message = [
            'username.required' => 'Username harus diisi!',
            'username.exists' => 'Username tidak terdaftar!',
            'password.required' => 'Password harus diisi!',
        ];

        $validate = $this->validate($request, $rules, $message);
        if ($validate) {
            if (Auth::attempt($request->only('username', 'password'))) {
                $check = User::where('username', $request->username)->value('role');
                if ($check == 0 || $check == 1) {
                    return redirect()->route('beranda')->with('sukses', 'Selamat datang di Menu Admin Website Desa');
                    // dd('sukses');
                } else {
                    return redirect()->route('bumdes-home')->with('sukses', 'Selamat datang di Menu SI Bumdes');
                    // dd('gagal');
                }
            } else {
                return redirect()->route('login')->with('status', 'Periksa kembali username atau password anda!');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function register()
    {
        return view('login.register');
    }
    public function store_register(Request $request)
    {

        $check = DB::table('users')->where('role', $request->role)->count();
        // dd($check);
        if ($check == 0) {
            $request->validate([
                'name' => 'required',
                'username' => 'required|unique:users,username|min:8',
                'password' => 'required|confirmed|min:8',
            ]);
            $slug = Str::of($request->name . ' ' . $request->username)->slug('-');
            // dd($slug);
            $account = new user;
            $account->role = $request->role;
            $account->name = $request->name;
            $account->slug = $slug;
            $account->username = $request->username;
            $account->password = Hash::make($request->password);
            $account->remember_token = Str::random(60);
            $account->save();
            return redirect('/register')->with('status', 'Akun Berhasil di Buat');
        } else {
            return redirect('/register')->with('status', 'Register Akun Hanya bisa Dilakukan satu Kali');
        }
    }
}
