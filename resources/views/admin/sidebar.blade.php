<aside id="logo-sidebar" class="fixed top-0 right-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-2 font-medium">

        <li>
            <a class="flex items-center flex-shrink-0 h-14 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('show/volunteers')|| Request::is('show/blinds') ? 'active' : 'bg-white text-customGreen' }}" href="javascript:void(0);" onclick="toggleSubMenu(event)">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
                <span class="mr-4 leading-none">المستخدمين</span>
                <svg class="mr-10 transform transition-transform duration-200" id="arrow-icon" xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M7 10l5 5 5-5H7z" />
                </svg>
            </a>
            <ul class="ml-4 mt-2 space-y-1 hidden">
                <li>
                    <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('show/volunteers') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('show.volunteers') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="7.5" viewBox="0 0 192 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M96 0c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64S60.7 0 96 0m48 144h-11.4c-22.7 10.4-49.6 10.9-73.3 0H48c-26.5 0-48 21.5-48 48v136c0 13.3 10.7 24 24 24h16v136c0 13.3 10.7 24 24 24h64c13.3 0 24-10.7 24-24V352h16c13.3 0 24-10.7 24-24V192c0-26.5-21.5-48-48-48z"/></svg>
                        <span class="mr-4 leading-none"> المتطوعين</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('show/blinds') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('show.blinds') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="15" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M380.2 510.8a8 8 0 0 1 -11-2.7l-125.3-206.4a31.9 31.9 0 0 0 13-9.5l126 207.6a8 8 0 0 1 -2.7 11zM142.8 314.3l-32.5 89.5 36.1 88.3c6.7 16.4 25.4 24.2 41.7 17.5 16.4-6.7 24.2-25.4 17.5-41.7l-62.8-153.5zM96 88c24.3 0 44-19.7 44-44S120.3 0 96 0 52 19.7 52 44s19.7 44 44 44zm154.8 169.1l-120-152c-4.7-6-11.8-9.1-18.8-9.1V96H80v0c-7.1 0-14.2 3.2-18.9 9.2L0 183.8v95.7c0 13.5 11 24.8 24.5 24.5C37.5 303.7 48 293.1 48 280v-79.8l16-20.6v140.7L9.9 469.1c-6 16.6 2.5 35 19.1 41 16.6 6 35-2.5 41-19.1L136 309.6V202.4l-31.4-39.8a4 4 0 1 1 6.3-5l102.3 129.2c9.1 11.6 24.4 11.3 33.7 4 10.4-8.2 12.2-23.3 4-33.7z"/></svg>
                        <span class="mr-4 leading-none"> الكفيفين</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('show/volunteers/deactivate') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('show.volunteers.deactivate') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="17.5" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M224 256A128 128 0 1 0 96 128a128 128 0 0 0 128 128zm96 64a63.1 63.1 0 0 1 8.1-30.5c-4.8-.5-9.5-1.5-14.5-1.5h-16.7a174.1 174.1 0 0 1 -145.8 0h-16.7A134.4 134.4 0 0 0 0 422.4V464a48 48 0 0 0 48 48h280.9a63.5 63.5 0 0 1 -8.9-32zm288-32h-32v-80a80 80 0 0 0 -160 0v80h-32a32 32 0 0 0 -32 32v160a32 32 0 0 0 32 32h224a32 32 0 0 0 32-32V320a32 32 0 0 0 -32-32zM496 432a32 32 0 1 1 32-32 32 32 0 0 1 -32 32zm32-144h-64v-80a32 32 0 0 1 64 0z"/></svg>
                        <span class="mr-4 leading-none"> المتطوعون المقيدون</span>
                    </a>
                </li>   <li>
                    <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('blinds/rejected')|| Request::is('volunteers/rejected') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('show.volunteers.rejected') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="17.5" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M132.7 212.3 36.2 137.8A63.4 63.4 0 0 0 32 160a63.8 63.8 0 0 0 100.7 52.3zm40.4 62.3A63.8 63.8 0 0 0 128 256H64A64.1 64.1 0 0 0 0 320v32a32 32 0 0 0 32 32H97.9A146.6 146.6 0 0 1 173.1 274.6zM544 224a64 64 0 1 0 -64-64A64.1 64.1 0 0 0 544 224zM500.6 355.1a114.2 114.2 0 0 0 -84.5-65.3L361 247.2c41.5-16.3 71-55.9 71-103.2A111.9 111.9 0 0 0 320 32c-57.1 0-103.7 42.8-110.6 98.1L45.5 3.4A16 16 0 0 0 23 6.2L3.4 31.5A16 16 0 0 0 6.2 53.9L594.5 508.6A16 16 0 0 0 617 505.8l19.6-25.3a16 16 0 0 0 -2.8-22.5zM128 403.2V432a48 48 0 0 0 48 48H464a47.5 47.5 0 0 0 12.6-1.9L232 289.1C173.7 294.8 128 343.4 128 403.2zM576 256H512a63.8 63.8 0 0 0 -45.1 18.6A146.3 146.3 0 0 1 542 384h66a32 32 0 0 0 32-32V320A64.1 64.1 0 0 0 576 256z"/></svg>
                        <span class="mr-4 leading-none"> المستخدمين المحذوفون</span>
                    </a>
                </li>
            </ul>
        </li>

        <script>
            function toggleSubMenu(event) {
                const submenu = event.currentTarget.nextElementSibling;
                const arrowIcon = event.currentTarget.querySelector('#arrow-icon');
                if (submenu) {
        submenu.classList.toggle('hidden');
        // تغيير اتجاه السهم عند فتح أو إغلاق القائمة
        if (submenu.classList.contains('hidden')) {
            arrowIcon.classList.remove('rotate-180'); // إذا كانت القائمة مخفية، أعد السهم إلى وضعه الأصلي
        } else {
            arrowIcon.classList.add('rotate-180'); // إذا كانت القائمة ظاهرة، اجعل السهم متجهًا لأسفل
        }
    }
}
</script>

