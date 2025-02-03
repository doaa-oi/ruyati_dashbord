@extends('layout.master')

@section('contant')

<div class="bg-gray-100 flex items-center justify-center min-h-screen ">
    <div class="bg-white py-10 rounded-xl shadow-lg w-full max-w-5xl px-6 lg:px-20">
        <h2 tabindex="0" class="navigable text-2xl font-bold mb-10 text-right">إضافة طلب مساعدة</h2>

        @php
            // استرجع الكفيف المرتبط بالمستخدم الحالي
            $blind = Auth::user()->blind; // احصل على الكفيف المرتبط بالمستخدم
        @endphp


        <form method="POST" action="{{ route('help.request.store') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $blind->id }}">

        <div class="mb-4">
                <label for="title" class="block mb-2 text-lg font-bold text-gray-700 text-right">عنوان الطلب</label>
                <input type="text" id="title" title="عنوان الطلب" name="title" tabindex="0" class="navigable w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-customGreen" placeholder="ادخل عنوان الطلب" value="{{ old('title') }}">
                @error('title')
                <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2 text-lg font-bold text-gray-700 text-right">تفاصيل الطلب</label>
                <textarea id="description" name="description" rows="4" title="تفاصيل الطلب" tabindex="0" class="navigable w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-customGreen" placeholder="اكتب تفاصيل الطلب" style="resize: none;" >{{ old('description') }}</textarea>
                @error('description')
                <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location_url" class="text-lg font-bold text-gray-700">الموقع</label><br>
                <div class="flex items-center mt-2">
                    <button id="locationBtn" type="button" tabindex="0" class="navigable inline-block shrink-0 border border-customGreen bg-customGreen text-l font-medium text-white transition hover:bg-transparent hover:text-customGreen focus:outline-none focus:ring active:text-green-500 py-2 px-16 rounded-lg h-11">
                        تحديد موقعي
                    </button>
                    <input type="text" id="locationField" name="location_url" class="text-center border border-gray-300 text-gray-900 h-11 rounded-lg text-sm  w-full focus:outline-none focus:ring-2 focus:ring-customGreen mr-8" readonly value="{{ old('location_url') }}">
                </div>
                @error('location_url')
                    <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
                    @enderror
            </div>


            <div class="flex justify-center">
                <button type="submit" tabindex="0" class="navigable w-60 my-6 text-lg font-bold bg-customGreen text-white py-3 rounded-lg hover:bg-white hover:text-customGreen border-2 hover:border-customGreen focus:outline-none focus:ring-2 focus:ring-green-400">إضافة</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/gps.js') }}"></script>


@endsection
