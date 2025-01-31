window.addEventListener('beforeunload', function() {
    // إظهار الأيقونة عند الانتقال إلى صفحة جديدة
    document.getElementById('loading').style.display = 'flex';
});

window.addEventListener('load', function() {
    // إخفاء الأيقونة عند تحميل الصفحة
    document.getElementById('loading').style.display = 'none';
});
