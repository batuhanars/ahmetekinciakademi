@extends('admin.layout.main')
@section('title', 'Yardım')
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
                        'title' => 'İçerik Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Yardım Yönetimi',
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
                                <input type="text" name="yardim"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('yardim') }}" placeholder="Ara..." />
                                @if (request()->get('yardim'))
                                    <a href="{{ route('panel.help.index') }}" class="btn  btn-light">
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
                        <button class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#addHelp">
                            <i class="fas fa-plus"></i>
                            </span>
                            Yardım Ekle
                        </button>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="help">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Başlık</th>
                                <th class="min-w-150px ps-4">Yazılar</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($helps as $help)
                                <tr class="odd">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px me-3">
                                                <img src="{{ $help->icon }}" alt="" class="">
                                            </div>
                                            {{ $help->title }}
                                        </div>
                                    </td>
                                    <td>{{ $help->blogs->count() }}</td>
                                    <td>{{ $help->created_at }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('panel.helps.blogs.index', $help) }}"
                                            class="btn btn-light btn-sm me-3 btn-active-light-primary">
                                            Yazılar
                                        </a>
                                        <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#editHelp"
                                            v-on:click="editHelp({{ $help }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteHelp({{ $help }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $helps->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="addHelp">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Soru Ekle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('panel.helps.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="icon" class="form-label">İkon</label>
                            <small class="text-danger ms-3">{{ $errors->first('icon') }}</small>
                            <input type="file" id="icon" name="icon" class="form-control">
                        </div>
                        <div class="form-group mb-5">
                            <label for="title" class="form-label">Yardım Başlığı</label>
                            <small class="text-danger ms-3">{{ $errors->first('title') }}</small>
                            <input type="text" id="title" name="title" class="form-control"
                                placeholder="Yardım Başlığı">
                        </div>
                        <div class="form-group mb-5">
                            <label for="content" class="form-label">Yardım İçeriği</label>
                            <small class="text-danger ms-3">{{ $errors->first('content') }}</small>
                            <textarea id="content" name="content" class="form-control" placeholder="Yardım İçeriği" data-kt-autosize="true"></textarea>
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
    <div class="modal fade" tabindex="-1" id="editHelp">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ help.title }} Sorusunu Güncelle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/sistem/yardim/' + help.id" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="icon" class="form-label">İkon</label>
                            <small class="text-danger ms-3">{{ $errors->first('icon') }}</small>
                            <input type="file" id="icon" name="icon" class="form-control">
                        </div>
                        <div class="form-group mb-5">
                            <label for="title" class="form-label">Yardım Başlığı</label>
                            <small class="text-danger ms-3">{{ $errors->first('title') }}</small>
                            <input type="text" id="title" name="title" class="form-control"
                                :value="help.title">
                        </div>
                        <div class="form-group mb-5">
                            <label for="content" class="form-label">Yardım İçeriği</label>
                            <small class="text-danger ms-3">{{ $errors->first('content') }}</small>
                            <textarea id="content" name="content" class="form-control" :value="help.content" data-kt-autosize="true"></textarea>
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
                text: "Yardım oluşturulurken bir hata oluştu.",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
    <script>
        Vue.createApp({
            data() {
                return {
                    help: {}
                }
            },
            methods: {
                editHelp(help) {
                    this.help = help
                },
                deleteHelp(help) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: help.title +
                            " yardımını silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/yardim/" + help.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: help.title +
                                            " yardımı başarıyla silindi.",
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
