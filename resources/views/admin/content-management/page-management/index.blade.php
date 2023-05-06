@extends('admin.layout.main')
@section('title', 'Sayfa Listesi')
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
                        'title' => 'Sayfa Yönetimi',
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
                                <input type="text" name="sayfa"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('sayfa') }}" placeholder="Sayfa Ara..." />
                                @if (request()->get('sayfa'))
                                    <a href="{{ route('panel.pages.index') }}" class="btn  btn-light">
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
                        <a href="{{ route('panel.pages.create') }}" class="btn btn-light-primary">
                            <span class="svg-icon svg-icon-1">
                                <i class="fas fa-plus"></i>
                            </span>
                            Sayfa Ekle
                        </a>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="page">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Sayfa</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($pages as $page)
                                <tr class="odd">
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-45px">
                                            <img src="{{ $page->image }}" alt="" class="">
                                        </div>
                                        <a href="#" class="text-dark text-hover-primary ms-5"
                                            title="{{ $page->title }}">{{ Str::limit($page->title, 40) }}</a>
                                    </td>
                                    <td>
                                        <div class="badge badge-light-{{ $page->status == 1 ? 'success' : 'danger' }}">
                                            {{ $page->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td class="pe-0">{{ $page->created_at }}
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('panel.pages.edit', $page) }}"
                                            class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deletePage({{ $page }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pages->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('js')
    <script>
        Vue.createApp({
            methods: {
                deletePage(page) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: page
                            .title + " sayfasını silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/panel/sayfalar/" + page.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: page.title +
                                            " sayfası başarıyla silindi.",
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
