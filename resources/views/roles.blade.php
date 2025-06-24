<x-layout>
    <x-slot:heading>
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            Roles Listings
        </h1>

        <button
            onclick="document.getElementById('dialogModal').classList.remove('hidden')"
            class="bg-[#D8D3BE] text-white px-4 py-2 rounded hover:bg-[#BAB49B]">
            Add Role
        </button>
    </x-slot:heading>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-[#BAB49B] rounded-lg overflow-hidden">
            <thead>
            <tr class="bg-[#BAB49B] text-left">
                <th class="py-3 px-4 border-b">Role</th>
                <th class="py-3 px-4 border-b">Number Of Users</th>
                <th class="py-3 px-4 border-b">Date Of Created Role</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr
                    onclick="window.location.href='/roles/{{ $role->id }}'"
                    class="cursor-pointer transition-colors duration-300 {{ $loop->even ? 'bg-[#D8D3BE]' : 'bg-gray-50' }} hover:bg-gray-200"
                >
                    <td class="py-3 px-4 border-b">{{ $role->role_name }}</td>
                    <td class="py-3 px-4 border-b">{{ $role->user_count }}</td>
                    <td class="py-3 px-4 border-b">{{ $role->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="dialogModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-[#D8D3BE] p-6 rounded-2xl shadow-lg max-w-md w-full">
            @include('add-category_books')
        </div>
    </div>
</x-layout>

{{--<script src="{{ asset('js/book.js') }}"></script>--}}
