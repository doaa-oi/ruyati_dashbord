<nav class="h-16 fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="http://127.0.0.1:8000/" class="flex ms-2 md:me-24">
                    <img src="{{ asset('images/logonon.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">رؤيتي</span>
                </a>
            </div>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-2 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">



                    @auth



    <script>
        function showNotifications() {
            var notificationList = document.getElementById('notificationList');
            // عرض القائمة المنبثقة عند النقر فوق العنصر
            notificationList.classList.toggle('hidden');
        }
    </script>



                    <li>
                        <a href="{{ route('volunteer.profile') }}" class="block py-2 px-3 text-customGreen bg-customGreen rounded md:bg-transparent md:text-customGreen md:p-0 dark:text-white md:dark:text-customGreen" aria-current="page">{{ Auth::user()->name }}</a>
                      </li>
                      @endauth


                </ul>
              </div>
        </div>
    </div>
</nav>

@if(session()->has('success')) <!-- إضافة تنبيه للتعديل -->
<div class="bg-blue-800 text-center py-4 lg:px-4 fixed top-16 w-full z-40">
    <div tabindex="0" class="navigable p-2 bg-blue-700 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-blue-400 uppercase px-2 py-1 text-xs font-bold mr-3">تحديث</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('success') }}</span>
    </div>
</div>
@endif

@if(session()->has('accept'))
<div class="bg-green-800 text-center py-4 lg:px-4 fixed top-16 w-full z-40">
    <div tabindex="0" class="navigable p-2 bg-green-700 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-green-400 uppercase px-2 py-1 text-xs font-bold mr-3">نجاح</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('accept') }}</span>
    </div>
</div>
@endif

@if(session()->has('reject'))  <!-- استخدام 'error' للخطأ -->
<div class="bg-red-800 text-center py-4 lg:px-4 fixed top-16 w-full z-40">
    <div tabindex="0" class="navigable p-2 bg-red-700 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-red-400 uppercase px-2 py-1 text-xs font-bold mr-3">حذف</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('reject') }}</span>
    </div>
</div>
@endif

@if(session()->has('deactivate'))  <!-- استخدام 'error' للخطأ -->
<div class="bg-orange-800 text-center py-4 lg:px-4 fixed top-16 w-full z-40">
    <div tabindex="0" class="navigable p-2 bg-orange-700 items-center text-orange-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-orange-400 uppercase px-2 py-1 text-xs font-bold mr-3">تقييد</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('deactivate') }}</span>
    </div>
</div>
@endif


