@extends('admin.layout.main')
@section('title', 'Duyurular')
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
                        'title' => 'Duyurular',
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
                                <input type="text" name="duyuru"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('duyuru') }}" placeholder="Duyuru Ara..." />
                                @if (request()->get('duyuru'))
                                    <a href="{{ route('panel.announcements.index') }}" class="btn  btn-light">
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
                        <button class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#createAnnouncement">
                            <i class="fas fa-plus"></i>
                            </span>
                            Duyuru Yayınla
                        </button>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="announcement">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Başlık</th>
                                <th class="min-w-150px">Duyuru Tipi</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($announcements as $announcement)
                                <tr class="odd">
                                    <td class="ps-4">
                                        {{ $announcement->title }}
                                    </td>
                                    <td>
                                        @switch($announcement->type)
                                            @case('update')
                                                <div class="badge badge-light-primary">Güncelleme</div>
                                            @break

                                            @case('discount')
                                                <div class="badge badge-light-success">İndirim</div>
                                            @break

                                            @case('care')
                                                <div class="badge badge-light-warning">Bakım</div>
                                            @break

                                            @case('important')
                                                <div class="badge badge-light-danger">Önemli</div>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <div
                                            class="badge badge-light-{{ $announcement->status == 1 ? 'success' : 'danger' }}">
                                            {{ $announcement->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td>
                                        {{ $announcement->created_at }}
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#editAnnouncement"
                                            v-on:click="editAnnouncement({{ $announcement }})">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteAnnouncement({{ $announcement }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $announcements->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="createAnnouncement">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Duyuru Yayınla</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('panel.announcements.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="">Başlık</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Durum</label>
                            <select name="status" class="form-select">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Duyuru Tipi</label>
                            <select name="type" class="form-select">
                                <option value="update">Güncelleme</option>
                                <option value="discount">İndirim</option>
                                <option value="care">Bakım</option>
                                <option value="important">Önemli</option>
                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Açıklama</label>
                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Yayınla</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editAnnouncement">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ announcement.title }} Duyurusu</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/sistem/duyurular/' + announcement.id + '/guncelle'" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="">Başlık</label>
                            <input type="text" name="title" class="form-control" :value="announcement.title">
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Durum</label>
                            <select name="status" class="form-select" :value="announcement.status">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Duyuru Tipi</label>
                            <select name="type" class="form-select" :value="announcement.type">
                                <option value="update">Güncelleme</option>
                                <option value="discount">İndirim</option>
                                <option value="care">Bakım</option>
                                <option value="important">Önemli</option>
                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Açıklama</label>
                            <textarea name="description" class="form-control" cols="30" rows="10">@{{ announcement.description }}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
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
                    announcement: {},
                }
            },
            methods: {
                editAnnouncement(announcement) {
                    this.announcement = announcement;
                },
                deleteAnnouncement(announcement) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: announcement.title +
                            " duyurusunu silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/duyurular/" + announcement.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: announcement.title +
                                            " duyurusu başarıyla silindi.",
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
