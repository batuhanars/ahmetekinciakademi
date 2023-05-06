@extends('admin.layout.main')
@section('title', $user->fullname)
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
                        'link' => route('panel.instructors.index'),
                        'title' => 'Eğitmenler',
                    ],
                    [
                        'link' => '',
                        'title' => $user->fullname,
                    ],
                    [
                        'link' => '',
                        'title' => 'Profil',
                    ],
                ],
            ])
            <div class="row">
                @include('admin.instructors.profile.include.profile-card')
                <div class="col-md-9">
                    <div class="card card-custom card-stretch">
                        <div class="card-header py-3">
                            <div class=" align-items-start flex-column">
                                <h3 class="card-title fw-bolder text-dark">Profil Bilgileri</h3>
                                <span class="text-muted fw-bold fs-sm mt-1">Eğitmene ait profil bilgileri.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row"><label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="fw-bold mb-6">Profil Bilgileri</h5>
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="fullname" class="col-xl-3 col-lg-3 col-form-label">İsim
                                    Soyisim</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input readonly type="text" name="fullname" id="fullname"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ $user->fullname }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="phone" class="col-xl-3 col-lg-3 col-form-label">Telefon</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input readonly type="text" id="phone" name="phone"
                                        class="form-control form-control-lg form-control-solid" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="email" class="col-xl-3 col-lg-3 col-form-label">E-Posta
                                    Adresi</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input readonly type="text" id="email" name="email"
                                        class="form-control form-control-lg form-control-solid" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="date_of_birth" class="col-xl-3 col-lg-3 col-form-label">Doğum Tarihi</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input readonly type="date" id="date_of_birth" name="date_of_birth"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ $user->instructor->date_of_birth }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="education_status" class="col-xl-3 col-lg-3 col-form-label">Eğitim Durumu</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input readonly type="text" id="education_status" name="education_status"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ $user->instructor->education_status }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="profession" class="col-xl-3 col-lg-3 col-form-label">Uzmanlık Alanı</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input readonly type="text" id="profession" name="profession"
                                        class="form-control form-control-lg form-control-solid"
                                        value="{{ $user->instructor->profession }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom card-stretch mt-10">
                        <div class="card-header py-3">
                            <div class=" align-items-start flex-column">
                                <h3 class="card-title fw-bolder text-dark">Sosyal Medya Hesapları</h3>
                                <span class="text-muted fw-bold fs-sm mt-1">Eğitmene ait sosyal medya hesapları.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row"><label class="col-xl-3"></label>
                                <div class="input-group mb-5">
                                    <div class="input-group-append">
                                        <div class="btn" style="background-color: rgb(59, 89, 152);">
                                            <i class="fab fa-facebook-f fs-3 text-white"></i>
                                        </div>
                                    </div>
                                    <input readonly type="text" name="facebook" id="facebook"
                                        class="form-control form-control-solid" value="{{ $user->instructor->facebook }}">
                                </div>
                                <div class="input-group mb-5">
                                    <div class="input-group-append">
                                        <div class="btn" style="background-color: rgb(29, 161, 242);">
                                            <i class="fab fa-twitter fs-3 text-white"></i>
                                        </div>
                                    </div>
                                    <input readonly type="text" name="twitter" id="twitter"
                                        class="form-control form-control-solid" value="{{ $user->instructor->twitter }}">
                                </div>
                                <div class="input-group mb-5">
                                    <div class="input-group-append">
                                        <div class="btn" style="background-color: rgb(131, 58, 180);">
                                            <i class="fab fa-instagram fs-3 text-white"></i>
                                        </div>
                                    </div>
                                    <input readonly type="text" name="instagram" id="instagram"
                                        class="form-control form-control-solid"
                                        value="{{ $user->instructor->instagram }}">
                                </div>
                                <div class="input-group mb-5">
                                    <div class="input-group-append">
                                        <div class="btn" style="background-color: rgb(40, 103, 178);">
                                            <i class="fab fa-linkedin fs-3 text-white"></i>
                                        </div>
                                    </div>
                                    <input readonly type="text" name="linkedin" id="linkedin"
                                        class="form-control form-control-solid" value="{{ $user->instructor->linkedin }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom card-stretch mt-10">
                        <div class="card-header py-3">
                            <div class=" align-items-start flex-column">
                                <h3 class="card-title fw-bolder text-dark">Hakkında</h3>
                                <span class="text-muted fw-bold fs-sm mt-1">Eğitmen hakkında.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row"><label class="col-xl-3"></label>
                                <div class="form-group">
                                    <textarea readonly name="about" class="form-control form-control-solid" rows="4" data-kt-autosize="true">{{ $user->instructor->about }}</textarea>
                                </div>
                            </div>
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
    <script>
        Inputmask({
            "mask": "(9999) 999-9999"
        }).mask("#phone");
    </script>
@endsection
