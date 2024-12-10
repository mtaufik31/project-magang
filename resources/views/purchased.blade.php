@extends('layout.app')


@section('content')
    <div class="bg-slate-100 md:w-[65%] md:ps-4 md:pe-4 mx-auto relative shadow-xl my-16">
        <div class="flex items-center md:justify-start justify-center">
            <h1 class="font-fira text-[24px] md:px-0 pt-3 pb-2 px-6 font-medium">Purchased Manga</h1>
        </div>
        <div class="flex justify-center pb-3 md:hidden">
            <a href="{{ route('home') }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Home</h2>
            </a>
            <p class="px-2">&raquo;</p>
            <a href="{{ route('purchased') }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Purchased</h2>
            </a>
        </div>
        <hr>

        <!-- Manga List Container -->
        @if ($mangas->isEmpty())

        <div class="w-full text-center text-gray-500 py-4">
            <script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon lazy="loading" src="https://cdn.lordicon.com/wjyqkiew.json" trigger="loop"
                colors="primary:#121331,secondary:#eeaa66" style="width:100px;height:100px">
            </lord-icon>
            <p class="text-lg font-medium">You Haven't purchased any manga yet</p>
        </div>
        @else
            <div class="flex gap-4 py-4">
                @foreach ($mangas as $manga)
                <x-cardmanga :manga="$manga" id="{{ $manga->id }}" status="{{ $manga->status }}" title="{{ $manga->title }}"
                    author="{{ $manga->author }}" :description="$manga->chapters->last()->chapter_title ?? 'No chapters'" image="{{ asset('storage/' . $manga->image) }}"
                    chapter="{{ $manga->chapters->last()->chapter_number ?? 'N/A' }}">
                </x-cardmanga>
                @endforeach
            </div>
        @endif
    </div>

@endsection
