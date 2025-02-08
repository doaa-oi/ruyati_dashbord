<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <title> متطوع جديد</title>
    <link rel="icon" href="{{ asset('images/logonon.png') }}" type="image/x-icon">
</head>
<body>
    <section >
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
          <section class="relative flex h-32 items-center justify-center lg:col-span-5 lg:h-full xl:col-span-6">
            <img
              src="{{ asset('images/Accept tasks-bro.png') }}"
              class="h-3/4 w-3/4 object-fill opacity-80"
            />
          </section>

          <main class="border-4 border-customGreen rounded-3xl flex flex-col items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6 m-16">
            <div class="text-center text-2xl font-bold mb-4">
       أهلا بك في نظام <span class="text-customGreen">رؤيتي</span><br><br>
       من فضلك انتظر موافقة الإدارة لتفعيل حسابك.
            </div>

            <div class="flex justify-center mt-20 text-xl font-bold">
                <a href="/" class="inline-flex items-center px-4 py-2 bg-none text-customGreen ">
                    الرجوع للرئيسية
                    <svg class="w-5 h-5 ml-2" fill="#0F9C73" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16l-4-4m0 0l4-4m-4 4h8"></path>
                    </svg>
                </a>
            </div>

          </main>



      </section>

</body>
</html>
