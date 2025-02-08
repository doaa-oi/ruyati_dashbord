@extends('sign_in_up.master')

@section('title')

إنشاء حساب
@endsection

@section('title2')

<h1 tabindex="0" class="navigable text-center mb-16 text-3xl font-bold text-green-500"><span class="text-black">انشىء</span> حسابك الآن</h1>

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
          title="الاسم بالكامل"
          value="{{ old('name') }}"
          tabindex="0" class="navigable text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder="أدخل الاسم بالكامل"
           />
           @error('name')
           <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
           @enderror
      </div>

       <div class="">
        <label for="email" class=" text-sm font-medium text-gray-700"> البريد الإلكتروني </label><br>
        <input
          type="email"
          id="email"
          name="email"
          title="البريد الإلكتروني"
          value="{{ old('email') }}"
          tabindex="0" class="navigable text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder="البريد الإلكتروني"
           />
           @error('email')
           <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="age" class=" text-sm font-medium text-gray-700"> العمر </label><br>
        <input
          type="text"
          id="age"
          name="age"
          title=" العمر "
          value="{{ old('age') }}"
          tabindex="0" class="navigable text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" العمر "
           />
           @error('age')
           <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="city" class=" text-sm font-medium text-gray-700"> المدينة </label><br>
        <input
          type="text"
          id="city"
          name="city"
          title=" المدينة "
          value="{{ old('city') }}"
          tabindex="0" class="navigable text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" المدينة "
           />
           @error('city')
           <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="name" class=" text-sm font-medium text-gray-700"> رقم الهاتف </label><br>
        <input
          type="text"
          id="phone"
          name="phone"
          title=" رقم الهاتف "
          value="{{ old('phone') }}"
          tabindex="0" class="navigable text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" رقم الهاتف "
           />
           @error('phone')
           <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
           @enderror
      </div>

      <div>
        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 ">الجنس</label>
        <select  id="gender" name="gender" tabindex="0" class="navigable bg-green-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block h-11 w-56 p-2.5 " >
            <option value="" {{ old('gender') == null ? 'selected' : '' }} disabled>اختر الجنس</option>
            <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }} tabindex="0" class="navigable">ذكر</option>
            <option value="أنثى" {{ old('gender') == 'أنثى' ? 'selected' : '' }} tabindex="0" class="navigable">أنثى</option>
        </select>
        @error('gender')
        <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
        @enderror
    </div>

       <div class="">
        <label for="password" class=" text-sm font-medium text-gray-700"> كلمة المرور </label><br>
        <input
          type="password"
          id="password"
          name="password"
        title="كلمة المرور"
        value="{{ old('password') }}"
         tabindex="0" class="navigable text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" *********  "
           />
           @error('password')
           <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="password_confirmation" class=" text-sm font-medium text-gray-700"> تأكيد كلمة المرور </label><br>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          title="تأكيد كلمة المرور"
          value="old('password_confirmation')"
          tabindex="0" class="navigable text-center bg-green-50 border border-green-500 text-gray-900 h-11 w-56 rounded-lg text-sm mt-2 mb-5"
          placeholder=" *********"
           />
           @error('password_confirmation')
           <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
           @enderror
      </div>


    </div>



<div class="grid grid-cols-1 gap-y-4 justify-items-center mt-16">



    <div>
            <button
            tabindex="0" class="navigable inline-block shrink-0 rounded-md border border-green-700 bg-green-600 px-12 py-3 text-l font-medium text-white transition hover:bg-transparent hover:text-green-500 focus:outline-none focus:ring active:text-green-500 h-12 w-80">
            حفظ
        </button>
    </div>

    <div>
    <p tabindex="0" class="navigable mt-4 text-sm text-gray-500 sm:mt-0">
        هل لديك حساب بالفعل؟
        <a href="/login" tabindex="0" class="navigable text-green-500 underline">تسجيل الدخول</a>
    </p>
    </div>

</div>


  </form>

  <script src="{{ asset('js/gps.js') }}"></script>


@endsection
