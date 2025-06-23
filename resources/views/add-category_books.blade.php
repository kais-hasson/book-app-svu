<x-layout>
<x-slot:heading>
    books listings
</x-slot:heading>
    <x-slot:buttonName>
        <button
            onclick="document.getElementById('dialogModal').classList.remove('hidden')"
            class="bg-blue-600 text-white px-4 py-2 rounded">
            Open Dialog
        </button>
    </x-slot:buttonName>
        <body class="bg-gray-100 p-6">
        <h1 class="text-2xl font-bold mb-6">Books Listing</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($books as $book)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-semibold">{{ $book['title'] }}</h2>
                    <p class="text-gray-600 mt-2">Pays: <span class="font-bold">${{ $book['salary'] }}</span></p>
                    <a href="/book/{{ $book['id'] }}"
                       class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
        </body>
    <form id="bookForm" enctype="multipart/form-data">
        @csrf <!-- Still needed to allow CSRF token retrieval -->

        <label for="name">name:</label>
        <input type="text" name="name" id="name" required>
        <label for="rate">rate:</label>
        <input type="number" name="rate" id="rate" min="1" max="5" required>
        <label for="cover_Img">cover_Img:</label>
        <input type="file" name="cover_Img" id="cover_Img" required alt="">
        <label for="description">description:</label>
        <input type="text" name="description" id="description" required>
        <label for="writer">writer:</label>
        <input type="text" name="writer" id="writer" required>
        <label for="category_book_id">category_book_id:</label>
        <input type="text" name="category_book_id" id="category_book_id" required>
        <label for="language">language:</label>
        <input type="text" name="language" id="language" required>
        <label for="pdf_file">Upload PDF:</label>
        <input type="file" name="pdf_file" id="pdf_file"  accept="application/pdf" required>
        <button type="submit">Submit</button>

        <div id="response"></div>
    </form>
    </x-layout>
<script src="{{ asset('js/book.js') }}"></script>
