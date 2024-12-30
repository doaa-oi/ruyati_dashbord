@extends('layoutv.master')

@section('contant')

<div class="container flex flex-col md:flex-row justify-between items-center pt-8 px-3">
    <h1 class="text-xl font-bold mb-4 md:mb-0 pt-3">طلبات المساعدة</h1>
    <h1 class="text-xl text-customGreen font-bold mb-4 md:mb-0 pt-3"> @yield('type')</h1>

    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 gap-5 ml-5">
        <a href="{{ route('help.requests.pending') }}" class="items-center px-8 py-3 text-sm font-bold text-center {{ Request::is('help-requests/pending') ? 'text-white bg-customGreen' : 'text-customGreen bg-none' }} border-2 border-customGreen rounded-lg hover:bg-customGreen hover:text-white focus:ring-4 focus:outline-none focus:ring-customGreen">
            كل الطلبات
        </a>

        <a href="{{ route('help.requests.in.progress') }}" class="items-center px-10 py-3 text-sm font-bold text-center text-customGreen bg-none border-2 border-customGreen rounded-lg hover:bg-customGreen hover:text-white focus:ring-4 focus:outline-none focus:ring-customGreen dark:bg-customGreen dark:hover:bg-customGreen dark:focus:ring-customGreen {{ Request::is('help-requests/in-progress') ? 'text-white bg-customGreen' : 'text-customGreen bg-none' }}">
            طلباتي
        </a>
    </div>

</div>


<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-8 py-8 md:py-8">
  @yield('posts')
</div>


@endsection
