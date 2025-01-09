<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marhey:wght@300..700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">


    <style>
        .backdrop {
            backdrop-filter: blur(2px);
        }
    </style>

</head>
<body class="flex items-center justify-center h-screen bg-gray-200">

    <div class="fixed inset-0 bg-black opacity-50 backdrop"></div>

    <div class="relative z-10 bg-green-50 p-8 rounded-lg shadow-lg h-72 w-1/3 border-4 border-customGreen">
        <h2 class="text-xl mb-10 text-center">اختر تقييمك (1-5)</h2>
        <div class="flex justify-around items-center mb-4">
            @for ($i = 1; $i <= 5; $i++)
                <button class="w-16 h-16 flex items-center justify-center rounded-full bg-customGreen text-white text-2xl font-bold hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-300" onclick="submitRating({{ $i }})">
                    {{ $i }}
                </button>
            @endfor
        </div>
        <div class="absolute bottom-4 left-4">
            <button class="w-full h-12 px-10 bg-red-500 text-white rounded-full hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300">
                بلاغ
            </button>
        </div>
    </div>

    <script>
        function submitRating(rating) {
            // هنا يمكنك تنفيذ أي عملية عند النقر على النجوم (مثل الإرسال إلى الخادم)
            console.log("تم التقييم: " + rating);
            // يمكنك أيضًا إغلاق النافذة أو إخفائها بعد التقييم
        }
    </script>

</body>
</html>
