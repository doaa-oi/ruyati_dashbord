@extends('admin.index_rejected')

@section('type')
الكفيفين
@endsection

@section('search')


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

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
