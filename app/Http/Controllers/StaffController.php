<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        // Ambil data semua admin dan user
        $admins = User::where('role', 'admin')->get();
        $staffs = User::where('role', 'staff')->withCount('manga')->get();
        $users = User::where('role', 'user')->get();

        // Tampilkan ke view superadmin
        return view('dashboard.Staff.List', ['title' => 'List Staff'], compact('admins', 'users', 'staffs'));
    }

    public function showForm(Request $request) {
        return view('dashboard.Staff.create', ['title' => 'Staff Create'] );
    }

    public function addStaff(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat admin baru
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'staff', // Atur role sebagai admin
            'isAdmin' => 1,
        ]);

        return redirect()->route('List.Staff')->with('success', 'Staff berhasil ditambahkan');
    }

    public function delete($id) {
        if (Auth::id() == $id) {
            return redirect()->route('List.Staff')->with('error', 'Anda tidak dapat menghapus akun anda sendiri');
        }

        $staff = User::find($id);
        $staff->delete();
        return redirect()->route('List.Staff')->with('success', 'Staff berhasil dihapus');
    }

    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'staff') {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }
        return $next($request);
    }
}
