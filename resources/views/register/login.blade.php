@extends('layout.register')

@section('content')
    <div class="flex h-screen bg-cover lg:px-52 lg:py-5 bg-white  md:bg-[#ff9900]">
        <!-- Left Section (Form) -->
        <div
            class="w-full md:bg-[url()] md:bg-white bg-[url(/public/asset/img/bg.pg)]   lg:w-1/2 flex flex-col justify-center items-center px-10 py-12 relative shadow-manual-left">
            <h1 class="text-4xl font-semibold mb-3">Sign In</h1>

            <form method="POST" action="{{ route('login') }}" class="space-y-6 w-full max-w-full">
                @csrf
                @if ($errors->has('email') && $errors->has('password'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Whoops!</strong>
                        <span class="block sm:inline">There were some problems with your input.</span>
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

                <!-- Password Field -->
                <div class="relative">
                    <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100" />
                    @if ($errors->has('email'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Remember Me and Forgot Password Section -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox"
                            class="h-4 w-4 text-orange-500 focus:ring-orange-400 border-gray-300 rounded" />
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">Keep me Signed In</label>
                    </div>

                    <div>
                        <a href="{{ route('forgot') }}"
                            class="text-sm text-gray-500 hover:text-orange-400 transition">Forgot
                            Password?</a>
                    </div>
                </div>

                <!-- Confirm Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-[#FE9800] hover:bg-orange-500 text-white font-semibold rounded-md shadow transition duration-200">
                        SIGN IN
                    </button>
                </div>

                <div class="items-center lg:hidden block">
                    <p>Not Registered Yet?
                        <a href="{{ route('register') }}"
                            class="text-blue-400 hover:text-orange-400 transition hover:underline">Register Here</a>
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
                <h1 class="text-5xl font-semibold font-inter">Silahkan Login</h1>
                <H2 class="py-6 text-2xl text-red-600">Not Register Yet?</b></H2>
                <a href="{{ route('register') }}"
                    class="text-black transition  bg-[#ff9900] hover:bg-[rgb(255,153,0,0.6)] py-3 px-6 rounded-lg duration-100">Register
                    Here
                </a>
            </div>
        </div>
    </div>
@endsection
