@extends('layout.dashboard')

@section('content')
    <section class="pt-3 pb-5">
        <!-- Breadcrumb -->
        <div class="flex font-inter bg-white py-4 px-5 shadow-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">Dashboard</h2>
            </a>
            <p class="px-2">&raquo;</p>
            <a href="">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">Manga List</h2>
            </a>
        </div>
    </section>

    <section>
        <div class="bg-white mx-auto px-5 py-5 shadow-xl rounded-md w-full">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl pb-3">Manga List</h1>
                <a href="{{ route('Create manga') }}">
                    <button class="bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-white text-sm">
                        <i class="fa-solid fa-plus"></i> Add Manga
                    </button>
                </a>
            </div>
            <hr class="mb-4">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Image</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Title</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Status</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Rating</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Author</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Artist</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Released Year</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mangas as $manga)
                            <tr class="bg-white hover:bg-gray-50 odd:bg-white even:bg-gray-100 transition">
                                <td class="px-6 py-4 border-b border-gray-300">
                                    <img src="storage/{{ $manga->image }}" alt="Manga Image" class="w-16 h-16 object-cover rounded-md">
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ Str::limit($manga->title, 20, '...') }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ ucfirst($manga->status) }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ $manga->rating }}/10
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ $manga->author }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ $manga->artist }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ $manga->released_year }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('Detail Manga', $manga) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md text-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('Edit manga', $manga) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-md text-sm">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('Delete manga', $manga) }}" method="POST" class="btn-remove">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.btn-remove').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    html: `<lord-icon
    src="https://cdn.lordicon.com/hwjcdycb.json"
    trigger="loop"
    stroke="light"
    colors="primary:#121331,secondary:#e83a30"
    style="width:150px;height:150px">
</lord-icon>`,
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
