@extends('layout.app')

@section('content')

<section class="py-5">
        <div class="bg-slate-100 md:w-[71%] mx-auto relative px-3">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Blog</h1>
            </div>

            <hr>
            <div class="">
                <div class="flex flex-wrap justify-center py-6 gap-10">
                    <!-- Card 1 -->
                    @foreach ($blogs as $blog)
                    <x-cardblog id="{{ $blog->id }}"
                        title="{{ $blog->title }}"
                        description="{!! $blog->description !!}"
                        image="{{ $blog->image }}"
                        name="{{ $blog->user->name }} - {{ $blog->updated_at->format('d-m-Y') }}">
                    </x-cardblog>
                    @endforeach
                    {{-- <a href="{{ route('blog') }}" class="min-w-[200px]  text-start block">
                        <div class="w-[250px] h-[160px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <div class="w-[250px]   ">
                            <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 ">Bagaimana Cara Membuat akun di Website MangaLo?</h3>
                            <p class="text-gray-500 text-[14px]">Masih Banyak Yang kebingungan cara...</p>
                            <p class="text-[12px]"><span class=" italic">BudiJago -</span> Nov 12, 2024</p>
                        </div>
                    </a>
                    <a href="{{ route('blog') }}" class="min-w-[200px]  text-start block">
                        <div class="w-[250px] h-[160px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <div class="w-[250px]   ">
                            <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 ">Bagaimana Cara Membuat akun di Website MangaLo?</h3>
                            <p class="text-gray-500 text-[14px]">Masih Banyak Yang kebingungan cara...</p>
                            <p class="text-[12px]"><span class=" italic">BudiJago -</span> Nov 12, 2024</p>
                        </div>
                    </a>
                    <a href="{{ route('blog') }}" class="min-w-[200px]  text-start block">
                        <div class="w-[250px] h-[160px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <div class="w-[250px]   ">
                            <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 ">Bagaimana Cara Membuat akun di Website MangaLo?</h3>
                            <p class="text-gray-500 text-[14px]">Masih Banyak Yang kebingungan cara...</p>
                            <p class="text-[12px]"><span class=" italic">BudiJago -</span> Nov 12, 2024</p>
                        </div>
                    </a> --}}
                    <!-- Tambahan Card jika diperlukan -->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

@endsection
