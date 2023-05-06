@extends('admin.layout.main')
@section('title', 'Sertifika Bilgileri')
@section('css')
@endsection
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @include('admin.breadcrumb', [
                'items' => [
                    [
                        'link' => route('panel.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Müşteri Yönetimi',
                    ],
                    [
                        'link' => route('panel.customers.index'),
                        'title' => 'Müşteriler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Profil',
                    ],
                    [
                        'link' => '',
                        'title' => 'Sertifika Bilgileri',
                    ],
                ],
            ])
            <div class="row">
                @include('admin.customer-management.profile.include.profile-card')
                <div class="col-md-9">
                    <div class="card card-custom">
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label fw-bolder text-dark">Sertifika Bilgileri
                                </h3>
                                <span class="text-muted fw-bold fs-7 mt-1">Müşterinin sertifika bilgilerini bu
                                    alandan
                                    görüntüleyebilirsiniz.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table align-middle gs-0 gy-4" id="certificate">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="min-w-150px ps-4">Sertifika</th>
                                        <th class="min-w-150px">Tarih</th>
                                        <th class="text-end pe-5"></th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($certificates as $certificate)
                                        <tr class="odd">
                                            <td class="d-flex align-items-center">
                                                <div class="symbol symbol-45px">
                                                    <img src="{{ $certificate->image }}" alt="" class="">
                                                </div>
                                                <a href="#"
                                                    class="text-dark text-hover-primary ms-5">{{ $certificate->title }}</a>
                                            </td>
                                            <td>
                                                {{ $certificate->created_at }}
                                            </td>
                                            <td class="text-end">
                                                <button class="btn btn-icon btn-bg-light btn-sm btn-active-light-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $certificates->links('vendor.pagination.bootstrap-5') }}
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

@endsection
