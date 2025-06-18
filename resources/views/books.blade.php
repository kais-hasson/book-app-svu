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
    </x-layout>

