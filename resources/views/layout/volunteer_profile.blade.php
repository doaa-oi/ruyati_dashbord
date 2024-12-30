@extends('layout.master')

@section('contant')


@if(session()->has('send')) <!-- إضافة تنبيه لطلب المساعدة -->
<div class="bg-green-100 text-center py-4 lg:px-4">
    <div class="p-2 bg-green-200 items-center text-customGreen leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-green-300 uppercase px-2 py-1 text-xs font-bold mr-3">طلب المساعدة</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('send') }}</span>
    </div>
</div>
@endif

<div class="grid  grid-cols-1 md:grid-cols-2 gap-x-20 gap-8 md:py-16 py-60  mx-16">



<div class="grid  grid-cols-1 md:grid-cols-2 bg-white p-14 rounded-2xl text-center">

    <h2 class="col-span-2 text-xl font-bold mb-2 text-start border-b-4  ">بيانات المتطوع</h2>

    <div class="mt-3 mb-4 border-b-4 pb-4 border-l-4">
        <h1 class="font-semibold">الاسم بالكامل:</h1>
        <h1> {{ $volunteer->name }}</h1>
    </div>

  <div class="pt-3 mb-4 border-b-4 pb-4">
    <h1 class="font-semibold">المدينة:</h1>
    <h1>{{ $volunteer->city }}</h1>
  </div>

  <div class="mb-4 border-b-4 pb-4 border-l-4">
    <h1 class="font-semibold">رقم الهاتف:</h1>
    <h1>{{ $volunteer->phone }}</h1>
  </div>

  <div class="mb-4 border-b-4 pb-4">
    <h1 class="font-semibold">العمر:</h1>
    <h1>{{ $volunteer->age }} عاما</h1>
  </div>

  <div class="mb-4 border-b-4 pb-4 border-l-4">
    <h1 class="font-semibold">الأيام:</h1>
    <h1>{{ $volunteer->available_days }}</h1>
  </div>

  <div class="mb-4 border-b-4 pb-4">
    <h1 class="font-semibold">الوقت:</h1>
    <h1> من :{{ $volunteer->available_from }}    إلى : {{ $volunteer->available_to }}</h1>
  </div>

  <div class="mb-4 pb-2 ">
    <h1 class="font-semibold">المساعدة:</h1>
    <h1> {{ $volunteer->assistance_type }}</h1>
  </div>


</div>




<div class="">
    <img src="{{ asset('images/bilndv.jpg') }}" alt="Volunteer Image" class="rounded-2xl">
  </div>

<div class="col-span-2">
  <div class="flex  justify-start mt-4 gap-16">
    @php
        // استرجع الكفيف المرتبط بالمستخدم الحالي
        $blind = Auth::user()->blind;
    @endphp
<form action="{{ route('send.help.request', ['encryptedId' => Crypt::encrypt($volunteer->id), 'encryptedBlindId' => Crypt::encrypt($blind->id)]) }}" method="POST" class="inline-block">
    @csrf <!-- حماية ضد CSRF -->
        <button type="submit" class="flex items-center justify-center py-3 bg-customGreen text-white border border-customGreen hover:bg-white hover:text-green-600 rounded-lg font-bold text-sm w-56 h-12">
            <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
              <path fill="currentColor" d="M48 0C21.5 0 0 21.5 0 48v64c0 8.8 7.2 16 16 16h80V48C96 21.5 74.5 0 48 0zm208 412.6V352h288V96c0-52.9-43.1-96-96-96H111.6C121.7 13.4 128 29.9 128 48v368c0 38.9 34.7 69.7 74.8 63.1C234.2 474 256 444.5 256 412.6zM288 384v32c0 52.9-43.1 96-96 96h336c61.9 0 112-50.1 112-112 0-8.8-7.2-16-16-16H288z"/>
            </svg>
            طلب المساعدة
        </button>
    </form>

    <a href="https://wa.me/218{{ $volunteer->phone }}?call" class="flex items-center justify-center py-3 bg-none text-customGreen border border-customGreen hover:bg-customGreen hover:text-white rounded-lg font-bold text-sm w-56 h-12">
        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" fill="currentColor" class="ml-2" viewBox="0 0 448 512">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
        </svg>
        تواصل عبر واتساب
    </a>

</div>

</div>


</div>


@endsection
