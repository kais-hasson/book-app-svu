<x-layout>
<x-slot:heading>
    job listings
</x-slot:heading>
@foreach($jobs as $job)

    <li>
        <a href="/jobs/{{$job['id']}}">
            <strong>{{$job['title']}}:</strong>Pays<strong>{{$job['salary']}}</strong>
        </a>

    </li>
@endforeach
    </x-layout>

