@extends('layout.dashboard')

@section('content')

<section class="pt-3 pb-5">
    <div class="flex font-fira bg-white py-4 px-5 ">
        <a href="{{ route('dashboard') }}">
            <h2 class="hover:text-orange-400 duration-100 hover:underline">Dashboard </h2>
        </a>
        <p class="px-2"> &raquo; </p>
        <a href="">
            <h2 class="hover:text-orange-400 duration-100 hover:underline">List User</h2>
        </a>
    </div>
</section>

<section>
    <div class="bg-white mx-auto px-5 py-5 shadow-sm rounded-md w-full ">
        <div class="flex justify-between">
            <h1 class="text-2xl pb-3">Staff (babu)</h1>
            <a href="{{ route('Staff.create') }}">
                <button class="bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-white text-sm">
                    <i class="fa-solid fa-plus"></i> Add Staff
                </button>
            </a>
        </div>
        <hr class="mb-4">

        <div class="flex flex-wrap gap-6">
            <!-- Staff List Table -->
            <div class="w-full mb-4">
                <div class="bg-white shadow-sm rounded-md">
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr class="">
                                        <th class="px-4 py-3 border border-gray-300 text-left text-sm font-medium text-gray-600">ID</th>
                                        <th class="px-4 py-3 border border-gray-300 text-left text-sm font-medium text-gray-600">Name</th>
                                        <th class="px-4 py-3 border border-gray-300 text-left text-sm font-medium text-gray-600">Email</th>
                                        <th class="px-4 py-3 border border-gray-300 text-left text-sm font-medium text-gray-600">Role</th>
                                        <th class="px-4 py-3 border border-gray-300 text-left text-sm font-medium text-gray-600">Post</th>
                                        <th class="px-4 py-3 border border-gray-300 text-center text-sm font-medium text-gray-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($staffs as $staff)
                                    <tr class="transition-colors odd:bg-white even:bg-gray-200">
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $i++ }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $staff->name }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $staff->email }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $staff->role }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">Post</td>
                                        <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-700">
                                            <form action="{{ route('staff.delete', $staff->id) }}" method="POST" class="btn-remove">
                                                @csrf
                                                @method('delete')
                                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm">
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
