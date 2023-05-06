@extends('admin.layout.main')
@section('title', 'Belge Yönetimi')
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
                        'title' => 'Döküman Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Belge Yönetimi',
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
                                <input type="text" name="belge"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('belge') }}" placeholder="Belge Ara..." />
                                @if (request()->get('belge'))
                                    <a href="{{ route('panel.documents.index') }}" class="btn  btn-light">
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
                        <button class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#addDocument">
                            <i class="fas fa-plus"></i>
                            </span>
                            Belge Ekle
                        </button>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="document">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Belge</th>
                                <th class="min-w-150px ps-4">Oluşturan</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($documents as $document)
                                <tr class="odd">
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-45px">
                                            <img src="{{ $document->image }}" alt="" class="">
                                        </div>
                                        <a href="#"
                                            class="text-dark text-hover-primary ms-5">{{ $document->title }}</a>
                                    </td>
                                    <td>{{ $document->user->fullname }}</td>
                                    <td>
                                        <div class="badge badge-light-{{ $document->status == 1 ? 'success' : 'danger' }}">
                                            {{ $document->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td>
                                        {{ $document->created_at }}
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#editDocument"
                                            v-on:click="editDocument({{ $document }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteDocument({{ $document }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $documents->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="addDocument">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Belge Ekle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('panel.documents.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="image" class="form-label">Belge</label>
                                    <small class="text-danger ms-3">{{ $errors->first('image') }}</small>
                                    <input type="file" id="image" name="image" v-on:change="loadImage($event)"
                                        class="form-control">
                                    <img :src="image_preview" alt="" id="image_preview" class="mt-2"
                                        style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="title" class="form-label">Belge Adı</label>
                                    <small class="text-danger ms-3">{{ $errors->first('title') }}</small>
                                    <input type="text" id="title" name="title" class="form-control"
                                        placeholder="Belge Adı">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Belge Durumu</label>
                            <small class="text-danger ms-3">{{ $errors->first('status') }}</small>
                            <select name="status" id="status" class="form-select" data-control="select2"
                                data-hide-search="true">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
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
    <div class="modal fade" tabindex="-1" id="editDocument">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ document.title }} Belgesini Güncelle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/sistem/belgeler/' + document.id" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="image" class="form-label">Belge</label>
                                    <small class="text-danger ms-3">{{ $errors->first('image') }}</small>
                                    <input type="file" id="image" name="image"
                                        v-on:change="loadImage($event, 'edit')" class="form-control">
                                    <img :src="edit_image_preview ?? document.image" alt="" id="image_preview"
                                        class="mt-2" style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="title" class="form-label">Belge Adı</label>
                                    <small class="text-danger ms-3">{{ $errors->first('title') }}</small>
                                    <input type="text" id="title" name="title" class="form-control"
                                        :value="document.title">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Belge Durumu</label>
                            <small class="text-danger ms-3">{{ $errors->first('status') }}</small>
                            <select name="status" id="editStatus" class="form-select" :value="document.status">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
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
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: "Belge oluşturulurken bir hata oluştu.",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
    <script>
        Vue.createApp({
            data() {
                return {
                    document: {},
                    image_preview: null,
                    edit_image_preview: null,
                }
            },
            methods: {
                loadImage(event, type) {
                    let file = URL.createObjectURL(event.target.files[0]);
                    this.image_preview = file;
                    if (type == 'edit') {
                        this.edit_image_preview = file;
                    }
                },
                editDocument(doc) {
                    this.document = doc
                },
                deleteDocument(doc) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: doc.title +
                            " belgesini silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/belgeler/" + doc.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: doc.title +
                                            " belgesi başarıyla silindi.",
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
