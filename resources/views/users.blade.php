
<x-layout>
    <x-slot:heading>
        📚 Add Admin
    </x-slot:heading>
        <h1 class="text-2xl font-bold mb-4">Books Grid</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($users as $user)
                <div class="bg-white flex shadow-md rounded-lg p-4 justify-between">
                    <div class="info flex flex-col">
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-700">{{ $user->email }}</p>
                    <p class="text-gray-700">{{ $user->role['role_name'] }}</p>
                    </div>
                    <div class="user-avatar">
                            <span class="w-10 h-10 flex items-center justify-center text-[#BAB49B]">
                            {{ svg('heroicon-s-user') }}
                            </span>
                    </div>
                </div>
            @endforeach
        </div>
    </x-layout>
<script src="{{ asset('js/book.js') }}"></script>
