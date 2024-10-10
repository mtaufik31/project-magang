@extends('layout.register')

@section('content')

<div class="flex h-screen lg:px-52 lg:py-5 bg-[#ff9900]">
    <!-- Left Section (Form) -->
    <div class="w-full bg-white lg:w-1/2 flex flex-col justify-center items-center px-10 py-12 relative">
        <h1 class="text-4xl font-semibold mb-3">Forgot Password?</h1>
        <p class="text-center w-[60%]">Masukkan email kalian agar kami dapat mengirimkan kode </p>

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6 w-full max-w-md">
            @csrf
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" placeholder="Email" autocomplete="off"
                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100" />
                @if ($errors->has('email'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div>
                <button type="submit"
                    class="w-full py-3 px-4 bg-[#FE9800] hover:bg-orange-500 text-white font-semibold rounded-md shadow transition duration-200">
                    SEND
                </button>
            </div>
        </form>


        <!-- Copyright Text Fixed at Bottom -->
        <div class="absolute bottom-1 w-full text-center py-4 text-sm text-gray-500">
            &copy; Make With ❤️ By <a class="hover:text-[#ff9900]" href="https://github.com/mtaufik31">Muhammad Taufik
                B.</a>
        </div>
    </div>

    <!-- Right Section (Empty or Image) -->
    <div
        class="hidden lg:flex items-center justify-center text-center lg:w-1/2 bg-right bg-no-repeat z-10 bg-[#fec46d] bg-cover">
        <div class="font-fira">
            <h1 class="text-5xl font-semibold font-inter">HELO GAIS</h1>
            <H2 class="py-5 text-2xl text-red-600">Udah Ingat <b>Password Akun</b> nya?</H2>
            <a href="{{ route('login') }}"
                class="text-black transition  bg-[#ff9900] hover:bg-[rgb(255,153,0,0.6)] py-3 px-6 rounded-lg duration-100">Balik noh
            </a>
        </div>
    </div>

@endsection
