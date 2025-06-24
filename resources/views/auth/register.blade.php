
@extends('layouts.app')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="bg-white p-8 rounded shadow">
                <h2 class="mb-6 text-center text-3xl font-extrabold text-gray-900">{{ __('Register') }}</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 text-right">{{ __('Name') }}</label>
                        <input id="name" name="name" type="text" autocomplete="name" required autofocus
                               value="{{ old('name') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror">

                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 text-right">{{ __('Email Address') }}</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               value="{{ old('email') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('email') border-red-500 @enderror">

                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 text-right">{{ __('Password') }}</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('password') border-red-500 @enderror">

                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700 text-right">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" name="password_confirmation" type="password" autocomplete="new-password" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    {{-- Submit --}}
                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-[#D8D3BE] hover:bg-[#BAB49B] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
