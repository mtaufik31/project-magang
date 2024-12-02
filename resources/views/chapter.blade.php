@extends('layout.app')

@section('content')
    <div class="container">
        <h1>{{ $chapter->chapter_title }}</h1>
        <p>Chapter {{ $chapter->chapter_number }}</p>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            {{-- @foreach ($images as $file)
                @if (in_array(strtolower(pathinfo($file['nama'], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ $file['url'] }}" alt="Page {{ $loop->iteration }}" class="chapter-image" loading="lazy">
                @endif
            @endforeach --}}
            @foreach ($images as $image)
                <img src="{{ asset('storage/' . $chapter->content_path . '/' . $image) }}" alt="Page {{ $loop->iteration }}" class="chapter-image" loading="lazy">
            @endforeach
            <img src="{{ asset('storage/' . $chapter->content_path . '/5.rawkuma.com.jpg') }}" alt="">
        </div>
    </div>
@endsection
