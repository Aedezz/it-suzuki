<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login.login');
    }

    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('login.register');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Validasi login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            // Kirim pesan sukses login
            return redirect()->intended('/dashboard')->with('success', 'Haloo!, ' . Auth::user()->nama . '!');
        }

        // Jika login gagal
        return back()->withErrors(['username' => 'Invalid credentials.'])->withInput();
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:user,username',
            'password' => 'required|string|min:6|confirmed',
            'nama' => 'required|string',
            'id_level' => 'required|integer',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Proses penyimpanan data pengguna baru
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'id_level' => $request->id_level,
            'status' => 1, // Default status aktif
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan login!');
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        // Kirim pesan logout setelah logout berhasil
        return redirect()->route('dashboard')->with('logout', 'Anda telah berhasil logout!');
    }

    // Menampilkan form reset password
    public function showResetPasswordForm()
    {
        return view('login.reset_password');
    }

    public function resetPassword(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Cek apakah password saat ini cocok dengan password di database
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak valid.']);
        }

        // Update password menggunakan Query Builder
        DB::table('user')
            ->where('id', Auth::id())
            ->update(['password' => Hash::make($request->new_password)]);

        return redirect()->to('/dashboard')->with('success', 'Password berhasil diubah!');
    }


}
