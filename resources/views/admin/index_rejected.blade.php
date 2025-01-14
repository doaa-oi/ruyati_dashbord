@extends('admin.master')

@section('contant')

<div class="container flex flex-col md:flex-row justify-between items-center pt-8 px-3">
    <h1 class="text-xl font-bold mb-4 md:mb-0 pt-3">  @yield('type')المحذوفون </h1>
    {{-- <h1 class="text-xl text-customGreen font-bold mb-4 md:mb-0 pt-3"></h1> --}}


    <div class="justify-items-center ">

@yield('search')

</div>



    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 gap-5 ml-5">
        <a href="{{ route('show.volunteers.rejected') }}" class="items-center px-8 py-3 text-sm font-bold text-center {{ Request::is('volunteers/rejected') ? 'text-white bg-customGreen' : 'text-customGreen bg-none' }} border-2 border-customGreen rounded-lg hover:bg-customGreen hover:text-white focus:ring-4 focus:outline-none focus:ring-customGreen">
المتطوعين
        </a>

        <a href="{{ route('show.blinds.rejected') }}" class="items-center px-10 py-3 text-sm font-bold text-center text-customGreen bg-none border-2 border-customGreen rounded-lg hover:bg-customGreen hover:text-white focus:ring-4 focus:outline-none focus:ring-customGreen dark:bg-customGreen dark:hover:bg-customGreen dark:focus:ring-customGreen {{ Request::is('blinds/rejected') ? 'text-white bg-customGreen' : 'text-customGreen bg-none' }}">
الكفيفين
        </a>
    </div>

</div>


<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-8 py-8 md:py-8">
  @yield('users')
</div>






@endsection
