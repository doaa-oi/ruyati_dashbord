@extends('layout.master')

@section('contant')


@if(session()->has('send')) <!-- إضافة تنبيه لطلب المساعدة -->
<div class="bg-green-100 text-center py-4 lg:px-4">
    <div tabindex="0" class="navigable p-2 bg-green-200 items-center text-customGreen leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-green-300 uppercase px-2 py-1 text-xs font-bold mr-3">طلب المساعدة</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('send') }}</span>
    </div>
</div>
@endif

@if(session()->has('rating')) <!-- إضافة تنبيه للتعديل -->
<div class="bg-blue-800 text-center py-4 lg:px-4">
    <div tabindex="0" class="navigable p-2 bg-blue-700 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-blue-400 uppercase px-2 py-1 text-xs font-bold mr-3">تقييم</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('rating') }}</span>
    </div>
</div>
@endif

@if(session()->has('report')) <!-- إضافة تنبيه للتعديل -->
<div class="bg-blue-800 text-center py-4 lg:px-4">
    <div tabindex="0" class="navigable p-2 bg-blue-700 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-blue-400 uppercase px-2 py-1 text-xs font-bold mr-3">البلاغ</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('report') }}</span>
    </div>
</div>
@endif

<div class="grid  grid-cols-1 md:grid-cols-2 gap-x-20 gap-8 md:py-16 py-60  mx-16">



<div class="grid  grid-cols-1 md:grid-cols-2 bg-white p-14 rounded-2xl text-center">

    <h2 tabindex="0" class="navigable col-span-2 text-xl font-bold mb-2 text-start border-b-4  ">بيانات المتطوع</h2>

    <div tabindex="0" class="navigable mt-3 mb-4 border-b-4 pb-4 border-l-4">
        <h1 class="font-semibold">الاسم بالكامل:</h1>
        <h1> {{ $volunteer->name }}</h1>
    </div>

  <div tabindex="0" class="navigable pt-3 mb-4 border-b-4 pb-4">
    <h1 class="font-semibold">المدينة:</h1>
    <h1>{{ $volunteer->city }}</h1>
  </div>

  <div tabindex="0" class="navigable mb-4 border-b-4 pb-4 border-l-4">
    <h1 class="font-semibold">رقم الهاتف:</h1>
    <h1>{{ $volunteer->phone }}</h1>
  </div>

  <div tabindex="0" class="navigable mb-4 border-b-4 pb-4">
    <h1 class="font-semibold">العمر:</h1>
    <h1>{{ $volunteer->age }} عاما</h1>
  </div>

  <div tabindex="0" class="navigable mb-4 border-b-4 pb-4 border-l-4">
    <h1 class="font-semibold">الأيام:</h1>
    <h1>{{ $volunteer->available_days }}</h1>
  </div>

  <div tabindex="0" class="navigable mb-4 border-b-4 pb-4">
    <h1 class="font-semibold">الوقت:</h1>
    <h1> من :{{ $volunteer->available_from }}    إلى : {{ $volunteer->available_to }}</h1>
  </div>

  <div tabindex="0" class="navigable mb-4 pb-2 ">
    <h1 class="font-semibold">المساعدة:</h1>
    <h1> {{ $volunteer->assistance_type }}</h1>
  </div>


</div>




<div class="">
    <img src="{{ asset('images/bilndv.jpg') }}" alt="Volunteer Image" class="rounded-2xl">
  </div>

<div class="col-span-2">
  <div class="flex  justify-start mt-4 gap-16">
    @php
        // استرجع الكفيف المرتبط بالمستخدم الحالي
        $blind = Auth::user()->blind;
    @endphp
