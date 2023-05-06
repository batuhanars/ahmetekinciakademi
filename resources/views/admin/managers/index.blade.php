@extends('admin.layout.main')
@section('title', 'Yöneticiler')
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
                        'title' => 'Yöneticiler',
                    ],
                ],
            ])
            <div class="card card-flush">
                <div class="card-header align-items-center gap-2 gap-md-5">
                    <div class="card-title">
                        <!--begin::Search-->
                        <form>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" name="egitmen"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('egitmen') }}" placeholder="Yönetici Ara..." />
                                @if (request()->get('egitmen'))
                                    <a href="{{ route('panel.managers.index') }}" class="btn  btn-light">
                                        <i class="fas fa-sync"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                        <!--end::Search-->
                        <!--begin::Export buttons-->
                        <div id="kt_datatable_example_1_export" class="d-none"></div>
                        <!--end::Export buttons-->
                    </div>
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <!--begin::Export dropdown-->
                        <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                            data-bs-target="#addManager">
                            <span class="svg-icon svg-icon-1">
                                <i class="fas fa-plus"></i>
                            </span>
                            Yönetici Ekle
                        </button>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="blog">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Ad Soyad</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-150px">Telefon</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($users as $user)
                                <tr class="odd">
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-45px">
                                            @if ($user->image)
                                                <img src="{{ $user->image }}" alt="" class="">
                                            @else
                                                <span
                                                    class="fs-1 text-uppercase mx-3">{{ Str::limit($user->fullname, 1, '') }}</span>
                                            @endif
                                        </div>
                                        <span class="text-dark text-hover-primary ms-5">{{ ucfirst($user->fullname) }}
                                            <small class="text-muted">({{ $user->membership_type }})</small> </span>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('panel.manager.profile', $user) }}"
                                            class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if ($user->membership_type == 'admin')
                                            <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                                data-bs-toggle="modal" data-bs-target="#authority"
                                                v-on:click="setAuthority({{ $user }}, {{ $user->authority }})">
                                                <i class="fas fa-scroll"></i>
                                            </button>
                                            <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                                v-on:click="deleteManager({{ $user }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="addManager">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yönetici Ekle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('panel.managers.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="fullname" class="form-label">Ad Soyad</label>
                            <span class="text-danger d-block">{{ $errors->first('fullname') }}</span>
                            <input type="text" name="fullname" id="fullname" class="form-control"
                                placeholder="Ad Soyad">
                        </div>
                        <div class="form-group mb-5">
                            <label for="email" class="form-label">Email</label>
                            <span class="text-danger d-block">{{ $errors->first('email') }}</span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group mb-5">
                            <label for="phone" class="form-label">Telefon</label>
                            <span class="text-danger d-block">{{ $errors->first('phone') }}</span>
                            <input type="numeric" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group mb-5">
                            <label for="password" class="form-label">Şifre</label>
                            <span class="text-danger d-block">{{ $errors->first('password') }}</span>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Şifre">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="authority">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yetkiler</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/sistem/yoneticiler/yetkiler/' + user_id" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="site_management" class="fs-6 fw-bold form-label">Site
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="site_management"
                                                    id="site_management" type="checkbox"
                                                    :checked="site_management == '1' ? true : false"
                                                    :value="site_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="menu_management" class="fs-6 fw-bold form-label">Menü
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="menu_management"
                                                    id="menu_management" type="checkbox"
                                                    :checked="menu_management == '1' ? true : false"
                                                    :value="menu_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="managers" class="fs-6 fw-bold form-label">Yöneticiler</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="managers" id="managers"
                                                    type="checkbox" :checked="managers == '1' ? true : false"
                                                    :value="managers">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="sales_management" class="fs-6 fw-bold form-label">Satış
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="sales_management"
                                                    id="sales_management" type="checkbox"
                                                    :checked="sales_management == '1' ? true : false"
                                                    :value="sales_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="integration_management"
                                                class="fs-6 fw-bold form-label">Entegrasyon Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="integration_management"
                                                    id="integration_management" type="checkbox"
                                                    :checked="integration_management == '1' ? true : false"
                                                    :value="integration_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="customer_management" class="fs-6 fw-bold form-label">Müşteri
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="customer_management"
                                                    id="customer_management" type="checkbox"
                                                    :checked="customer_management == '1' ? true : false"
                                                    :value="customer_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="multimedia_management" class="fs-6 fw-bold form-label">Multi Medya
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="multimedia_management"
                                                    id="multimedia_management" type="checkbox"
                                                    :checked="multimedia_management == '1' ? true : false"
                                                    :value="multimedia_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="instructors" class="fs-6 fw-bold form-label">Eğitmenler</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="instructors" id="instructors"
                                                    type="checkbox" :checked="instructors == '1' ? true : false"
                                                    :value="instructors">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="notification_management" class="fs-6 fw-bold form-label">Bildirim
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="notification_management"
                                                    id="notification_management" type="checkbox"
                                                    :checked="notification_management == '1' ? true : false"
                                                    :value="notification_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="sms_management" class="fs-6 fw-bold form-label">Sms
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="sms_management" id="sms_management"
                                                    type="checkbox" :checked="sms_management == '1' ? true : false"
                                                    :value="sms_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="document_management" class="fs-6 fw-bold form-label">Belge
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="document_management"
                                                    id="document_management" type="checkbox"
                                                    :checked="document_management == '1' ? true : false"
                                                    :value="document_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-5 bg-gray-100">
                            <div class="card-header">
                                <!--begin::Label-->
                                <div class="card-title">
                                    <label for="content_management" class="fs-6 fw-bold form-label">İçerik
                                        Yönetimi</label>
                                </div>
                                <!--end::Label-->
                                <div class="card-toolbar">
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" name="content_management" id="content_management"
                                            type="checkbox" :checked="content_management == '1' ? true : false"
                                            :value="content_management" v-on:change="setContentManagement($event)">
                                    </label>
                                    <!--end::Switch-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="education_management" class="fs-6 fw-bold form-label">Eğitim
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="education_management"
                                                    id="education_management" type="checkbox"
                                                    :checked="education_management == '1' ? true : false"
                                                    :value="education_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="blog_management" class="fs-6 fw-bold form-label">Blog
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="blog_management"
                                                    id="blog_management" type="checkbox"
                                                    :checked="blog_management == '1' ? true : false"
                                                    :value="blog_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="page_management" class="fs-6 fw-bold form-label">Sayfa
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="page_management"
                                                    id="page_management" type="checkbox"
                                                    :checked="page_management == '1' ? true : false"
                                                    :value="page_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="sss_management" class="fs-6 fw-bold form-label">S.S.S
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="sss_management" id="sss_management"
                                                    type="checkbox" :checked="sss_management == '1' ? true : false"
                                                    :value="sss_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5 bg-gray-100">
                                    <div class="card-header">
                                        <!--begin::Label-->
                                        <div class="card-title">
                                            <label for="help_management" class="fs-6 fw-bold form-label">Yardım
                                                Yönetimi</label>
                                        </div>
                                        <!--end::Label-->
                                        <div class="card-toolbar">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="help_management"
                                                    id="help_management" type="checkbox"
                                                    :checked="help_management == '1' ? true : false"
                                                    :value="help_management">
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        Inputmask({
            "mask": "(0999) 999-99-99"
        }).mask("#phone");
    </script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: "Yönetici oluşturulurken bir hata oluştu.",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
    <script>
        Vue.createApp({
            data() {
                return {
                    user_id: null,
                    site_management: null,
                    menu_management: null,
                    managers: null,
                    instructors: null,
                    customer_management: null,
                    multimedia_management: null,
                    notification_management: null,
                    content_management: null,
                    education_management: null,
                    blog_management: null,
                    slider_management: null,
                    service_management: null,
                    reference_management: null,
                    page_management: null,
                    sss_management: null,
                    help_management: null,
                    guide_management: null,
                    document_management: null,
                    sales_management: null,
                    sms_management: null,
                    integration_management: null,
                }
            },
            methods: {
                setAuthority(user, authority) {
                    console.log(authority)
                    this.user_id = user.id
                    this.site_management = authority.site_management
                    this.menu_management = authority.menu_management
                    this.managers = authority.managers
                    this.instructors = authority.instructors
                    this.customer_management = authority.customer_management
                    this.multimedia_management = authority.multimedia_management
                    this.notification_management = authority.notification_management
                    this.content_management = authority.content_management
                    this.education_management = authority.education_management
                    this.blog_management = authority.blog_management
                    this.slider_management = authority.slider_management
                    this.service_management = authority.service_management
                    this.reference_management = authority.reference_management
                    this.page_management = authority.page_management
                    this.sss_management = authority.sss_management
                    this.help_management = authority.help_management
                    this.guide_management = authority.guide_management
                    this.document_management = authority.document_management
                    this.sales_management = authority.sales_management
                    this.sms_management = authority.sms_management
                    this.integration_management = authority.integration_management
                    this.education_calendar = authority.education_calendar
                },
                setContentManagement(event) {
                    this.education_management = event.target.checked
                    this.blog_management = event.target.checked
                    this.slider_management = event.target.checked
                    this.service_management = event.target.checked
                    this.reference_management = event.target.checked
                    this.page_management = event.target.checked
                    this.sss_management = event.target.checked
                    this.help_management = event.target.checked
                    this.guide_management = event.target.checked
                },
                deleteManager(user) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: user.fullname +
                            " adlı yöneticiyi silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Evet Sil!',
                        cancelButtonText: 'İptal Et'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "GET",
                                url: "/sistem/yoneticiler/" + user.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: user.fullname +
                                            " adlı yönetici başarıyla silindi.",
                                        confirmButtonText: "Tamam"
                                    }).then(() => location.reload());
                                }
                            });
                        }
                    })
                }
            }
        }).mount("#app");
    </script>
@endsection
