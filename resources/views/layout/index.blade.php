@extends('layout.master')

@section('contant')

@if(session()->has('success')) <!-- إضافة تنبيه للتعديل -->
<div class="bg-blue-800 text-center py-4 lg:px-4">
    <div tabindex="0" class="navigable p-2 bg-blue-700 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-blue-400 uppercase px-2 py-1 text-xs font-bold mr-3">تعديل</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('success') }}</span>
    </div>
</div>
@endif

<div class="container grid grid-cols-1 md:grid-cols-3 gap-5 justify-items-center justify-center bg-white py-6 border-b border-gray-300 fixed">

    <div class="ml-48 p-1">
        <label for="simple-search" title="هذه الواجهة تعرض معلومات " tabindex="0" class="navigable text-2xl font-bold text-black ">  المتطوعين </label>

    </div>

<div class="justify-items-center ">

            <form action="{{ route('search.volunteers') }}" method="GET" class="flex w-full">
        <input  type="text" name="query" title="هذا حقل البحث عن المتطوعين بالاسم أو المدينة أو التخصص" tabindex="0" class="navigable w-80 bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-customGreen block p-2.5" placeholder="ابحث عن المتطوعين بالاسم، المدينة، أو التخصص" required />
        <button type="submit" class="p-3 ms-2 text-sm font-medium text-white bg-customGreen rounded-lg border border-customGreen hover:bg-white hover:text-customGreen focus:ring-4 focus:outline-none focus:ring-customGreen ">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </button>
    </form>

</div>

<div class="justify-items-center">
    <a href="{{ route('help.request.create') }}" tabindex="0" class="navigable flex items-center p-2.5 ms-2 text-sm font-medium text-white bg-customGreen rounded-lg border border-customGreen group hover:bg-white hover:text-customGreen focus:ring-4 focus:outline-none focus:ring-customGreen">
        <svg class="w-4 h-4 mr-2 ml-2 text-white group-hover:text-customGreen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.7-14.3-32-32-32h-32c-17.7 0-32 14.3-32 32v144H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h144v144c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V304h144c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z"/></svg>
        إضافة طلب مساعدة
    </a>
</div>
</div>


<div class="grid  grid-cols-1 md:grid-cols-2  gap-8 md:py-36 py-60  mx-8 ">

    @if($volunteers->isEmpty())
    <div class="text-center">
        <p tabindex="0" class="navigable" >لا يوجد أشخاص مطابقون للبحث.</p>
    </div>
@else
    @foreach($volunteers as $volunteer)
    <div tabindex="0" class="navigable container grid grid-cols-1 md:grid-cols-2 mx-auto p-8 bg-white rounded-2xl ">
        <div class="flex">
            <img class="object-cover h-32 w-32 rounded-lg border border-customGreen" src="{{ asset('images/profile.png') }}" alt="">
        </div>
        <div class="-mr-24">
            <div class="flex items-center mt-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                    <path fill="#0f9c73" d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 35.8-96 80-96z"/>
                </svg>
                <h2 class="text-l px-4 md:pt-0 font-bold">الاسم:  {{ $volunteer->name }}</h2>
                <span class="mr-auto bg-green-100 text-green-400 border border-green-400 text-sm font-bold px-6 text-center py-1.5 rounded-lg">{{ $volunteer->availability }}</span>
            </div>

            <div class="flex items-center mt-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                    <path fill="#0f9c73" d="M496 128v16a8 8 0 0 1 -8 8h-24v12c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12v-12H24a8 8 0 0 1 -8-8v-16a8 8 0 0 1 4.9-7.4l232-88a8 8 0 0 1 6.1 0l232 88A8 8 0 0 1 496 128zm-24 304H40c-13.3 0-24 10.7-24 24v16a8 8 0 0 0 8 8h464a8 8 0 0 0 8-8v-16c0-13.3-10.7-24-24-24zM96 192v192H60c-6.6 0-12 5.4-12 12v20h416v-20c0-6.6-5.4-12-12-12h-36V192h-64v192h-64V192h-64v192h-64V192H96z"/>
                </svg>
                <h2 class="text-sm px-4 md:pt-0 text-customGreen">التخصص:  {{ $volunteer->assistance_type }}</h2>
            </div>

            <div class="flex items-center mt-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512">
                    <path fill="#0f9c73" d="M172.3 501.7C27 291 0 269.4 0 192 0 86 86 0 192 0s192 86 192 192c0 77.4-27 99-172.3 309.7-9.5 13.8-29.9 13.8-39.5 0zM192 272c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80z"/>
                </svg>
                <h2 class="text-sm px-4 md:pt-0">المدينة: {{ $volunteer->city }}</h2>
            </div>

            <div class="flex items-center mt-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512">
                    <path fill="#FFD43B" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/>
                </svg>
                <h2 class="text-sm px-4 md:pt-0">التقييم: {{ $volunteer->rating }}</h2>
            </div>
        </div>

        <div class="col-span-2 flex justify-center justify-items-center mt-4">
            <a href="{{ route('showvolunteer.profile', Crypt::encrypt($volunteer->id)) }}" tabindex="0" class="navigable text-center py-2 bg-customGreen text-white border border-customGreen hover:bg-white hover:text-customGreen rounded-lg font-bold text-sm w-full h-10">عرض الملف الشخصي</a>
        </div>
    </div>

@endforeach

    @endif

</div>


@endsection
