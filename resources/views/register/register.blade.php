<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex h-screen lg:px-52 lg:py-10 flex-row-reverse bg-[#ff9900]">
        <!-- Left Section (Form) -->
        <div class="w-full bg-white lg:w-1/2 flex flex-col justify-center items-center px-10 py-6 relative">
            <h1 class="text-4xl font-semibold mb-6">Sign Up</h1>

            <form class="space-y-6 w-full max-w-full">
                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-lg font-medium text-gray-700">Username</label>
                    <input id="username" name="username" type="text" placeholder="Username"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 max-w-full" />
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" placeholder="Email"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 max-w-full" />
                </div>

                <!-- Password Field -->
                <div class="relative">
                    <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 max-w-full" />
                </div>

                <div class="relative">
                    <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password"
                        class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-orange-300 bg-gray-100 max-w-full" />
                </div>


                <!-- Confirm Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-[#FE9800] hover:bg-orange-500 text-white font-semibold rounded-md shadow transition duration-200">
                        SIGN UP
                    </button>
                </div>
            </form>


            <!-- Copyright Text Fixed at Bottom -->
            <div class="absolute bottom-1 w-full text-center py-4 text-sm text-gray-500">
                &copy; Make With ❤️
            </div>
        </div>

        <!-- Right Section (Empty or Image) -->
        <div class="hidden lg:block lg:w-1/2 bg-right bg-no-repeat z-10 bg-[#ffb84d] bg-cover">
            <!-- You can add an image or content here -->
        </div>
    </div>
</body>

</html>
