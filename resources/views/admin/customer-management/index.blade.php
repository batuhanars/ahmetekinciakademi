@extends('admin.layout.main')
@section('title', 'Müşteriler')
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
                        'link' => '',
                        'title' => 'Müşteriler',
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
                                <input type="text" name="musteri"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('musteri') }}" placeholder="Müşteri Ara..." />
                                @if (request()->get('musteri'))
                                    <a href="{{ route('panel.members.index') }}" class="btn  btn-light">
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
                    <table class="table align-middle gs-0 gy-4" id="customer">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Üye</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-150px">Telefon</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Üyelik Durumu</th>
                                <th class="min-w-150px">Kayıt Tarihi</th>
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
                                        <span class="text-dark text-hover-primary ms-5">
                                            {{ ucfirst($user->fullname) }}
                                        </span>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <div
                                            class="badge badge-light-{{ $user->customer->status == 1 ? 'success' : 'danger' }}">
                                            {{ $user->customer->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td>
                                        @if ($user->customer->type == 'corporate')
                                            <div class="badge badge-light-primary">Kurumsal</div>
                                        @else
                                            <div class="badge badge-light-success">Bireysel</div>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="text-end">
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-success me-3"
                                            data-bs-toggle="modal" data-bs-target="#uploadCertificate"
                                            v-on:click="uploadCertificate({{ $user }})">
                                            <i class="fas fa-file-upload"></i>
                                        </button>
                                        <a href="{{ route('panel.customers.profile.info', $user) }}"
                                            class="btn btn-icon btn-light btn-sm btn-active-light-info me-3">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteMember({{ $user }})">
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
    <div class="modal fade" tabindex="-1" id="uploadCertificate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sertifika Yükle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('panel.certificates.upload') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="certificate" class="form-label">Sertifika</label>
                            <input type="hidden" name="customer_id" :value="customer.id">
                            <select name="certificate_id" id="certificate" class="form-select" data-control="select2"
                                data-dropdown-parent="#uploadCertificate">
                                @foreach ($certificates as $certificate)
                                    <option value="{{ $certificate->id }}">{{ $certificate->title }}</option>
                                @endforeach
                            </select>
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
        Vue.createApp({
            data() {
                return {
                    user: {},
                    customer: {},
                }
            },
            methods: {
                uploadCertificate(user) {
                    this.customer = user.customer
                },
                deleteMember(user) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: user.fullname +
                            " adlı üyeyi silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/musteriler/" + user.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: user.fullname +
                                            " adlı üye başarıyla silindi.",
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
