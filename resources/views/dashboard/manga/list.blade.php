@extends('layout.dashboard')

@section('content')
    <section class="pt-3 pb-5">
        <!-- Breadcrumb -->
        <div class="flex font-fira bg-white py-4 px-5">
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
        <div class="bg-white mx-auto px-5 py-5 shadow-sm rounded-md w-full">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl pb-3">Manga List</h1>
                <a href="{{ route('Create manga') }}">
                    <button class="bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-white text-sm">
                        <i class="fa-solid fa-plus"></i> Add Manga
                    </button>
                </a>
            </div>
            <hr class="mb-4">

            <div class="w-full mb-4">
                <div class="bg-white shadow-sm rounded-md">
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th
                                            class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">
                                            Image</th>
                                        <th
                                            class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">
                                            Title</th>
                                        <th
                                            class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">
                                            Status</th>
                                        <th
                                            class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">
                                            Rating</th>
                                        <th
                                            class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">
                                            Author</th>
                                        <th
                                            class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">
                                            Artist</th>
                                        <th
                                            class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">
                                            Released Year</th>
                                        <th
                                            class="px-4 py-2 border border-gray-300 text-center text-sm font-medium text-gray-600">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($mangas as $manga)
                                        <tr class="hover:bg-gray-50 transition-colors odd:bg-white even:bg-gray-200">

                                            <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700"><img
                                                    src="storage/{{ $manga->image }}" alt="Blog Image"
                                                    class="w-16 h-16 object-cover rounded-md"></td>
                                            <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">
                                                {{ Str::limit($manga->title, 20, '...') }}</td>
                                            <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">
                                                {{ ucfirst($manga->status) }}</td>
                                            <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">
                                                {{ $manga->rating }}/10</td>
                                            <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">
                                                {{ $manga->author }}</td>
                                            <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">
                                                {{ $manga->artist }}</td>
                                            <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">
                                                {{ $manga->released_year }}</td>
                                            <td
                                                class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-700 flex justify-center gap-2">
                                                <a href="{{ route('Detail Manga', $manga) }}"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md text-sm">
                                                    <i class="fa-solid fa-eye"></i> Detail
                                                </a>
                                                <a href="{{ route('Edit manga', $manga) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-md text-sm">
                                                    <i class="fa-solid fa-pen"></i> Edit
                                                </a>
                                                <form action="{{ route('Delete manga', $manga) }}" method="POST" class="inline btn-remove">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm">
                                                        <i class="fa-solid fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
