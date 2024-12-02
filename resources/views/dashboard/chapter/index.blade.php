@extends('layout.dashboard')

@section('content')
    <section class="pt-3 pb-5 ">
        <div class="flex px-5 py-4 bg-white shadow-xl font-inter rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Dashboard</h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">List Manga</h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Detail Manga</h2>
            </a>
        </div>
    </section>

    <section>
        <div class="">
            <div
                class="bg-white w-full md:w-full mx-auto py-5 px-6 my-4 rounded-t-md shadow-lg flex flex-col md:flex-row md:flex-nowrap">
                <div class="flex flex-col items-center transition-all md:items-start">
                    <div class="w-full flex justify-between judul md:border-b-2">
                        <div class="">
                            <h1 class="mb-2 text-3xl text-center text-black font-fira md:text-left ">
                                {{ $manga->title }}
                            </h1>
                            <p class="mb-2 text-center text-slate-600 md:text-left">{{ $manga->alternative }} </p>
                        </div>
                        <a class="self-center bg-orange-400 py-2 px-4 text-white"
                            href="{{ route('Edit manga', $manga->id) }}">
                            edit
                        </a>
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

    <div class="container">


        <div class="bg-white mx-auto relative px-5 py-5 shadow-xl rounded-b-xl">
            <div class="font-fira text-2xl pb-3 flex justify-between">
                <p>Chapter List for <span class="text-orange-500 underline">{{ $manga->title }}</span></p>
                <a href="{{ route('chapters.create', $manga->id) }}">
                    <button class="px-3 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        <i class="fa-solid fa-plus"></i> Add Chapter
                    </button>
                </a>
            </div>
            <hr class="mb-4">

            <table id="chapters-table" class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="text-xs text-gray-700 uppercase bg-orange-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Chapter Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cover Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider items-center">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($chapters as $chapter)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $chapter->chapter_number }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $chapter->chapter_title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ Storage::url($chapter->cover_image) }}" alt="Cover Image" width="80"
                                    class="rounded">
                            </td>
                            <td class="px-6 py-16 whitespace-nowrap items-center justify-center flex space-x-3">
                                <a href="{{ route('chapters.edit', ['mangaId' => $manga->id, 'id' => $chapter->id]) }}"
                                    class="px-3 py-2 bg-yellow-500 text-white text-xs font-medium rounded-md hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                <form
                                    action="{{ route('chapters.destroy', ['mangaId' => $chapter->manga_id, 'id' => $chapter->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-2 bg-red-500 text-white text-xs font-medium rounded-md hover:bg-red-600 transition">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- DataTables Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const table = new DataTable("#chapters-table", {
                    responsive: true,
                    language: {
                        "sEmptyTable": `
                                            <lord-icon src="https://cdn.lordicon.com/wjyqkiew.json"
                                            trigger="loop"
                                            stroke="light"
                                            colors="primary:#121331,secondary:#eeaa66"
                                            style="width:50px;height:50px">
                                            </lord-icon>
                                        <br>
                                        Data Masih Kosong`,
                        "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                        "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                        "sInfoFiltered": "(difilter dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "Tampilkan _MENU_ entri",
                        "sLoadingRecords": "Sedang memuat...",
                        "sProcessing": "Sedang memproses...",
                        "sSearch": "Cari: ",
                        "sZeroRecords": `
                                            <lord-icon src="https://cdn.lordicon.com/wjyqkiew.json"
                                            trigger="loop"
                                            stroke="light"
                                            colors="primary:#121331,secondary:#eeaa66"
                                            style="width:100px;height:100px">
                                            </lord-icon>
                                        <br>
                                        Data Tidak Ditemukan`,
                        "oPaginate": {
                            "sFirst": "<<",
                            "sLast": ">>",
                            "sNext": ">",
                            "sPrevious": "<"
                        },
                        "oAria": {
                            "sSortAscending": ": aktifkan untuk mengurutkan kolom secara ascending",
                            "sSortDescending": ": aktifkan untuk mengurutkan kolom secara descending"
                        }
                    }
                });
            });

            // Function to open the modal and pre-fill the form
            function openEditModal(id, title) {
                document.getElementById('genreId').value = id;
                document.getElementById('editTitle').value = title;
                document.getElementById('editModal').classList.remove('hidden');

                // Set the form action dynamically to update the genre with the given ID
                document.getElementById('editGenreForm').action = `GenreUpdate/${id}`;
            }

            // Function to close the modal
            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
            }

            // Confirm delete action with SweetAlert
            document.querySelectorAll('.btn-remove').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
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
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
    </div>
@endsection
