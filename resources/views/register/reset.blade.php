@extends('layout.register')

@section('content')
    <div class="flex h-screen lg:px-52 lg:py-5 bg-[#ff9900]">
        <!-- Left Section (Form) -->
        <div class="w-full bg-white lg:w-1/2 flex flex-col justify-center items-center px-10 py-12 relative">
            <h1 class="text-4xl font-semibold mb-3">Reset Password</h1>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-6 w-full max-w-md">
                @csrf

                <!-- Token untuk reset password -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email Field -->
                <!-- Email Field -->
                <div class="relative">
                    <label for="email"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 transition-all ease-in-out peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder=" " value="{{ old('email') }}"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-orange-600 peer transition-all ease-in-out" />
                    @if ($errors->has('email'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- New Password Field -->
                <div class="relative mt-6">
                    <label for="password"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 transition-all ease-in-out peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        New Password
                    </label>
                    <input id="password" name="password" type="password" placeholder=" "
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-orange-600 peer transition-all ease-in-out" />
                    @if ($errors->has('password'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <!-- Confirm New Password Field -->
                <div class="relative mt-6">
                    <label for="password_confirmation"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 transition-all ease-in-out peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Confirm New Password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder=" "
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-orange-600 peer transition-all ease-in-out" />
                </div>


                <!-- Reset Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-[#FE9800] hover:bg-orange-500 text-white font-semibold rounded-md shadow transition duration-200">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
        <div
            class="hidden lg:flex items-center justify-center text-center lg:w-1/2 bg-right bg-no-repeat z-10 bg-[#fec46d] bg-cover shadow-manual-right">
            <div class="font-fira">
                <h1 class="text-5xl font-semibold font-inter">Buat Password Anda</h1>
                <H2 class="py-6 text-2xl text-red-600">Not Register Yet?</b></H2>
                <a href="{{ route('register') }}"
                    class="text-black transition  bg-[#ff9900] hover:bg-[rgb(255,153,0,0.6)] py-3 px-6 rounded-lg duration-100">Register
                    Here
                </a>
            </div>
        </div>
    </div>
@endsection
