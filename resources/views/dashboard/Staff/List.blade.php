@extends('layout.dashboard')

@section('content')
<section>
    <div class="bg-white mx-auto     px-5 py-5 shadow-sm rounded-md w-full ">
        <h1 class="text-2xl pb-3 text-center">Superadmin Dashboard</h1>
        <hr class="mb-4">

        <div class="flex flex-wrap gap-6">
            <!-- Admin List Table -->
            <div class="w-full mb-4">
                <div class="bg-white shadow-sm rounded-md">
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">ID</th>
                                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Name</th>
                                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Email</th>
                                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Role</th>
                                        <th class="px-4 py-2 border border-gray-300 text-center text-sm font-medium text-gray-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($staffs as $staff)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $i++ }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $staff->name }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $staff->email }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $staff->role }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-700">
                                            <form action="{{ route('staff.delete', $staff->id) }}" method="POST">
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


@endsection

@push('scripts')
    <script>
        @if (Session::has('success'))
        Swal.fire({
            title: 'Success',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Nice'
        })
        @endif
    </script>
@endpush
