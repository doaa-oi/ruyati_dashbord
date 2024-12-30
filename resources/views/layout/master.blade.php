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
