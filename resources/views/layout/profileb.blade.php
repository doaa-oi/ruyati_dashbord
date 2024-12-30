 @extends('layout.master')

@section('contant')

<div class=" bg-white p-14  text-start rounded-3xl mx-36 my-28">

    <h2 class="col-span-2 text-xl font-bold mb-2 text-start  pb-8 ">معلومات حسابي</h2>

    <form action="{{ route('blinds.profile.update') }}" method="POST">
        @csrf
        @method('PUT') <!-- يستخدم لتحديد عملية التحديث -->

    <div  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2  justify-items-center">

        <input type="hidden" name="user_type" value="blind">
        <input type="hidden" name="id" value="{{ $blind->id }}">

      <div class="">
        <label for="name" class=" text-sm font-bold text-gray-700"> الاسم بالكامل</label><br>
        <input
          value="{{ $blind->name }}"
          type="text"
          id="name"
          name="name"
          class="text-center border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
          placeholder="أدخل الاسم بالكامل"
           />
           @error('name')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>

       <div class="">
        <label for="email" class=" text-sm font-bold text-gray-700"> البريد الإلكتروني </label><br>
        <input
        value="{{ $blind->email }}"
          type="email"
          id="email"
          name="email"
          class="text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
          placeholder="البريد الإلكتروني"
           />
           @error('email')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="age" class=" text-sm font-bold text-gray-700"> العمر </label><br>
        <input
        value="{{ $blind->age }}"
          type="text"
          id="age"
          name="age"
          class="text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
          placeholder=" العمر "
           />
           @error('age')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="city" class=" text-sm font-bold text-gray-700"> المدينة </label><br>
        <input
         value="{{ $blind->city }}"
          type="text"
          id="city"
          name="city"
          class="text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
          placeholder=" المدينة "
           />
           @error('city')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>
       <div class="">
        <label for="phone" class=" text-sm font-bold text-gray-700"> رقم الهاتف </label><br>
        <input
         value="{{ $blind->phone }}"
          type="text"
          id="phone"
          name="phone"
          class="text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
          placeholder=" رقم الهاتف "
           />
           @error('phone')
           <p class="" style="color: red">{{ $message }}</p>
           @enderror
      </div>

      <div>
        <label for="gender" class="block mb-3 text-sm font-bold text-gray-900 ">الجنس</label>
        <select  id="gender" name="gender" class="border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block h-11 w-80 p-2.5 " >
            <option value="" disabled>اختر الجنس</option>
            <option value="ذكر" {{ $blind->gender == 'ذكر' ? 'selected' : '' }}>ذكر</option>
            <option value="انثى" {{ $blind->gender == 'انثى' ? 'selected' : '' }}>انثى</option>
        </select>
        </select>
        @error('gender')
        <p class="" style="color: red">{{ $message }}</p>
        @enderror
    </div>

       {{-- <div class="">
        <label for="password" class=" text-sm font-bold text-gray-700"> كلمة المرور </label><br>
        <input
          type="password"
          id="password"
          name="password"
          class="text-center border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
          placeholder=" *********  "
           />
      </div>
       <div class="">
        <label for="name" class=" text-sm font-bold text-gray-700"> تأكيد كلمة المرور </label><br>
        <input
          type="password"
          id="name"
          name="name"
          class="text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
          placeholder=" *********"
           />
      </div> --}}


      {{-- <div class="col-span-2 ">
        <label for="location" class=" text-sm font-bold text-gray-700" >الموقع</label><br>
            <button id="locationBtn" type="button" class="inline-block shrink-0  border border-customGreen bg-customGreen  text-l font-medium text-white transition hover:bg-transparent hover:text-customGreen focus:outline-none focus:ring active:text-customGreen py-2 px-4 rounded-lg h-11 mt-2">
        تحديد موقعي
    </button>
    <input type="text" id="locationField" name="location" class="text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm  mr-8" readonly>
</div> --}}
    </div>



<div class="grid grid-cols-1 gap-y-4 justify-items-center mt-16">



            <button
            class=" rounded-md border border-customGreen bg-customGreen px-12  text-l font-bold text-white transition hover:bg-transparent hover:text-customGreen focus:outline-none focus:ring active:text-customGreen h-12 w-80">
            تعديل
        </button>

</div>


  </form>




<!-- قسم تغيير كلمة المرور -->
<h2 class="col-span-2 text-xl font-bold mb-2 text-start pb-8 mt-14">تغيير كلمة المرور</h2>

<form action="{{ route('blinds.password.update') }}" method="POST">
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
        {{-- @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif --}}
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


