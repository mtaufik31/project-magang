@extends('layout.app')

@section('content')

<section class="py-5">
    <div class="bg-white md:w-[65%] md:px-4 mx-auto relative">
        <div class="flex flex-wrap items-center justify-between">
            <h1 class="font-fira text-[24px] md:px-0 px-3 pt-5 pb-3">Manga List</h1>
            <div class="font-fira flex items-center space-x-7 px-4 pt-5 pb-3">
                <h1 class="font-semibold text-[20px]">Order By</h1>
                <!-- Dropdown for Tablet and Mobile -->
                <div class="relative md:hidden cursor-pointer">
                    <select class="block w-full p-2 border rounded-md bg-white shadow-sm cursor-pointer">
                        <option value="latest">Latest</option>
                        <option value="a-z">A-Z</option>
                        <option value="z-a">Z-A</option>
                        <option value="populer">Populer</option>
                    </select>
                </div>
                <!-- Links for Desktop -->
                <div class="hidden md:flex space-x-7">
                    <a href="" class="font-light hover:text-orange-400">Latest</a>
                    <a href="" class="font-light hover:text-orange-400">A-Z</a>
                    <a href="" class="font-light hover:text-orange-400">Z-A</a>
                    <a href="" class="font-light hover:text-orange-400">Populer</a>
                </div>
            </div>
        </div>

        <hr>
        <div class="text-center w-full">
            <div class="flex flex-wrap py-5 gap-8 md:gap-6 justify-center md:justify-start">
                <!-- Card 1 -->
                <x-cardmanga></x-cardmanga>
                <x-cardmanga></x-cardmanga>
                <x-cardmanga></x-cardmanga>
                <x-cardmanga></x-cardmanga>
                <x-cardmanga></x-cardmanga>
                <x-cardmanga></x-cardmanga>
                <x-cardmanga></x-cardmanga>
                <x-cardmanga></x-cardmanga>
                <x-cardmanga></x-cardmanga>
            </div>
            {{-- @if ({{  }})
            <nav aria-label="Page navigation example">
                <ul class="flex items-center -space-x-px h-8 text-sm justify-center py-10">
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                      <span class="sr-only">Previous</span>
                      <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                  </li>
                  <li>
                    <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                      <span class="sr-only">Next</span>
                      <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                    </a>
                  </li>
                </ul>
              </nav>
            @endif --}}

        </div>
    </div>
</section>

@endsection

@section('script')

@endsection
