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
                class="bg-white w-[80%] mx-auto py-5 px-6 my-10 rounded-sm shadow-lg flex flex-col md:flex-row md:flex-nowrap">
                <div class="flex flex-col transition-all items-center md:items-start">
                    <div class="judul md:border-b-2 w-full">
                        <h1 class="text-black font-fira text-3xl text-center md:text-left mb-2 ">
                            {{ $manga->title }}
                        </h1>
                        <p class="mb-2 text-slate-600 text-center md:text-left">{{ $manga->alternative }} </p>
                    </div>

                    <!-- Flex container for isi-kiri and isi-kanan -->
                    <div class="flex flex-col md:flex-row md:pt-5   ">

                        <!-- Left Section: Image and Info -->
                        <div class="isi-kiri flex flex-col items-center md:items-start">
                            <img class="w-[210px] h-[310px] mb-4 shadow-xl" src="{{ asset('storage/' . $manga->image) }}"
                                alt="">
                            <div class="space-y-3">
                                <div
                                    class="w-[210px] flex justify-between items-center px-4 py-2 bg-gray-200 rounded-lg shadow">
                                    <span class="text-gray-500 mr-2">Status</span>
                                    <span class="text-[#ff9900] uppercase font-medium">{{ $manga->status }}</span>
                                </div>
                                <div
                                    class="w-[210px] flex justify-between items-center px-4 py-2 bg-gray-200 rounded-lg shadow">
                                    <span class="text-gray-500 mr-2">Rating</span>
                                    <span class="text-black">{{ $manga->rating }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section: Synopsis -->
                        <div class="isi-kanan w-full mt-8 md:ml-10 md:mt-0">
                            <h2 class="text-2xl text-[#ff9900] font-semibold mb-2">Sinopsis</h2>
                            <p class="text-gray-700">
                                {{ $manga->description }}

                            </p>

                            <!-- Released and Author Section -->
                            <div class="baris-satu flex pt-5 gap-5">
                                <x-statusmanga judul="Released">{{ $manga->released_year }}</x-statusmanga>
                                <x-statusmanga judul="Author">{{ $manga->author }}</x-statusmanga>
                            </div>

                            <!-- Artist Section -->
                            <div class="baris-satu flex pt-3 gap-5">
                                <x-statusmanga judul="Artist">{{ $manga->artist }}</x-statusmanga>
                            </div>

                            <!-- Publisher and Another Released Section -->
                            <div class="baris-satu flex pt-3 gap-5 ">
                                <x-statusmanga judul="Publisher">{{ $manga->publisher }}</x-statusmanga>
                                <x-statusmanga judul="Posted By">{{ $manga->user->name}}</x-statusmanga>
                            </div>
                            <div class="baris-satu flex pt-3 gap-5">
                                <x-statusmanga judul="Posted On">{{ $manga->created_at->format('F d, Y') }}</x-statusmanga>
                                <x-statusmanga judul="Updated On">{{ $manga->updated_at->format(' F d, Y h:i:s')}}</x-statusmanga>
                            </div>
                            <div class="baris-satu flex pt-3 ">
                                <div class="w-full md:w-1/2">
                                    <h2 class="mb-2 text-[18px]">Genre</h2>
                                    @foreach ( $manga->getGenre() as $genre )

                                    <x-buttongenre route="{{ route('genre.sort', $genre->id) }}">{{ $genre->title }}</x-buttongenre>
                                    @endforeach
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
