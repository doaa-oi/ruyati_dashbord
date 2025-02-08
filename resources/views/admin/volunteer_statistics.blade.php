<!-- بطاقة نشاطات المتطوعين -->
<div class="mr-20 max-w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">نشاطات المتطوعين</h5>
        <p class="text-sm font-normal text-gray-500 dark:text-gray-400"></p>
    </div>

    <div id="column-chart"></div> <!-- المخطط العمودي هنا -->
</div>

<script>
    const volunteers = @json($statistics); // تأكد من أن هذا السطر في ملف Blade

    const seriesData = [
        {
            name: "طلبات مقبولة",
            data: volunteers.map(volunteer => volunteer.accepted_requests),
        },
        {
            name: "طلبات مرفوضة",
            data: volunteers.map(volunteer => volunteer.rejected_requests),
        },
        {
            name: "بلاغات",
            data: volunteers.map(volunteer => volunteer.reports),
        },
    ];

    const options = {
        colors: ["#34D399", "#FCA5A1", "#FDBA74"], // الألوان: أخضر، أحمر، برتقالي
        series: seriesData,
        chart: {
            type: "bar",
            height: "400px", // زيادة ارتفاع المخطط
            fontFamily: "Inter, sans-serif",
            toolbar: {
                show: false,
            },
            scrollable: true, // تفعيل تمرير المخطط
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "80%", // نسبة عرض العمود
                borderRadiusApplication: "end",
                borderRadius: 8,
            },
        },
        tooltip: {
            shared: true,
            intersect: false,
            style: {
                fontFamily: "Inter, sans-serif",
            },
        },
        states: {
            hover: {
                filter: {
                    type: "darken",
                    value: 1,
                },
            },
        },
        stroke: {
            show: true,
            width: 0,
            colors: ["transparent"],
        },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -14
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true, // لعرض الأسطورة
        },
        xaxis: {
            categories: volunteers.map(volunteer => volunteer.name), // أسماء المتطوعين
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
            },
            axisBorder: {
                show: true,
            },
            axisTicks: {
                show: false,
            },
            tooltip: {
                shared: true,
            },
        },
        yaxis: {
            show: true, // يجب عرض محور Y
            labels: {
                show: true, // عرض التسميات على محور Y
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            min: 0, // الحد الأدنى لمحور Y
            max: 50, // الحد الأقصى لمحور Y
            tickAmount: 5, // عدد التقسيمات في محور Y
        },
        fill: {
            opacity: 1,
        },
    };

    // تحقق من وجود العنصر قبل إنشاء المخطط
    if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("column-chart"), options);
        chart.render();
    }
</script>
