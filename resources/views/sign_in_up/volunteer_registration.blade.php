@extends('sign_in_up.master')

@section('title')

إنشاء حساب
@endsection

@section('title2')

<h1 class="text-center mb-16 text-3xl font-bold text-customGreen"><span class="text-black">انشىء</span> حسابك الآن</h1>

@endsection

 @section('form')







 <form id="multiStepForm" action="{{ route('volunteer.store') }}" method="POST">
    @csrf

    <div id="step1" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-x-16 justify-items-center">

    <!-- إضافة حقل مخفي لتمرير نوع المستخدم -->
    <input type="hidden" name="user_type" value="volunteer">

      <div class="">
        <label for="name" class=" text-sm font-medium text-gray-700"> الاسم بالكامل</label><br>
        <input
          type="text"
          id="name"
          name="name"
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
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
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
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
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
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
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
          placeholder=" المدينة "
           />
           @error('city')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
        </div>

       <div class="">
        <label for="phone" class=" text-sm font-medium text-gray-700"> رقم الهاتف </label><br>
        <input
          type="text"
          id="phone"
          name="phone"
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
          placeholder=" رقم الهاتف "
           />
           @error('phone')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>

       <div class="">
        <label for="national_id" class=" text-sm font-medium text-gray-700"> الرقم الوطني </label><br>
        <input
          type="text"
          id="national_id"
          name="national_id"
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
          placeholder=" الرقم الوطني "
           />
      </div>

       <div class="">
        <label for="password" class=" text-sm font-medium text-gray-700"> كلمة المرور </label><br>
        <input
          type="password"
          id="password"
          name="password"
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
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
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
          placeholder=" *********"
           />
           @error('password_confirmation')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
        </div>

      <div>
        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 ">الجنس</label>
        <select  id="gender" name="gender" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-customGreen block h-11 w-64 p-2.5 " >
          <option value="" selected disabled>اختر الجنس </option>
          <option value="ذكر">ذكر</option>
          <option value="أنثى">أنثى</option>
        </select>
        @error('gender')
        <p class="" style="color: red">{{ $message }}</p>
        @enderror
    </div>

      <div>
        <label for="assistance_type" class="block mb-2 text-sm font-medium text-gray-900 ">نوع المساعدة</label>
        <select  id="assistance_type" name="assistance_type" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-customGreen block  p-2.5 h-11 w-64">
            <option value="" selected disabled>اختر نوع المساعدة</option>
            <option value="القراءة والكتابة" class=" hover:bg-customGreen">القراءة والكتابة</option>
            <option value="التنقل">التنقل</option>
          <option value="التكنولوجيا">التكنولوجيا</option>
          <option value="الرياضة والترفيه">الرياضة والترفيه</option>
          <option value="التعليم والتدريب">التعليم والتدريب</option>
          <option value="الصحة">الصحة</option>
          <option value="الترجمة والتفسير">الترجمة والتفسير</option>
          <option value="تنظيم فعاليات">تنظيم فعاليات</option>
          <option value="دعم نفسي">دعم نفسي</option>
        </select>
        @error('assistance_type')
        <p class="" style="color: red">{{ $message }}</p>
        @enderror
    </div>

</div>

    <h1 class="mt-6 text-l font-bold text-customGreen">مواعيد تقديم المساعدة</h1>

    <div class="grid grid-cols-2 gap-x-10 mt-6">
        <div class="">
            <!-- Checkbox لتحديد الأيام -->
            <h2 class="text-sm font-medium text-gray-700 mt-4 mb-2">اختر الأيام:</h2>
            <div class="grid grid-cols-2 gap-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="السبت" class="form-checkbox h-5 w-5 text-green-500">
                    <span class="ml-2">السبت</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الأحد" class="form-checkbox h-5 w-5 text-green-500">
                    <span class="ml-2">الأحد</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الأثنين" class="form-checkbox h-5 w-5 text-green-500">
                    <span class="ml-2">الأثنين</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الثلاثاء" class="form-checkbox h-5 w-5 text-green-500">
                    <span class="ml-2">الثلاثاء</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الأربعاء" class="form-checkbox h-5 w-5 text-green-500">
                    <span class="ml-2">الأربعاء</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الخميس" class="form-checkbox h-5 w-5 text-green-500">
                    <span class="ml-2">الخميس</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الجمعة" class="form-checkbox h-5 w-5 text-green-500">
                    <span class="ml-2">الجمعة</span>
                </label>

            </div>
            @if ($errors->has('available_days'))
            <p style="color: red">{{ $errors->first('available_days') }}</p>
        @endif
        </div>
<div></div>





    <div>
        <label for="available_from" class="block mb-2 text-sm font-medium text-gray-900 "> من :</label>
        <select  id="available_from" name="available_from" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-green-500 block w-full p-2.5 h-11" >
          <option value="" selected disabled>اختر الساعة</option>
          <option value="07:00">07:00</option>
          <option value="08:00">08:00</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="00:00">00:00</option>
          <option value="01:00">01:00</option>
          <option value="02:00">02:00</option>
          <option value="03:00">03:00</option>
          <option value="05:00">05:00</option>
          <option value="06:00">06:00</option>
        </select>
        @error('available_from')
        <p class="" style="color: red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="available_to" class="block mb-2 text-sm font-medium text-gray-900 "> إلى :</label>
        <select  id="available_to" name="available_to" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-customGreen block w-full p-2.5 h-11" >
          <option value="" selected disabled>اختر الساعة</option>
          <option value="07:00">07:00</option>
          <option value="08:00">08:00</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="00:00">00:00</option>
          <option value="01:00">01:00</option>
          <option value="02:00">02:00</option>
          <option value="03:00">03:00</option>
          <option value="05:00">05:00</option>
          <option value="06:00">06:00</option>
        </select>
        @error('available_to')
        <p class="" style="color: red">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 gap-x-10 justify-items-center mt-14">
    <button
    class="inline-block shrink-0 rounded-md border border-customGreen bg-customGreen px-12 py-3 text-l font-medium text-white transition hover:bg-transparent hover:text-customGreen focus:outline-none focus:ring active:text-customGreen h-12 w-80">
    حفظ
  </button><br>
  <p class="mt-4 text-sm text-gray-500 sm:mt-0">
    هل لديك حساب بالفعل؟
    <a href="/login" class="text-customGreen underline">تسجيل الدخول</a>
  </p>
</div>





  </form>

@endsection
