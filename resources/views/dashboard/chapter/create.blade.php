@extends('layout.dashboard')

@section('content')

<section class="pt-3 pb-5">
    <!-- Breadcrumb -->
    <div class="flex px-5 py-4 bg-white shadow-xl font-inter rounded-t-xl">
        <a href="{{ route('dashboard') }}">
            <h2 class="duration-100 hover:text-orange-400 hover:underline">Dashboard</h2>
        </a>
        <p class="px-2">&raquo;</p>
        <a href="{{ route('List Manga') }}">
            <h2 class="duration-100 hover:text-orange-400 hover:underline">Manga List</h2>
        </a>
        <p class="px-2">&raquo;</p>
        <a href="#">
            <h2 class="duration-100 hover:text-orange-400 hover:underline">Add Chaptter </h2>
        </a>
    </div>
</section>

<div class="bg-white mx-auto relative px-5 py-5 shadow-xl rounded-b-xl">
    <div class="font-fira text-2xl pb-3 flex justify-between">
        <p>Add Chapter</p>
    </div>
    <hr class="mb-4">

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Judul Chapter:</label>
        <input type="text" name="title" id="title" required>

        <label for="price_points">Harga (Poin):</label>
        <input type="number" name="price_points" id="price_points" required>

        <label for="images">Upload Gambar (multiple):</label>
        <input type="file" name="images[]" id="images" multiple accept="image/*" required>

        <button type="submit">Tambah Chapter</button>
    </form>
</div>

@endsection
