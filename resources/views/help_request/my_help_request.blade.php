@extends('layout.master')

@section('contant')

@if(session()->has('success'))
<div class="bg-green-800 text-center py-4 lg:px-4">
    <div tabindex="0" class="navigable p-2 bg-green-700 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-green-400 uppercase px-2 py-1 text-xs font-bold mr-3">نجاح</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('success') }}</span>
    </div>
</div>
@endif

@if(session()->has('delete'))  <!-- استخدام 'error' للخطأ -->
<div class="bg-red-800 text-center py-4 lg:px-4">
    <div tabindex="0" class="navigable p-2 bg-red-700 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-red-400 uppercase px-2 py-1 text-xs font-bold mr-3">خطأ</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('delete') }}</span>
    </div>
</div>
@endif

@if(session()->has('update')) <!-- إضافة تنبيه للتعديل -->
<div class="bg-blue-800 text-center py-4 lg:px-4">
    <div tabindex="0" class="navigable p-2 bg-blue-700 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-blue-400 uppercase px-2 py-1 text-xs font-bold mr-3">تعديل</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('update') }}</span>
    </div>
</div>
@endif






<div class="container flex justify-between items-center pt-8 px-3">
    <h1 title="هذه واجهة الطلبات الخاصة بي" tabindex="0" class="navigable text-xl font-bold ">طلباتي</h1>
    <a tabindex="0" class="navigable flex justify-center items-center flex-shrink-0 h-14  w-56 text-sm font-bold rounded hover:bg-customGreen hover:text-white bg-none text-customGreen" href="{{ route('help.request.create') }}">
        <svg class="w-4 h-4 mr-2 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.7-14.3-32-32-32h-32c-17.7 0-32 14.3-32 32v144H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h144v144c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V304h144c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z"/></svg>
        إضافة طلب مساعدة
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-8 py-8 md:py-8">



    @foreach ($help_requests as $help_request)
        <div tabindex="0" class="navigable bg-white border border-gray-200 rounded-2xl shadow p-4 dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
          <img class="rounded-t-lg w-full" src="/docs/images/blog/image-1.jpg" alt="" />
        </a>
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-customGreen dark:text-white">{{ $help_request->title }}</h5>


          <div class="flex items-center my-3">
            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9094a0" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12-5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12-5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"/></svg>
            <h2 class="text-sm px-4 md:pt-0 font-medium text-gray-400">{{ $help_request->updated_at }}</h2>
          </div>

          <p class="mb-3 text-lg text-gray-700 dark:text-gray-400">{{ $help_request->description }}</p>
          <div class="flex gap-5">
            <a href="{{ route('help.request.edit', ['encryptedId' => Crypt::encrypt($help_request->id)]) }}" tabindex="0" class="navigable items-center flex-grow px-3 py-3 text-sm font-bold text-center text-white bg-customGreen rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-customGreen dark:hover:bg-green-700 dark:focus:ring-green-800">
                تعديل
            </a>

        <!-- نافذة التأكيد -->
<div id="confirmModal" class="modal" >
    <div class="modal-content rounded-2xl h-60 text-xl">
        <p  class=" mt-10 mb-16">هل أنت متأكد أنك تريد حذف هذا الطلب؟</p>
        <button id="confirmBtn" class="rounded-lg ml-16 text-customGreen font-bold">حذف</button>
        <button id="confirmNoBtn" class="rounded-lg text-customGreen font-bold" onclick="closeModal()">إلغاء</button>

    </div>
</div>

<!-- النموذج للحذف -->
<form id="delete-form-{{ $help_request->id }}" action="{{ route('help.request.destroy', $help_request->id) }}" method="POST" class="flex-grow inline-block">
    @csrf
    @method('DELETE')
    <button type="button" onclick="openModal({{ $help_request->id }})" tabindex="0" class="navigable items-center w-full px-3 py-3 text-sm font-bold text-center text-customGreen bg-none border-2 border-customGreen rounded-lg hover:bg-customGreen hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
        حذف
    </button>
</form>



<style>
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
    text-align: center;
}




</style>


            <script>
                let deleteId;

    function openModal(id) {
        deleteId = id; // حفظ ID الطلب المراد حذفه
        document.getElementById('confirmModal').style.display = "block";

        // قراءة نص تأكيد عملية الحذف
        const speech = new SpeechSynthesisUtterance('تأكيد عملية الحذف : للحذف اضغظ 1 لإلغاء الحذف اضغط 2');
        speech.lang = 'ar-SA'; // تعيين اللغة العربية
        window.speechSynthesis.speak(speech); // قراءة النص
    }

    function closeModal() {
        document.getElementById('confirmModal').style.display = "none";
    }

    document.getElementById('confirmBtn').addEventListener('click', function() {
        if (deleteId) {
            document.getElementById('delete-form-' + deleteId).submit();
        }
        closeModal();
    });

    // إغلاق النافذة عند النقر خارج النافذة
    window.onclick = function(event) {
        let modal = document.getElementById('confirmModal');
        if (event.target == modal) {
            closeModal();
        }
    };
// التحقق من مفاتيح الضغط
window.addEventListener('keydown', (e) => {
    let modal = document.getElementById('confirmModal');
    if (modal.style.display === 'block') { // تحقق إذا كانت النافذة مرئية
        switch (e.key) {
            case '1': // الضغط على الزر 1
                document.getElementById('confirmBtn').click(); // محاكاة الضغط على زر حذف
                break;
            case '2': // الضغط على الزر 2
                closeModal(); // محاكاة الضغط على زر إلغاء
                break;
        }
    }
});
</script>        </div>
        </div>
      </div>

    @endforeach
</div>


@endsection
