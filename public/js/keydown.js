document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.navigable'); // جميع العناصر القابلة للتنقل
    let currentIndex = 0;

    // التركيز على العنصر الأول
    if (items.length > 0) {
        items[currentIndex].focus();
        readText(items[currentIndex].innerText); // قراءة النص عند التحميل
    }

    // وظيفة لقراءة النص
    function readText(text) {
        const speech = new SpeechSynthesisUtterance(text); // استخدام Speech Synthesis API
        speech.lang = 'ar-SA'; // تعيين اللغة العربية
        window.speechSynthesis.speak(speech); // قراءة النص
    }

    // وظيفة لإيقاف القراءة
    function stopReading() {
        window.speechSynthesis.cancel(); // إيقاف أي قراءة جارية
    }

    // وظيفة للتنقل بين العناصر
    function navigate(direction) {
        // إزالة التمييز عن العنصر الحالي
        items[currentIndex].classList.remove('highlight');

        // تحديث الفهرس الحالي بناءً على الاتجاه
        currentIndex += direction;

        // التأكد من عدم الخروج عن حدود القائمة
        if (currentIndex < 0) {
            currentIndex = items.length - 1; // العودة إلى النهاية إذا وصلنا إلى البداية
        } else if (currentIndex >= items.length) {
            currentIndex = 0; // العودة إلى البداية إذا وصلنا إلى النهاية
        }

        // تمييز العنصر الحالي
        highlightItem(currentIndex);
    }

    function highlightItem(index) {
        items[index].classList.add('highlight'); // إضافة التمييز للعنصر المحدد
        items[index].focus(); // التركيز على العنصر المحدد (إذا كان يمكن تركيزه)

        // قراءة النص عند التركيز
        if (items[index].hasAttribute('title')) {
            // إذا كان العنصر يحتوي على خاصية title، اقرأ النص من title أولاً
            readText(items[index].getAttribute('title'));
        }

        // قراءة النص الداخلي بعد نص العنوان إذا لزم الأمر
        readText(items[index].innerText); // قراءة النص الداخلي
    }

    // إضافة حدث التركيز (focus) لحقل الإدخال (إذا كان موجودًا)
    const inputFields = document.querySelectorAll('input.navigable'); // حقول الإدخال
    inputFields.forEach(input => {
        input.addEventListener('focus', function() {
            readText(input.title); // قراءة عنوان الحقل عند التركيز
        });

        // قراءة محتوى الحقل عند إدخال المستخدم
        input.addEventListener('input', function() {
            readText(this.value); // قراءة النص المدخل
        });
    });

    // إضافة حدث لل textarea
    const textareas = document.querySelectorAll('textarea.navigable'); // تأكد من أن لديك حقول نص ذات فئة navigable
    textareas.forEach(textarea => {
        textarea.addEventListener('focus', function() {
            readText(this.title); // قراءة عنوان الحقل عند التركيز
        });

        // قراءة محتوى textarea عند إدخال المستخدم
        textarea.addEventListener('input', function() {
            readText(this.value); // قراءة النص المدخل
        });
    });

    // إضافة حدث blur لإيقاف القراءة عند مغادرة العنصر
    items.forEach(item => {
        item.addEventListener('blur', function() {
            stopReading(); // إيقاف القراءة عند مغادرة العنصر
        });
    });

    // تعيين الأحداث لضغط المفاتيح
    window.addEventListener('keydown', (e) => {
        switch (e.key) {
            case 'ArrowDown':
                navigate(1); // الانتقال لأسفل
                e.preventDefault();
                break;
            case 'ArrowUp':
                navigate(-1); // الانتقال لأعلى
                e.preventDefault();
                break;
            case 'ArrowLeft':
                navigate(1); // الانتقال لليسار (اختياري)
                e.preventDefault();
                break;
            case 'ArrowRight':
                navigate(-1); // الانتقال لليمين (اختياري)
                e.preventDefault();
                break;
        }
    });
});
