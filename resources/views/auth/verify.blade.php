@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="bg-white p-8 rounded shadow">
                <h2 class="text-center text-2xl font-bold mb-6 text-gray-900">
                    {{ __('Verify Your Email Address') }}
                </h2>

                <div class="space-y-4 text-gray-700">
                    @if (session('resent'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p>
                        {{ __('If you did not receive the email') }},
                    <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="text-indigo-600 hover:text-indigo-800 focus:outline-none focus:underline">
                            {{ __('click here to request another') }}
                        </button>.
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
