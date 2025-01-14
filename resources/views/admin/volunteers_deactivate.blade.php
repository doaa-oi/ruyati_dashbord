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
<h1 class="text-xl font-bold">المتطوعين المقيدون</h1>
<div class="container mx-auto mt-10 ">

    <table class="min-w-full bg-white border border-gray-200 rounded-3xl">
        <thead >
            <tr class="">
                <th class="py-2 px-4 border-b">#</th>
                <th class="py-2 px-4 border-b">اسم المتطوع</th>
                <th class="py-2 px-4 border-b">العمر</th>
                <th class="py-2 px-4 border-b">البريد الإلكتروني</th>
                <th class="py-2 px-4 border-b">رقم الهاتف</th>
                <th class="py-2 px-4 border-b">الرقم الوطني</th>
                <th class="py-2 px-4 border-b">المدينة</th>
                <th class="py-2 px-4 border-b">نوع المساعدة</th>
                <th class="py-2 px-4 border-b">المواعيد</th>
                <th class="py-2 px-4 border-b">العمليات</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if($volunteers->isEmpty())
            <div class="text-center">
                <p>لا يوجد أشخاص مطابقون للبحث.</p>
            </div>
        @else --}}
            @foreach ($volunteers as $volunteer)
            <tr class="{{ $loop->index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}"> <!-- استخدام colors مختلفة -->
                    <td class="py-2 px-4 border-b">{{ $volunteer->id }} </td>
                    <td class="py-2 px-4 border-b">{{ $volunteer->name }} </td>
                    <td class="py-2 px-4 border-b">{{ $volunteer->age }}عاما </td>
                    <td class="py-2 px-4 border-b">  {{ $volunteer->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $volunteer->phone }} </td>
                    <td class="py-2 px-4 border-b">{{ $volunteer->national_id }} </td>
                    <td class="py-2 px-4 border-b">{{ $volunteer->city }} </td>
                    <td class="py-2 px-4 border-b">{{ $volunteer->assistance_type }} </td>
                    <td class="py-2 px-4 border-b">
                        {{ $volunteer->available_days }} <br>
                        <span class="text-gray-600 text-sm"> {{ $volunteer->available_to }} - {{ $volunteer->available_from }} </span>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex justify-center items-center">

                            <form action="{{ route('volunteers.activate', $volunteer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-green-500">

                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#0000db" d="M423.5 0C339.5 .3 272 69.5 272 153.5V224H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48h-48v-71.1c0-39.6 31.7-72.5 71.3-72.9 40-.4 72.7 32.1 72.7 72v80c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24v-80C576 68 507.5-.3 423.5 0z"/></svg>
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
