@extends('admin.layout.main')
@section('title', 'Mesajlar')
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
                        'title' => 'Mesajlar',
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
                                <input type="text" name="mesaj"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('mesaj') }}" placeholder="Mesaj Ara..." />
                                @if (request()->get('mesaj'))
                                    <a href="{{ route('panel.messages.index') }}" class="btn  btn-light">
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
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Gönderen</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-150px">Telefon</th>
                                <th class="min-w-150px">Konu</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($messages as $message)
                                <tr class="odd">
                                    <td class="ps-4">
                                        {{ $message->fullname }}
                                    </td>
                                    <td>
                                        {{ $message->email }}
                                    </td>
                                    <td>
                                        {{ $message->phone }}
                                    </td>
                                    <td>
                                        {{ $message->topic }}
                                    </td>
                                    <td>
                                        {{ $message->created_at }}
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#detailMessage"
                                            v-on:click="detailMessage({{ $message }})">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteMessage({{ $message }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $messages->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="detailMessage">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ message.fullname }} Kullanıcısının Mesajı</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="mb-5">
                        <strong class="me-2">Gönderen:</strong> <span>@{{ message.fullname }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Email:</strong> <span>@{{ message.email }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Telefon:</strong> <span>@{{ message.phone }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Konu:</strong> <span>@{{ message.topic }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Mesaj:</strong> <span>@{{ message.message }}</span>
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
                    message: {},
                }
            },
            methods: {
                detailMessage(message) {
                    this.message = message;
                },
                deleteMessage(message) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: message.topic +
                            " mesajını silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/mesajlar/" + message.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: message.topic +
                                            " mesajı başarıyla silindi.",
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
