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

    public function showNotSubscriberPage()
    {
        return view('not-subscriber');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password|min:8'
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'email.email' => 'Email harus valid.',
            'password.required' => 'Password harus diisi.',
            'password_confirmation.required' => 'Konfirmasi password harus diisi.',
            'password_confirmation.same' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('loginPage')->with([
            'notifikasi' => 'Registrasi berhasil! Selamat datang.',
            'type' => 'success'
        ]);
    }
    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();

            return redirect()->route('dashboardPage')->with([
                'notifikasi' => 'Selamat Datang ' . $user->name,
                'type' => 'success'
            ]);
        }

        return redirect()->back()->with([
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
