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
