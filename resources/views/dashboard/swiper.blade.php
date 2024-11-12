@extends('layout.dashboard')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-medium mb-6">Manage Swiper Manga</h2>

        <!-- Add New Manga to Swiper -->
        <form action="{{ route('swiper.submit') }}" method="POST" class="mb-8 bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Styled Select Menu -->
                <div class="flex-1">
                    <select name="manga_id" id="manga_id"
                            class="w-full py-1  border border-gray-300 text-gray-700 rounded-lg text-[14px] focus:ring-orange-400 focus:border-orange-400">
                        <option value="" disabled selected>Select Manga</option>
                        @foreach ($availableMangas as $manga)
                            <option value="{{ $manga->id }}">{{ $manga->title }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Styled Submit Button -->
                <button type="submit"
                        class="self-end md:self-center px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition duration-200">
                    Add to Swiper
                </button>
            </div>
        </form>


        <!-- Current Swiper Manga List -->
        <div class="space-y-4" id="sortable-manga-list">
            @foreach ($swiperMangas as $swiperManga)
                <div class="flex items-center gap-4 py-2 px-4 duration-200 transition-all odd:hover:bg-gray-100 even:hover:bg-orange-50 even:bg-gray-50 odd:bg-orange-100 rounded-lg" data-id="{{ $swiperManga->id }}">
                    <div class="flex-shrink-0 w-24">

                        <img src="{{ asset('storage/' .$swiperManga->manga->image) }}" alt="{{ $swiperManga->manga->title }}"
                            class="w-full h-auto rounded">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-medium">{{ $swiperManga->manga->title }}</h3>
                        <p class="text-sm text-gray-600">Urutan: {{ $swiperManga->order }}</p>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('swiper.toggle', $swiperManga->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="px-3 py-1 rounded duration-150 transition-all {{ $swiperManga->is_active ? 'bg-green-500 hover:bg-green-400' : 'bg-gray-500 hover:bg-gray-400' }} text-white">
                                {{ $swiperManga->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                        <form action="{{ route('swiper.delete', $swiperManga->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 duration-150 transition-all bg-red-500 text-white rounded hover:bg-red-600">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
