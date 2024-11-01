@extends('layout.register')

@section('content')
    <div class="flex h-screen lg:px-52 lg:py-5 bg-[#ff9900]">

        <!-- Left Section (Form) -->
        <div
            class="w-full bg-white lg:w-1/2 flex flex-col justify-center items-center px-10 py-12 relative shadow-manual-left">
            <h1 class="text-4xl font-semibold mb-3">Forgot Password?</h1>
            <p class="text-center md:w-[70%] w-[90%] ">Masukkan email kalian agar kami dapat <span class="text-[#ff9900]">
                    mengirimkan kode
                </span> </p>

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6 w-full max-w-full">
                @csrf
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Email Field -->
                <div class="relative">
                    <label for="email"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 transition-all ease-in-out peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder=" "
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer transition-all ease-in-out" />
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
                <div class="items-center lg:hidden block text-center">
                    <p>Remember You're Password?
                        <a href="{{ route('login') }}"
                            class="text-orange-400 hover:text-orange-400 transition hover:underline">Login Here</a>
                    </p>
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
            class="hidden lg:flex items-center justify-center text-center lg:w-1/2 bg-right bg-no-repeat z-10 bg-[#fec46d] bg-cover shadow-manual-right">
            <div class="font-fira">
                <h1 class="text-5xl font-semibold font-inter">HELO GAIS</h1>
                <H2 class="py-5 text-2xl text-red-600">Udah Ingat <b>Password Akun</b> nya?</H2>
                <a href="{{ route('login') }}"
                    class="text-black transition  bg-[#ff9900] hover:bg-[rgb(255,153,0,0.6)] py-3 px-6 rounded-lg duration-100">Balik
                    noh
                </a>
            </div>
        </div>
    </div>
@endsection
