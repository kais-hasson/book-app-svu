
@extends('layouts.app')
                @section('content')
                    <div class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
                        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">{{ __('login') }}</h2>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror"
                                           name="password" required autocomplete="current-password">
                                    @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <input id="remember" type="checkbox" name="remember"
                                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                                <div>
                                    <button type="submit"
                                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endsection

