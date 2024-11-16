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
                <div class="flex flex-col items-center transition-all md:items-start">
                    <div class="w-full judul md:border-b-2">
                        <h1 class="mb-2 text-3xl text-center text-black font-fira md:text-left ">
                            {{ $manga->title }}
                        </h1>
                        <p class="mb-2 text-center text-slate-600 md:text-left">{{ $manga->alternative }} </p>
                    </div>

                    <!-- Flex container for isi-kiri and isi-kanan -->
                    <div class="flex flex-col md:flex-row md:pt-5 ">

                        <!-- Left Section: Image and Info -->
                        <div class="flex flex-col items-center isi-kiri md:items-start">
                            <img class="w-[210px] h-[310px] mb-4 shadow-xl" src="{{ asset('storage/' . $manga->image) }}"
                                alt="">
                            <div class="space-y-3">
                                <div
                                    class="w-[210px] flex justify-between items-center px-4 py-2 bg-gray-200 rounded-lg shadow">
                                    <span class="mr-2 text-gray-500">Status</span>
                                    <span
                                        class="font-medium uppercase px-2 py-1 rounded
                                        {{ $manga->status === 'ongoing' ? 'text-orange-600' : ($manga->status === 'complete' ? 'text-green-600 ' : 'text-gray-500 ') }}">
                                        {{ $manga->status }}
                                    </span>
                                </div>
                                <div
                                    class="w-[210px] flex justify-between items-center px-4 py-2 bg-gray-200 rounded-lg shadow">
                                    <span class="mr-2 text-gray-500">Rating</span>
                                    <span class="text-black">{{ $manga->rating }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section: Synopsis -->
                        <div class="w-full mt-8 isi-kanan md:ml-10 md:mt-0">
                            <h2 class="text-2xl text-[#ff9900] font-semibold mb-2">Sinopsis</h2>
                            <p class="text-gray-700">
                                {!! $manga->description !!}

                            </p>

                            <!-- Released and Author Section -->
                            <div class="flex gap-5 pt-5 baris-satu">
                                <x-statusmanga judul="Released">{{ $manga->released_year }}</x-statusmanga>
                                <x-statusmanga judul="Author">{{ $manga->author }}</x-statusmanga>
                            </div>

                            <!-- Artist Section -->
                            <div class="flex gap-5 pt-3 baris-satu">
                                <x-statusmanga judul="Artist">{{ $manga->artist }}</x-statusmanga>
                            </div>

                            <!-- Publisher and Another Released Section -->
                            <div class="flex gap-5 pt-3 baris-satu ">
                                <x-statusmanga judul="Publisher">{{ $manga->publisher }}</x-statusmanga>
                                <x-statusmanga judul="Posted By">{{ $manga->user->name }}</x-statusmanga>
                            </div>
                            <div class="flex gap-5 pt-3 baris-satu">
                                <x-statusmanga judul="Posted On">
                                    {{ $manga->created_at->setTimezone('Asia/Jakarta')->format('d F, Y ') }}
                                </x-statusmanga>
                                <x-statusmanga judul="Updated On">
                                    {{ $manga->updated_at->setTimezone('Asia/Jakarta')->format('d F, Y ') }}
                                </x-statusmanga>
                            </div>
                            <div class="flex pt-3 baris-satu">
                                <div class="w-1/4 md:w-max">
                                    <h2 class="mb-2 text-[18px]">Genre</h2>
                                    <div class="flex flex-wrap gap-2">
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
@endsection