@if ($volunteer->availability === 'متاح') <!-- تحقق مما إذا كانت حالة المتطوع "متاح" -->
<form action="{{ route('send.help.request', ['encryptedId' => Crypt::encrypt($volunteer->id), 'encryptedBlindId' => Crypt::encrypt($blind->id)]) }}" method="POST" class="inline-block">
    @csrf <!-- حماية ضد CSRF -->
    <button type="submit" tabindex="0" class="navigable flex items-center justify-center py-3 bg-customGreen text-white border border-customGreen hover:bg-white hover:text-green-600 rounded-lg font-bold text-sm w-56 h-12">
        <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
          <path fill="currentColor" d="M48 0C21.5 0 0 21.5 0 48v64c0 8.8 7.2 16 16 16h80V48C96 21.5 74.5 0 48 0zm208 412.6V352h288V96c0-52.9-43.1-96-96-96H111.6C121.7 13.4 128 29.9 128 48v368c0 38.9 34.7 69.7 74.8 63.1C234.2 474 256 444.5 256 412.6zM288 384v32c0 52.9-43.1 96-96 96h336c61.9 0 112-50.1 112-112 0-8.8-7.2-16-16-16H288z"/>
        </svg>
        طلب المساعدة
    </button>
</form>
@else
<button type="button" tabindex="0" class="navigable flex items-center justify-center py-3 bg-gray-300 text-gray-500 border border-gray-300 rounded-lg font-bold text-sm w-56 h-12" title="لا يمكنك طلب المساعدة لأن المتطوع غير متاح الآن">
    <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
      <path fill="currentColor" d="M48 0C21.5 0 0 21.5 0 48v64c0 8.8 7.2 16 16 16h80V48C96 21.5 74.5 0 48 0zm208 412.6V352h288V96c0-52.9-43.1-96-96-96H111.6C121.7 13.4 128 29.9 128 48v368c0 38.9 34.7 69.7 74.8 63.1C234.2 474 256 444.5 256 412.6zM288 384v32c0 52.9-43.1 96-96 96h336c61.9 0 112-50.1 112-112 0-8.8-7.2-16-16-16H288z"/>
    </svg>
    طلب المساعدة
</button>
@endif

    <a href="https://wa.me/218{{ $volunteer->phone }}?call" tabindex="0" class="navigable flex items-center justify-center py-3 bg-none text-customGreen border border-customGreen hover:bg-customGreen hover:text-white rounded-lg font-bold text-sm w-56 h-12">
        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" fill="currentColor" class="ml-2" viewBox="0 0 448 512">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
        </svg>
        تواصل عبر واتساب
    </a>

</div>

</div>


</div>
<h1></h1>
@if (isset($notifications) && $notifications->isEmpty())
    <p></p>
@else
    @foreach ($notifications as $notification)
        @if (is_null($notification->read_at) &&
               $notification->type === 'App\\Notifications\\AssistanceCompletedNotification') <!-- تحقق من نوع الإشعار -->
            @php
                // تحويل نص JSON إلى مصفوفة
                $data = json_decode($notification->data, true);
            @endphp


        <div class="fixed inset-0 bg-black opacity-50 backdrop "></div>

        <div class="flex items-center justify-center h-screen -mt-96"> <!-- الحاوية الأساسية -->
            <div class="relative z-10 bg-green-50 p-8 rounded-lg shadow-lg h-80 w-2/5 border-4 border-customGreen mb-4">
                <div id="rating-section">
                    <div tabindex="0" class="navigable ">
                    <h2 class="text-xl mb-6 text-center">لقد أكمل المتطوع <span class="text-customGreen font-bold">{{ $data['VolunteerName']}}</span> تقديم المساعدة</h2>
                    <h2 class="text-xl mb-10 text-center">اختر تقييمك (1-5)</h2>
                </div>
                    <form id="ratingForm" method="POST" action="{{ route('rating.submit') }}">
                        @csrf
                        <input type="hidden" name="volunteer_id" value="{{ $volunteer->id }}">
                        <input type="hidden" name="blind_id" value="{{ Auth::user()->blind->id }}">

                        <div class="flex justify-around items-center mb-4">
                            <div class="flex items-center">
                                <input type="number" name="rating" id="rating" min="1" max="5" title="أدخل تقييمك هنا من 1 إلى 5" tabindex="0" class="navigable ml-4 w-32 p-2 border border-customGreen rounded text-center">
                            </div>
                        </div>

                        <div>
                            <button type="submit" tabindex="0" class="navigable w-full h-12 px-10 bg-customGreen text-white rounded-full hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-200">
                                ارسال تقييم
                            </button>
                        </div>
                    </form>
                </div>

                <div id="report-section" class="hidden">
                    <form action="{{ route('report.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="volunteer_id" value="{{ $volunteer->id }}">
                        <input type="hidden" name="blind_id" value="{{ Auth::user()->blind->id }}">
                        <textarea name="report_details" rows="4" tabindex="0" title="ادخل رسالة البلاغ هنا" tabindex="0" class="navigable navigable w-full p-2 border border-customGreen rounded mb-4" placeholder="أدخل تفاصيل البلاغ هنا..."></textarea>
                        <button type="submit" tabindex="0" class="navigable w-full h-12 bg-red-500 text-white rounded-full hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300">
                            ارسال البلاغ
                        </button>
                    </form>
                </div>

                <!-- زر البلاغات -->
                <button id="report-button" onclick="showReportSection()" tabindex="0" class="navigable absolute left-4 bottom-4 w-24 h-12 bg-red-500 text-white rounded-full hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 mt-4">
                    بلاغ
                </button>

            </div>
        </div>


        @endif

    @endforeach
