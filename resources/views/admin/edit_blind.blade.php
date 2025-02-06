@extends('admin.master')


@section('contant')




<div class="mx-8 py-10 md:py-10">
<h1 class="text-xl font-bold">تعديل بيانات الكفيف</h1>
<div class="container mx-auto mt-10 ">


    <div class=" bg-white p-14  text-start rounded-3xl mx-36 my-28">

        <h2 tabindex="0" class="navigable col-span-2 text-xl font-bold mb-2 text-start  pb-8 ">معلومات الكفيف <span class="text-customGreen">{{ $blind->name }}</span></h2>

        <form action="{{ route('update.blind') }}" method="POST">
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
              title="الاسم بالكامل"
              tabindex="0" class="navigable text-center border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
              placeholder="أدخل الاسم بالكامل"
               />
               @error('name')
               <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
               @enderror
          </div>

           <div class="">
            <label for="email" class=" text-sm font-bold text-gray-700"> البريد الإلكتروني </label><br>
            <input
            value="{{ $blind->email }}"
              type="email"
              id="email"
              name="email"
              title="البريد الإلكتروني"
              tabindex="0" class="navigable text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
              placeholder="البريد الإلكتروني"
               />
               @error('email')
               <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
               @enderror
          </div>
           <div class="">
            <label for="age" class=" text-sm font-bold text-gray-700"> العمر </label><br>
            <input
            value="{{ $blind->age }}"
              type="text"
              id="age"
              name="age"
              title=" العمر "
              tabindex="0" class="navigable text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
              placeholder=" العمر "
               />
               @error('age')
               <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
               @enderror
          </div>
           <div class="">
            <label for="city" class=" text-sm font-bold text-gray-700"> المدينة </label><br>
            <input
             value="{{ $blind->city }}"
              type="text"
              id="city"
              name="city"
              title=" المدينة "
              tabindex="0" class="navigable text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
              placeholder=" المدينة "
               />
               @error('city')
               <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
               @enderror
          </div>
           <div class="">
            <label for="phone" class=" text-sm font-bold text-gray-700"> رقم الهاتف </label><br>
            <input
             value="{{ $blind->phone }}"
              type="text"
              id="phone"
              name="phone"
              title=" رقم الهاتف "
              tabindex="0" class="navigable text-center  border-2 border-gray-300 text-gray-900 h-11 w-80 rounded-lg text-sm mt-2 mb-5"
              placeholder=" رقم الهاتف "
               />
               @error('phone')
               <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
               @enderror
          </div>

          <div>
            <label for="gender" class="block mb-3 text-sm font-bold text-gray-900 ">الجنس</label>
            <select  id="gender" name="gender" tabindex="0" class="navigable border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block h-11 w-80 p-2.5 " >
                <option value="" disabled>اختر الجنس</option>
                <option tabindex="0" class="navigable " value="ذكر" {{ $blind->gender == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                <option tabindex="0" class="navigable " value="أنثى" {{ $blind->gender == 'أنثى' ? 'selected' : '' }}>انثى</option>
            </select>

            @error('gender')
            <p tabindex="0" class="navigable " style="color: red">{{ $message }}</p>
            @enderror
        </div>


        </div>



    <div class="grid grid-cols-1 gap-y-4 justify-items-center mt-16">



                <button
                tabindex="0" class="navigable  rounded-md border border-customGreen bg-customGreen px-12  text-l font-bold text-white transition hover:bg-transparent hover:text-customGreen focus:outline-none focus:ring active:text-customGreen h-12 w-80">
                تعديل
            </button>

    </div>


      </form>



      <h2 class="col-span-2 text-xl font-bold mb-2 text-start pb-8 mt-14">كلمة المرور</h2>


      <div class="grid grid-cols-1 justify-items-center">

          <div>
              <label for="current_password" class="text-sm font-medium text-gray-700">كلمة المرور الحالية</label><br>
              <input type="text" id="current_password" name="current_password"
                     class="text-center bg-green-50 border border-customGreen text-gray-900 h-11 w-64 rounded-lg text-sm mt-2 mb-5"
                     value="{{ $blind->password }}"  readonly/>

          </div>
          </div>
  </div>

</div>
</div>
@endsection
