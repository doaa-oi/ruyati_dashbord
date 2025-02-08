@extends('admin.index')

@section('type')
الكفيفين
@endsection

@section('search')
<form action="{{ route('show.blinds') }}" method="GET" class="flex w-full">
    <input type="text" name="query" class="w-80 bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-customGreen block p-2.5" placeholder="ابحث عن الكفيفين بالاسم، المدينة " required />
    <button type="submit" class="p-3 ms-2 text-sm font-medium text-white bg-customGreen rounded-lg border border-customGreen hover:bg-white hover:text-customGreen focus:ring-4 focus:outline-none focus:ring-customGreen ">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
    </button>
</form>

@endsection
@section('users')

<div class="container mx-auto mt-10">


    <table class="min-w-full bg-white border border-gray-200 rounded-3xl">
        <thead >
            <tr class="">
                <th class="py-4 px-4 border-b">#</th>
                <th class="py-4 px-4 border-b">اسم الكفيف</th>
                <th class="py-4 px-4 border-b">العمر</th>
                <th class="py-4 px-4 border-b">الجنس</th>
                <th class="py-4 px-4 border-b">البريد الإلكتروني</th>
                <th class="py-4 px-4 border-b">رقم الهاتف</th>
                <th class="py-4 px-4 border-b">المدينة</th>
                <th class="py-4 px-4 border-b">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @if($blinds->isEmpty())
            <div class="text-center">
                <p>لا يوجد أشخاص مطابقون للبحث.</p>
            </div>
        @else
            @foreach ($blinds as $blind)
            <tr class="{{ $loop->index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}"> <!-- استخدام colors مختلفة -->
                    <td class="py-4 px-4 border-b">{{ $blind->id }} </td>
                    <td class="py-4 px-4 border-b">{{ $blind->name }} </td>
                    <td class="py-4 px-4 border-b">{{ $blind->age }}عاما </td>
                    <td class="py-4 px-4 border-b">{{ $blind->gender }} </td>
                    <td class="py-4 px-4 border-b">  {{ $blind->email }}</td>
                    <td class="py-4 px-4 border-b">{{ $blind->phone }} </td>
                    <td class="py-4 px-4 border-b">{{ $blind->city }} </td>
                    <td class="py-4 px-4 border-b">
                        <div class="flex items-center justify-between space-x-1">


                            <form action="{{ route('edit.blind', $blind->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#0f9c73" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"/></svg>

                                </button>
                            </form>
                            <form action="{{ route('blind.reject', $blind->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ff0000" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.7 23.7 0 0 0 -21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z"/></svg>

                                </button>
                            </form>
                    </div>
                    </td>
                </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
@endsection
