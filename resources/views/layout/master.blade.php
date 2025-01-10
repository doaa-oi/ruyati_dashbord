<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>واجهة الكفيف</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marhey:wght@300..700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

</head>
<body class="bg-gray-200">


    {{-- @if (isset($notifications) && $notifications->isNotEmpty())

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
                @for ($i = 1; $i <= 5; $i++)
                    <button class="w-14 h-14 flex items-center justify-center rounded-full bg-customGreen text-white text-2xl font-bold hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-300" onclick="submitRating({{ $i }})">
                        {{ $i }}
                    </button>
                @endfor
            </div>
            <div class="absolute my-4 left-4">
                <button type="button" class="w-full h-12 px-10 bg-red-500 text-white rounded-full hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300">
                    بلاغ
                </button>
            </div>
        </div>
        </div>
    @endforeach
@endif --}}


    <script>
        function submitRating(rating) {
            // هنا يمكنك تنفيذ أي عملية عند النقر على النجوم (مثل الإرسال إلى الخادم)
            console.log("تم التقييم: " + rating);
            // يمكنك أيضًا إغلاق النافذة أو إخفائها بعد التقييم
        }
    </script>
</div>

<script>
    function submitRating(rating) {
        console.log("تم التقييم: " + rating);
    }
</script>
<div >



<div> @include('layout.navbar') </div>
<div>@include('layout.sidebar') </div>


  <div class="sm:mr-64">
            <div class="h-screen   rounded-lg mt-14">

                @yield('contant')
            </div>

  </div>
</div>




</body>
</html>
