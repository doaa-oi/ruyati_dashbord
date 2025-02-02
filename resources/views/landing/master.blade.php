
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <title>Document</title>

    {{-- <link rel="stylesheet" href="{{ asset('fonts/Tajawal-Black.ttf') }}"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marhey:wght@300..700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

</head>
<body>


    @if (session('alert'))
    <script>
        window.addEventListener('load', function() {
            alert("{{ session('alert') }}"); // عرض التنبيه
        });
    </script>
@endif

<div>

    @include('landing.navbar')




</div>

    <div id="1" class="hero-bg-image flex flex-col items-start justify-end  pr-24 " >

        <div class="relative w-34 h-full mt-64 ">
        <h1  class="text-gray-100 text-4xl font-bold text-start">جمعية تمكن المتطوعين </h1>
        <h1 class="text-gray-100 text-4xl  font-bold pb-10 text-start">   من مساعدة المكفوفين</h1>


            <!-- الخط العمودي -->
            <div class="absolute  top-0 h-20 w-1 rounded-xl bg-customGreen mt-32"></div>
                <h1 class="text-gray-100 text-2xl mr-6   text-start mt-3">جمعية الكفيف تفتح ابوابها  للمتطوعين الجدد </h1>
                <h1 class="text-gray-100 text-2xl  mr-6  pb-10 text-start"> لمساعدة المكفوفين عبر موقعها</h1>
            </div>
        </div>
  </div>


  <div id="2" class="container mx-auto py-16 ">
    <div class="sm:grid grid-cols-2 gap-20">
        <div class="col-span-2 text-center">
            <h1 class="text-customGreen text-2xl font-bold mb-5">نبذة عنا</h1>
            <h1 class=" text-xl text-gray-600"> نحن نحن ملتزمون بتزويد عملاؤنا استثنائية <br> الخدمة و الاسعار التنافسية</h1>
        </div>

        <div class="flex flex-col items-center justify-center m-10 sm:m-0">
            <h2 class="font-bold text-gray-700  text-4xl uppercase" >How to be an expert in 2024</h2>
            <p class="font-bold text-gray-600  text-xl pt-2">you can find a list of all programming language here.</p>
            <p class="py-4 text-gray-500 text-sm leading-6">Becoming an expert in your field can fast-track your status and increase your earning potential in your industry. Your expertise has the potential to make you more desirable as a job candidate or more valuable within your current company.</p>


        </div>

        <div class="mx-2 md:mx-0 border-8  border-customGreen rounded-xl ">
          <img  class="sm:rounded-lg" src="{{ asset('images/bilndv_bg.png') }}" alt="">
      </div>


      </div>
  </div>





  <div id="3" class="sm:grid grid-cols-2 w-4/5 mx-auto mt-10">
            <div class="block m-auto   text-center">

             <h1 class="text-5xl font-bold mb-10">موقع</h1>
             <h1 class="text-5xl font-bold text-customGreen">الجمعية</h1>


            </div>


        <div class="flex">
        <img class="object-cover" src="{{ asset('images/loc.png') }}" alt="">

    </div>
 </div>


<div>
@include('landing.footer')

</div>

<script src="{{ asset('js/keydown.js') }}"></script>

</body>
</html>
