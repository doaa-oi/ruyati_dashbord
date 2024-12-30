{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{--
@extends('sign_in_up.master')

@section('title')
تسجيل الدخول
@endsection

@section('title2')
<h1 class="text-center mb-16 text-3xl font-bold text-green-500"><span class="text-black">تسجيل</span> الدخول </h1>
@endsection

@section('form')
<form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto">
    @csrf

    <!-- Email Address -->
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">البريد الإلكتروني</label>
        <input type="email" id="email" class="bg-gray-50 border-2 border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5 w-96" name="email" required autofocus placeholder="البريد الإلكتروني" />
        @error('email')
        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-8 mt-8">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة المرور</label>
        <input type="password" id="password" class="bg-gray-50 border-2 border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5 w-96" name="password" required autocomplete="current-password" placeholder="كلمة المرور" />
        @error('password')
        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>



    <button type="submit" class="shadow-xl shadow-gray-500	 text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm   py-2.5 text-center mb-4 mt-6 w-60 mr-16 h-11">تسجيل الدخول</button>

    <div class="mr-24">
        <p class="text-sm text-gray-500 sm:mt-0">
            ليس لديك حساب؟
            <a href="/select" class="text-green-500 underline">إنشاء حساب</a>
        </p>

    </div>
</form>
@endsection --}}
