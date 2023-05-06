@extends('admin.layout.main')
@section('title', 'Profil Bilgileri')
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
                        'title' => 'Profil Bilgileri',
                    ],
                ],
            ])
            <div class="row">
                @include('admin.customer-management.profile.include.profile-card')
                <div class="col-md-9">
                    <div class="card card-custom card-stretch">
                        <form action="{{ route('panel.customers.profile.info.update', $user) }}" class="form" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header py-3">
                                <div class=" align-items-start flex-column">
                                    <h3 class="card-title fw-bolder text-dark">Profil Bilgileri</h3>
                                    <span class="text-muted fw-bold fs-sm mt-1">Müşteri bilgilerini bu
                                        alandan değiştirebilirsiniz.</span>
                                </div>
                                <div class="card-toolbar"><button type="submit" class="btn btn-success me-2">
                                        Kaydet
                                    </button></div>
                            </div>
                            <div class="card-body">
                                <div class="row"><label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="fw-bold mb-6">Profil Bilgileri</h5>
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="fullname" class="col-xl-3 col-lg-3 col-form-label">Profil
                                        Fotoğrafı</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="file" name="image" id="image"
                                            class="form-control form-control-lg form-control-solid">
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="fullname" class="col-xl-3 col-lg-3 col-form-label">İsim
                                        Soyisim</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" name="fullname" id="fullname"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $user->fullname }}">
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="phone" class="col-xl-3 col-lg-3 col-form-label">Telefon</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" id="phone" name="phone"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="email" class="col-xl-3 col-lg-3 col-form-label">E-Posta
                                        Adresi</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" id="email" name="email"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="status" class="col-xl-3 col-lg-3 col-form-label">Üyelik
                                        Durumu</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select id="status" name="status"
                                            class="form-select form-select-lg form-select-solid">
                                            <option @if ($customer->status == '1') selected @endif value="1">Aktif
                                            </option>
                                            <option @if ($customer->status == '0') selected @endif value="0">Pasif
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="type" class="col-xl-3 col-lg-3 col-form-label">Üyelik
                                        Tipi</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select id="type" name="type"
                                            class="form-select form-select-lg form-select-solid">
                                            <option @if ($customer->type == 'corporate') selected @endif value="corporate">
                                                Kurumsal</option>
                                            <option @if ($customer->type == 'individual') selected @endif value="individual">
                                                Bireysel</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
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
