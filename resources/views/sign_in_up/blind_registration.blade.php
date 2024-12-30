@extends('sign_in_up.master')

@section('title')

إنشاء حساب
@endsection

@section('title2')

<h1 class="text-center mb-16 text-3xl font-bold text-green-500"><span class="text-black">انشىء</span> حسابك الآن</h1>

@endsection

 @section('form')







 <form id="multiStepForm" action="{{ route('blind.store') }}" method="POST">
    @csrf

    <div  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-x-16 justify-items-center">


    <!-- إضافة حقل مخفي لتمرير نوع المستخدم -->
    <input type="hidden" name="user_type" value="blind">

      <div class="">
        <label for="name" class=" text-sm font-medium text-gray-700"> الاسم بالكامل</label><br>
        <input
          type="text"
          id="name"
          name="name"
          class="text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder="أدخل الاسم بالكامل"
           />
           @error('name')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>

       <div class="">
        <label for="email" class=" text-sm font-medium text-gray-700"> البريد الإلكتروني </label><br>
        <input
          type="email"
          id="email"
          name="email"
          class="text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder="البريد الإلكتروني"
           />
           @error('email')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="age" class=" text-sm font-medium text-gray-700"> العمر </label><br>
        <input
          type="text"
          id="age"
          name="age"
          class="text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" العمر "
           />
           @error('age')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="city" class=" text-sm font-medium text-gray-700"> المدينة </label><br>
        <input
          type="text"
          id="city"
          name="city"
          class="text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" المدينة "
           />
           @error('city')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="name" class=" text-sm font-medium text-gray-700"> رقم الهاتف </label><br>
        <input
          type="text"
          id="phone"
          name="phone"
          class="text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" رقم الهاتف "
           />
           @error('phone')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>

      <div>
        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 ">الجنس</label>
        <select  id="gender" name="gender" class="bg-green-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block h-11 w-56 p-2.5 " >
          <option value="" selected disabled>اختر الجنس </option>
          <option value="ذكر">ذكر</option>
          <option value="انثى">انثى</option>
        </select>
        @error('gender')
        <p class="" style="color: red">{{ $message }}</p>
        @enderror
    </div>

       <div class="">
        <label for="password" class=" text-sm font-medium text-gray-700"> كلمة المرور </label><br>
        <input
          type="password"
          id="password"
          name="password"
          class="text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" *********  "
           />
           @error('password')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="password_confirmation" class=" text-sm font-medium text-gray-700"> تأكيد كلمة المرور </label><br>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          class="text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" *********"
           />
           @error('password_confirmation')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>


      {{-- <div class="col-span-2 ">
        <label for="location" class=" text-sm font-medium text-gray-700" >الموقع</label><br>
            <button id="locationBtn" type="button" class="inline-block shrink-0  border border-green-700 bg-green-600  text-l font-medium text-white transition hover:bg-transparent hover:text-green-500 focus:outline-none focus:ring active:text-green-500 py-2 px-4 rounded-lg h-11 mt-2">
        تحديد موقعي
    </button>
    <input type="text" id="locationField" name="location" class="text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm  mr-8" readonly>
</div> --}}
    </div>



<div class="grid grid-cols-1 gap-y-4 justify-items-center mt-16">



    <div>
            <button
            class="inline-block shrink-0 rounded-md border border-green-700 bg-green-600 px-12 py-3 text-l font-medium text-white transition hover:bg-transparent hover:text-green-500 focus:outline-none focus:ring active:text-green-500 h-12 w-80">
            حفظ
        </button>
    </div>

    <div>
    <p class="mt-4 text-sm text-gray-500 sm:mt-0">
        هل لديك حساب بالفعل؟
        <a href="/login" class="text-green-500 underline">تسجيل الدخول</a>
    </p>
    </div>

</div>


  </form>

  <script src="{{ asset('js/gps.js') }}"></script>


@endsection
