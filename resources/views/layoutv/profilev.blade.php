@extends('layoutv.master')

@section('contant')

<div class=" bg-white p-14  text-start rounded-3xl mx-36 my-28">

    <h2 class="col-span-2 text-xl font-bold mb-2 text-start  pb-8 ">معلومات حسابي</h2>



    <form action="{{ route('volunteer.profile.update') }}" method="POST">
        @csrf
        @method('PUT') <!-- يستخدم لتحديد عملية التحديث -->


        <div  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2  justify-items-center">

 <!-- إضافة حقل مخفي لتمرير نوع المستخدم -->
 <input type="hidden" name="user_type" value="volunteer">
 <input type="hidden" name="id" value="{{ $volunteer->id }}">

 <div class="">
   <label for="name" class=" text-sm font-medium text-gray-700"> الاسم بالكامل</label><br>
   <input
   value="{{ $volunteer->name }}"
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
     value="{{ $volunteer->email }}"
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
     value="{{ $volunteer->age }}"
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
   value="{{ $volunteer->city }}"
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
   value="{{ $volunteer->phone }}"
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
   value="{{ $volunteer->national_id }}"
     type="text"
     id="national_id"
     name="national_id"
     class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
     placeholder=" الرقم الوطني "
      />
 </div>

  {{-- <div class="">
   <label for="password" class=" text-sm font-medium text-gray-700"> كلمة المرور </label><br>
   <input
   value="{{ $volunteer->password }}"

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
   </div> --}}

 <div>
   <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 ">الجنس</label>
   <select id="gender" name="gender" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-customGreen block h-11 w-64 p-2.5">
    <option value="" disabled>اختر الجنس</option>
    <option value="ذكر" {{ $volunteer->gender == 'ذكر' ? 'selected' : '' }}>ذكر</option>
    <option value="انثى" {{ $volunteer->gender == 'انثى' ? 'selected' : '' }}>انثى</option>
</select>
   @error('gender')
   <p class="" style="color: red">{{ $message }}</p>
   @enderror
</div>

 <div>
   <label for="assistance_type" class="block mb-2 text-sm font-medium text-gray-900 ">نوع المساعدة</label>
   <select id="assistance_type" name="assistance_type" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-customGreen block p-2.5 h-11 w-64">
    <option value="" disabled>اختر نوع المساعدة</option>
    <option value="القراءة والكتابة" {{ $volunteer->assistance_type == 'القراءة والكتابة' ? 'selected' : '' }}>القراءة والكتابة</option>
    <option value="التنقل" {{ $volunteer->assistance_type == 'التنقل' ? 'selected' : '' }}>التنقل</option>
    <option value="التكنولوجيا" {{ $volunteer->assistance_type == 'التكنولوجيا' ? 'selected' : '' }}>التكنولوجيا</option>
    <option value="الرياضة والترفيه" {{ $volunteer->assistance_type == 'الرياضة والترفيه' ? 'selected' : '' }}>الرياضة والترفيه</option>
    <option value="التعليم والتدريب" {{ $volunteer->assistance_type == 'التعليم والتدريب' ? 'selected' : '' }}>التعليم والتدريب</option>
    <option value="الصحة" {{ $volunteer->assistance_type == 'الصحة' ? 'selected' : '' }}>الصحة</option>
    <option value="الترجمة والتفسير" {{ $volunteer->assistance_type == 'الترجمة والتفسير' ? 'selected' : '' }}>الترجمة والتفسير</option>
    <option value="تنظيم فعاليات" {{ $volunteer->assistance_type == 'تنظيم فعاليات' ? 'selected' : '' }}>تنظيم فعاليات</option>
    <option value="دعم نفسي" {{ $volunteer->assistance_type == 'دعم نفسي' ? 'selected' : '' }}>دعم نفسي</option>
</select>
   @error('assistance_type')
   <p class="" style="color: red">{{ $message }}</p>
   @enderror
</div>

</div>

<h1 class="mt-8 mx-16 text-l font-bold text-customGreen">مواعيد تقديم المساعدة</h1>

