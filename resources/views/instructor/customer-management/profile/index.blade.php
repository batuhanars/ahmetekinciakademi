@extends('instructor.layout.main')
@section('title', 'Profil Bilgileri')
@section('css')
@endsection
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @include('instructor.breadcrumb', [
                'items' => [
                    [
                        'link' => route('instructor.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Müşteri Yönetimi',
                    ],
                    [
                        'link' => route('instructor.customers.index'),
                        'title' => 'Müşteriler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Profil',
                    ],
                    [
                        'link' => '',
                        'title' => 'Profil Bilgileri',
                    ],
                ],
            ])
            <div class="row">
                @include('instructor.customer-management.profile.include.profile-card')
                <div class="col-md-9">
                    <div class="card card-custom card-stretch">
                        <div class="card-header py-3">
                            <div class=" align-items-start flex-column">
                                <h3 class="card-title fw-bolder text-dark">Profil Bilgileri</h3>
                                <span class="text-muted fw-bold fs-sm mt-1">Müşteri bilgilerini bu
                                    alandan görüntüleyebilirsiniz.</span>
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
                                    <input type="text" name="fullname" id="fullname"
                                        class="form-control form-control-lg form-control-solid" readonly
                                        value="{{ $user->fullname }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="phone" class="col-xl-3 col-lg-3 col-form-label">Telefon</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input type="text" id="phone" name="phone"
                                        class="form-control form-control-lg form-control-solid" readonly
                                        value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="email" class="col-xl-3 col-lg-3 col-form-label">E-Posta
                                    Adresi</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input type="text" id="email" name="email"
                                        class="form-control form-control-lg form-control-solid" readonly
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="status" class="col-xl-3 col-lg-3 col-form-label">Üyelik
                                    Durumu</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input type="text" id="email" name="email"
                                        class="form-control form-control-lg form-control-solid" readonly
                                        value="{{ $customer->status == 1 ? 'Aktif' : 'Pasif' }}">
                                </div>
                            </div>
                            <div class="form-group mb-5 row">
                                <label for="type" class="col-xl-3 col-lg-3 col-form-label">Üyelik
                                    Tipi</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select id="type" name="type"
                                        class="form-select form-select-lg form-select-solid">
                                        <option @if ($customer->type == 'corporate') selected @endif readonly
                                            value="corporate">
                                            Kurumsal</option>
                                        <option @if ($customer->type == 'individual') selected @endif readonly
                                            value="individual">
                                            Bireysel</option>
                                    </select>
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
