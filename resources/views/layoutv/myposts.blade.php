@extends('layoutv.postv')


@section('type')
طلباتي
@endsection


@section('posts')

<div class="mb-8">
    <h2 class="text-2xl font-bold mb-4">طلبات المساعدة</h2>



@if ($help_requests->isEmpty())
<p>لا توجد لديك طلبات مساعدة حالية.</p>
@else
@foreach($help_requests as $help_request)
<div class="bg-white border border-gray-200 rounded-2xl shadow p-4 dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
      <img class="rounded-t-lg w-full" src="/docs/images/blog/image-1.jpg" alt="" />
    </a>
    <div class="p-5">
      <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-customGreen dark:text-white">{{ $help_request->title }}    </h5>
      </a>

      <div class="flex items-center my-3">
        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9094a0" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12-5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12-5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"/></svg>
            <h2 class="text-l px-4 md:pt-0 font-medium text-gray-400">{{ $help_request->updated_at }}</h2>
        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9094a0" d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"/></svg>
            <h2 class="text-l px-4 md:pt-0 font-medium text-gray-400">{{ $help_request->blind->name ?? 'اسم الكفيف غير متوفر' }}</h2>
        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9094a0" d="M172.3 501.7C27 291 0 269.4 0 192 0 86 86 0 192 0s192 86 192 192c0 77.4-27 99-172.3 309.7-9.5 13.8-29.9 13.8-39.5 0zM192 272c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80z"/></svg>
            <h2 class="text-l px-4 md:pt-0 font-medium text-gray-400">{{ $help_request->blind->city }}</h2>
      </div>

      <p class="mb-3 text-lg text-gray-700 dark:text-gray-400">{{ $help_request->description }}</p>
      <div class="flex gap-5">
        <a href="{{ route('help.request.show', Crypt::encrypt($help_request->id)) }}" class=" items-center w-full px-3 py-3 text-sm font-bold text-center text-white bg-customGreen rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-customGreen dark:hover:bg-green-700 dark:focus:ring-green-800">
          عرض المزيد
        </a>

      </div>
    </div>
  </div>

@endforeach
@endif
</div>

<div class="mb-8">
    <h2 class="text-2xl font-bold mb-4">ملفات شخصية</h2>
    <!-- هنا يمكنك إضافة العناصر الخاصة بملفات شخصية. على سبيل المثال: -->
    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
        @foreach($blinds as $blind)
        <div class="container grid grid-cols-1 md:grid-cols-1 mx-auto p-8 bg-white rounded-2xl ">
            <div class="flex">
                <img class="object-cover h-32 w-32 rounded-lg border border-customGreen" src="{{ asset('images/profile.png') }}" alt="">
            </div>
            <div class="ml-8"> <!-- تعديل المساحة بين الصورة والنص -->
                <div class="flex items-center mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                        <path fill="#0f9c73" d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 35.8-96 80-96z"/>
                    </svg>
                    <h2 class="text-l px-4 md:pt-0 font-bold">الاسم: {{ $blind->name }}  </h2>
                </div>

                <div class="flex items-center mt-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                        <path fill="#0f9c73" d="M496 128v16a8 8 0 0 1 -8 8h-24v12c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12v-12H24a8 8 0 0 1 -8-8v-16a8 8 0 0 1 4.9-7.4l232-88a8 8 0 0 1 6.1 0l232 88A8 8 0 0 1 496 128zm-24 304H40c-13.3 0-24 10.7-24 24v16a8 8 0 0 0 8 8h464a8 8 0 0 0 8-8v-16c0-13.3-10.7-24-24-24zM96 192v192H60c-6.6 0-12 5.4-12 12v20h416v-20c0-6.6-5.4-12-12-12h-36V192h-64v192h-64V192h-64v192h-64V192H96z"/>
                    </svg>
                    <h2 class="text-sm px-4 md:pt-0 text-customGreen">العمر: {{ $blind->age }} سنة</h2>
                </div>

                <div class="flex items-center mt-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512">
                        <path fill="#0f9c73" d="M172.3 501.7C27 291 0 269.4 0 192 0 86 86 0 192 0s192 86 192 192c0 77.4-27 99-172.3 309.7-9.5 13.8-29.9 13.8-39.5 0zM192 272c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80z"/>
                    </svg>
                    <h2 class="text-sm px-4 md:pt-0">المدينة: {{ $blind->city }} </h2>
                </div>


            </div>

            <div class="col-span-2 flex justify-center justify-items-center mt-4">
                <a href="{{ route('blind.profile', ['encryptedId' => Crypt::encrypt($blind->id), 'from_notification' => true]) }}" class="text-center py-2 bg-customGreen text-white border border-customGreen hover:bg-white hover:text-customGreen rounded-lg font-bold text-sm w-full h-10">عرض الملف الشخصي</a>


            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
