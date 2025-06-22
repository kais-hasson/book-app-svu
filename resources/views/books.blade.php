
<x-layout>
<x-slot:heading>
    books listings
</x-slot:heading>
@foreach($books as $book)

    <li>
        <a href="/book/{{$book['id']}}">
            <strong>{{$book['title']}}:</strong>Pays<strong>{{$book['salary']}}</strong>
        </a>

    </li>
@endforeach
    <form id="bookForm" enctype="multipart/form-data" class="flex flex-col g-1 items-center justify-between w-[75%] m-1 p-1">
        @csrf <!-- Still needed to allow CSRF token retrieval -->

        <div class="flex justify-between g-3 w-full p-1 w-[50%]">
            <div class="flex flex-col">
                <label for="name">name:</label>
                <input type="text" class="bg-[#F0F0F0] border- " name="name" id="name" required>
            </div>
            <div class="flex flex-col ">
        <label for="rate">rate:</label>
        <input type="number" class="w-[50%]"  name="rate" id="rate" min="1" max="5" required>
            </div>
        </div>

        <div class="flex justify-between g-3 w-full p-1">
                <div class="flex flex-col">
                    <label for="name">name:</label>
                    <input class="w-[50%]"  type="text" name="name" id="name" required>
                </div>
                <div class="flex flex-col">
                    <label for="rate">rate:</label>
                    <input class="w-[50%]"  type="number" name="rate" id="rate" min="1" max="5" required>
                </div>
            </div>
        <div class="flex justify-between g-3 w-full p-1">
        <div class="flex flex-col">
        <label for="cover_Img">cover_Img:</label>
        <input class="w-[50%]"  type="file" name="cover_Img" id="cover_Img" required alt="">
        </div>
        <div class="flex flex-col">
        <label for="description">description:</label>
        <input class="w-[50%]"  type="text" name="description" id="description" required>
            </div>
        </div>
        <div class="flex justify-between g-3 w-full p-1">
            <div class="flex flex-col">
        <label for="writer">writer:</label>
        <input class="w-[50%]"  type="text" name="writer" id="writer" required>
            </div>
            <div class="flex flex-col">
        <label for="category_book_id">category_book_id:</label>
        <input class="w-[50%]"  type="text" name="category_book_id" id="category_book_id" required>
            </div>
        </div>
        <div class="flex justify-between g-3 w-full p-1">
        <div class="flex flex-col">
        <label for="language">language:</label>
        <input class="w-[50%]"  type="text" name="language" id="language" required>
        </div>
            <div class="flex flex-col">
        <label for="pdf_file">Upload PDF:</label>
                <input class="w-[50%]"  type="file" name="pdf_file" id="pdf_file"  accept="application/pdf" required>
            </div>
        </div>
        <div>
        <button type="submit">Submit</button>
        </div>
        <div id="response"></div>
    </form>
    </x-layout>
<script src="{{ asset('js/book.js') }}"></script>
