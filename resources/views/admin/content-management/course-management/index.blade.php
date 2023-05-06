@extends('admin.layout.main')
@section('title', 'Kurslar')
@section('css')
@endsection
@section('navigation')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('panel.courses.index') }}" class="text-muted text-hover-primary">Ahmet Ekinciye Ait
                Eğitimler</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-300 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('panel.all-courses.index') }}" class="text-muted text-hover-primary">Tüm Eğitimler</a>
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
                        'title' => 'Kurs Yönetimi',
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
                                    <input type="text" name="kurs"
                                        class="form-control form-control-solid w-250px ps-14 me-5"
                                        value="{{ request()->get('kurs') }}" placeholder="Kurs Ara..." />
                                </div>
                                @if (Request::routeIs('panel.all-courses.index'))
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <select type="text" name="egitmen" id="trainer" data-control="select2"
                                            onchange="this.form.submit()" data-placeholder="Eğitmene Göre Ara"
                                            class="form-select form-select-solid w-250px ps-14 me-5">
                                            <option></option>
                                            @foreach ($users as $user)
                                                <option @if ($user->fullname == request()->get('egitmen')) selected @endif
                                                    value="{{ $user->fullname }}">{{ $user->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if (request()->get('kurs') || request()->get('egitmen'))
                                    <a href="{{ Request::routeIs('panel.courses.index') ? route('panel.courses.index') : route('panel.all-courses.index') }}"
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
                        <a href="{{ route('panel.courses.create') }}" class="btn btn-light-primary">
                            <span class="svg-icon svg-icon-1">
                                <i class="fas fa-plus"></i>
                            </span>
                            Kurs Ekle
                        </a>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="course">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Kurs</th>
                                <th class="min-w-150px ps-4">Eğitmen</th>
                                <th class="min-w-150px">Ders Sayısı</th>
                                <th class="min-w-150px">Öğrenci Sayısı</th>
                                <th class="min-w-150px">Fiyat</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($courses as $course)
                                <tr class="odd">
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-45px">
                                            <img src="{{ $course->image }}" alt="" class="">
                                        </div>
                                        <a href="#" class="text-dark text-hover-primary ms-5"
                                            title="{{ $course->title }}">{{ Str::limit($course->title, 40) }}</a>
                                    </td>
                                    <td>{{ $course->instructor->fullname }}</td>
                                    <td>{{ $course->lessonCount() }}</td>
                                    <td>{{ $course->studentCount() }}</td>
                                    <td>{{ $course->price }}₺</td>
                                    <td>
                                        <div class="badge badge-light-{{ $course->status == 1 ? 'success' : 'danger' }}">
                                            {{ $course->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td>{{ $course->created_at }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('panel.courses.playlists.index', $course) }}"
                                            class="btn btn-light btn-sm me-3 btn-active-light-primary">
                                            Oynatma Listesi
                                        </a>
                                        @if ($course->document_id == null)
                                            <button class="btn btn-icon btn-light btn-sm btn-active-light-success me-3"
                                                data-bs-toggle="modal" data-bs-target="#uploadDocument"
                                                v-on:click="uploadDocument({{ $course }})">
                                                <i class="fas fa-file-upload"></i>
                                            </button>
                                        @endif
                                        <a href="{{ route('panel.courses.edit', $course) }}"
                                            class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button v-on:click="deleteCourse({{ $course }})"
                                            class="btn btn-icon btn-light btn-sm btn-active-light-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $courses->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="uploadDocument">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Döküman Yükle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('panel.upload-document') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="document" class="form-label">Döküman</label>
                            <input type="hidden" name="course_id" :value="course.id">
                            <select name="document_id" id="document" class="form-select" data-control="select2"
                                data-dropdown-parent="#uploadDocument">
                                @foreach ($documents as $document)
                                    <option value="{{ $document->id }}">{{ $document->title }}</option>
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
                    course: {},
                }
            },
            methods: {
                uploadDocument(course) {
                    this.course = course
                },
                deleteCourse(course) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: course
                            .title + " kursunu silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/kurslar/" + course.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: course.title +
                                            " kursu başarıyla silindi.",
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
