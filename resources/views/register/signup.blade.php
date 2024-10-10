@extends('layout.register')

@section('content')
    <div class="flex h-screen lg:px-52 lg:py-5 flex-row-reverse bg-[#ff9900]">
        <!-- Left Section (Form) -->
        <div class="w-full bg-white lg:w-1/2 flex flex-col justify-center items-center px-10 py-6 relative shadow-manual-left">
            <h1 class="text-4xl font-semibold">Sign Up</h1>

            <form method="POST" action="{{ route('register') }}" class="space-y-6 w-full max-w-full">
                @csrf

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-lg font-medium text-gray-700">Username</label>
                    <input id="username" name="name" type="text" placeholder="Username"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 max-w-full"
                        value="{{ old('name') }}" />
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" placeholder="Email"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 max-w-full"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="relative">
                    <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 max-w-full" />
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Confirmation Field -->
                <div class="relative">
                    <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirm
                        Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Confirm Password"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 max-w-full" />
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-[#FE9800] hover:bg-orange-500 text-white font-semibold rounded-md shadow transition duration-200">
                        SIGN UP
                    </button>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
            </form>

            <!-- Copyright Text Fixed at Bottom -->
            <div class="absolute bottom-0 w-full text-center py-4 text-sm text-gray-500">
                &copy; Make With ❤️ By Muhammad Taufik B.
            </div>
        </div>

        <!-- Right Section (Empty or Image) -->
        <div
            class="hidden lg:flex items-center justify-center text-center lg:w-1/2 bg-right bg-no-repeat z-10 bg-[#fec46d] bg-cover shadow-manual-right">
            <div class="font-fira">
                <h1 class="text-5xl font-semibold font-inter">HELO GAIS</h1>
                <H2 class="py-5 text-2xl">Udah Punya <b>Akun?</b></H2>
                <a href="{{ route('login') }}"
                    class="text-black transition  bg-[#ff9900] hover:bg-[rgb(255,153,0,0.6)] py-3 px-6 rounded-lg duration-100">Login
                    Noh
                </a>
            </div>
        </div>
    </div>
@endsection