<div class="grid grid-cols-2 gap-x-10 mt-6 mx-20">
   <div class="">
       <!-- Checkbox لتحديد الأيام -->
       <h2 class="text-sm font-medium text-gray-700 mt-4 mb-2">اختر الأيام:</h2>
       <div class="grid grid-cols-2 gap-4">
           <label class="inline-flex items-center">
            <input type="checkbox" name="available_days[]" value="السبت" class="form-checkbox h-5 w-5 text-green-500" {{ in_array('السبت', $volunteer->available_days) ? 'checked' : '' }}>
            <span class="ml-2">السبت</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="available_days[]" value="الأحد" class="form-checkbox h-5 w-5 text-green-500" {{ in_array('الأحد', $volunteer->available_days) ? 'checked' : '' }}>
            <span class="ml-2">الأحد</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="available_days[]" value="الأثنين" class="form-checkbox h-5 w-5 text-green-500" {{ in_array('الأثنين', $volunteer->available_days) ? 'checked' : '' }}>
            <span class="ml-2">الأثنين</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="available_days[]" value="الثلاثاء" class="form-checkbox h-5 w-5 text-green-500" {{ in_array('الثلاثاء', $volunteer->available_days) ? 'checked' : '' }}>
            <span class="ml-2">الثلاثاء</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="available_days[]" value="الأربعاء" class="form-checkbox h-5 w-5 text-green-500" {{ in_array('الأربعاء', $volunteer->available_days) ? 'checked' : '' }}>
            <span class="ml-2">الأربعاء</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="available_days[]" value="الخميس" class="form-checkbox h-5 w-5 text-green-500" {{ in_array('الخميس', $volunteer->available_days) ? 'checked' : '' }}>
            <span class="ml-2">الخميس</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="available_days[]" value="الجمعة" class="form-checkbox h-5 w-5 text-green-500" {{ in_array('الجمعة', $volunteer->available_days) ? 'checked' : '' }}>
            <span class="ml-2">الجمعة</span>
           </label>

       </div>
       @if ($errors->has('available_days'))
       <p style="color: red">{{ $errors->first('available_days') }}</p>
   @endif
   </div>
<div></div>





<div class="mt-8">
   <label for="available_from" class="block mb-2 text-sm font-medium text-gray-900 "> من :</label>
   <select id="available_from" name="available_from" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-green-500 block w-full p-2.5 h-11">
    <option value="" disabled>اختر الساعة</option>
    <option value="07:00" {{ $volunteer->available_from == '07:00' ? 'selected' : '' }}>07:00</option>
    <option value="08:00" {{ $volunteer->available_from == '08:00' ? 'selected' : '' }}>08:00</option>
    <option value="09:00" {{ $volunteer->available_from == '09:00' ? 'selected' : '' }}>09:00</option>
    <option value="10:00" {{ $volunteer->available_from == '10:00' ? 'selected' : '' }}>10:00</option>
    <option value="11:00" {{ $volunteer->available_from == '11:00' ? 'selected' : '' }}>11:00</option>
    <option value="12:00" {{ $volunteer->available_from == '12:00' ? 'selected' : '' }}>12:00</option>
    <option value="13:00" {{ $volunteer->available_from == '13:00' ? 'selected' : '' }}>13:00</option>
    <option value="14:00" {{ $volunteer->available_from == '14:00' ? 'selected' : '' }}>14:00</option>
    <option value="16:00" {{ $volunteer->available_from == '16:00' ? 'selected' : '' }}>16:00</option>
    <option value="17:00" {{ $volunteer->available_from == '17:00' ? 'selected' : '' }}>17:00</option>
    <option value="18:00" {{ $volunteer->available_from == '18:00' ? 'selected' : '' }}>18:00</option>
    <option value="19:00" {{ $volunteer->available_from == '19:00' ? 'selected' : '' }}>19:00</option>
    <option value="20:00" {{ $volunteer->available_from == '20:00' ? 'selected' : '' }}>20:00</option>
    <option value="21:00" {{ $volunteer->available_from == '21:00' ? 'selected' : '' }}>21:00</option>
    <option value="22:00" {{ $volunteer->available_from == '22:00' ? 'selected' : '' }}>22:00</option>
    <option value="23:00" {{ $volunteer->available_from == '23:00' ? 'selected' : '' }}>23:00</option>
    <option value="00:00" {{ $volunteer->available_from == '00:00' ? 'selected' : '' }}>00:00</option>
    <option value="01:00" {{ $volunteer->available_from == '01:00' ? 'selected' : '' }}>01:00</option>
    <option value="02:00" {{ $volunteer->available_from == '02:00' ? 'selected' : '' }}>02:00</option>
    <option value="03:00" {{ $volunteer->available_from == '03:00' ? 'selected' : '' }}>03:00</option>
    <option value="05:00" {{ $volunteer->available_from == '05:00' ? 'selected' : '' }}>05:00</option>
    <option value="06:00" {{ $volunteer->available_from == '06:00' ? 'selected' : '' }}>06:00</option>
</select>
   @error('available_from')
   <p class="" style="color: red">{{ $message }}</p>
   @enderror
</div>

