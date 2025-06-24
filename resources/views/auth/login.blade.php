@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">{{ __('Login') }}</h2>

            {{-- Use JS to handle login and get Passport token --}}
            <form id="loginForm">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                    <input id="email" type="email"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           name="email" required autocomplete="email" autofocus>
                    <p id="emailError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           name="password" required autocomplete="current-password">
                    <p id="passwordError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input id="remember" type="checkbox" name="remember"
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
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
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#D8D3BE] hover:bg-[#BAB49B] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Clear previous errors
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';
            document.getElementById('emailError').classList.add('hidden');
            document.getElementById('passwordError').classList.add('hidden');

            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ email, password })
            });

            const data = await response.json();

            if (response.ok && data.token) {
                localStorage.setItem('token', data.token); // ✅ Save the token
                window.location.href = '/dashboard-ui';     // 🔄 Redirect after login
            } else {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Show validation errors
                    if (data.errors?.email) {
                        document.getElementById('emailError').textContent = data.errors.email[0];
                        document.getElementById('emailError').classList.remove('hidden');
                    }
                    if (data.errors?.password) {
                        document.getElementById('passwordError').textContent = data.errors.password[0];
                        document.getElementById('passwordError').classList.remove('hidden');
                    }
                }
            }
        });
    </script>
@endsection
