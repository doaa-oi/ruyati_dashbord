@extends('layoutv.master')

@section('contant')


@if(session()->has('success'))
<div class="bg-green-800 text-center py-4 lg:px-4">
    <div class="p-2 bg-green-700 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-green-400 uppercase px-2 py-1 text-xs font-bold mr-3">نجاح</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('success') }}</span>
    </div>
</div>
@endif



<div class="grid  grid-cols-1 md:grid-cols-2 gap-x-20 gap-8 md:py-16 py-60  mx-16">



<div class="grid  grid-cols-1 md:grid-cols-2 bg-white p-14 rounded-2xl text-center">

    <h2 class="col-span-2 text-xl font-bold mb-2 text-start border-b-4  ">بيانات الكفيف</h2>

    <div class="mt-3 mb-4 border-b-4 pb-4 border-l-4">
        <h1 class="font-semibold">الاسم بالكامل:</h1>
        <h1>  {{ $blind->name }}</h1>
    </div>

  <div class="pt-3 mb-4 border-b-4 pb-4">
    <h1 class="font-semibold">المدينة:</h1>
    <h1>{{ $blind->city }}</h1>
  </div>

  <div class="mb-4 border-b-4 pb-4 border-l-4">
    <h1 class="font-semibold">رقم الهاتف:</h1>
    <h1>{{ $blind->phone }}</h1>
  </div>

  <div class="mb-4 border-b-4 pb-4">
    <h1 class="font-semibold">العمر:</h1>
    <h1>{{ $blind->age }} عاما</h1>
  </div>




</div>




<div class="">
    <img src="{{ asset('images/bilndv.jpg') }}" alt="Volunteer Image" class="rounded-2xl">
  </div>

<div class="col-span-2">
  <div class="flex  justify-start mt-4 mr-36 gap-10">



    <a href="https://wa.me/{{ $blind->phone }}?call" class="flex items-center justify-center py-3 bg-customGreen text-white border border-customGreen hover:text-customGreen hover:bg-white rounded-lg font-bold text-sm w-56 h-12">
        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" fill="currentColor" class="ml-2" viewBox="0 0 448 512">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
        </svg>
        تواصل عبر واتساب
    </a>
    @if(request()->has('from_notification') && request()->get('from_notification') == true)


    @php
        $directAssistance = \App\Models\DirectAssistance::where('blind_id', $blind->id)
                                                         ->where('volunteer_id', Auth::user()->volunteer->id)
                                                         ->where('status','قيد التنفيذ')
                                                         ->first();
    @endphp

    @if($directAssistance)
<!-- أزرار القبول والرفض ستكون مظللة -->
<form action="{{ route('direct.assistance.approve', ['volunteerId' => Auth::user()->volunteer->id, 'blindId' => $blind->id]) }}" method="POST" class="inline-block">
    @csrf
    <button type="submit" class="flex items-center justify-center py-3 px-9 bg-blue-600 text-white border border-blue-600 rounded-lg font-bold text-sm h-12" style="opacity: 0.5;" disabled>
        قبول تقديم المساعدة
    </button>
</form>

<form action="{{ route('direct.assistance.reject', ['volunteerId' => Auth::user()->volunteer->id, 'blindId' => $blind->id]) }}" method="POST" class="inline-block">
    @csrf
    <button type="submit" class="flex items-center justify-center py-3 px-9 bg-red-600 text-white border border-red-600 rounded-lg font-bold text-sm h-12" style="opacity: 0.5;" disabled>
        رفض تقديم المساعدة
    </button>
</form>

<form action="{{ route('direct.assistance.complete', ['id' => $directAssistance->id]) }}" method="POST" class="inline-block">
    @csrf
    <button type="submit" class="flex items-center justify-center py-3 px-9 bg-blue-600 text-white border border-blue-600 hover:text-blue-600 hover:bg-white rounded-lg font-bold text-sm h-12">
        اكتمال المساعدة
    </button>
</form>

@else
<!-- حالة العادية عندما لا تكون حالته قيد التنفيذ -->
<form action="{{ route('direct.assistance.approve', ['volunteerId' => Auth::user()->volunteer->id, 'blindId' => $blind->id]) }}" method="POST" class="inline-block">
    @csrf
    <button type="submit" class="flex items-center justify-center py-3 px-9 bg-blue-600 text-white border border-blue-600 rounded-lg font-bold text-sm h-12">
        قبول تقديم المساعدة
    </button>
</form>

<form action="{{ route('direct.assistance.reject', ['volunteerId' => Auth::user()->volunteer->id, 'blindId' => $blind->id]) }}" method="POST" class="inline-block">
    @csrf
    <button type="submit" class="flex items-center justify-center py-3 px-9 bg-red-600 text-white border border-red-600 rounded-lg font-bold text-sm h-12">
        رفض تقديم المساعدة
    </button>
</form>

<!-- زر اكتمال المساعدة سيكون مظلل -->
<form action="#" method="POST" class="inline-block">
    @csrf
    <button type="submit" class="flex items-center justify-center py-3 px-9 bg-blue-600 text-white border border-blue-600 rounded-lg font-bold text-sm h-12" style="opacity: 0.5;" disabled>
        اكتمال المساعدة
    </button>
</form>
@endif

@else


    @endif

</div>

</div>


</div>


@endsection
