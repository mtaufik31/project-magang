@extends('layout.dashboard')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Manage Swiper Manga</h2>

        <!-- Add New Manga to Swiper -->
        <form action="{{ route('swiper.submit') }}" method="POST" class="mb-8">
            @csrf
            <div class="flex gap-4">
                <select name="manga_id" class="form-select flex-1">
                    <option value="">Select Manga</option>
                    @foreach ($availableMangas as $manga)
                        <option value="{{ $manga->id }}">{{ $manga->title }}</option>
                    @endforeach
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Add to Swiper
                </button>
            </div>
        </form>

        <!-- Current Swiper Manga List -->
        <div class="space-y-4" id="sortable-manga-list">
            @foreach ($swiperMangas as $swiperManga)
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg" data-id="{{ $swiperManga->id }}">
                    <div class="flex-shrink-0 w-24">

                        <img src="{{ asset('storage/' .$swiperManga->manga->image) }}" alt="{{ $swiperManga->manga->title }}"
                            class="w-full h-auto rounded">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold">{{ $swiperManga->manga->title }}</h3>
                        <p class="text-sm text-gray-600">Order: {{ $swiperManga->order }}</p>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('swiper.toggle', $swiperManga->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="px-3 py-1 rounded {{ $swiperManga->is_active ? 'bg-green-500' : 'bg-gray-500' }} text-white">
                                {{ $swiperManga->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                        <form action="{{ route('swiper.delete', $swiperManga->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
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
