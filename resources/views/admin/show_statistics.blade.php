@extends('admin.master')

@section('search')


@endsection



@section('contant')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<div class="mx-8 py-10 md:py-10">
    <div class="container mx-auto mt-10">

        <div class="flex space-x-4 gap-10"> <!-- استخدام Flexbox مع مسافة بين العناصر -->

            <!-- بطاقة المخطط الدائري -->
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">المستخدمون</h5>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">عدد المستخدمين</p>
                </div>

                <!-- مخطط دائري -->
                <div class="py-6" id="pie-chart"></div>

                <!-- الدوائر للإشارة -->
                <div class="flex justify-center space-x-4">
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded-full" style="background-color: #1C64F2;"></div>
                        <span class="ml-2">المتطوعون</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded-full" style="background-color: #16BDCA;"></div>
                        <span class="ml-2">الكفيفون</span>
                    </div>
                </div>
            </div>

       @include('admin.volunteer_statistics')
        </div>

    </div>
</div>




<script>


    const getChartOptions = (volunteersCount, blindsCount) => {
        return {
            series: [volunteersCount, blindsCount],
            colors: ["#1C64F2", "#16BDCA"],
            chart: {
                height: 420,
                width: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            labels: ["المتطوعون", "الكفيفون"],
            dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    fontSize: "15px",
                },
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
            },
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const volunteersCount = {{ $volunteers }}; // قيمة المتطوعين
        const blindsCount = {{ $blinds }}; // قيمة الكفيفين

        if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions(volunteersCount, blindsCount));
            chart.render();
        }
    });
</script>

@endsection
