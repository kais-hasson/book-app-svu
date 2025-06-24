<x-layout>
    <x-slot:heading>
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            Categories listings
        </h1>
        <button
            onclick="document.getElementById('dialogModal').classList.remove('hidden')"
            class="bg-[#D8D3BE] text-white px-4 py-2 rounded hover:bg-[#BAB49B]">
            Add Category
        </button>
    </x-slot:heading>
    <body class="bg-gray-100 p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($categoryBooks as $category_book)
            <div class="bg-white flex items-center justify-between rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold">{{ $category_book['category_Name'] }}</h2>
                <span class="w-10 h-10 flex items-center justify-center">
                     <a href="/book/{{ $category_book['id'] }}"
                        class="inline-block w-10 h-10 bg-white text-[#BAB49B] rounded hover:bg-gray-50 ">
                            {{ svg('mdi-dots-vertical-circle-outline') }}
                        </a>
                            </span>


            </div>
        @endforeach
    </div>
    </body>
    <div id="dialogModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-[#D8D3BE] p-6 rounded-2xl shadow-lg max-w-md w-full">
            @include('add-category_books')
        </div>
    </div>

</x-layout>
