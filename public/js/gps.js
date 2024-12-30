
document.getElementById('locationBtn').addEventListener('click', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var locationURL = 'https://www.google.com/maps/search/?api=1&query=' + latitude + ',' + longitude;
            document.getElementById('locationField').value = locationURL;
            alert('تم تحديد الموقع بنجاح: ' + latitude + ', ' + longitude);
        });
    } else {
        alert('عذرًا، متصفحك لا يدعم خاصية تحديد الموقع.');
    }
});

