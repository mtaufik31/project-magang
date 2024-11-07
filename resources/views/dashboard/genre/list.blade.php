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

<section>
    <div class="w-full px-5 py-5 mx-auto bg-white shadow-xl rounded-b-xl">
        <div class="flex justify-between pb-3 text-2xl font-fira">
            <p>Genre List</p>
            {{-- <a href="{{ route('Create genre') }}">
                <button class="px-3 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                    <i class="fa-solid fa-plus"></i> Add Genre
                </button>
            </a> --}}
        </div>
        <hr class="mb-4">

        <div class="relative px-5 overflow-x-auto shadow-md sm:rounded-lg">
            <table id="genreTable" class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-orange-200">
                    <tr>
                        <th style="width: 5%" scope="col" class="px-6 py-3 border-gray-300 border-y-2">No</th>
                        <th scope="col" class="px-6 py-3 border-gray-300 border-y-2">Title</th>
                        <th scope="col" class="px-6 py-3 text-center border-gray-300 border-y-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($genres as $genre)
                        <tr
                            class="transition-colors bg-white border-b even:bg-orange-100 odd:hover:bg-gray-100 even:hover:bg-orange-50">
                            <td style="width: 5%" class="px-6 py-3 text-gray-900">{{ $i++ }}</td>
                            <td class="px-6 py-3 text-gray-900">{{ $genre->title }}</td>
                            <td class="px-6 py-3 text-left">
                                <div class="flex space-x-2">
                                    <button
                                        onclick="openEditModal({{ $genre->id }}, '{{ $genre->title }}')"
                                        class="px-3 py-2 text-sm text-white bg-yellow-400 rounded-md hover:bg-yellow-500">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <form action="{{ route('GenreDelete', $genre->id) }}" method="POST" class="btn-remove">
                                        @csrf
                                        @method('delete')
                                        <button class="px-3 py-2 text-sm text-white bg-red-500 rounded-md hover:bg-red-600">
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

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
    <div class="relative w-1/2 p-6 bg-white rounded-lg shadow-lg">
        <button onclick="closeEditModal()" class="absolute text-gray-600 top-2 right-2 hover:text-gray-900">
            <i class="fa-solid fa-times"></i>
        </button>

        <h2 class="mb-4 text-xl font-bold">Edit Genre</h2>

        <!-- Form for updating the genre -->
        <form id="editGenreForm" method="POST">
            @csrf
            @method('PUT')

            <!-- Hidden input for genre ID -->
            <input type="hidden" id="genreId" name="genreId" value="">

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="editTitle" name="title"
                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400" required>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full px-4 py-2 font-medium text-white transition duration-200 bg-orange-400 rounded-md hover:bg-orange-500">
                Update Genre
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.datatables.net/1.11.5/js/dataTables.dataTables.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const table = new DataTable("#genreTable", {
            responsive: true,
            language: {
                "sEmptyTable": `Data Masih Kosong`,
                "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                "sInfoFiltered": "(difilter dari _MAX_ entri keseluruhan)",
                "sSearch": "Cari: ",
                "sZeroRecords": `Data Tidak Ditemukan`,
                "oPaginate": {
                    "sFirst": "<<",
                    "sLast": ">>",
                    "sNext": ">",
                    "sPrevious": "<"
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

@endsection