@extends('layout.app')

@section('content')
    <section>
        <div class="bg-white w-[90%] mx-auto py-5 px-6 my-10 rounded-sm shadow-lg">
            <div class="flex flex-col md:flex-row transition-all justify-center md:items-start">
                <div class="font-poppins py-2 md:w-1/2 ">
                    <h1 class="text-black text-3xl text-center md:text-left font-semibold mb-2">
                        {{ $blog->title }}
                    </h1>
                    <p class="text-[12px] text-center md:text-left border-b mb-2">
                        <span class="italic">{{ $blog->user->name }} -</span> {{ $blog->updated_at->format('d-F-Y') }}
                    </p>
                    <div class="">
                        <div class="image md:w-1/2 flex md:hidden justify-center items-center my-5 md:mt-0">
                            <img class="w-[100%] rounded-lg" src="{{ asset('storage/' . $blog->image) }}" alt="MangaLo">
                        </div>
                        <p class="text-gray-700 ">
                            {!!$blog->description!!}
                        </p>
                    </div>
                </div>
                <div class="md:w-1/2 justify-center items-center mt-5 md:mt-0 hidden md:block">
                    <img class="w-[80%] mx-auto rounded-lg" src="{{ asset('storage/' . $blog->image) }}" alt="MangaLo">
                </div>
            </div>
        </div>
    </section>
@endsection