<div class="mt-8">
   <label for="available_to" class="block mb-2 text-sm font-medium text-gray-900 "> إلى :</label>
   <select  id="available_to" name="available_to" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-customGreen block w-full p-2.5 h-11" >
        <option value="" disabled>اختر الساعة</option>
        <option value="07:00" {{ $volunteer->available_to == '07:00' ? 'selected' : '' }}>07:00</option>
        <option value="08:00" {{ $volunteer->available_to == '08:00' ? 'selected' : '' }}>08:00</option>
        <option value="09:00" {{ $volunteer->available_to == '09:00' ? 'selected' : '' }}>09:00</option>
        <option value="10:00" {{ $volunteer->available_to == '10:00' ? 'selected' : '' }}>10:00</option>
        <option value="11:00" {{ $volunteer->available_to == '11:00' ? 'selected' : '' }}>11:00</option>
        <option value="12:00" {{ $volunteer->available_to == '12:00' ? 'selected' : '' }}>12:00</option>
        <option value="13:00" {{ $volunteer->available_to == '13:00' ? 'selected' : '' }}>13:00</option>
        <option value="14:00" {{ $volunteer->available_to == '14:00' ? 'selected' : '' }}>14:00</option>
        <option value="16:00" {{ $volunteer->available_to == '16:00' ? 'selected' : '' }}>16:00</option>
        <option value="17:00" {{ $volunteer->available_to == '17:00' ? 'selected' : '' }}>17:00</option>
        <option value="18:00" {{ $volunteer->available_to == '18:00' ? 'selected' : '' }}>18:00</option>
        <option value="19:00" {{ $volunteer->available_to == '19:00' ? 'selected' : '' }}>19:00</option>
        <option value="20:00" {{ $volunteer->available_to == '20:00' ? 'selected' : '' }}>20:00</option>
        <option value="21:00" {{ $volunteer->available_to == '21:00' ? 'selected' : '' }}>21:00</option>
        <option value="22:00" {{ $volunteer->available_to == '22:00' ? 'selected' : '' }}>22:00</option>
        <option value="23:00" {{ $volunteer->available_to == '23:00' ? 'selected' : '' }}>23:00</option>
        <option value="00:00" {{ $volunteer->available_to == '00:00' ? 'selected' : '' }}>00:00</option>
        <option value="01:00" {{ $volunteer->available_to == '01:00' ? 'selected' : '' }}>01:00</option>
        <option value="02:00" {{ $volunteer->available_to == '02:00' ? 'selected' : '' }}>02:00</option>
        <option value="03:00" {{ $volunteer->available_to == '03:00' ? 'selected' : '' }}>03:00</option>
        <option value="05:00" {{ $volunteer->available_to == '05:00' ? 'selected' : '' }}>05:00</option>
        <option value="06:00" {{ $volunteer->available_to == '06:00' ? 'selected' : '' }}>06:00</option>

   </select>
   @error('available_to')
   <p class="" style="color: red">{{ $message }}</p>
   @enderror
</div>
</div>
<div class="grid grid-cols-1 gap-x-10 justify-items-center mt-14">
    <button
    class="inline-block shrink-0 rounded-md border border-customGreen bg-customGreen px-12 py-3 text-l font-medium text-white transition hover:bg-transparent hover:text-customGreen focus:outline-none focus:ring active:text-customGreen h-12 w-80">
    تعديل
  </button>

</div>





      </form>


<!-- قسم تغيير كلمة المرور -->
<h2 class="col-span-2 text-xl font-bold mb-2 text-start pb-8 mt-14">تغيير كلمة المرور</h2>

<form action="{{ route('volunteer.password.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 justify-items-center">

        <div>
            <label for="current_password" class="text-sm font-medium text-gray-700">كلمة المرور الحالية</label><br>
            <input type="password" id="current_password" name="current_password"
                   class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
                   placeholder="أدخل كلمة المرور الحالية" required />
            @error('current_password')
            <p class="" style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="new_password" class="text-sm font-medium text-gray-700">كلمة المرور الجديدة</label><br>
            <input type="password" id="new_password" name="new_password"
                   class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
                   placeholder="أدخل كلمة المرور الجديدة" required />
            @error('new_password')
            <p class="" style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="new_password_confirmation" class="text-sm font-medium text-gray-700">تأكيد كلمة المرور الجديدة</label><br>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                   class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
                   placeholder="تأكيد كلمة المرور الجديدة" required />
            @error('new_password_confirmation')
            <p class="" style="color: red">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="grid grid-cols-1 gap-x-10 justify-items-center mt-14">
        <button class="inline-block shrink-0 rounded-md border border-customGreen bg-customGreen px-12 py-3 text-l font-medium text-white transition hover:bg-transparent hover:text-customGreen focus:outline-none focus:ring active:text-customGreen h-12 w-80">
            تعديل كلمة المرور
        </button>
    </div>
</form>


    </div>

  <script src="{{ asset('js/gps.js') }}"></script>


@endsection


