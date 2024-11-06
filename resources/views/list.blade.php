@extends('layout.app')

@section('content')

<section class="py-5">
    <div class="bg-white md:w-[65%] md:ps-4 mx-auto relative">
        <div class="flex flex-wrap items-center justify-between">
            <h1 class="font-fira text-[24px] md:px-0 px-3">Manga List</h1>
            <div class="flex items-center px-4 py-4 font-fira space-x-7 bg-gradient-to-l from-orange-300">
                <h1 class="font-semibold text-[20px]">Order By</h1>
                <!-- Dropdown for Tablet and Mobile -->
                <div class="relative cursor-pointer md:hidden">
                    <select class="block w-full p-2 bg-white border rounded-md shadow-sm cursor-pointer"
                        onchange="window.location.href = '{{ route('list') }}?sort=' + this.value">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                        <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>A-Z</option>
                        <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Z-A</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>
                <!-- Links for Desktop -->
                <div class="hidden md:flex space-x-7">
                    <a href="{{ route('list') }}?sort=latest"
                        class="font-light hover:text-orange-600 duration-200 {{ request('sort') == 'latest' ? 'text-orange-600' : '' }}">Latest</a>
                    <a href="{{ route('list') }}?sort=a-z"
                        class="font-light hover:text-orange-600 duration-200 {{ request('sort') == 'a-z' ? 'text-orange-600' : '' }}">A-Z</a>
                    <a href="{{ route('list') }}?sort=z-a"
                        class="font-light hover:text-orange-600 duration-200 {{ request('sort') == 'z-a' ? 'text-orange-600' : '' }}">Z-A</a>
                    <a href="{{ route('list') }}?sort=oldest"
                        class="font-light hover:text-orange-600 duration-200 {{ request('sort') == 'oldest' ? 'text-orange-600' : '' }}">Oldest</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="w-full text-center">
            <div class="flex flex-wrap justify-center gap-8 py-5 md:gap-6 md:justify-start">
                @foreach ($mangas as $manga)
                    <x-cardmanga id="{{ $manga->id }}" title="{{ $manga->title }}" author="{{ $manga->author }}"
                        description="{{ $manga->description }}" image="{{ asset('storage/' . $manga->image) }}">
                    </x-cardmanga>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection
