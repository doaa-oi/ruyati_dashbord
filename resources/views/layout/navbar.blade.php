

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
          <a href="http://127.0.0.1:8000/" tabindex="0" class="navigable flex ms-2 md:me-24">
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
<a href="#"  title="هذا هو زر الإشعار" tabindex="0" class="navigable nav-link text-white flex items-center" id="notificationToggle" onclick="showNotifications()">
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
        <li tabindex="0" class="navigable text-center mt-16 text-gray-700 text-xl">لا يوجد إشعارات لأي طلبات مساعدة.</li>
    @else
        @foreach($blind->unreadNotifications as $notification)
        {{-- {{ dump($notification->type) }} <!-- استخدم هذا للتأكد من النوع --> --}}

        <li class="flex p-3 hover:bg-green-100 transition duration-200">
            {{-- تحديد الرابط بناءً على نوع الإشعار --}}
            @if ($notification->type === 'App\Notifications\ApprovedNotification')
                <a href="{{ route('showvolunteer.profile', ['encryptedId' => Crypt::encrypt($notification->data['VolunteerId']), 'from_notification' => true]) }}" tabindex="0" class="navigable flex w-full">
                    <div class="notifyimg bg-pink inline-block mr-3">
                        <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path fill="#0f9c73" d="M173.9 439.4l-166.4-166.4c-10-10-10-26.2 0-36.2l36.2-36.2c10-10 26.2-10 36.2 0L192 312.7 432.1 72.6c10-10 26.2-10 36.2 0l36.2 36.2c10 10 10 26.2 0 36.2l-294.4 294.4c-10 10-26.2 10-36.2 0z"/>
                        </svg>
                    </div>
                    <div class="mr-3">
                        <strong>{{ $notification->data['VolunteerName'] }}</strong>: لقد وافق على طلبك.
                        <div class="notification-subtext text-xs text-gray-500">{{ $notification->created_at->locale('ar')->diffForHumans() }}</div>
                    </div>
                </a>
            @elseif ($notification->type === 'App\Notifications\RejectionNotification')
                <a href="{{ route('showvolunteer.profile', ['encryptedId' => Crypt::encrypt($notification->data['VolunteerId']), 'from_notification' => true]) }}" tabindex="0" class="navigable flex w-full">
                    <div class="notifyimg bg-pink inline-block mr-3">
                        <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" height="20" width="13.75" viewBox="0 0 352 512">
                            <path fill="#ff0000" d="M242.7 256l100.1-100.1c12.3-12.3 12.3-32.2 0-44.5l-22.2-22.2c-12.3-12.3-32.2-12.3-44.5 0L176 189.3 75.9 89.2c-12.3-12.3-32.2-12.3-44.5 0L9.2 111.5c-12.3 12.3-12.3 32.2 0 44.5L109.3 256 9.2 356.1c-12.3 12.3-12.3 32.2 0 44.5l22.2 22.2c12.3 12.3 32.2 12.3 44.5 0L176 322.7l100.1 100.1c12.3 12.3 32.2 12.3 44.5 0l22.2-22.2c12.3-12.3 12.3-32.2 0-44.5L242.7 256z"/>
                        </svg>
                    </div>
                    <div class="mr-3">
                        <strong>{{ $notification->data['VolunteerName'] }}</strong>: لقد رفض طلبك.
                        <div class="notification-subtext text-xs text-gray-500">{{ $notification->created_at->locale('ar')->diffForHumans() }}</div>
                    </div>
                </a> @elseif ($notification->type === 'App\Notifications\AssistanceCompletedNotification')
                <a href="{{ route('showvolunteer.profile', ['encryptedId' => Crypt::encrypt($notification->data['VolunteerId']), 'from_notification' => true]) }}" tabindex="0" class="navigable flex w-full">
                    <div class="notifyimg bg-pink inline-block mr-3">
                        <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path fill="#0091ff" d="M505 174.8l-39.6-39.6c-9.4-9.4-24.6-9.4-33.9 0L192 374.7 80.6 263.2c-9.4-9.4-24.6-9.4-33.9 0L7 302.9c-9.4 9.4-9.4 24.6 0 34L175 505c9.4 9.4 24.6 9.4 33.9 0l296-296.2c9.4-9.5 9.4-24.7 .1-34zm-324.3 106c6.2 6.3 16.4 6.3 22.6 0l208-208.2c6.2-6.3 6.2-16.4 0-22.6L366.1 4.7c-6.2-6.3-16.4-6.3-22.6 0L192 156.2l-55.4-55.5c-6.2-6.3-16.4-6.3-22.6 0L68.7 146c-6.2 6.3-6.2 16.4 0 22.6l112 112.2z"/>
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
    <a href="{{ route('blinds.profile') }}" tabindex="0" class="navigable block py-2 px-3 text-customGreen bg-customGreen rounded md:bg-transparent md:text-customGreen md:p-0 dark:text-white md:dark:text-customGreen" aria-current="page">{{ Auth::user()->name }}</a>
    </li>
                  @endauth

             
            </ul>
          </div>
      </div>
    </div>
  </nav>

