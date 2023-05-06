@extends('admin.layout.main')
@section('title', 'Eğitmenlik Başvuruları')
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
                        'title' => 'Bildirim Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Eğitmenlik Başvuruları',
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
                                    value="{{ request()->get('egitmen') }}" placeholder="Ara..." />
                                @if (request()->get('egitmen'))
                                    <a href="{{ route('panel.instructor-requests.index') }}" class="btn  btn-light">
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
                    <table class="table align-middle gs-0 gy-4" id="offer">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Ad Soyad</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-150px">Telefon</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($instructorRequests as $request)
                                <tr class="odd ps-4">
                                    <td>
                                        {{ $request->fullname }}
                                    </td>
                                    <td>
                                        {{ $request->email }}
                                    </td>
                                    <td>
                                        {{ $request->phone }}
                                    </td>
                                    <td>
                                        @if ($request->status == 'onhold')
                                            <span class="badge badge-light-warning">Beklemede</span>
                                        @elseif($request->status == 'approved')
                                            <span class="badge badge-light-success">Onaylandı</span>
                                        @else
                                            <span class="badge badge-light-danger">Reddedildi</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $request->created_at }}
                                    </td>
                                    <td class="text-end">
                                        @if ($request->status == 'onhold')
                                            <button class="btn btn-icon btn-light-success btn-sm  me-3"
                                                v-on:click="applyRequest({{ $request }})">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn btn-icon btn-light-danger btn-sm  me-3"
                                                data-bs-toggle="modal" data-bs-target="#deniedRequest"
                                                v-on:click="deniedRequest({{ $request }})">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        @else
                                        @endif
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-info me-3"
                                            data-bs-toggle="modal" data-bs-target="#detailRequest"
                                            v-on:click="detailRequest({{ $request }})">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteRequest({{ $request }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $instructorRequests->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="deniedRequest">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Başvuruyu Reddet</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/sistem/egitmenlik-basvurulari/' + request.id" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="fullname" :value="request.fullname">
                        <input type="hidden" name="email" :value="request.email">
                        <input type="hidden" name="phone" :value="request.phone">
                        <input type="hidden" name="status" value="denied">
                        <div class="form-group">
                            <label for="description" class="form-label">Reddetme Nedeni</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
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
    <div class="modal fade" tabindex="-1" id="detailRequest">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eğitmenlik Başvuru Detayı</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="mb-5">
                        <strong class="me-2">Gönderen:</strong> <span>@{{ request.fullname }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Email:</strong> <span>@{{ request.email }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Telefon:</strong> <span>@{{ request.phone }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Doğum Tarihi:</strong> <span>@{{ request.date_of_birth }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Eğitim Durumu?:</strong> <span>@{{ request.education_status }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Daha Önce Eğitim Verdiniz mi?:</strong> <span>@{{ request.instructor_status }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Uzmanlık Alanı?:</strong> <span>@{{ request.profession }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Eğitim Vermek İstediği Alan?:</strong> <span>@{{ request.profession }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class=" me-2">Gönderilme Tarihi:</strong>
                        <span>@{{ createdAt(request.created_at) }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class=" me-2">Durum:</strong>
                        <span v-if="request.status == 'onhold'">Beklemede</span>
                        <span v-if="request.status == 'approved'">Onaylandı</span>
                        <span v-if="request.status == 'denied'">Reddedildi</span>
                    </div>
                    <div class="mb-5">
                        <strong class="d-block me-2">Neden Ahmet Ekinci Akademi'yi Tercih Ettiniz:</strong>
                        <span>@{{ request.description_1 }}</span>
                    </div>
                    <div>
                        <strong class="d-block me-2">Sizi Neden Eğitmen Olarak Tercih Etmeliyiz:</strong>
                        <span>@{{ request.description_2 }}</span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        Vue.createApp({
            data() {
                return {
                    request: {},
                }
            },
            methods: {
                applyRequest(request) {
                    let fd = new FormData();
                    fd.append("fullname", request.fullname)
                    fd.append("email", request.email)
                    fd.append("phone", request.phone)
                    fd.append("date_of_birth", request.date_of_birth)
                    fd.append("education_status", request.education_status)
                    fd.append("profession", request.profession)
                    fd.append("resume", request.resume)
                    fd.append("status", "approved")
                    fd.append("_method", "PUT")
                    axios.post("/sistem/egitmenlik-basvurulari/" + request.id, fd).then(res => {
                        Swal.fire({
                            icon: 'success',
                            title: "Eğitmenlik başvurusu başarıyla onaylandı.",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload()
                        })
                    })
                },
                deniedRequest(request) {
                    this.request = request
                },
                createdAt(value) {
                    return moment(value).format("YYYY-MM-DD H:m:s");
                },
                detailRequest(request) {
                    this.request = request;
                },
                deleteRequest(request) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: "Başvuruyu silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/egitmenlik-basvurulari/" + request.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: "Başvuru başarıyla silindi.",
                                        confirmButtonText: "Tamam"
                                    }).then(() => location.reload());
                                }
                            });
                        }
                    })
                }
            },
        }).mount("#app");
    </script>
@endsection
