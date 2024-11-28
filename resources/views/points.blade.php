@extends('layout.app')

@section('content')
    <section class="py-5">
        <div class="bg-slate-100 md:w-[58%] md:ps-4 md:pe-4 mx-auto relative shadow-xl">
            <div class="flex items-center md:justify-start justify-center">
                <h1 class="font-fira text-[24px] md:px-0 pt-3 pb-2 px-6 font-medium">Poin Top Up</h1>
            </div>
            <hr>

            <div class=" flex justify-center items-center">
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 py-3">
                    <a href="">
                        <div class="flex relative flex-col items-center group duration-200 hover:bg-gray-300 bg-gray-200 text-black rounded-lg w-64 overflow-hidden">
                            <!-- Logo Section -->

                            <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full mt-7">
                                <i class="fa-solid fa-coins text-3xl text-orange-500"></i>
                            </div>

                            <!-- Point Value -->
                            <p class="text-3xl font-bold my-4">10 Point</p>

                            <!-- Point Details -->
                            <div class="bg-orange-300 p-4 w-full text-center border-t duration-200 group-hover:bg-orange-400 border-slate-200">
                                <h1 class="font-fira text-xl duration-200 font-semibold text-gray-700 group-hover:text-black">Rp. 5000</h1>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="flex relative flex-col items-center group duration-200 hover:bg-gray-300 bg-gray-200 text-black rounded-lg w-64 overflow-hidden">
                            <!-- Logo Section -->

                            <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full mt-7">
                                <i class="fa-solid fa-coins text-3xl text-orange-500"></i>
                            </div>

                            <!-- Point Value -->
                            <p class="text-3xl font-bold my-4">10 Point</p>

                            <!-- Point Details -->
                            <div class="bg-orange-300 p-4 w-full text-center border-t duration-200 group-hover:bg-orange-400 border-slate-200">
                                <h1 class="font-fira text-xl duration-200 font-semibold text-gray-700 group-hover:text-black">Rp. 5000</h1>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="flex relative flex-col items-center group duration-200 hover:bg-gray-300 bg-gray-200 text-black rounded-lg w-64 overflow-hidden">
                            <!-- Logo Section -->

                            <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full mt-7">
                                <i class="fa-solid fa-coins text-3xl text-orange-500"></i>
                            </div>

                            <!-- Point Value -->
                            <p class="text-3xl font-bold my-4">10 Point</p>

                            <!-- Point Details -->
                            <div class="bg-orange-300 p-4 w-full text-center border-t duration-200 group-hover:bg-orange-400 border-slate-200">
                                <h1 class="font-fira text-xl duration-200 font-semibold text-gray-700 group-hover:text-black">Rp. 5000</h1>
                            </div>
                        </div>
                    </a>



                    <!-- Salin elemen lainnya di sini -->
                </div>
            </div>


        </div>
    </section>
@endsection
