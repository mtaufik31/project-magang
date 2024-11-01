@extends('layout.dashboard')

@section('content')

<section class="pt-3 pb-5">
    <div class="flex font-inter bg-white py-4 px-5 shadow-xl">
        <a href="{{ route('dashboard') }}">
            <h2 class="hover:text-orange-400 duration-100 hover:underline">Dashboard </h2>
        </a>
        <p class="px-2"> &raquo; </p>
        <a href="{{ route('List.Staff') }}">
            <h2 class="hover:text-orange-400 duration-100 hover:underline"> List User</h2>
        </a>
        <p class="px-2"> &raquo; </p>
        <a href="">
            <h2 class="hover:text-orange-400 duration-100 hover:underline"> Create User</h2>
        </a>
    </div>
</section>

<div class="bg-white mx-auto px-5 py-5 font-inter shadow-xl rounded-md w-full ">
    <div class="text-2xl pb-3">
        <p>Tambah Staff Baru</p>
    </div>
    <hr class="mb-4">

    <form action="{{ route('staff.submit') }}" method="POST">
        @csrf
        <div class="flex flex-wrap gap-3">
            <!-- Input for Name -->
            <div class="w-full">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400" required>
            </div>

            <!-- Input for Email -->
            <div class="w-full">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400" required>
            </div>

            <!-- Input for Password -->
            <div class="w-full">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400" required>
            </div>

            <!-- Input for Password Confirmation -->
            <div class="w-full">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400" required>
            </div>

            <!-- Submit Button -->
            <div class="w-full mt-3">
                <button type="submit"
                    class="w-full px-4 py-2 text-white font-medium bg-orange-500 rounded-md hover:bg-orange-600 transition duration-200">
                    Tambah Staff
                </button>
            </div>
        </div>
    </form>
</div>


@endsection
