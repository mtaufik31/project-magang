<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register.signup', ['title' => 'MangaLo | Sign Up']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|alpha_dash|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.unique' => 'Username sudah digunakan, silakan pilih username lain.',
            'name.required' => 'Username tidak boleh kosong.',
            'name.alpha_dash' => 'Username hanya boleh mengandung huruf, angka, tanda hubung, dan underscore.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    public function showLogin()
    {
        return view('register.login', ['title' => 'MangaLo | Sign In']);
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $loginType => $request->input('login'),
            'password' => $request->input('password'),
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/dashboard')->with('success', 'You`re Dewa'); // Pesan sukses
            }
            return redirect()->intended('/')->with('success', 'Login berhasil!'); // Pesan sukses
        }

        return back()->withErrors([
            'login' => 'Ada Yang Salah awkokwko',
        ])->withInput($request->only('login'));
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout

        // Redirect ke halaman utama atau login setelah logout
        return redirect('/')->with('berhasil', 'Anda Log Out!');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Mengirim link reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->save();

                // Jika ingin langsung login setelah reset
                auth()->login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))->with('success', "Reset Password Berhasil!")
            : back()->withErrors(['email' => [__($status)]]);
    }
}
