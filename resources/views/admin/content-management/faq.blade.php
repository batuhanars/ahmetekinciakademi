@extends('admin.layout.main')
@section('title', 'Sıkça Sorulan Sorular')
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
                        'title' => 'S.S.S Yönetimi',
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
                                <input type="text" name="sss"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('sss') }}" placeholder="Soru Ara..." />
                                @if (request()->get('sss'))
                                    <a href="{{ route('panel.faq.index') }}" class="btn  btn-light">
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
                        <button class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#addFaq">
                            <i class="fas fa-plus"></i>
                            </span>
                            Soru Ekle
                        </button>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="faq">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Başlık</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($faq as $f)
                                <tr class="odd">
                                    <td class="ps-4">
                                        {{ $f->title }}
                                    </td>

                                    <td>{{ $f->created_at }}</td>
                                    <td class="text-end">
                                        <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#editFaq"
                                            v-on:click="editFaq({{ $f }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteFaq({{ $f }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $faq->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="addFaq">
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
                <form action="{{ route('panel.faq.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="title" class="form-label">Soru Başlığı</label>
                            <small class="text-danger ms-3">{{ $errors->first('title') }}</small>
                            <input type="text" id="title" name="title" class="form-control"
                                placeholder="Soru Başlığı">
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Soru İçeriği</label>
                            <small class="text-danger ms-3">{{ $errors->first('content') }}</small>
                            <textarea id="content" name="content" class="form-control" placeholder="Soru İçeriği" data-kt-autosize="true"></textarea>
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
    <div class="modal fade" tabindex="-1" id="editFaq">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ faq.title }} Sorusunu Güncelle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/panel/sss/' + faq.id" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="title" class="form-label">Soru Başlığı</label>
                            <small class="text-danger ms-3">{{ $errors->first('title') }}</small>
                            <input type="text" id="title" name="title" class="form-control"
                                :value="faq.title">
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Soru İçeriği</label>
                            <small class="text-danger ms-3">{{ $errors->first('content') }}</small>
                            <textarea id="content" name="content" class="form-control" :value="faq.content" data-kt-autosize="true"></textarea>
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
                text: "Sıkça sorulan soru oluşturulurken bir hata oluştu.",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
    <script>
        Vue.createApp({
            data() {
                return {
                    faq: {}
                }
            },
            methods: {
                editFaq(faq) {
                    this.faq = faq
                },
                deleteFaq(f) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: f.title +
                            " sıkça sorulan sorusunu silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/panel/sss/" + f.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: f.title +
                                            " sıkça sorulan sorusu başarıyla silindi.",
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
