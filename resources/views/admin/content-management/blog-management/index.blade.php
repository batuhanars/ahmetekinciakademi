@extends('admin.layout.main')
@section('title', 'Haberler')
@section('css')
@endsection
@section('navigation')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('panel.blog.index') }}" class="text-muted text-hover-primary">Ahmet Ekinciye Ait
                Haberler</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-300 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('panel.all-blogs.index') }}" class="text-muted text-hover-primary">Tüm Haberler</a>
        </li>
        <!--end::Item-->
    </ul>
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
                        'title' => 'Haber Yönetimi',
                    ],
                ],
            ])
            <div class="card card-flush">
                <div class="card-header align-items-center gap-2 gap-md-5">
                    <div class="card-title">
                        <!--begin::Search-->
                        <form>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" name="haber"
                                        class="form-control form-control-solid w-250px ps-14 me-5"
                                        value="{{ request()->get('haber') }}" placeholder="Haber Ara..." />
                                </div>
                                @if (Request::routeIs('panel.all-blogs.index'))
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <select type="text" name="yazar" id="trainer" data-control="select2"
                                            onchange="this.form.submit()" data-placeholder="Yazara Göre Ara"
                                            class="form-select form-select-solid w-250px ps-14 me-5">
                                            <option></option>
                                            @foreach ($users as $user)
                                                <option @if ($user->fullname == request()->get('yazar')) selected @endif
                                                    value="{{ $user->fullname }}">{{ $user->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if (request()->get('haber') || request()->get('yazar'))
                                    <a href="{{ Request::routeIs('panel.blog.index') ? route('panel.blog.index') : route('panel.all-blogs.index') }}"
                                        class="btn  btn-light">
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
                        <a href="{{ route('panel.blog.create') }}" class="btn btn-light-primary">
                            <span class="svg-icon svg-icon-1">
                                <i class="fas fa-plus"></i>
                            </span>
                            Haber Ekle
                        </a>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="blog">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Blog</th>
                                <th class="min-w-150px ps-4">Yazar</th>
                                <th class="min-w-150px ps-4">Link</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($blogs as $blog)
                                <tr class="odd">
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-45px">
                                            <img src="{{ $blog->image }}" alt="" class="">
                                        </div>
                                        <a href="#" class="text-dark text-hover-primary ms-5"
                                            title="{{ $blog->title }}">{{ Str::limit($blog->title, 40) }}</a>
                                    </td>
                                    <td>{{ $blog->user->fullname }}</td>
                                    <td>{{ $blog->link }}</td>
                                    <td>
                                        <div class="badge badge-light-{{ $blog->status == 1 ? 'success' : 'danger' }}">
                                            {{ $blog->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td class="pe-0">{{ $blog->created_at }}
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('panel.blog.edit', $blog) }}"
                                            class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteBlog({{ $blog }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links('vendor.pagination.bootstrap-5') }}
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
                deleteBlog(blog) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: blog
                            .title + " blogunu silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/haberler/" + blog.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: blog.title + " haberi başarıyla silindi.",
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
