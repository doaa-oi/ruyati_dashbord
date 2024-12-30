<aside id="logo-sidebar" class="fixed top-0 right-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
          <li>
           <a class="flex items-center flex-shrink-0 h-14 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('volunteers') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('volunteers.index') }}">
               <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="currentColor" d="M280.4 148.3L96 300.1V464a16 16 0 0 0 16 16l112.1-.3a16 16 0 0 0 15.9-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.6a16 16 0 0 0 16 16.1L464 480a16 16 0 0 0 16-16V300L295.7 148.3a12.2 12.2 0 0 0 -15.3 0zM571.6 251.5L488 182.6V44.1a12 12 0 0 0 -12-12h-56a12 12 0 0 0 -12 12v72.6L318.5 43a48 48 0 0 0 -61 0L4.3 251.5a12 12 0 0 0 -1.6 16.9l25.5 31A12 12 0 0 0 45.2 301l235.2-193.7a12.2 12.2 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0 -1.7-16.9z"/></svg>
               <span class="mr-4 leading-none">الصفحة الرئيسية</span>
           </a>
          </li>
          <li>
           <a class="flex items-center flex-shrink-0 h-14 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{ Request::is('profileVolunteer') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('volunteer.profile') }}">
               <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
               <span class="mr-4 leading-none">الملف الشخصي</span>
           </a>
          </li>
          <li>
           <a class="flex items-center flex-shrink-0 h-14 px-2 text-sm font-medium rounded hover:bg-customGreen hover:text-white {{Request::is('help-requests/pending') || Request::is('help-requests/in-progress') || Request::is('help-requests/pending') ? 'active' : 'bg-white text-customGreen' }}" href="{{ route('help.requests.pending') }}">
               <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="currentColor" d="M48 0C21.5 0 0 21.5 0 48v64c0 8.8 7.2 16 16 16h80V48C96 21.5 74.5 0 48 0zm208 412.6V352h288V96c0-52.9-43.1-96-96-96H111.6C121.7 13.4 128 29.9 128 48v368c0 38.9 34.7 69.7 74.8 63.1C234.2 474 256 444.5 256 412.6zM288 384v32c0 52.9-43.1 96-96 96h336c61.9 0 112-50.1 112-112 0-8.8-7.2-16-16-16H288z"/></svg>
               <span class="mr-4 leading-none">طلبات المساعدة</span>
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
