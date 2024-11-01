@extends('layout.dashboard')

@section('content')
    <!-- Blog List Section -->
    <section class="pt-3 pb-5">
        <div class="flex font-fira bg-white shadow-xl py-4 px-5 rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">Dashboard </h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="{{ route('List.Staff') }}">
                <h2 class="hover:text-orange-400 duration-100 hover:underline"> List Blog</h2>
            </a>
        </div>
    </section>


    <section>
        <div class="bg-white mx-auto px-5 py-5 shadow-xl rounded-b-xl w-full">
            <div class="font-fira text-2xl pb-3 flex justify-between">
                <p>Blog List</p>
                <a href="{{ route('Create blog') }}">
                    <button class="bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-white text-sm">
                        <i class="fa-solid fa-plus"></i> Add Blog
                    </button>
                </a>
            </div>
            <hr class="mb-4">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                <!-- Search Bar -->
                <div class="relative md:w-1/4 w-full">
                    <input type="text" id="search-navbar"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                        placeholder="Search for employees...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                </div>

                <!-- Sort By -->
                <div class="md:w-1/4 w-full">
                    <select class="border border-gray-300 text-sm rounded-md p-2 w-full">
                        <option>Sort By: </option>
                        <option>Terbaru</option>
                        <option>Terlama</option>
                        <!-- Add more sort options as needed -->
                    </select>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-b-2 border-gray-300">No</th>
                            <th scope="col" class="px-6 py-3 border-b-2 border-gray-300">Title</th>
                            <th scope="col" class="px-6 py-3 border-b-2 border-gray-300">Description</th>
                            {{-- <th scope="col" class="px-6 py-3 border-b-2 border-gray-300">Image</th> --}}
                            <th scope="col" class="px-6 py-3 border-b-2 border-gray-300">Created By</th>
                            <th scope="col" class="px-6 py-3 border-b-2 border-gray-300">Created At</th>
                            <th scope="col" class="px-6 py-3 border-b-2 border-gray-300">Updated At</th>
                            <th scope="col" class="px-6 py-3 border-b-2 border-gray-300 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($blogs as $blog)
                            <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-3 text-gray-900">{{ $i++ }}</td>
                                <td class="px-6 py-3 text-gray-900">{{ Str::limit($blog->title, 10) }}</td>
                                <td class="px-6 py-3 text-gray-900">{{ Str::limit($blog->description, 20) }}</td>
                                {{-- <td class="px-6 py-3">
                                    <img src="storage/{{ $blog->image }}" alt="Blog Image" class="w-16 h-16 object-cover rounded-md">
                                </td> --}}
                                <td class="px-6 py-3 text-gray-900">{{ $blog->user->name }}</td>
                                <td class="px-6 py-3 text-gray-900">{{ $blog->created_at }}</td>
                                <td class="px-6 py-3 text-gray-900">{{ $blog->updated_at }}</td>
                                <td class="px-6 py-3 text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button onclick="openEditModal({{ $blog->id }}, '{{ $blog->title }}', `{{ $blog->description }}`, 'storage/{{ $blog->image }}')" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-2 rounded-md text-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <form action="{{ route('blog.delete', $blog->id) }}" method="POST" class="btn-remove">
                                            @csrf
                                            @method('delete')
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm">
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
    <div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50 hidden">
        <div class="bg-white w-1/2 rounded-lg shadow-lg p-6 relative">
            <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                <i class="fa-solid fa-times"></i>
            </button>

            <h2 class="text-xl font-bold mb-4">Edit Blog</h2>

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
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400" required>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="editDescription" name="description"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400 h-32" required></textarea>
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <div class="relative">
                        <input onchange="loadEditFile(event)" type="file" id="editImage" name="image"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*">
                        <div
                            class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-md p-4 bg-gray-50 cursor-pointer hover:border-orange-400 transition">
                            <div id="editPreviewContainer" class="text-center">
                                <img class="w-[40%] mx-auto" id="editOutput" alt="Image preview">
                                <p class="text-gray-400 mt-2" id="editPlaceholderText">Click to upload an image</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full px-4 py-2 text-white font-medium bg-orange-400 rounded-md hover:bg-orange-500 transition duration-200">
                    Update Blog
                </button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
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
