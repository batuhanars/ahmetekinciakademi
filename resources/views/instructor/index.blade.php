@extends('instructor.layout.main')
@section('title', 'İstatistikler')
@section('css')
@endsection
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="row mb-8">
                <div class="col-xl-6 mb-5 mb-xl-10">
                    <!--begin::Chart widget 4-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Kurs Satışları</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column px-0" style="padding: 0">
                            <!--begin::Info-->
                            <div class="px-9 ">
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Value-->
                                    <span
                                        class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2">{{ $statistics['course_sales_count'] }}</span>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-bold text-gray-400">Toplam Kurs Satışları</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Chart-->
                            <div id="course_sales_chart"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 4-->
                </div>
                <div class="col-xl-6 mb-xl-10">
                    <div class="row mb-5">
                        <div class="col-xl-4">
                            <!--begin::Stats Widget 20-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Body-->
                                <div class="card-body my-4">
                                    <a href="#"
                                        class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block"><strong>Bu
                                            Ay</strong></a>
                                    <div class="font-weight-bold text-muted mb-3 font-size-sm">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{ $statistics['course_sales_this_month'] }}</span>
                                        Kişi
                                    </div>
                                    <span class="text-dark-75 font-weight-bolder">Gösterim</span>
                                    <span class="text-dark-75 font-weight-bolder"
                                        style="float: right !important;">{{ $statistics['course_sales_this_month'] }}</span>
                                    <div class="progress progress-xs bg-warning-o-60">
                                        <div class="progress-bar bg-warning mt-0" role="progressbar"
                                            style="width: {{ $statistics['course_sales_this_month'] }}%;" aria-valuenow="1"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Stats Widget 20-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Stats Widget 20-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Body-->
                                <div class="card-body my-4">
                                    <a href="#"
                                        class="card-title font-weight-bolder text-danger font-size-h6 mb-4 text-hover-state-dark d-block"><strong>Geçen
                                            Ay</strong></a>
                                    <div class="font-weight-bold text-muted mb-3 font-size-sm">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{ $statistics['course_sales_last_month'] }}</span>
                                        Kişi
                                    </div>
                                    <span class="text-dark-75 font-weight-bolder">Gösterim</span>
                                    <span class="text-dark-75 font-weight-bolder"
                                        style="float: right !important;">{{ $statistics['course_sales_last_month'] }}</span>
                                    <div class="progress progress-xs bg-danger-o-60">
                                        <div class="progress-bar bg-danger mt-0" role="progressbar"
                                            style="width: {{ $statistics['course_sales_last_month'] }}%;" aria-valuenow="1"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Stats Widget 20-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Stats Widget 20-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Body-->
                                <div class="card-body my-4">
                                    <a href="#"
                                        class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block"><strong>Bu
                                            Yıl</strong></a>
                                    <div class="font-weight-bold text-muted mb-3 font-size-sm">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{ $statistics['course_sales_this_year'] }}</span>
                                        Kişi
                                    </div>
                                    <span class="text-dark-75 font-weight-bolder">Gösterim</span>
                                    <span class="text-dark-75 font-weight-bolder"
                                        style="float: right !important;">{{ $statistics['course_sales_this_year'] }}</span>
                                    <div class="progress progress-xs bg-info-o-60">
                                        <div class="progress-bar bg-info mt-0" role="progressbar"
                                            style="width: {{ $statistics['course_sales_this_year'] }}%;" aria-valuenow="1"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Stats Widget 20-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Card-->
                            <div class="card h-100">
                                <!--begin::Card header-->
                                <div class="card-header flex-nowrap border-0 pt-9">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <!--begin::Title-->
                                        <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">Müşteri
                                            Sayısı</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                    <!--begin::Heading-->
                                    <div class="fs-2tx fw-bolder mb-3">
                                        {{ $statistics['customer_count'] }}</div>
                                    <!--end::Heading-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Card-->
                            <div class="card h-100">
                                <!--begin::Card header-->
                                <div class="card-header flex-nowrap border-0 pt-9">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <!--begin::Title-->
                                        <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">Kurs
                                            Sayısı</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                    <!--begin::Heading-->
                                    <div class="fs-2tx fw-bolder mb-3">
                                        {{ $statistics['course_count'] }}</div>
                                    <!--end::Heading-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                data: [
                    @foreach ($courseSales->monthlyCourseSales() as $data)
                        {{ $data }},
                    @endforeach
                ]
            }],
            chart: {
                toolbar: {
                    show: true,
                    tools: {
                        download: false
                    }
                },
                height: 265,
                type: 'bar',
                events: {
                    click: function(chart, w, e) {
                        // console.log(chart, w, e)
                    }
                }
            },
            colors: ['#2E93fA', '#66DA26', '#546E7A', '#E91E63', '#FF9800'],
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: [
                    "Ocak",
                    "Şubat",
                    "Mart",
                    "Nisan",
                    "Mayıs",
                    "Haziran",
                    "Temmuz",
                    "Ağustos",
                    "Eylül",
                    "Ekim",
                    "Kasım",
                    "Aralık",
                ],
                labels: {
                    style: {
                        colors: ['#2E93fA', '#66DA26', '#546E7A', '#E91E63', '#FF9800', '#2E93fA', '#66DA26', '#546E7A',
                            '#E91E63', '#FF9800', '#2E93fA', '#66DA26',
                        ],
                        fontSize: '12px'
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#course_sales_chart"), options);
        chart.render();
    </script>
@endsection
