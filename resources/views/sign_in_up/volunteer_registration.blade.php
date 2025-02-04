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
          value="{{ old('name') }}"
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
          value="{{ old('email') }}"
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
          value="{{ old('age') }}"
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
          value="{{ old('city') }}"
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
          value="{{ old('phone') }}"
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
          value="{{ old('national_id') }}"
          class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
          placeholder=" الرقم الوطني "
           />
           @error('national_id')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>

       <div class="">
        <label for="password" class=" text-sm font-medium text-gray-700"> كلمة المرور </label><br>
        <input
          type="password"
          id="password"
          name="password"
          value="{{ old('password') }}"
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
          value="{{ old('password_confirmation') }}"
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
            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>اختر الجنس</option>
            <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
            <option value="أنثى" {{ old('gender') == 'أنثى' ? 'selected' : '' }}>أنثى</option>
        </select>
        @error('gender')
        <p class="" style="color: red">{{ $message }}</p>
        @enderror
    </div>

      <div>
        <label for="assistance_type" class="block mb-2 text-sm font-medium text-gray-900 ">نوع المساعدة</label>
        <select  id="assistance_type" name="assistance_type" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-customGreen block  p-2.5 h-11 w-64">
            <option value="" disabled {{ old('assistance_type') ? '' : 'selected' }}>اختر نوع المساعدة</option>
            <option value="التعليم" {{ old('assistance_type') == 'التعليم' ? 'selected' : '' }}>التعليم</option>
            <option value="القراءة" {{ old('assistance_type') == 'القراءة' ? 'selected' : '' }}>القراءة</option>
            <option value="التوجيه الصوتي" {{ old('assistance_type') == 'التوجيه الصوتي' ? 'selected' : '' }}>التوجيه الصوتي</option>
            <option value="التدريب" {{ old('assistance_type') == 'التدريب' ? 'selected' : '' }}>التدريب</option>
            <option value="الترجمة" {{ old('assistance_type') == 'الترجمة' ? 'selected' : '' }}>الترجمة</option>
            <option value="الدعم النفسي" {{ old('assistance_type') == 'الدعم النفسي' ? 'selected' : '' }}>الدعم النفسي</option>
            <option value="الرياضة" {{ old('assistance_type') == 'الرياضة' ? 'selected' : '' }}>الرياضة</option>
            <option value="الترفيه" {{ old('assistance_type') == 'الترفيه' ? 'selected' : '' }}>الترفيه</option>
            <option value="الصحة" {{ old('assistance_type') == 'الصحة' ? 'selected' : '' }}>الصحة</option>
            <option value="القانون" {{ old('assistance_type') == 'القانون' ? 'selected' : '' }}>القانون</option>
            <option value="العلاج الطبيعي" {{ old('assistance_type') == 'العلاج الطبيعي' ? 'selected' : '' }}>العلاج الطبيعي</option>
            <option value="تقنية المعلومات" {{ old('assistance_type') == 'تقنية المعلومات' ? 'selected' : '' }}>تقنية المعلومات</option>
            <option value="التنقل" {{ old('assistance_type') == 'التنقل' ? 'selected' : '' }}>التنقل</option>
            <option value="الدعم التقني" {{ old('assistance_type') == 'الدعم التقني' ? 'selected' : '' }}>الدعم التقني</option>
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
                    <input type="checkbox" name="available_days[]" value="السبت" class="form-checkbox h-5 w-5 text-green-500" {{ (is_array(old('available_days')) && in_array('السبت', old('available_days'))) ? 'checked' : '' }}>
                    <span class="ml-2">السبت</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الأحد" class="form-checkbox h-5 w-5 text-green-500" {{ (is_array(old('available_days')) && in_array('الأحد', old('available_days'))) ? 'checked' : '' }}>
                    <span class="ml-2">الأحد</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الإثنين" class="form-checkbox h-5 w-5 text-green-500" {{ (is_array(old('available_days')) && in_array('الإثنين', old('available_days'))) ? 'checked' : '' }}>
                    <span class="ml-2">الإثنين</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الثلاثاء" class="form-checkbox h-5 w-5 text-green-500" {{ (is_array(old('available_days')) && in_array('الثلاثاء', old('available_days'))) ? 'checked' : '' }}>
                    <span class="ml-2">الثلاثاء</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الأربعاء" class="form-checkbox h-5 w-5 text-green-500" {{ (is_array(old('available_days')) && in_array('الأربعاء', old('available_days'))) ? 'checked' : '' }}>
                    <span class="ml-2">الأربعاء</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الخميس" class="form-checkbox h-5 w-5 text-green-500" {{ (is_array(old('available_days')) && in_array('الخميس', old('available_days'))) ? 'checked' : '' }}>
                    <span class="ml-2">الخميس</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="available_days[]" value="الجمعة" class="form-checkbox h-5 w-5 text-green-500" {{ (is_array(old('available_days')) && in_array('الجمعة', old('available_days'))) ? 'checked' : '' }}>
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
            <option value="" disabled {{ old('available_from') == null ? 'selected' : '' }}>اختر الساعة</option>
            <option value="07:00" {{ old('available_from') == '07:00' ? 'selected' : '' }}>07:00</option>
            <option value="08:00" {{ old('available_from') == '08:00' ? 'selected' : '' }}>08:00</option>
            <option value="09:00" {{ old('available_from') == '09:00' ? 'selected' : '' }}>09:00</option>
            <option value="10:00" {{ old('available_from') == '10:00' ? 'selected' : '' }}>10:00</option>
            <option value="11:00" {{ old('available_from') == '11:00' ? 'selected' : '' }}>11:00</option>
            <option value="12:00" {{ old('available_from') == '12:00' ? 'selected' : '' }}>12:00</option>
            <option value="13:00" {{ old('available_from') == '13:00' ? 'selected' : '' }}>13:00</option>
            <option value="14:00" {{ old('available_from') == '14:00' ? 'selected' : '' }}>14:00</option>
            <option value="16:00" {{ old('available_from') == '16:00' ? 'selected' : '' }}>16:00</option>
            <option value="17:00" {{ old('available_from') == '17:00' ? 'selected' : '' }}>17:00</option>
            <option value="18:00" {{ old('available_from') == '18:00' ? 'selected' : '' }}>18:00</option>
            <option value="19:00" {{ old('available_from') == '19:00' ? 'selected' : '' }}>19:00</option>
            <option value="20:00" {{ old('available_from') == '20:00' ? 'selected' : '' }}>20:00</option>
            <option value="21:00" {{ old('available_from') == '21:00' ? 'selected' : '' }}>21:00</option>
            <option value="22:00" {{ old('available_from') == '22:00' ? 'selected' : '' }}>22:00</option>
            <option value="23:00" {{ old('available_from') == '23:00' ? 'selected' : '' }}>23:00</option>
            <option value="00:00" {{ old('available_from') == '00:00' ? 'selected' : '' }}>00:00</option>
            <option value="01:00" {{ old('available_from') == '01:00' ? 'selected' : '' }}>01:00</option>
            <option value="02:00" {{ old('available_from') == '02:00' ? 'selected' : '' }}>02:00</option>
            <option value="03:00" {{ old('available_from') == '03:00' ? 'selected' : '' }}>03:00</option>
            <option value="05:00" {{ old('available_from') == '05:00' ? 'selected' : '' }}>05:00</option>
            <option value="06:00" {{ old('available_from') == '06:00' ? 'selected' : '' }}>06:00</option>
        </select>
        @error('available_from')
        <p class="" style="color: red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="available_to" class="block mb-2 text-sm font-medium text-gray-900 "> إلى :</label>
        <select  id="available_to" name="available_to" class="bg-green-50 border border-customGreen text-gray-900 text-sm rounded-lg focus:ring-customGreen focus:border-customGreen block w-full p-2.5 h-11" >
            <option value="" disabled {{ old('available_to') == null ? 'selected' : '' }}>اختر الساعة</option>
            <option value="07:00" {{ old('available_to') == '07:00' ? 'selected' : '' }}>07:00</option>
            <option value="08:00" {{ old('available_to') == '08:00' ? 'selected' : '' }}>08:00</option>
            <option value="09:00" {{ old('available_to') == '09:00' ? 'selected' : '' }}>09:00</option>
            <option value="10:00" {{ old('available_to') == '10:00' ? 'selected' : '' }}>10:00</option>
            <option value="11:00" {{ old('available_to') == '11:00' ? 'selected' : '' }}>11:00</option>
            <option value="12:00" {{ old('available_to') == '12:00' ? 'selected' : '' }}>12:00</option>
            <option value="13:00" {{ old('available_to') == '13:00' ? 'selected' : '' }}>13:00</option>
            <option value="14:00" {{ old('available_to') == '14:00' ? 'selected' : '' }}>14:00</option>
            <option value="16:00" {{ old('available_to') == '16:00' ? 'selected' : '' }}>16:00</option>
            <option value="17:00" {{ old('available_to') == '17:00' ? 'selected' : '' }}>17:00</option>
            <option value="18:00" {{ old('available_to') == '18:00' ? 'selected' : '' }}>18:00</option>
            <option value="19:00" {{ old('available_to') == '19:00' ? 'selected' : '' }}>19:00</option>
            <option value="20:00" {{ old('available_to') == '20:00' ? 'selected' : '' }}>20:00</option>
            <option value="21:00" {{ old('available_to') == '21:00' ? 'selected' : '' }}>21:00</option>
            <option value="22:00" {{ old('available_to') == '22:00' ? 'selected' : '' }}>22:00</option>
            <option value="23:00" {{ old('available_to') == '23:00' ? 'selected' : '' }}>23:00</option>
            <option value="00:00" {{ old('available_to') == '00:00' ? 'selected' : '' }}>00:00</option>
            <option value="01:00" {{ old('available_to') == '01:00' ? 'selected' : '' }}>01:00</option>
            <option value="02:00" {{ old('available_to') == '02:00' ? 'selected' : '' }}>02:00</option>
            <option value="03:00" {{ old('available_to') == '03:00' ? 'selected' : '' }}>03:00</option>
            <option value="05:00" {{ old('available_to') == '05:00' ? 'selected' : '' }}>05:00</option>
            <option value="06:00" {{ old('available_to') == '06:00' ? 'selected' : '' }}>06:00</option>
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
