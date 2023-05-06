@extends('admin.layout.main')
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
                                        <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">Bu Ay
                                            Toplam Mesajlar</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                    <!--begin::Heading-->
                                    <div class="fs-2tx fw-bolder mb-3">
                                        {{ $statistics['message_this_month'] }}</div>
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
                                        <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">Geçen Ay
                                            Toplam Mesajlar</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                    <!--begin::Heading-->
                                    <div class="fs-2tx fw-bolder mb-3">
                                        {{ $statistics['message_last_month'] }}</div>
                                    <!--end::Heading-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect x="8" y="9" width="3" height="10" rx="1.5"
                                        fill="currentColor"></rect>
                                    <rect opacity="0.5" x="13" y="5" width="3" height="14"
                                        rx="1.5" fill="currentColor">
                                    </rect>
                                    <rect x="18" y="11" width="3" height="8" rx="1.5"
                                        fill="currentColor"></rect>
                                    <rect x="3" y="13" width="3" height="6" rx="1.5"
                                        fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $statistics['customer_count'] }}</div>
                            <div class="fw-bold text-gray-400">Müşteri Sayısı</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $statistics['instructor_count'] }}</div>
                            <div class="fw-bold text-white">Eğitmen Sayısı</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ $statistics['course_count'] }}</div>
                            <div class="fw-bold text-gray-100">Eğitim Sayısı</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $statistics['instructor_request_count'] }}
                            </div>
                            <div class="fw-bold text-white">Eğitmenlik Talebi Sayısı</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <div class="row ">
                <!--begin::Col-->
                <div class="col-xl-6 mb-xl-10">
                    <div class="row mb-5">
                        <div class="col-xl-4">
                            <!--begin::Stats Widget 20-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Body-->
                                <div class="card-body my-4">
                                    <a href="#"
                                        class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block"><strong>Bugün</strong></a>
                                    <div class="font-weight-bold text-muted mb-3 font-size-sm">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{ $statistics['visitor_today'] }}</span>
                                        Kişi
                                    </div>
                                    <span class="text-dark-75 font-weight-bolder">Gösterim</span>
                                    <span class="text-dark-75 font-weight-bolder"
                                        style="float: right !important;">{{ $statistics['visitor_today'] }}</span>
                                    <div class="progress progress-xs bg-warning-o-60">
                                        <div class="progress-bar bg-warning mt-0" role="progressbar"
                                            style="width: {{ $statistics['visitor_today'] }}%;" aria-valuenow="1"
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
                                        class="card-title font-weight-bolder text-danger font-size-h6 mb-4 text-hover-state-dark d-block"><strong>Dün</strong></a>
                                    <div class="font-weight-bold text-muted mb-3 font-size-sm">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{ $statistics['visitor_yesterday'] }}</span>
                                        Kişi
                                    </div>
                                    <span class="text-dark-75 font-weight-bolder">Gösterim</span>
                                    <span class="text-dark-75 font-weight-bolder"
                                        style="float: right !important;">{{ $statistics['visitor_yesterday'] }}</span>
                                    <div class="progress progress-xs bg-danger-o-60">
                                        <div class="progress-bar bg-danger mt-0" role="progressbar"
                                            style="width: {{ $statistics['visitor_yesterday'] }}%;" aria-valuenow="1"
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
                                            Ay</strong></a>
                                    <div class="font-weight-bold text-muted mb-3 font-size-sm">
                                        <span
                                            class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{ $statistics['visitor_this_month'] }}</span>
                                        Kişi
                                    </div>
                                    <span class="text-dark-75 font-weight-bolder">Gösterim</span>
                                    <span class="text-dark-75 font-weight-bolder"
                                        style="float: right !important;">{{ $statistics['visitor_this_month'] }}</span>
                                    <div class="progress progress-xs bg-info-o-60">
                                        <div class="progress-bar bg-info mt-0" role="progressbar"
                                            style="width: {{ $statistics['visitor_this_month'] }}%;" aria-valuenow="1"
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
                                        <a href="#"
                                            class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">Onaylanan
                                            Eğitmenlik Talebi Sayısı</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                    <!--begin::Heading-->
                                    <div class="fs-2tx fw-bolder mb-3">
                                        {{ $statistics['approved_instructor_request_count'] }}</div>
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
                                        <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">Onay
                                            Bekleyen Eğitmenlik Talebi Sayısı</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                    <!--begin::Heading-->
                                    <div class="fs-2tx fw-bolder mb-3">
                                        {{ $statistics['onhold_instructor_request_count'] }}</div>
                                    <!--end::Heading-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>

                <!--end::Col-->
                <div class="col-xl-6 mb-5 mb-xl-10">
                    <!--begin::Chart widget 4-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Ziyaretçi İstatistikleri</span>
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
                                        class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2">{{ $statistics['visitor_count'] }}</span>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-bold text-gray-400">Toplam Ziyaretçi Sayısı</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Chart-->
                            <div id="visitor_chart"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 4-->
                </div>
                <!--end::Col-->
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
                    @foreach ($visitor->monthlyVisitorCount() as $data)
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

        var chart = new ApexCharts(document.querySelector("#visitor_chart"), options);
        chart.render();
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
