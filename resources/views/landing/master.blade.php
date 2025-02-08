
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

<div id="1" class="hero-bg-image flex flex-col items-start justify-end pr-24 relative overflow-hidden h-screen">

 <video autoplay muted loop class="absolute top-0 left-0 w-full h-full object-cover object-center">
        <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
    </video>


        <div class="relative w-34 h-full mt-64 ">
        {{-- <h1  class="text-gray-100 text-4xl font-bold text-start">﴿فَإِنَّهَا لَا تَعْمَى الْأَبْصَارُ وَلَٰكِن تَعْمَى الْقُلُوبُ الَّتِي فِي الصُّدُورِ﴾</h1> --}}
        <h1 class="text-gray-100 text-4xl font-bold text-start">قَالَ تَعَالَى: "فَإِنَّهَا لَا تَعْمَى الْأَبْصَارُ</h1>
        <h1 class="text-gray-100 text-4xl font-bold pb-10 text-start">وَلَٰكِن تَعْمَى الْقُلُوبُ الَّتِي فِي الصُّدُورِ"</h1>
          <!-- الخط العمودي -->
        <div class="absolute top-0 h-20 w-1 rounded-xl bg-customGreen mt-32"></div>
            <h1 class="text-gray-100 text-2xl mr-6 text-start mt-3">نظام رؤيتي يفتح أبوابه للمتطوعين الجدد</h1>
            <h1 class="text-gray-100 text-2xl mr-6 pb-10 text-start">بهدف مساعدة الكفيفين وتحسين جودة حياتهم عبر موقعنا</h1>
        </div>
        </div>
  </div>


  <div id="2" class="container mx-auto py-16 ">
    <div class="sm:grid grid-cols-2 gap-20">
        <div class="col-span-2 text-center">
            <h1 class="text-customGreen text-2xl font-bold mb-5">- نبذة عنا -</h1>
            <h1 class="text-xl text-gray-600 leading-8">
                في <span class="font-bold">رؤيتي</span>، نحن نؤمن بأهمية الدعم والتواصل الفعال بين الأفراد. نسعى من خلال نظام رؤيتي إلى تقديم منصة مبتكرة تُسهل تواصل المتطوعين مع الأشخاص المكفوفين. من خلال هذا النظام، نهدف إلى تمكين المكفوفين من الحصول على المساعدة التي يحتاجونها وتعزيز مشاركتهم في المجتمع.
                <br>
                نحن ندرك أن العمل التطوعي له دور أساسي في بناء مجتمع متماسك وداعم، لذلك نوفر للمتطوعين فرصًا للمشاركة في تحسين حياة الآخرين. نلتزم بتوفير بيئة آمنة ومرنة للجميع، ونسعى دائمًا لتحقيق التميز في خدماتنا.
                <br>
                انضم إلينا في رحلتنا لإحداث فرق حقيقي في حياة الأشخاص المكفوفين من خلال التعاون والمشاركة.
            </h1>
        </div>

        <div class="flex flex-col items-center justify-center m-10 sm:m-0">
            <h2 class="font-bold text-gray-700 text-4xl uppercase">الجمعيات الخاصة <span class="text-customGreen">بالكفيفين</span></h2>
            <p class="font-bold text-gray-600 text-xl py-4">مقدمة حول دور هذه الجمعيات في المجتمع.</p>
            <p class="py-4 text-gray-500 text-sm leading-6">تعتبر الجمعيات الخاصة بالكفيفين من المؤسسات المهمة التي تقدم الدعم والمساعدة للشخصيات الكفيفة في المجتمع. تقدم العديد من الجمعيات الخدمات والموارد التي تسهم في تحسين جودة الحياة للكفيفين.</p>
            <p class="py-4 text-gray-500 text-sm leading-6">من بين هذه الجمعيات، تعتبر جمعية الكفيف واحدة من أشهر الجمعيات في ليبيا، حيث يلعبون دورًا كبيرًا في تمكين الكفيفين وتعزيز حقوقهم. توفر الجمعية برامج تعليمية وتدريبية بالإضافة إلى الدعم النفسي والاجتماعي، مما يساعد الكفيفين على الاندماج بشكل أفضل في المجتمع.</p>
        </div>

        <div class="mx-2 md:mx-0 border-8  border-gray-100 rounded-xl ">
          <img  class="sm:rounded-lg" src="{{ asset('images/bangazi.jpg') }}" alt="">
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
