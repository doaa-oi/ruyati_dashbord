

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

                @php
                    $blind = Auth::user()->blind; // استخدم العلاقة للحصول على الكفيف
          @endphp
<!-- إضافة الأيقونة وعدد الإشعارات -->
<li class="nav-item notification-icon relative">
<a href="#" class="nav-link text-white flex items-center" id="notificationToggle" onclick="showNotifications()">
    <div class="relative bg-none  rounded-lg">
        <svg class="w-8 h-8 text-customGreen animate-wiggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M15.585 15.5H5.415A1.65 1.65 0 0 1 4 13a10.526 10.526 0 0 0 1.5-5.415V6.5a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1.085c0 1.907.518 3.78 1.5 5.415a1.65 1.65 0 0 1-1.415 2.5zm1.915-11c-.267-.934-.6-1.6-1-2s-1.066-.733-2-1m-10.912 3c.209-.934.512-1.6.912-2s1.096-.733 2.088-1M13 17c-.667 1-1.5 1.5-2.5 1.5S8.667 18 8 17" />
        </svg>


        @if($blind->unreadNotifications->count() > 0)
            <span class="px-1 py-0.5 bg-customGreen min-w-4 rounded-full text-center text-white text-xs absolute -top-2 -end-1 translate-x-1/4 text-nowrap mt-2" id="notificationCount">
                <div class="absolute top-0 start-0 rounded-full -z-10 animate-ping bg-green-200 w-full h-full"></div> {{ $blind->unreadNotifications->count() }}
            </span>
         @else
            <span class="px-1 py-0.5 bg-customGreen min-w-4 rounded-full text-center text-white text-xs absolute -top-2 -end-1 translate-x-1/4 text-nowrap mt-2" id="notificationCount">
                {{ $blind->unreadNotifications()->count() }}
            </span>
        @endif
    </div>
</a>
<ul class="notification-list hidden absolute shadow-lg -mr-80 p-5 border-4 border-customGreen rounded-lg bg-green-50 w-96 h-52 overflow-y-auto" id="notificationList">
    @if($blind->unreadNotifications->isEmpty())
        <li class="text-center mt-16 text-gray-700 text-xl">لا يوجد إشعارات لأي طلبات مساعدة.</li>
    @else
        @foreach($blind->unreadNotifications as $notification)
        {{-- {{ dump($notification->type) }} <!-- استخدم هذا للتأكد من النوع --> --}}

        <li class="flex p-3 hover:bg-green-100 transition duration-200">
            {{-- تحديد الرابط بناءً على نوع الإشعار --}}
            @if ($notification->type === 'App\Notifications\ApprovedNotification')
                <a href="{{ route('showvolunteer.profile', ['encryptedId' => Crypt::encrypt($notification->data['VolunteerId']), 'from_notification' => true]) }}" class="flex w-full">
                    <div class="notifyimg bg-pink inline-block mr-3">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path fill="#0f9c73" d="M380.2 510.8a8 8 0 0 1 -11-2.7l-125.3-206.4a31.9 31.9 0 0 0 13-9.5l126 207.6a8 8 0 0 1 -2.7 11zM142.8 314.3l-32.5 89.5 36.1 88.3c6.7 16.4 25.4 24.2 41.7 17.5 16.4-6.7 24.2-25.4 17.5-41.7l-62.8-153.5zM96 88c24.3 0 44-19.7 44-44S120.3 0 96 0 52 19.7 52 44s19.7 44 44 44zm154.8 169.1l-120-152c-4.7-6-11.8-9.1-18.8-9.1V96H80v0c-7.1 0-14.2 3.2-18.9 9.2L0 183.8v95.7c0 13.5 11 24.8 24.5 24.5C37.5 303.7 48 293.1 48 280v-79.8l16-20.6v140.7L9.9 469.1c-6 16.6 2.5 35 19.1 41 16.6 6 35-2.5 41-19.1L136 309.6V202.4l-31.4-39.8a4 4 0 1 1 6.3-5l102.3 129.2c9.1 11.6 24.4 11.3 33.7 4 10.4-8.2 12.2-23.3 4-33.7z"/>
                        </svg>
                    </div>
                    <div class="mr-3">
                        <strong>{{ $notification->data['VolunteerName'] }}</strong>: لقد وافق على طلبك.
                        <div class="notification-subtext text-xs text-gray-500">{{ $notification->created_at->locale('ar')->diffForHumans() }}</div>
                    </div>
                </a>
            @elseif ($notification->type === 'App\Notifications\RejectionNotification')
                <a href="{{ route('showvolunteer.profile', ['encryptedId' => Crypt::encrypt($notification->data['VolunteerId']), 'from_notification' => true]) }}" class="flex w-full">
                    <div class="notifyimg bg-pink inline-block mr-3">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path fill="#0f9c73" d="..."/> <!-- ضع المسار الصحيح هنا -->
                        </svg>
                    </div>
                    <div class="mr-3">
                        <strong>{{ $notification->data['VolunteerName'] }}</strong>: لقد رفض طلبك.
                        <div class="notification-subtext text-xs text-gray-500">{{ $notification->created_at->locale('ar')->diffForHumans() }}</div>
                    </div>
                </a> @elseif ($notification->type === 'App\Notifications\AssistanceCompletedNotification')
                <a href="{{ route('showvolunteer.profile', ['encryptedId' => Crypt::encrypt($notification->data['VolunteerId']), 'from_notification' => true]) }}" class="flex w-full">
                    <div class="notifyimg bg-pink inline-block mr-3">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path fill="#0f9c73" d="..."/> <!-- ضع المسار الصحيح هنا -->
                        </svg>
                    </div>
                    <div class="mr-3">
                        <strong>{{ $notification->data['VolunteerName'] }}</strong>: لقد أكمل طلبك.
                        <div class="notification-subtext text-xs text-gray-500">{{ $notification->created_at->locale('ar')->diffForHumans() }}</div>
                    </div>
                </a>
            @endif
        </li>
            <hr class="border-gray-200"> <!-- فاصل بين الإشعارات -->
            @endforeach
        @endif
    </ul>
</li>

<script>
    function showNotifications() {
        var notificationList = document.getElementById('notificationList');
        // عرض القائمة المنبثقة عند النقر فوق العنصر
        notificationList.classList.toggle('hidden');
    }
</script>


<li>
    <a href="{{ route('blinds.profile') }}" class="block py-2 px-3 text-customGreen bg-customGreen rounded md:bg-transparent md:text-customGreen md:p-0 dark:text-white md:dark:text-customGreen" aria-current="page">{{ Auth::user()->name }}</a>
    </li>
                  @endauth

              {{-- <li> <a href="{{ route('logout') }}" class="text-customGreen" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form></li> --}}
              {{-- <li>
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
              </li>
              <li>
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
              </li>
              <li>
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
              </li>
              <li>
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
              </li> --}}
            </ul>
          </div>
      </div>
    </div>
  </nav>

