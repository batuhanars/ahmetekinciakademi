<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <title>Giriş Yap | ahmetekinci</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('') }}assets/back/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/back/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
        .btn-check:active+.btn.btn-primary,
        .btn-check:checked+.btn.btn-primary,
        .btn.btn-primary.active,
        .btn.btn-primary.show,
        .btn.btn-primary:active:not(.btn-active),
        .btn.btn-primary:focus:not(.btn-active),
        .btn.btn-primary:hover:not(.btn-active),
        .show>.btn.btn-primary {
            color: #fff;
            background-color: #181c32 !important;
        }

        .link-primary:focus,
        .link-primary:hover {
            color: #148d36;
        }

        .form-control.form-control-solid {
            background-color: #f5f8fa;
            border-color: #e8e2e2;
            color: #5e6278;
            border-radius: 6px;
            transition: color .2s ease, background-color .2s ease;
        }

        .dropdown.show>.form-control.form-control-solid,
        .form-control.form-control-solid.active,
        .form-control.form-control-solid.focus,
        .form-control.form-control-solid:active,
        .form-control.form-control-solid:focus {
            background-color: #eef3f7;
            border-color: #c8c7c7;
            color: #5e6278;
            transition: color .2s ease, background-color .2s ease;
        }

        .text-hover-primary:hover {
            transition: color .2s ease, background-color .2s ease;
            color: ##008aff !important;
        }

        .w-lg-500px {
            width: 450px !important;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" style="background: #181C32">
        <!--begin::Authentication - Sign-in -->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="../../demo13/dist/index.html" class="mb-12">
                    <img alt="akademi" src="{{ asset('assets/Akademi-Beyaz.png') }}" width="300" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div style="border-radius: 10px !important;"
                    class="bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" id="kt_sign_in_form" action="{{ route('login.post') }}" method="post">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sistem Yönetici Portalı</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">E-posta Adresiniz</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <span class="text-danger d-block">{{ $errors->first('email') }}</span>
                            <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Şifre</label>
                                <!--end::Label-->
                                <!--begin::Link-->
                                <a href="{{ route('forgot-password') }}"
                                    class="link-dark fs-8 fw-bolder text-hover-primary">Şifreni mi Unuttun ?</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <span class="text-danger d-block">{{ $errors->first('password') }}</span>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                name="password" autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" style="background: #008aff; border-radius: 6px;"
                                class="btn btn-lg w-100 mb-5 btn-active-dark">
                                <span class="indicator-label text-white">Devam Et</span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <span class="text-muted">2022 © ahmetekinciakademi.com</span>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('') }}assets/back/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('') }}assets/back/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('') }}assets/back/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: "{{ session('error') }}",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
</body>
<!--end::Body-->

</html>
