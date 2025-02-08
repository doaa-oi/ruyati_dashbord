@extends('admin.index_rejected')
@section('type')
المتطوعين
@endsection


@section('users')

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
                        
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
