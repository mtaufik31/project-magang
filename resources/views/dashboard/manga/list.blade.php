@extends('layout.dashboard')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.dataTables.min.css">

    <section class="pt-3 pb-5">
        <!-- Breadcrumb -->
        <div class="flex px-5 py-4 bg-white shadow-xl font-inter rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Dashboard</h2>
            </a>
            <p class="px-2">&raquo;</p>
            <a href="">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Manga List</h2>
            </a>
        </div>
    </section>

    <section>
        <div class="w-full px-5 py-5 mx-auto bg-white shadow-xl rounded-b-xl">
            <div class="flex items-center justify-between">
                <h1 class="pb-3 text-2xl">Manga List</h1>
                <a href="{{ route('Create manga') }}">
                    <button class="px-3 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        <i class="fa-solid fa-plus"></i> Add Manga
                    </button>
                </a>
            </div>
            <hr class="mb-4">

            <div class="relative px-5 overflow-x-auto shadow-md font-inter sm:rounded-lg">
                <table id="myTable" class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-orange-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Image</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Title</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Status</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Rating</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Posted On</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Updated On</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300">Released Year</th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-300 ">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mangas as $manga)
                            <tr
                                class="transition-colors bg-white border-b even:bg-orange-100 odd:hover:bg-gray-100 even:hover:bg-orange-50">
                                <td class="px-6 py-4 border-b border-gray-300">
                                    <img loading="lazy" src="storage/{{ $manga->image }}" alt="Manga Image"
                                        class="object-cover w-20 rounded-md h-28">
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ Str::limit($manga->title, 10, '...') }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ ucfirst($manga->status) }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ $manga->rating }}/10
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ $manga->created_at->setTimezone('Asia/Jakarta')->format('F d, H:i:s') }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ $manga->updated_at->setTimezone('Asia/Jakarta')->format('F d, H:i:s') }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    {{ $manga->released_year }}
                                </td>
                                <td class="px-6 py-4 text-center border-b border-gray-300">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('chapters.index', $manga->id) }}"
                                            class="px-3 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                            <i class="fa-solid fa-plus"></i>
                                        </a>
                                        @if (Auth::user()->role == 'admin')
                                        <a href="{{ route('Edit manga', $manga) }}"
                                            class="px-3 py-2 text-sm text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        @endif
                                        <form action="{{ route('Delete manga', $manga) }}" method="POST"
                                            class="btn-remove">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="px-3 py-2 text-sm text-white bg-red-500 rounded-md hover:bg-red-600">
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
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.dataTables.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const table = new DataTable("#myTable", {
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
    </script>

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
