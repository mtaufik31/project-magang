@extends('layout.dashboard')


@section('content')
    <div class="pb-7">
        <h1 class="text-3xl font-semibold ">Statistik</h1>
    </div>
    <div class="flex flex-wrap md:flex-nowrap gap-4">
        <div class="bg-blue-400 text-white rounded-lg w-full md:w-1/3 lg:w-1/4 shadow-lg p-4 hover:-translate-y-2 duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <div class="text-4xl font-bold">{{ $manyManga }}</div>
                <i class="fa-solid fa-newspaper text-5xl"></i>
            </div>
            <div class="mt-4 text-lg">Manga</div>
            <a href="{{ route('List Manga') }}">
                <div class="mt-2 bg-blue-500 py-2 px-4 rounded-b-lg text-center text-white cursor-pointer hover:bg-blue-600">
                    More info →
                </div>
            </a>
        </div>

        <div class="bg-red-400 text-white rounded-lg w-full md:w-1/3 lg:w-1/4 shadow-lg p-4 hover:-translate-y-2 duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <div class="text-4xl font-bold">7</div>
                <i class="fa-solid fa-scroll text-5xl"></i>
            </div>
            <div class="mt-4 text-lg">Genre</div>
            <a href="{{ route('List Manga') }}">
                <div class="mt-2 bg-red-500 py-2 px-4 rounded-b-lg text-center text-white cursor-pointer hover:bg-red-600">
                    More info →
                </div>
            </a>
        </div>

        <div class="bg-yellow-400 text-white rounded-lg w-full md:w-1/4 lg:w-1/4 shadow-lg p-4 hover:-translate-y-2 duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <div class="text-4xl font-bold">{{ $manyStaff }}</div>
                <i class="fa-solid fa-users text-5xl"></i>
            </div>
            <div class="mt-4 text-lg">Users</div>
            <a href="{{ route('List.Staff') }}">
                <div
                    class="mt-2 bg-yellow-500 py-2 px-4 rounded-b-lg text-center text-white cursor-pointer hover:bg-yellow-600">
                    More info →
                </div>
            </a>
        </div>

        <div class="bg-green-400 text-white rounded-lg w-full md:w-1/4 lg:w-1/4 shadow-lg p-4 hover:-translate-y-2 duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <div class="text-4xl font-bold">{{ $manyBlogs }}</div>
                <i class="fa-regular fa-note-sticky text-5xl"></i>
            </div>
            <div class="mt-4 text-lg">Blogs</div>
            <a href="{{ route('List Blogs') }}">
                <div
                    class="mt-2 bg-green-500 py-2 px-4 rounded-b-lg text-center text-white cursor-pointer hover:bg-green-600">
                    More info →
                </div>
            </a>
        </div>
    </div>
@endsection
