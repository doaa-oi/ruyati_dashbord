@extends('layoutv.postv')

@section('contant')

@if(session()->has('success'))
<div class="bg-blue-800 text-center py-4 lg:px-4">
    <div class="p-2 bg-blue-700 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-blue-400 uppercase px-2 py-1 text-xs font-bold mr-3">نجاح</span>
      <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ session()->get('success') }}</span>
    </div>
</div>
@endif




<div class=" flex items-center justify-center min-h-screen md:-mt-36 -mt-16">
    <div class="bg-white py-10 rounded-xl shadow-lg w-full max-w-6xl px-6 lg:px-20">

        <div class="">
            <a href="#">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-customGreen dark:text-white">{{ $help_request->title }}</h5>
            </a>

            <div class="flex items-center my-3">
              <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9094a0" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12-5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6-5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12-5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"/></svg>
                  <h2 class="text-l px-4 md:pt-0 font-medium text-gray-400">{{ $help_request->updated_at }}</h2>
              <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9094a0" d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"/></svg>
                  <h2 class="text-l px-4 md:pt-0 font-medium text-gray-400"> {{ $help_request->blind->name }}</h2>
              <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9094a0" d="M172.3 501.7C27 291 0 269.4 0 192 0 86 86 0 192 0s192 86 192 192c0 77.4-27 99-172.3 309.7-9.5 13.8-29.9 13.8-39.5 0zM192 272c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80z"/></svg>
                  <h2 class="text-l px-4 md:pt-0 font-medium text-gray-400">{{ $help_request->blind->city }}</h2>
            </div>
            <div class="flex items-center my-4">

                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#0f9c73" d="M0 117.7v346.3c0 11.3 11.4 19.1 21.9 14.9L160 416V32L20.1 88A32 32 0 0 0 0 117.7zM192 416l192 64V96L192 32v384zM554.1 33.2L416 96v384l139.9-56A32 32 0 0 0 576 394.3V48c0-11.3-11.4-19.1-21.9-14.9z"/></svg>

                <a href="{{ $help_request->location_url }}" target="_blank" class="text-l px-4 md:pt-0 font-medium text-customGreen underline">الموقع</a>
            </div>

            <p class="mb-3 text-lg text-gray-700 dark:text-gray-400">{{ $help_request->description }}</p>


            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-2 gap-5  justify-end mt-8">

             <a href="https://wa.me/218{{ $help_request->blind->phone }}?call" class="flex items-center justify-center py-3 px-3 bg-customGreen text-white border border-customGreen hover:text-customGreen hover:bg-white rounded-lg font-bold text-sm  h-12">
                <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" fill="currentColor" class="ml-2" viewBox="0 0 448 512">
                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                </svg>
                تواصل عبر واتساب
            </a>



            <!-- زر تقديم المساعدة -->
<form action="{{ route('assistance.approve', ['volunteerId' => Auth::user()->volunteer->id, 'blindId' => $help_request->blind->id, 'requestId' => $help_request->id]) }}" method="POST" class="inline-block">
    @csrf
    <button type="submit" class="flex items-center justify-center py-3 px-9 bg-customGreen text-white border border-customGreen hover:text-customGreen hover:bg-white rounded-lg font-bold text-sm h-12">
        تقديم المساعدة
    </button>
</form>

<!-- زر اكتمال المساعدة -->
@if($assistanceId) <!-- تحقق من وجود المعرف قبل عرض الزر -->
<form action="{{ route('assistance.complete', ['id' => $assistanceId]) }}" method="POST" class="inline-block">
    @csrf
    <button type="submit" class="flex items-center justify-center py-3 px-9 bg-blue-600 text-white border border-blue-600 hover:text-blue-600 hover:bg-white rounded-lg font-bold text-sm h-12">
        اكتمال المساعدة
    </button>
</form>
@else
    <p>لم يتم تقديم طلب مساعدة لك بعد.</p> <!-- رسالة إن كان لا يوجد مساعدات -->
@endif
            {{-- <a id="helpButton" href="" class="flex items-center justify-center py-3 px-9 bg-customGreen text-white border border-customGreen hover:text-customGreen hover:bg-white rounded-lg font-bold text-sm h-12" onclick="handleButtonClick()"> تقديم المساعدة </a> --}}

            {{-- <script>
            let helpCompleted = false;

            function handleButtonClick() {
                var helpButton = document.getElementById("helpButton");

                if (!helpCompleted) {
                    // إرسال طلب المساعدة إلى الخادم
                    // هنا يتوجب عليك إضافة طلب AJAX أو إرسال النموذج كما تراه مناسبًا لتقديم الطلب.
                    fetch('{{ route("send.help.request", ["encryptedId" => Crypt::encrypt(Auth::user()->volunteer->id), "encryptedBlindId" => Crypt::encrypt($help_request->blind->id)]) }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            // يمكنك إضافة أية بيانات إضافية هنا إذا كنت بحاجة إليها
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert("مرحبًا! شكرًا لتقديم المساعدة.");
                        helpButton.innerHTML = "اكتمال المساعدة";
                        helpCompleted = true;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert("حدث خطأ أثناء تقديم المساعدة. يرجى المحاولة لاحقًا.");
                    });
                } else {
                    let rating = prompt("من فضلك قيم الخدمة من 1 إلى 5:");
                    if (rating >= 1 && rating <= 5) {
                        // إرسال التقييم إلى الخادم أيضًا هنا إذا كنت ترغب في ذلك
                        alert("شكرًا لتقييمك: " + rating);
                        // إخفاء الزر بعد تقييم الخدمة
                        helpButton.style.display = "none"; // إخفاء الزر
                    } else {
                        alert("الرجاء إدخال رقم صحيح من 1 إلى 5.");
                    }
                }
            }
            </script> --}}


            </div>
          </div>
    </div>
</div>
@endsection


