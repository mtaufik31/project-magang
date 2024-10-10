<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers;
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
            'name' => 'required|string|max:255|alpha_dash',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login atau dashboard setelah registrasi berhasil
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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba autentikasi user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            return redirect()->intended('/')->with('success', 'Login berhasil!'); // Pesan sukses
        }

        if ($request->email === 'taufikbudiman031@gmail.com' && $request->password === '123456789') {
            // Jika cocok, login manual tanpa cek database
            $user = User::where('email', $request->email)->first();

            // Jika user tidak ada di database, buat user baru
            if (!$user) {
                $user = User::create([
                    'name' => 'Taufik Budiman', // Anda bisa menyesuaikan nama
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 'admin' // Asumsikan ini adalah akun admin
                ]);
            }

            Auth::login($user, $request->remember_me);
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }

        // Jika autentikasi gagal
        // return back()->withErrors([
        //     'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        // ]);

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout

        // Redirect ke halaman utama atau login setelah logout
        return redirect('/')->with('berhasil', 'Anda telah berhasil logout!');
    }

    public function forgotPassword(Request $request) {
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
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
