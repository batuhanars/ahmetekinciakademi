@extends('instructor.layout.main')
@section('title', 'Kurs Satışları / İadeler')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/back/calendar/main.min.css') }}">
@endsection
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @include('admin.breadcrumb', [
                'items' => [
                    [
                        'link' => route('instructor.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Satış Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Kurs Satışları - İadeler',
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
                                <input type="text" name="kurs"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('kurs') }}" placeholder="Kurs Ara..." />
                                @if (request()->get('kurs'))
                                    <a href="{{ route('instructor.course-sales') }}" class="btn  btn-light">
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
                    <table class="table align-middle gs-0 gy-4" id="course-sale">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Kurs</th>
                                <th class="min-w-150px">Müşteri</th>
                                <th class="min-w-150px">Fiyat</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($courseSales as $courseSale)
                                <tr class="ps-4">
                                    <td class="d-flex align-items-center">
                                        {{ $courseSale->course_name }}
                                    </td>
                                    <td>{{ ucfirst($courseSale->user_name) }}</td>
                                    <td>
                                        <span
                                            class="badge badge-light-{{ $courseSale->status == 1 ? 'success' : 'danger' }}">
                                            {{ $courseSale->status == 1 ? '+' . $courseSale->price : '-' . $courseSale->price }}₺
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-light-{{ $courseSale->status == 1 ? 'success' : 'danger' }}">
                                            {{ $courseSale->status == 1 ? 'Gelen' : 'Giden' }}
                                        </span>
                                    </td>
                                    <td class="pe-0">{{ $courseSale->created_at }}
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteTrainingSale({{ $courseSale }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $courseSales->links('vendor.pagination.bootstrap-5') }}
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
                deleteTrainingSale(course) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: "Satış verisini silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/panel/kurs-satislari/" + course.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: "Satış verisi başarıyla silindi.",
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
