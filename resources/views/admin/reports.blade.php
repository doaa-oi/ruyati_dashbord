@extends('admin.master')

@section('search')
{{-- <form action="{{ route('show.volunteers') }}" method="GET" class="flex w-full">
    <input type="text" name="query" class="w-80 bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-customGreen block p-2.5" placeholder="ابحث عن المتطوعين بالاسم، المدينة، أو التخصص" required />
    <button type="submit" class="p-3 ms-2 text-sm font-medium text-white bg-customGreen rounded-lg border border-customGreen hover:bg-white hover:text-customGreen focus:ring-4 focus:outline-none focus:ring-customGreen ">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
    </button>
</form> --}}

@endsection



@section('contant')


@if(session()->has('accept'))
<div class="bg-green-800 text-center py-4 lg:px-4">
    <div class="p-2 bg-green-700 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-green-400 uppercase px-2 py-1 text-xs font-bold mr-3">قبول</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('accept') }}</span>
    </div>
</div>
@endif

@if(session()->has('reject'))  <!-- استخدام 'error' للخطأ -->
<div class="bg-red-800 text-center py-4 lg:px-4">
    <div class="p-2 bg-red-700 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-red-400 uppercase px-2 py-1 text-xs font-bold mr-3">رفض</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('reject') }}</span>
    </div>
</div>
@endif


<div class="mx-8 py-10 md:py-10">
<h1 class="text-xl font-bold">البلاغات</h1>
<div class="container mx-auto mt-10 ">

    <table class="min-w-full bg-white border border-gray-200 rounded-3xl">
        <thead >
            <tr class="">
                <th class="py-4 px-4 border-b">#</th>
                <th class="py-4 px-4 border-b">اسم المتطوع</th>
                <th class="py-4 px-4 border-b">رقم المتطوع</th>
                <th class="py-4 px-4 border-b">اسم الكفيف</th>
                <th class="py-4 px-4 border-b">رقم الكفيف</th>
                <th class="py-4 px-4 border-b">رسالة البلاغ</th>
                <th class="py-4 px-4 border-b"> العمليات</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if($volunteers->isEmpty())
            <div class="text-center">
                <p>لا يوجد أشخاص مطابقون للبحث.</p>
            </div>
        @else --}}
            @foreach ($reports as $report)
            <tr class="{{ $loop->index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}"> <!-- استخدام colors مختلفة -->
                    <td class="py-3 px-4 border-b">{{ $report->id }}</td>
                    <td class="py-3 px-4 border-b">{{ $report->volunteer->name }}</td>
                    <td class="py-3 px-4 border-b">{{ $report->volunteer_id }}</td>
                    <td class="py-3 px-4 border-b">  {{ $report->blind->name }}</td>
                    <td class="py-3 px-4 border-b">{{ $report->blind_id }}</td>
                    <td class="py-3 px-4 border-b">{{ $report->message }}</td>


                    <td class="py-2 px-4 border-b">
                        <div class="flex items-center justify-between space-x-1">

                            <form action="{{ route('volunteers.deactivate', [$report->volunteer_id, $report->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-green-500" title="تقييد حساب المتطوع">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ff8b1f" d="M224 256A128 128 0 1 0 96 128a128 128 0 0 0 128 128zm96 64a63.1 63.1 0 0 1 8.1-30.5c-4.8-.5-9.5-1.5-14.5-1.5h-16.7a174.1 174.1 0 0 1 -145.8 0h-16.7A134.4 134.4 0 0 0 0 422.4V464a48 48 0 0 0 48 48h280.9a63.5 63.5 0 0 1 -8.9-32zm288-32h-32v-80a80 80 0 0 0 -160 0v80h-32a32 32 0 0 0 -32 32v160a32 32 0 0 0 32 32h224a32 32 0 0 0 32-32V320a32 32 0 0 0 -32-32zM496 432a32 32 0 1 1 32-32 32 32 0 0 1 -32 32zm32-144h-64v-80a32 32 0 0 1 64 0z"/></svg>
                                </button>
                            </form>

                            <form action="{{ route('volunteers.reject.report', [$report->volunteer_id, $report->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-red-500" title="حذف حساب المتطوع">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ff0000" d="M589.6 240l45.6-45.6c6.3-6.3 6.3-16.5 0-22.8l-22.8-22.8c-6.3-6.3-16.5-6.3-22.8 0L544 194.4l-45.6-45.6c-6.3-6.3-16.5-6.3-22.8 0l-22.8 22.8c-6.3 6.3-6.3 16.5 0 22.8l45.6 45.6-45.6 45.6c-6.3 6.3-6.3 16.5 0 22.8l22.8 22.8c6.3 6.3 16.5 6.3 22.8 0l45.6-45.6 45.6 45.6c6.3 6.3 16.5 6.3 22.8 0l22.8-22.8c6.3-6.3 6.3-16.5 0-22.8L589.6 240zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                                </button>
                            </form>

                    </div>
                    </td>
                </tr>
            @endforeach
            {{-- @endif --}}

        </tbody>
    </table>
</div>
</div>
@endsection
