<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function showRegisterPage()
    {
        return view('auth.login');
    }

    public function registerProcess(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required',
    ],[
        'name.required' => 'Nama harus diisi.',
        'email.required' => 'Email harus diisi.',
        'email.unique' => 'Email sudah terdaftar.',
        'email.email' => 'Email harus valid.',
        'password.required' => 'Password harus diisi.',
    ]);

    $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan masuk.');

    // Coba login pengguna
    // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //     return redirect()->route('dashboardPage')->with([
    //         'notifikasi' => 'Registrasi berhasil! Selamat datang.',
    //         'type' => 'success'
    //     ]);
    // } else {
    //     return redirect()->back()->with([
    //         'notifikasi' => 'Gagal masuk setelah registrasi.',
    //         'type' => 'error'
    //     ]);
    // }
}
    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            $user = Auth::user();
            $request->session()->regenerate();

            if ($user->role === 'pengelola'){
                return redirect()->route('laporanSensorPage')->with([
                    'notifikasi' => 'Selamat Datang ',
                    'type' => 'success'
                ]);
            } elseif ($user->role === 'pelanggan'){
                return redirect()->route('dashboardPage')->with([
                    'notifikasi' => 'Selamat Datang ',
                    'type' => 'success'
                ]);
            }
        }

        return redirect()->back()->withInput()->with([
            'notifikasi' => 'Login Failed!',
            'type' => 'error'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginPage')->with([
            'notifikasi' => 'Anda berhasil logout!',
            'type' => 'success'
        ]);
    }
}
