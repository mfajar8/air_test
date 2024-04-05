<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            // Mencari pengguna berdasarkan alamat email
            $user = User::where('email', $credentials['email'])->first();

            // Jika pengguna ditemukan dan password cocok
            if ($user && Auth::attempt($credentials)) {
                // Periksa apakah peran pengguna ada dan berada di antara nilai yang diizinkan
                // 1 = Super Admin, 2 = Admin, 3 = User
                if (empty($user->role) || !in_array($user->role, [1, 2, 3]) || empty($user->status) || ($user->status === 0)) {
                    // Jika peran pengguna kosong atau tidak valid, kembalikan ke halaman login
                    Auth::logout(); // Logout pengguna
                    return redirect()->route('auth.login.form')->with('error', 'Akun belum aktif');
                }
                // Menetapkan data ke dalam sesi
                Session::put('user_id', $user->id);
                Session::put('user_email', $user->email);
                Session::put('user_name', $user->name);
                Session::put('user_role', $user->role);
                Session::put('user_position', $user->position);
                Session::put('user_pict', $user->pict);
                // Login berhasil
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, ' . $user->name . '!');
            } elseif ($user) {
                // Jika email ditemukan tetapi password tidak cocok
                return redirect()->route('auth.login.form')->with('error', 'Password salah!');
            } else {
                // Jika email tidak ditemukan
                return redirect()->route('auth.login.form')->with('error', 'Akun tidak ditemukan!');
            }
        } catch (ValidationException $e) {
            // Jika terjadi pengecualian validasi
            return redirect()->route('auth.login.form')->withErrors($e->errors())->withInput();
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function handleRegist(Request $request)
    {
        // Mengecek apakah email sudah terdaftar sebelumnya
        $existingUser = User::where('email', $request->email)->first();

        // Jika email sudah terdaftar, kembalikan dengan pesan kesalahan
        if ($existingUser) {
            return redirect(route('auth.register.form'))->with('error', 'Email sudah terdaftar!');
        }

        // Jika email belum terdaftar, buat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 0
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect(route('auth.login.form'))->with('success', 'Pendaftaran berhasil!');
    }


    public function logout()
    {
        Session::flush(); // Hapus semua data sesi pengguna
        auth()->logout();
        return redirect('/login');
    }
}
