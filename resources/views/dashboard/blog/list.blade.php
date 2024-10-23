@extends('layout.dashboard')

@section('content')
<section>
    <div class="bg-white mx-auto relative px-5 py-5  ">
        <div class="font-fira text-2xl pb-3 flex justify-between">
            <p>Blog List</p>
            <button class="bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-white text-sm">
                <a href="{{ route('Create blog') }}">
                    <i class="fa-solid fa-plus"></i> Add Blog
                </a>
            </button>
        </div>
        <hr class="mb-4">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1200px] bg-white border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">NO</th>
                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Title</th>
                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Description</th>
                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Image</th>
                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Created By</th>
                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Created At</th>
                        <th class="px-4 py-2 border border-gray-300 text-left text-sm font-medium text-gray-600">Updated At</th>
                        <th class="px-4 py-2 border border-gray-300 text-center text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($blogs as $blog)

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $i++ }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $blog->title }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ Str::limit($blog->description, 37) }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">
                            <img src="storage/{{ $blog->image }}" alt="Blog Image" class="w-16 h-16 rounded-md">
                        </td>
                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $blog->user->name }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $blog->created_at }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-sm text-gray-700">{{ $blog->updated_at }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-700">
                            <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-md text-sm mr-2">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>
                            <form action="{{ route('blog.delete', $blog->id) }}" method="POST">
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
</section>




@endsection
