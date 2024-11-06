@extends('layout.dashboard')

@section('content')
<section class="pt-3 pb-5 ">
    <div class="flex px-5 py-4 bg-white shadow-xl font-inter rounded-t-xl">
        <a href="{{ route('dashboard') }}">
            <h2 class="duration-100 hover:text-orange-400 hover:underline">Dashboard </h2>
        </a>
        <p class="px-2"> &raquo; </p>
        <a href="">
            <h2 class="duration-100 hover:text-orange-400 hover:underline">List Genre</h2>
        </a>
    </div>
</section>
@endsection
