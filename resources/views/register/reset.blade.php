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
            <div>
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}"
                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100" />
                @if ($errors->has('email'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-lg font-medium text-gray-700">New Password</label>
                <input id="password" name="password" type="password" placeholder="New Password"
                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100" />
                @if ($errors->has('password'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <!-- Password Confirmation Field -->
            <div>
                <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirm New Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password"
                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100" />
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
</div>

@endsection
