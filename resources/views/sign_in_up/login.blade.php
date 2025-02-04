{{-- @extends('sign_in_up.master')

@section('title')
تسجيل الدخول
@endsection

@section('title2')

<h1 class="text-center mb-16 text-3xl font-bold text-green-500"><span class="text-black">تسجيل</span> الدخول </h1>

@endsection

@section('form')

<form class="max-w-sm mx-auto">
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">البريد الإلكتروني</label>
      <input type="email" id="email" class="bg-gray-50 border-2 border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block  p-2.5  w-96" placeholder="البريد الإلكتروني" required />
    </div>
    <div class="mb-8 mt-8">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة المرور</label>
      <input type="email" id="email" class="bg-gray-50 border-2 border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block  p-2.5 w-96" placeholder=" كلمة المرور" required />
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



@extends('sign_in_up.master')

@section('title')
تسجيل الدخول
@endsection

@section('title2')
<h1 tabindex="0" class="navigable text-center mb-16 text-3xl font-bold text-green-500"><span class="text-black">تسجيل</span> الدخول </h1>
@endsection

@section('form')
<form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto">
    @csrf

    <!-- Email Address -->
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">البريد الإلكتروني</label>
        <input type="email" id="email" title=" البريد الإلكتروني" tabindex="0" class="navigable bg-gray-50 border-2 border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5 w-96" name="email"  autofocus placeholder="البريد الإلكتروني" value="{{ old('email') }}" />
        @error('email')
        <span tabindex="0" class="navigable text-red-600 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-8 mt-8">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة المرور</label>
        <input type="password" id="password" title=" كلمة المرور" tabindex="0" class="navigable bg-gray-50 border-2 border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5 w-96" name="password"  autocomplete="current-password" placeholder="كلمة المرور" value="{{ old('password') }}" />
        @error('password')
        <span tabindex="0" class="navigable text-red-600 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    @error('both')
    <span tabindex="0" class="navigable text-red-600 text-sm mt-1 mr-20 font-bold" id="emailErrorMessage">
        {{ $message }}
    </span>
    <script>
        // قراءة النص عند ظهور خطأ البريد الإلكتروني
        const errorMessageElement = document.getElementById('emailErrorMessage');
        if (errorMessageElement) {
            const speech = new SpeechSynthesisUtterance(errorMessageElement.innerText);
            speech.lang = 'ar-SA'; // تعيين اللغة العربية
            window.speechSynthesis.speak(speech); // قراءة النص
        }
    </script>
    @enderror

    <button type="submit" tabindex="0" class="navigable text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm   py-2.5 text-center mb-4 mt-6 w-60 mr-16 h-11">تسجيل الدخول</button>

    <div tabindex="0" class="navigable mr-24">
        <p class="text-sm text-gray-500 sm:mt-0">
            ليس لديك حساب؟
            <a href="/select" tabindex="0" class="navigable text-green-500 underline">إنشاء حساب</a>
        </p>

    </div>
</form>
@endsection
