<nav class="h-16 fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3 mt-2">
        <div class="flex items-center justify-between">

            <div class="flex items-center justify-start rtl:justify-end">
                <a href="http://127.0.0.1:8000/" class="flex ms-2 md:me-24">
                    <img src="{{ asset('images/logonon.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">رؤيتي</span>
                </a>
            </div>

            <div class="flex gap-10">
                <h1 onmouseover="changeColor('1')" class="flex-none font-bold hover:text-customGreen hover:underline cursor-pointer transition-colors">الرئيسية</h1>
                <h1 onmouseover="changeColor('2')" class="flex-initial font-bold hover:text-customGreen hover:underline cursor-pointer transition-colors">نبذة عنا</h1>
                <h1 onmouseover="changeColor('3')" class="flex-initial font-bold hover:text-customGreen hover:underline cursor-pointer transition-colors">تواصل معنا</h1>
            </div>

            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div class="flex gap-x-7 ml-5">
                        @auth
                            <span class="text-customGreen text-l"> {{ auth()->user()->name }}</span>
                            <a href="{{ route('logout') }}" tabindex="0" class="navigable flex-none text-customGreen text-l"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" tabindex="0" class="navigable flex-none text-customGreen text-l">تسجيل الدخول</a>
                            <a href="/select" tabindex="0" class="navigable flex-initial text-customGreen text-l">التسجيل</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


<script>
    function changeColor(elementId) {
        // التمرير إلى العنصر المحدد
        let targetElement = document.getElementById(elementId);
        targetElement.scrollIntoView({ behavior: 'smooth' });
    }
</script>
