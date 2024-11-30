@extends('layout.app')
@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Welcome!",
                    text: "{{ session('success') }}", // Use the session success message here
                    icon: "success"
                });
            });
        </script>
    @endif
    <section>
        <div class="relative">
            <div class="relative w-full h-[300px] bg-fixed bg-cover bg-bottom overflow-hidden"
                style="background-image: url('{{ asset('storage/' . $manga->image) }}');">
                <div class="absolute inset-0 bg-white/30 backdrop-blur-lg"></div>
            </div>
    </section>
    <section>
        <div class="relative z-20 mt-[-200px]">
            <div
                class="bg-white w-full md:w-[81%] mx-auto py-5 px-6 my-10 rounded-t-md shadow-lg flex flex-col md:flex-row md:flex-nowrap">
                <div class="flex flex-col items-center transition-all md:items-start">
                    <div class="w-full judul md:border-b-2">
                        <h1 class="mb-2 text-3xl text-center text-black font-fira md:text-left ">
                            {{ $manga->title }}
                        </h1>
                        <p class="mb-2 text-center text-slate-600 md:text-left">{{ $manga->alternative }} </p>
                    </div>

                    <!-- isi-kiri and isi-kanan -->
                    <div class="flex flex-col md:flex-row md:pt-5 ">

                        <!-- Left Section -->
                        <div class="flex flex-col items-center isi-kiri md:items-start">
                            <img class="w-[210px] h-[310px] mb-4 shadow-xl" src="{{ asset('storage/' . $manga->image) }}"
                                alt="">
                            <div class="space-y-3">
                                <div
                                    class="w-[210px] flex justify-between bg-slate-200 py-2 items-center px-4  rounded-lg shadow">
                                    <span class="mr-2 text-gray-500">Status</span>
                                    <span
                                        class="font-medium uppercase px-2 py-1 rounded
                                        {{ $manga->status === 'ongoing' ? 'text-orange-600' : ($manga->status === 'complete' ? 'text-green-600 ' : 'text-gray-500 ') }}">
                                        {{ $manga->status }}
                                    </span>
                                </div>
                                <div
                                    class="w-[210px] flex justify-between bg-slate-200 py-3 items-center px-4  rounded-lg shadow">
                                    <span class="mr-2 text-gray-500">Rating</span>
                                    <span class="text-black">{{ $manga->rating }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section -->
                        <div class="w-full mt-8 isi-kanan md:ml-10 md:mt-0">
                            <h2 class="text-2xl text-[#ff9900] font-semibold mb-2">Sinopsis</h2>
                            <p class="text-gray-700">
                                {!! $manga->description !!}
                            </p>

                            <div class="grid grid-cols-2 md:grid-cols-4 border-gray-300 py-3">

                                <!-- Released -->
                                <div class="border-b border-r border-gray-300 p-4">
                                    <h2 class="text-sm text-gray-500 font-medium">Released</h2>
                                    <span class="text-base">{{ $manga->released_year ?? '-' }}</span>
                                </div>
                                <!-- Artist -->
                                <div class="border-b md:border-r border-gray-300 p-4">
                                    <h2 class="text-sm text-gray-500 font-medium ">Artist</h2>
                                    <span class="text-base capitalize">{{ $manga->artist }}</span>
                                </div>
                                <!-- Author -->
                                <div class="border-b border-r border-gray-300 p-4">
                                    <h2 class="text-sm text-gray-500 font-medium">Author</h2>
                                    <span class="text-base capitalize">{{ $manga->author }}</span>
                                </div>
                                <!-- publisher -->
                                <div class="border-b border-gray-300 p-4">
                                    <h2 class="text-sm text-gray-500 font-medium">Publisher</h2>
                                    <span class="text-base">{{ $manga->publisher }}</span>
                                </div>
                                <!-- Posted By -->
                                <div class="border-b border-r border-gray-300 p-4">
                                    <h2 class="text-sm text-gray-500 font-medium">Posted By</h2>
                                    <span class="text-base">{{ $manga->user->name }}</span>
                                </div>
                                <!-- Posted On -->
                                <div class="border-b md:border-r border-gray-300 p-4">
                                    <h2 class="text-sm text-gray-500 font-medium">Posted On</h2>
                                    <span class="text-base">
                                        {{ $manga->created_at->setTimezone('Asia/Jakarta')->format('F d, Y') }}
                                    </span>
                                </div>
                                <!-- Updated On -->
                                <div class="border-b border-r border-gray-300 p-4">
                                    <h2 class="text-sm text-gray-500 font-medium">Updated On</h2>
                                    <span class="text-base">
                                        {{ $manga->updated_at->setTimezone('Asia/Jakarta')->format('F d, Y') }}
                                    </span>
                                </div>
                                <div class="border-b border-gray-300 p-4">
                                    <h2 class="text-sm text-gray-500 font-medium">Rating</h2>
                                    <span class="text-base">
                                        {{ $manga->rating }}
                                    </span>
                                </div>
                            </div>


                            <div class="flex pt-3 baris-satu">
                                <div class="">
                                    <h2 class="mb-2 text-[18px]">Genre</h2>
                                    <div class="flex flex-wrap gap-4">
                                        @foreach ($manga->getGenre() as $genre)
                                            <x-buttongenre route="{{ route('genre.sort', $genre->id) }}" class="">
                                                {{ $genre->title }}
                                            </x-buttongenre>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="grid grid-cols-1 md:grid-cols-3 w-full md:w-[81%] mx-auto gap-8">
        <div class="bg-white w-full md:col-span-2  md:rounded-l-xl shadow-md my-5">
            <div class="px-6 py-4 border-b">
                <h2 class="text-2xl font-medium font-fira">Chapter Dandadan</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                <a href="" class="bg-orange-500 hover:bg-orange-400 duration-200 text-white rounded-lg py-4 px-6">
                    <h3 class="text-md font-bold">First </h3>
                    <p class="text-lg">Chapter 1</p>
                </a>
                <a href="" class="bg-orange-500 hover:bg-orange-400 duration-200 text-white rounded-lg py-4 px-6">
                    <h3 class="text-md font-bold">New </h3>
                    <p class="text-lg">Chapter 175</p>
                </a>
            </div>
            <div class="px-6 py-1 border-t">
                <div class="flex gap-4 items-center justify-between py-3">
                    <input type="text" inputmode="numeric"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 caret-orange-400"
                        placeholder="Search Chapter. Example: 25 or 178" />
                    <a href="#">
                        {{-- <i class="fa-solid fa-sort text-orange-500 hover:text-orange-300 duration-200"></i> --}}
                        <i class="fa-solid fa-arrow-down-9-1 text-orange-500 hover:text-orange-400 duration-200"></i>
                        <i class="fa-solid fa-arrow-down-1-9 text-orange-500 hover:text-orange-400 duration-200"></i>
                    </a>
                </div>
            </div>
            <div class="border-t">
                <div class="overflow-y-auto" style="max-height: 380px;">
                    <div class="gap-x-4 gap-y-6">
                        <!-- Card 1 -->
                        @for ($i = 1; $i < 100; $i++)
                        <x-cardchapter></x-cardchapter>
                        @endfor
                    </div>
                </div>
            </div>


        </div>
        <div class="bg-white w-full md:col-span-1 my-5 md:rounded-r-xl shadow-md mx-auto ransition-all">
            <div class="px-6 py-4 border-b t">
                <h2 class="text-2xl font-medium font-fira">Random Mangas</h2>
            </div>
            <div class="space-y-4 py-2">
                @foreach ($mangas as $manga)
                    <a href="{{ route('manga', $manga->id) }}">
                        <div class="flex items-center space-x-4 py-2 px-4 border-b hover:bg-gradient-to-r group hover:from-slate-1200 hover:to-transparent  duration-200 ">
                            <!-- Gambar Manga -->
                            <img src="{{ asset('storage/' . $manga->image) }}" alt="{{ $manga->title }}"
                                class="w-16 h-24 object-cover">

                            <!-- Detail Manga -->
                            <div class="flex-1">
                                <h3 class="text-base font-medium font-fira duration-200 group-hover:text-orange-400">{{ Str::limit($manga->title, 27, '...')  }}</h3>
                                <p class="text-sm text-gray-400 duration-200 group-hover:text-black">{{ $manga->released_year }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