<style>
    /* تأكد من إعداد CSS للسهم لإضافة دوران */
    .rotate-180 {
        transform: rotate(180deg); /* دوران السهم بزاوية 180 درجة */
    }
</style>




          <li>
           <a class="flex items-center flex-shrink-0 h-14 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('new/volunteers/requests') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('new.volunteers.requests') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
            <span class="mr-4 leading-none">طلبات الانضمام</span>
        </a>

        </li>
          <li>
           <a class="flex items-center flex-shrink-0 h-14 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{Request::is('show/report')  ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('show.report') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M466.3 225.3c4.7-22.6 .9-44.5-9-63 3-23.9-4-48.6-17.3-67C439 39.4 404.1 0 327 0c-7 0-15 0-22.2 0C201.2 0 169 40 128 40h-10.8c-5.6-5-13-8-21.2-8H32C14.3 32 0 46.3 0 64v240c0 17.7 14.3 32 32 32h64c11.8 0 22.2-6.4 27.7-16h7.1c19.1 17 46 60.7 68.8 83.4 13.7 13.7 10.2 108.6 71.8 108.6 57.6 0 95.3-31.9 95.3-104.7 0-18.4-3.9-33.7-8.9-46.5h36.5c48.6 0 85.8-41.6 85.8-85.6 0-19.2-5-35-13.7-49.8zM64 296c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm330.2 16.7H290.2c0 37.8 28.4 55.4 28.4 94.5 0 23.8 0 56.7-47.3 56.7-18.9-18.9-9.5-66.2-37.8-94.5C206.9 342.9 167.3 272 138.9 272H128V85.8c53.6 0 100-37.8 171.6-37.8h37.8c35.5 0 60.8 17.1 53.1 65.9 15.2 8.2 26.5 36.4 13.9 57.6 21.6 20.4 18.7 51.1 5.2 65.6 9.5 0 22.4 18.9 22.3 37.8-.1 18.9-16.7 37.8-37.8 37.8z"/></svg>
            <span class="mr-4 leading-none"> البلاغات</span>
           </a>
          </li>

          <li>
           <a class="flex items-center flex-shrink-0 h-14 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('show/statistics')  ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('show.statistics') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="currentColor" d="M396.8 352h22.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-192 0h22.4c6.4 0 12.8-6.4 12.8-12.8V140.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h22.4c6.4 0 12.8-6.4 12.8-12.8V204.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zM496 400H48V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-16c0-8.8-7.2-16-16-16zm-387.2-48h22.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8z"/></svg>
            <span class="mr-4 leading-none"> التقارير</span>
           </a>
          </li>

          <li>
            <a class="flex items-center flex-shrink-0 h-14 px-3 mt-96 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('logout') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg>
              <span class="mr-4 leading-none">تسجيل الخروج</span>


              {{-- <a href="{{ route('logout') }}" class="text-customGreen" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a> --}}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                  @csrf
              </form>

            </a>
         </li>
       </ul>
    </div>
 </aside>
