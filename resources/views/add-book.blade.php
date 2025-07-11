<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gray-100 p-6">
<form id="bookForm" enctype="multipart/form-data"
      class="bg-white shadow-xl rounded-2xl p-6 w-full max-w-4xl mx-auto space-y-6">
    @csrf

     First Row
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block font-semibold mb-1">Name:</label>
            <input type="text" name="name" id="name" required
                   class="w-full border rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#BAB49B]">
        </div>
        <div>
            <label for="rate" class="block font-semibold mb-1">Rate (1-5):</label>
            <input type="number" name="rate" id="rate" min="1" max="5" required
                   class="w-full border rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#BAB49B]">
        </div>
    </div>

     Second Row
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="writer" class="block font-semibold mb-1">Writer:</label>
            <input type="text" name="writer" id="writer" required
                   class="w-full border rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#BAB49B]">
        </div>
        <div>
            <label for="category_book_id" class="block font-semibold mb-1">Category Book ID:</label>
            <select name="category_book_id" required id="category_book_id" class=" form-select w-full border rounded-md px-3 py-2 bg-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['category_Name']}}</option>
                @endforeach
            </select>
        </div>
    </div>

     Third Row
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="language" class="block font-semibold mb-1">Language:</label>
            <input type="text" name="language" id="language" required
                   class="w-full border rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#BAB49B]">
        </div>
        <div>
            <label for="description" class="block font-semibold mb-1">Description:</label>
            <input type="text" name="description" id="description" required
                   class="w-full border rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#BAB49B]">
        </div>
    </div>

     Fourth Row
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="cover_Img" class="block font-semibold mb-1">Cover Image:</label>
            <input type="file" name="cover_Img" id="cover_Img" required
                   class="w-full border rounded-md px-3 py-2 bg-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>
        <div>
            <label for="pdf_file" class="block font-semibold mb-1">Upload PDF:</label>
            <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" required
                   class="w-full border rounded-md px-3 py-2 bg-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>
    </div>

     Submit Button
    <div class="text-center pt-4">
        <button type="submit"
                onclick="document.getElementById('dialogModal').classList.add('hidden')"
                class="bg-[#D8D3BE] text-white px-6 py-2 rounded-md text-lg hover:bg-[#BAB49B] transition-all">
            📤 Submit Book
        </button>
    </div>
    <div class="text-right">
        <button
            onclick="document.getElementById('dialogModal').classList.add('hidden')"
            class="bg-red-500 text-white px-4 py-2 rounded">
            Close
        </button>
    </div>
    <div id="response" class="text-center text-sm text-gray-500"></div>
</form>

</body>
<script src="{{  secure_asset('js/book.js') }}"></script>
