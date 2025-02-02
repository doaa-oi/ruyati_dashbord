<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marhey:wght@300..700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logonon.png') }}" type="image/x-icon">


</head>
<body>

<section class="bg-white">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
      <section class=" relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">

        <img

          src="{{ asset('images/bilndv_bg.png') }}"
          class="absolute inset-0 h-full w-full object-fill opacity-80"
        />

        <div class=" lg:relative lg:block lg:p-12">
          <h2 style="font-family: Tajawal" class="mt-6 text-2xl font-bold text-green-900 sm:text-3xl md:text-4xl">
            أهلا بكم في رؤيتي
          </h2>
          <p class="mt-4 leading-relaxed text-green-900">
            يهدف النظام إلى تسهيل عملية وصول المتطوعين للأشخاص المكفوفين لتقديم المساعدة.
          </p>
        </div>
      </section>

      <main class="border-4 border-green-500 rounded-3xl flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6 m-16">
        <div class=" max-w-xl lg:max-w-3xl">
<div>
@yield('title2')
        </div>
<div>
         @yield('form')
        </div>
      </main>

  </section>
  <script src="{{ asset('js/keydown.js') }}"></script>

</body>
</html>
