@extends('layout.register')

@section('content')
    <div class="flex h-screen lg:px-52 lg:py-5 flex-row-reverse bg-[#ff9900]">
        <!-- Left Section (Form) -->
        <div
            class="w-full bg-white lg:w-1/2 flex flex-col justify-center items-center px-10 py-6 relative shadow-manual-left">
            <h1 class="text-4xl font-semibold">Sign Up</h1>

            <form method="POST" action="{{ route('register') }}" class="space-y-6 w-full max-w-full">
                @csrf

                <!-- Username Field -->
                <div class="relative">
                    <label for="username"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 transition-all ease-in-out peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Username
                    </label>
                    <input required id="username" name="name" type="text" placeholder=" "
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-orange-600 peer transition-all ease-in-out"
                        value="{{ old('name') }}" />
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="relative">
                    <label for="email"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 transition-all ease-in-out peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Email
                    </label>
                    <input required id="email" name="email" type="email" placeholder=" "
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-orange-600 peer transition-all ease-in-out"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="relative">
                    <label for="password"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 transition-all ease-in-out peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Password
                    </label>
                    <input id="password" required name="password" type="password" placeholder=" "
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-orange-600 peer transition-all ease-in-out" />
                    <span id="toggle-password" class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer hidden">
                        <i id="eye-icon"
                            class="fa-regular fa-eye text-gray-400 hover:text-orange-400 transition-all duration-200"></i>
                    </span>
                    @if ($errors->has('login'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('login') }}</p>
                    @endif
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const passwordInput = document.getElementById("password");
                        const togglePassword = document.getElementById("toggle-password");
                        const eyeIcon = document.getElementById("eye-icon");

                        // Sembunyikan ikon mata saat halaman dimuat
                        togglePassword.classList.add("hidden");

                        // Tampilkan/hilangkan ikon mata saat input berubah
                        passwordInput.addEventListener("input", () => {
                            if (passwordInput.value.trim() === "") {
                                togglePassword.classList.add("hidden");
                            } else {
                                togglePassword.classList.remove("hidden");
                            }
                        });

                        // Toggle password visibility saat ikon diklik
                        togglePassword.addEventListener("click", () => {
                            const isPasswordVisible = passwordInput.type === "text";
                            passwordInput.type = isPasswordVisible ? "password" : "text";

                            // Ganti ikon
                            eyeIcon.classList.toggle("fa-eye");
                            eyeIcon.classList.toggle("fa-eye-slash");
                        });
                    });
                </script>

                <!-- Password Confirmation Field -->
                <div class="relative">
                    <label for="password_confirmation"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 transition-all ease-in-out peer-focus:px-2 peer-focus:text-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Confirm Password
                    </label>
                    <input required id="password_confirmation" name="password_confirmation" type="password" placeholder=" "
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-orange-600 peer transition-all ease-in-out" />
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
                <div class="items-center lg:hidden block text-center">
                    <p>Already Had Account?
                        <a href="{{ route('login') }}"
                            class="text-orange-400 hover:text-orange-400 transition hover:underline">Login Here</a>
                    </p>
                </div>
            </form>

            <!-- Copyright Text Fixed at Bottom -->
            <div class="absolute bottom-0 w-full text-center py-4 text-sm text-gray-500">
                &copy; Make With ❤️ By Muhammad Taufik B.
            </div>
        </div>

        <!-- Right Section (Empty or Image) -->
        <div
            class="hidden lg:flex items-center justify-center text-center lg:w-1/2 bg-right bg-no-repeat z-10 from-[#fec46d] bg-gradient-to-l bg-cover shadow-manual-right">
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
