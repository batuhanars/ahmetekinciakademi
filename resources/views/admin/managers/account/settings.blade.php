@extends('admin.layout.main')
@section('title', 'Profil Bilgileri')
@section('css')
@endsection
@section('content')

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
                        'title' => 'Hesap',
                    ],
                    [
                        'link' => '',
                        'title' => 'Ayarlar',
                    ],
                ],
            ])
            <!--begin::Navbar-->
            @include('admin.managers.account.include.profile-card')
            <!--end::Navbar-->
            <!--begin::Basic info-->
            <form action="{{ route('panel.account.update') }}" id="kt_account_profile_details_form" class="form"
                method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer d-flex justify-content-between align-items-center"
                        role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details"
                        aria-expanded="true" aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0 ">
                            <h3 class="fw-bolder m-0">Profil Bilgileri</h3>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            id="kt_account_profile_details_submit">Kaydet</button>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Profil Resmi</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <input type="text" name="fullname"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        value="{{ auth()->user()->fullname }}">
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="email"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ auth()->user()->email }}" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Telefon</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone" id="phone"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ auth()->user()->phone }}" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            @if (auth()->user()->membership_type == 'superadmin')
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Doğum Tarihi</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="date" name="date_of_birth"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ auth()->user()->instructor->date_of_birth }}" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Uzmanlık Alanı</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="profession"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ auth()->user()->instructor->profession }}" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            @endif
                        </div>
                        <!--end::Card body-->
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
            </form>
            @if (auth()->user()->membership_type == 'superadmin')
                <form action="{{ route('panel.account.social-media.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer d-flex justify-content-between align-items-center"
                            role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details"
                            aria-expanded="true" aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0 ">
                                <h3 class="fw-bolder m-0">Sosyal Medya Hesapları</h3>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                id="kt_account_profile_details_submit">Kaydet</button>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <div class="input-group mb-5">
                                    <div class="input-group-append">
                                        <div class="btn" style="background-color: rgb(59, 89, 152);">
                                            <i class="fab fa-facebook-f fs-3 text-white"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="facebook" id="facebook"
                                        class="form-control form-control-solid"
                                        value="{{ auth()->user()->instructor->facebook }}">
                                </div>
                                <div class="input-group mb-5">
                                    <div class="input-group-append">
                                        <div class="btn" style="background-color: rgb(29, 161, 242);">
                                            <i class="fab fa-twitter fs-3 text-white"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="twitter" id="twitter"
                                        class="form-control form-control-solid"
                                        value="{{ auth()->user()->instructor->twitter }}">
                                </div>
                                <div class="input-group mb-5">
                                    <div class="input-group-append">
                                        <div class="btn" style="background-color: rgb(131, 58, 180);">
                                            <i class="fab fa-instagram fs-3 text-white"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="instagram" id="instagram"
                                        class="form-control form-control-solid"
                                        value="{{ auth()->user()->instructor->instagram }}">
                                </div>
                                <div class="input-group mb-5">
                                    <div class="input-group-append">
                                        <div class="btn" style="background-color: rgb(40, 103, 178);">
                                            <i class="fab fa-linkedin fs-3 text-white"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="linkedin" id="linkedin"
                                        class="form-control form-control-solid"
                                        value="{{ auth()->user()->instructor->linkedin }}">
                                </div>
                            </div>
                            <!--end::Card body-->
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                </form>
                <form action="{{ route('panel.account.about.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer d-flex justify-content-between align-items-center"
                            role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details"
                            aria-expanded="true" aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0 ">
                                <h3 class="fw-bolder m-0">Hakkında Ayarları</h3>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                id="kt_account_profile_details_submit">Kaydet</button>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <div class="form-group">
                                    <textarea name="about" class="form-control form-control-solid" rows="4" data-kt-autosize="true">{{ auth()->user()->instructor->about }}</textarea>
                                </div>
                            </div>
                            <!--end::Card body-->
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                </form>
            @endif
            <form action="{{ route('panel.account.change-password') }}" method="post">
                @csrf
                @method('PUT')
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer d-flex justify-content-between align-items-center"
                        role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details"
                        aria-expanded="true" aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0 ">
                            <h3 class="fw-bolder m-0">Şifre Değiştir</h3>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            id="kt_account_profile_details_submit">Kaydet</button>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Mevcut Şifre</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <input type="password" name="current_password"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Yeni Şifre</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <input type="password" name="new_password"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
            </form>
            <!--end::Basic info-->
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('js')
    <script>
        Inputmask({
            "mask": "(0999) 999-99-99"
        }).mask("#phone");
    </script>
@endsection