@endif

<script>

    function setRating(rating) {
        // تعيين القيمة إلى الحقل المخفي عند اختيار تقييم معين
        document.getElementById('ratingValue').value = rating;
    }

    function showReportSection() {
                document.getElementById('rating-section').classList.add('hidden'); // إخفاء قسم التقييمات
                document.getElementById('report-section').classList.remove('hidden'); // إظهار قسم البلاغ
                // إخفاء زر البلاغات
                document.getElementById('report-button').style.display = 'none';

}
</script>
{{--
@if ($notifications) <!-- استخدام المتغير بشكل صحيح -->

    @foreach ($notifications as $notification) <!-- استخدام حلقة للمرور عبر جميع الإشعارات -->

       @php
            // تحويل نص JSON إلى مصفوفة
            $data = json_decode($notification->data, true);
        @endphp
<div class="fixed inset-0 bg-black opacity-50 backdrop"></div>
<div class="flex items-center justify-center h-screen -mt-96"> <!-- الحاوية الأساسية -->

        <div class=" relative z-10 bg-green-50 p-8 rounded-lg shadow-lg h-80 w-2/5 border-4 border-customGreen mb-4">
            <h2 class="text-xl mb-6 text-center">لقد أكمل المتطوع <span class="text-customGreen font-bold">{{ $data['VolunteerName']}}</span> تقديم المساعدة</h2>
            <h2 class="text-xl mb-10 text-center">اختر تقييمك (1-5)</h2>
            <div class="flex justify-around items-center mb-4">
                <form id="ratingForm" method="POST" action="{{ route('rating.submit') }}">
                    @csrf
                    <input type="hidden" name="volunteer_id" value="{{ $volunteer->id }}">
                    <input type="hidden" name="blind_id" value="{{ Auth::user()->blind->id }}">
                    <input type="hidden" name="rating" id="ratingValue"> <!-- حقل مخفي لتخزين قيمة التقييم -->

                    @for ($i = 1; $i <= 5; $i++)
                        <button type="submit" class="w-14 h-14 flex items-center justify-center rounded-full bg-customGreen text-white text-2xl font-bold hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-300" onclick="submitRating({{ $i }})">
                            {{ $i }}
                        </button>
                    @endfor
                </form>
            </div>
            <div class="absolute my-4 left-4">
                <button type="submit" class="w-full h-12 px-10 bg-red-500 text-white rounded-full hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300">
                    بلاغ
                </button>
            </div>
        </div>
        </div>
    @endforeach
@endif


<script>
    function submitRating(rating) {
        // تعيين القيمة إلى الحقل المخفي
        document.getElementById('ratingValue').value = rating;

        // تقديم النموذج
        document.getElementById('ratingForm').submit();
    }
</script> --}}

</div>

<script>
    function submitRating(rating) {
        console.log("تم التقييم: " + rating);
    }
</script>



@endsection
