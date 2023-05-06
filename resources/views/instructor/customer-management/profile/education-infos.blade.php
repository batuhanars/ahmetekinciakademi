@extends('instructor.layout.main')
@section('title', 'Kurs Bilgileri')
@section('css')
@endsection
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @include('instructor.breadcrumb', [
                'items' => [
                    [
                        'link' => route('instructor.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Müşteri Yönetimi',
                    ],
                    [
                        'link' => route('instructor.customers.index'),
                        'title' => 'Müşteriler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Profil',
                    ],
                    [
                        'link' => '',
                        'title' => 'Kurs Bilgileri',
                    ],
                ],
            ])
            <div class="row">
                @include('instructor.customer-management.profile.include.profile-card')
                <div class="col-md-9">
                    <div class="card card-custom">
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label fw-bolder text-dark">Kurs Bilgileri
                                </h3>
                                <span class="text-muted fw-bold fs-7 mt-1">Müşterinin satın almış olduğu kursları bu
                                    alandan
                                    görüntüleyebilirsiniz.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table align-middle gs-0 gy-4" id="education">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="min-w-150px ps-4">Kurs</th>
                                        <th class="min-w-150px">Ders Sayısı</th>
                                        <th class="min-w-150px">Fiyat</th>
                                        <th class="min-w-150px">Satın Alma Tarihi</th>
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
                                            <td>
                                                {{ $course->lessonCount() }}
                                            </td>
                                            <td>
                                                {{ $course->price }}₺
                                            </td>
                                            <td>
                                                {{ $course->created_at }}
                                            </td>
                                            <td class="text-end">
                                                @if ($course->document_id == null)
                                                    <button
                                                        class="btn btn-icon btn-light btn-sm btn-active-light-success me-3"
                                                        data-bs-toggle="modal" data-bs-target="#uploadDocument"
                                                        v-on:click="uploadDocument({{ $course }})">
                                                        <i class="fas fa-file-upload"></i>
                                                    </button>
                                                @endif
                                                <a href="{{ route('instructor.courses.edit', $course) }}"
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
                        </div>
                    </div>
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
                <form action="{{ route('instructor.upload-document') }}" method="post">
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
                                url: "/panel/kurslar/" + course.id + "/sil",
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
