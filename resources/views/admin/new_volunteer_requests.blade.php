@extends('admin.master')

@section('search')


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
<h1 class="text-xl font-bold">المتطوعين الجدد</h1>
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
                        <div class="flex items-center justify-between space-x-1">

                            <form action="{{ route('volunteers.accept', $volunteer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                                        <path fill="#0f9c73" d="M173.9 439.4l-166.4-166.4c-10-10-10-26.2 0-36.2l36.2-36.2c10-10 26.2-10 36.2 0L192 312.7 432.1 72.6c10-10 26.2-10 36.2 0l36.2 36.2c10 10 10 26.2 0 36.2l-294.4 294.4c-10 10-26.2 10-36.2 0z"/>
                                    </svg>
                                </button>
                            </form>
                            <form action="{{ route('volunteers.reject', $volunteer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="13.75" viewBox="0 0 352 512">
                                        <path fill="#ff0000" d="M242.7 256l100.1-100.1c12.3-12.3 12.3-32.2 0-44.5l-22.2-22.2c-12.3-12.3-32.2-12.3-44.5 0L176 189.3 75.9 89.2c-12.3-12.3-32.2-12.3-44.5 0L9.2 111.5c-12.3 12.3-12.3 32.2 0 44.5L109.3 256 9.2 356.1c-12.3 12.3-12.3 32.2 0 44.5l22.2 22.2c12.3 12.3 32.2 12.3 44.5 0L176 322.7l100.1 100.1c12.3 12.3 32.2 12.3 44.5 0l22.2-22.2c12.3-12.3 12.3-32.2 0-44.5L242.7 256z"/>
                                    </svg>
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
