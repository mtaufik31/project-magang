@extends('layout.dashboard')

@section('content')

<section class="pt-3 pb-5">
    <div class="flex font-inter bg-white py-4 px-5 ">
        <a href="{{ route('dashboard') }}">
            <h2 class="hover:text-orange-400 duration-100 hover:underline">Dashboard </h2>
        </a>
        <p class="px-2"> &raquo; </p>
        <a href="">
            <h2 class="hover:text-orange-400 duration-100 hover:underline">List Staff</h2>
        </a>
    </div>
</section>

<section>
    <div class="bg-white mx-auto px-5 py-5 shadow-xl rounded-md w-full">
        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <h1 class="text-2xl pb-3 font-inter ">Staff (babu)</h1>
            <a href="{{ route('Staff.create') }}">
                <button class="bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-white text-sm">
                    <i class="fa-solid fa-plus"></i> Add Staff
                </button>
            </a>
        </div>
        <hr class="mb-4">

        <!-- Filter, Search, Sort Options -->
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

        <!-- Staff List Table -->
        <div class="w-full mb-4 font-inter ">
            <div class="bg-white shadow-sm rounded-md">
                <div class="pt-2">
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-300 rounded-md">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600">No</th>
                                    {{-- <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Photo</th> --}}
                                    <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600">Name</th>
                                    <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600">Email</th>
                                    <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600">Role</th>
                                    <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($admins as $staff)
                                <tr class="transition-colors odd:bg-white even:bg-gray-100">
                                    <td class="px-4 py-4 border-b border-gray-300 text-sm text-gray-700 ">{{ $i++ }}</td>
                                    {{-- <td class="px-4 py-4 border border-gray-300 text-sm text-gray-700 ">
                                        <img src="{{ asset('storage/' . $staff->photo) }}" alt="Staff Photo" class="w-8 h-8 rounded-full mx-auto">
                                    </td> --}}
                                    <td class="px-4 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $staff->name }}</td>
                                    <td class="px-4 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $staff->email }}</td>
                                    <td class="px-4 py-4 border-b border-gray-300 text-sm text-gray-700 ">{{ $staff->role }}</td>
                                    <td class="px-4 py-4 border-b border-gray-300  text-sm text-gray-700">
                                        <form action="{{ route('staff.delete', $staff->id) }}" method="POST" class="btn-remove">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
                                                <i class="fa-solid fa-trash"></i>
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

        <!-- Pagination -->
        <div class="flex justify-end mt-4">
            <nav class="inline-flex">
                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 rounded-l-md hover:bg-gray-200">Previous</button>
                <span class="px-4 py-2 text-sm font-medium text-gray-700 bg-blue-100">1</span>
                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 rounded-r-md hover:bg-gray-200">Next</button>
            </nav>
        </div>
    </div>
</section>


<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (Session::has('success'))
    Swal.fire({
        title: 'Success',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'Nice'
    });
    @endif

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
