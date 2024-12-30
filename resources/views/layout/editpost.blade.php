@extends('layout.master')

@section('contant')

<div class="bg-gray-100 flex items-center justify-center min-h-screen ">
    <div class="bg-white py-10 rounded-xl shadow-lg w-full max-w-5xl px-6 lg:px-20">
        <h2 class="text-2xl font-bold mb-10 text-right">إضافة طلب مساعدة</h2>


        <form method="POST" action="{{ route('help.request.update', $help_request->id) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block mb-2 text-lg font-bold text-gray-700 text-right">عنوان الطلب</label>
                <input type="text" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-customGreen" value="ادخل عنوان الطلب">
            </div>

            <div class="mb-4">
                <label for="details" class="block mb-2 text-lg font-bold text-gray-700 text-right">تفاصيل الطلب</label>
                <textarea id="details" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-customGreen" style="resize: none;">البرمجة هي عملية كتابة التعليمات والأوامر لجهاز الحاسوب لتنفيذ مهمة معينة. تشمل البرمجة استخدام لغات برمجية متنوعة مثل Python و JavaScript و C++ لتطوير تطبيقات وبرامج ومواقع الويب.</textarea>
            </div>

            <div class="mb-4">
                <label for="location" class="text-lg font-bold text-gray-700">الموقع</label><br>
                <div class="flex items-center mt-2">
                    <button id="locationBtn" type="button" class="inline-block shrink-0 border border-customGreen bg-customGreen text-l font-medium text-white transition hover:bg-transparent hover:text-customGreen focus:outline-none focus:ring active:text-green-500 py-2 px-16 rounded-lg h-11">
                        تحديد موقعي
                    </button>
                    <input type="text" id="locationField" name="location" class="text-center border border-gray-300 text-gray-900 h-11 rounded-lg text-sm  w-full focus:outline-none focus:ring-2 focus:ring-customGreen mr-8" value="https://www.google.com/maps/search/?api=1&query=32.867833,13.211111" readonly>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-60 my-6 text-lg font-bold bg-customGreen text-white py-3 rounded-lg hover:bg-white hover:text-customGreen border-2 border-customGreen focus:outline-none focus:ring-2 focus:ring-green-400">تعديل</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/gps.js') }}"></script>


@endsection
