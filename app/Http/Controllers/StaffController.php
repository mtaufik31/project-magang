<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StaffController extends Controller
{
    public function index()
    {
        // Ambil data semua admin dan user
        $admins = User::where('role', 'admin')->get();
        $staffs = User::where('role', 'staff')->get();
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

        return redirect()->route('List.Staff')->with('success', 'Admin berhasil ditambahkan');
    }

    public function delete($id) {
        $staff = User::find($id);
        $staff->delete();

        return redirect()->route('List.Staff')->with('success', 'Staff berhasil dihapus');
    }
}
