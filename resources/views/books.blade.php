<x-layout>
    <x-slot:heading>
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            📚 Book Listings
        </h1>
        <button
            onclick="document.getElementById('dialogModal').classList.remove('hidden')"
            class="bg-[#D8D3BE] text-white px-4 py-2 rounded hover:bg-[#BAB49B">
            Add Book
        </button>
    </x-slot:heading>


    <body> <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-2">
        @foreach($books as $book)
            <a href="/book/{{ $book['id'] }}" class="bg-[#BAB49B] hover:bg-[#D8D3BE] p-3 rounded-t-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all">
                @if(!empty($book['cover_Img']))
                    <img src="{{ asset($book['cover_Img']) }}" alt="{{ $book['name'] }}" class="w-full h-48 object-cover rounded-t-2xl">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 rounded-t-2xl">No Image</div>
                @endif

                <div class="p-4 space-y-2 bg-white">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-[#444343]">{{ $book['name'] }}</h2>
                        <p class="text-[#959594] text-sm "><strong></strong> {{ $book['rate'] ?? 'Unknown' }}</p>
                    </div>
                    <p class="text-[#959594] text-sm "><strong>Writer:</strong> {{ $book['writer'] ?? 'Unknown' }}</p>
                </div>
            </a>
        @endforeach
    </div></body>
    <!-- Modal -->

    <div id="dialogModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-[#D8D3BE]  p-6 rounded-2xl shadow-lg max-w-[60rem] w-full">
            @include('add-book',['categories'=>$categories])

        </div>
    </div>

</x-layout>
<script src="{{  asset('js/book.js') }}"></script>
