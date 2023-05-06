@extends('admin.layout.main')
@section('title', 'Eğitmenler')
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
                        'title' => 'Eğitmenler',
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
                                    <a href="{{ route('panel.instructors.index') }}" class="btn  btn-light">
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
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="blog">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Ad Soyad</th>
                                <th class="min-w-150px">Kurs Sayısı</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-150px">Telefon</th>
                                <th class="min-w-150px">Doğum Tarihi</th>
                                <th class="min-w-150px">Uzmanlık Alanı</th>
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
                                        <span
                                            class="text-dark text-hover-primary ms-5">{{ ucfirst($user->fullname) }}</span>
                                    </td>

                                    <td>{{ $user->courses->count() }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->date_of_birth }}</td>
                                    <td>{{ $user->profession }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('panel.instructor.profile', $user) }}"
                                            class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteInstructor({{ $user }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
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
@endsection
@section('js')
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
                deleteInstructor(user) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: user.fullname +
                            " adlı eğitmeni silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/egitmenler/" + user.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: user.fullname +
                                            " adlı eğitmen başarıyla silindi.",
                                        confirmButtonText: "Tamam"
                                    }).then(() => location.reload());
                                }
                            });
                        }
                    })
                }
            }
        }).mount("#app");

        // Inputmask({
        //     "mask": "(999) 999-9999",
        //     "placeholder": "(999) 999-9999",
        // }).mask("#phone");
    </script>
@endsection
