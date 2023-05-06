@extends('admin.layout.main')
@section('title', 'Müşteri Görüşleri')
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
                        'title' => 'Müşteri Görüşleri',
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
                                <input type="text" name="yorum"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('yorum') }}" placeholder="Yorum Ara..." />
                                @if (request()->get('yorum'))
                                    <a href="{{ route('panel.customer-feedbacks.index') }}" class="btn  btn-light">
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
                    <table class="table align-middle gs-0 gy-4" id="message">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light text-uppercase">
                                <th class="min-w-150px ps-4">Başlık</th>
                                <th class="min-w-150px">Kurs</th>
                                <th class="min-w-150px">Kullanıcı</th>
                                <th class="min-w-150px">Puan</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Anasayfa Göster</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($feedbacks as $feedback)
                                <tr class="odd">
                                    <td class="ps-4">{{ $feedback->title }}</td>
                                    <td>
                                        {{ $feedback->course->title }}
                                    </td>
                                    <td>{{ $feedback->customer->user->fullname }}</td>
                                    <td>{{ $feedback->rate }}</td>
                                    <td>
                                        <div class="badge badge-light-{{ $feedback->status == 1 ? 'success' : 'danger' }}">
                                            {{ $feedback->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td>
                                        <div
                                            class="badge badge-light-{{ $feedback->show_homepage == 1 ? 'success' : 'danger' }}">
                                            {{ $feedback->show_homepage == 1 ? 'Evet' : 'Hayır' }}</div>
                                    </td>
                                    <td>
                                        {{ $feedback->created_at }}
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#editFeedback"
                                            v-on:click="editFeedback({{ $feedback }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#detailFeedback"
                                            v-on:click="detailFeedback({{ $feedback }})">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteFeedback({{ $feedback }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $feedbacks->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="editFeedback">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Görüş Detayı</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/sistem/musteri-gorusleri/' + feedback.id" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="">Başlık</label>
                            <input type="text" class="form-control" name="title" :value="feedback.title" />
                        </div>
                        <div class="form-group mb-5">
                            <label for="">İçerik</label>
                            <textarea class="form-control" name="message" data-kt-autosize="true">@{{ feedback.message }}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Durum</label>
                            <select name="status" v-model="feedback.status" class="form-select">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Anasayfada Göster</label>
                            <select name="show_homepage" v-model="feedback.show_homepage" class="form-select">
                                <option value="1">Evet</option>
                                <option value="0">Hayır</option>
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
    <div class="modal fade" tabindex="-1" id="detailFeedback">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Görüş Detayı</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="mb-5">
                        <strong class="me-2">Kullanıcı:</strong> <span>@{{ user.fullname }}</span>
                    </div>
                    <div class="mb-5" v-if="course">
                        <strong class="me-2">Kurs:</strong> <span>@{{ course.title }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Başlık:</strong> <span>@{{ feedback.title }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Puan:</strong> <span>@{{ feedback.rate }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">İçerik:</strong> <span>@{{ feedback.message }}</span>
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
                    feedback: {},
                    course: {},
                    service: {},
                    user: {},
                    customer: {},
                }
            },
            methods: {
                detailFeedback(feedback) {
                    this.feedback = feedback;
                    this.course = feedback.course;
                    this.service = feedback.service;
                    this.user = feedback.customer.user;
                    this.customer = feedback.customer;
                },
                editFeedback(feedback) {
                    this.feedback = feedback;
                },
                deleteFeedback(feedback) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: feedback.title +
                            " görüşünü silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/musteri-gorusleri/" + feedback.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: feedback.title +
                                            " görüşünü başarıyla silindi.",
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
