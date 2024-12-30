@extends('sign_in_up.master')

@section('title')
 اختيار نوع الحساب
@endsection

@section('title2')

<h1 class="text-center mb-16 text-3xl font-bold text-green-500"><span class="text-black">اختر</span> نوع الحساب </h1>

@endsection

@section('form')

<form class="max-w-sm mx-auto" >

    <button formaction="{{ route('volunteer.create') }}" type="submit" class="border-4 border-green-600 text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm   py-2.5 text-center mb-4 mt-6 w-60 mr-16 h-16">التسجيل كمتطوع</button>
    <button formaction="{{ route('blind.create') }}" type="submit" class="border-4 border-green-600 text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm   py-2.5 text-center mb-4 mt-6 w-60 mr-16 h-16">التسجيل ككفيف</button>

</form>



@endsection


