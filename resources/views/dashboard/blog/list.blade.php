@extends('layout.dashboard')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.dataTables.min.css">
    <!-- Blog List Section -->
    <section class="pt-3 pb-5">
        <div class="flex px-5 py-4 bg-white shadow-xl font-fira rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Dashboard </h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="{{ route('List.Staff') }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline"> List Blog</h2>
            </a>
        </div>
    </section>


    <section>
        <div class="w-full px-5 py-5 mx-auto bg-white shadow-xl rounded-b-xl">
            <div class="flex justify-between pb-3 text-2xl font-fira">
                <p>Blog List</p>
                <a href="{{ route('Create blog') }}">
                    <button class="px-3 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        <i class="fa-solid fa-plus"></i> Add Blog
                    </button>
                </a>
            </div>
            <hr class="mb-4">
            {{-- <form class="flex flex-wrap items-center justify-between gap-4 mb-4">
                <!-- Search Bar -->
                <div class="relative w-full md:w-1/4">
                    <input name="search" type="text" id="search-navbar" value="{{ request('search') }}"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-orange-500 rounded-lg bg-gray-50"
                        placeholder="Search for blogs...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-orange-400 fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

                <!-- Sort By -->
                <div class="w-full md:w-1/4">
                    <select name="sort" class="w-full p-2 text-sm border border-gray-300 rounded-md"
                        onchange="this.form.submit()">
                        <option value="">Sort By: </option>
                        <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                        <!-- Add more sort options as needed -->
                    </select>
                </div>
            </form> --}}
            <div class="relative px-5 overflow-x-auto shadow-md sm:rounded-lg">
                <table id="myTable" class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-orange-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-gray-300 border-y-2">No</th>
                            <th scope="col" class="px-6 py-3 border-gray-300 border-y-2">Title</th>
                            <th scope="col" class="px-6 py-3 border-gray-300 border-y-2">Description</th>
                            <th scope="col" class="px-6 py-3 border-gray-300 border-y-2">Image</th>
                            <th scope="col" class="px-6 py-3 border-gray-300 border-y-2">Created By</th>
                            <th scope="col" class="px-6 py-3 border-gray-300 border-y-2">Created At</th>
                            <th scope="col" class="px-6 py-3 border-gray-300 border-y-2">Updated At</th>
                            <th scope="col" class="px-6 py-3 text-center border-gray-300 border-y-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($blogs as $blog)
                            <tr
                                class="transition-colors bg-white border-b even:bg-orange-100 odd:hover:bg-gray-100 even:hover:bg-orange-50">
                                <td class="px-6 py-3 text-gray-900">{{ $i++ }}</td>
                                <td class="px-6 py-3 text-gray-900">{{ Str::limit($blog->title, 10) }}</td>
                                <td class="px-6 py-3 text-gray-900">{!! Str::limit($blog->description, 15) !!}</td>
                                <td class="px-6 py-3">
                                    <img src="storage/{{ $blog->image }}" alt="Blog Image"
                                        class="object-cover h-16 rounded-md w-32j">
                                </td>
                                <td class="px-6 py-3 text-gray-900">{{ $blog->user->name }}</td>
                                <td class="px-6 py-3 text-gray-900">{{ $blog->created_at }}</td>
                                <td class="px-6 py-3 text-gray-900">{{ $blog->updated_at }}</td>
                                <td class="px-6 py-3 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button
                                            onclick="openEditModal({{ $blog->id }}, '{{ $blog->title }}', `{{ $blog->description }}`, 'storage/{{ $blog->image }}')"
                                            class="px-3 py-2 text-sm text-white bg-yellow-400 rounded-md hover:bg-yellow-500">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <form action="{{ route('blog.delete', $blog->id) }}" method="POST"
                                            class="btn-remove">
                                            @csrf
                                            @method('delete')
                                            <button
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



    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="relative w-1/2 p-6 bg-white rounded-lg shadow-lg">
            <button onclick="closeEditModal()" class="absolute text-gray-600 top-2 right-2 hover:text-gray-900">
                <i class="fa-solid fa-times"></i>
            </button>

            <h2 class="mb-4 text-xl font-bold">Edit Blog</h2>

            <!-- Form for updating the blog -->
            <form id="editBlogForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Hidden input for blog ID -->
                <input type="hidden" id="blogId" name="blogId" value="">

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="editTitle" name="title"
                        class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400" required>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="editDescription" name="description"
                        class="block w-full h-32 p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400" required></textarea>
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Image</label>
                    <div class="relative">
                        <input onchange="loadEditFile(event)" type="file" id="editImage" name="image"
                            class="absolute inset-0 z-10 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                        <div
                            class="flex items-center justify-center p-4 transition border-2 border-gray-300 border-dashed rounded-md cursor-pointer bg-gray-50 hover:border-orange-400">
                            <div id="editPreviewContainer" class="text-center">
                                <img class="w-[40%] mx-auto" id="editOutput" alt="Image preview">
                                <p class="mt-2 text-gray-400" id="editPlaceholderText">Click to upload an image</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full px-4 py-2 font-medium text-white transition duration-200 bg-orange-400 rounded-md hover:bg-orange-500">
                    Update Blog
                </button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const table = new DataTable("#myTable", {
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
    </script>


    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script>
        // Function to open the modal and pre-fill the form
        function openEditModal(id, title, description, imageUrl) {
            document.getElementById('blogId').value = id;
            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;
            document.getElementById('editOutput').src = imageUrl;
            document.getElementById('editOutput').classList.remove('hidden');
            document.getElementById('editPlaceholderText').classList.add('hidden');
            document.getElementById('editModal').classList.remove('hidden');

            // Set the form action dynamically to update the blog with the given ID
            document.getElementById('editBlogForm').action = `/blog/update/${id}`;
        }

        // Function to close the modal
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Preview the uploaded image in the modal
        function loadEditFile(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('editOutput');
                output.src = reader.result;
                output.classList.remove('hidden');
                document.getElementById('editPlaceholderText').classList.add('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Confirm delete action with SweetAlert
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
