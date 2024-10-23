@extends('layout.dashboard')


@section('content')
    <div class="flex flex-wrap md:flex-nowrap gap-4">
        <div class="bg-blue-400 text-white rounded-lg w-full md:w-1/3 lg:w-1/4 shadow-lg p-4">
            <div class="flex items-center justify-between">
                <div class="text-4xl font-bold">7</div>
                <i class="fa-solid fa-newspaper text-5xl"></i>
            </div>
            <div class="mt-4 text-lg">Manga</div>
            <div class="mt-2 bg-blue-500 py-2 px-4 rounded-b-lg text-center text-white cursor-pointer hover:bg-blue-600">
                <a href="{{ route('List Manga') }}">
                    More info →
                </a>
            </div>
        </div>

        <div class="bg-red-400 text-white rounded-lg w-full md:w-1/3 lg:w-1/4 shadow-lg p-4">
            <div class="flex items-center justify-between">
                <div class="text-4xl font-bold">7</div>
                <i class="fa-solid fa-scroll text-5xl"></i>
            </div>
            <div class="mt-4 text-lg">Chapters</div>
            <div class="mt-2 bg-red-500 py-2 px-4 rounded-b-lg text-center text-white cursor-pointer hover:bg-red-600">
                <a href="{{ route('List Manga') }}">
                    More info →
                </a>
            </div>
        </div>

        <div class="bg-yellow-400 text-white rounded-lg w-full md:w-1/4 lg:w-1/4 shadow-lg p-4">
            <div class="flex items-center justify-between">
                <div class="text-4xl font-bold">7</div>
                <i class="fa-solid fa-users text-5xl"></i>
            </div>
            <div class="mt-4 text-lg">Users</div>
            <div
                class="mt-2 bg-yellow-500 py-2 px-4 rounded-b-lg text-center text-white cursor-pointer hover:bg-yellow-600">
                <a href="{{ route('List Staff') }}">
                    More info →
                </a>
            </div>
        </div>

        <div class="bg-green-400 text-white rounded-lg w-full md:w-1/4 lg:w-1/4 shadow-lg p-4">
            <div class="flex items-center justify-between">
                <div class="text-4xl font-bold">{{ $manyBlogs }}</div>
                <i class="fa-regular fa-note-sticky text-5xl"></i>
            </div>
            <div class="mt-4 text-lg">Blogs</div>
            <div class="mt-2 bg-green-500 py-2 px-4 rounded-b-lg text-center text-white cursor-pointer hover:bg-green-600">
                <a href="{{ route('List Blogs') }}">
                    More info →
                </a>
            </div>
        </div>
    </div>
@endsection
