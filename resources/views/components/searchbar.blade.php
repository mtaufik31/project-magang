<div class="flex items-center bg-gray-100 rounded-lg overflow-hidden  md:block">
    <form action="{{ route('search.manga') }}" method="GET" class="flex w-full">
        <input type="text" id="search-navbar" name="keyword"
               class="w-full py-2 px-4 text-sm text-gray-700 border-none bg-gray-100 focus:outline-none"
               placeholder="Search Mangas..." required>
        <button type="submit" class="flex items-center justify-center bg-orange-400 text-white px-3 hover:bg-orange-500">
            <svg class="w-3 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                 aria-hidden="true">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </button>
    </form>
</div>
