@extends('layout.app')

@section('content')

<section class="py-5">
    <div class="bg-white md:w-[65%] md:px-4 mx-auto relative">
        <div class="flex flex-wrap items-center justify-between">
            <h1 class="font-fira text-[24px] md:px-0 px-3 pt-5 pb-3">
                Results for: "{{ $keyword }}"
            </h1>
        </div>

        <hr>
        <div class="text-center w-full">
            <div class="flex flex-wrap py-5 gap-8 md:gap-6 justify-center md:justify-start">
                <!-- Display each manga in a card -->
                @forelse ($mangas as $manga)
                    <x-cardmanga
                        id="{{ $manga->id }}"
                        title="{{ $manga->title }}"
                        author="{{ $manga->author }}"
                        description="{{ $manga->description }}"
                        image="{{ asset('storage/' . $manga->image) }}">
                    </x-cardmanga>
                @empty
                    <p class="text-gray-500">No results found for "{{ $keyword }}"</p>
                @endforelse
            </div>
        </div>
    </div>
</section>


@endsection
