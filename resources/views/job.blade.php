{{-- Book Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-2">
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
    </div>
