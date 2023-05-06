@extends('instructor.layout.main')
@section('title', 'Fotoğraf Galeri')
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
                        'link' => route('instructor.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Multi Medya Yönetimi',
                    ],
                    [
                        'link' => route('instructor.image-gallery.index'),
                        'title' => 'Foto Galeri',
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
                                <input type="text" name="foto"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('foto') }}" placeholder="Fotoğraf Ara..." />
                                @if (request()->get('foto'))
                                    <a href="{{ route('instructor.image-gallery.index') }}" class="btn  btn-light">
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
                        <a href="{{ route('instructor.image-gallery.create') }}" class="btn btn-light-primary">
                            <span class="svg-icon svg-icon-1">
                                <i class="fas fa-plus"></i>
                            </span>
                            Fotoğraf Ekle
                        </a>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="image_gallery">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Fotoğraf</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($images as $image)
                                <tr class="odd">
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-45px">
                                            <img src="{{ $image->image }}" alt="" class="">
                                        </div>
                                        <a href="#" class="text-dark text-hover-primary ms-5">{{ $image->title }}</a>
                                    </td>
                                    <td>
                                        <div class="badge badge-light-{{ $image->status == 1 ? 'success' : 'danger' }}">
                                            {{ $image->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td class="pe-0">{{ $image->created_at }}
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('instructor.image-gallery.edit', $image) }}"
                                            class="btn btn-icon btn-bg-light btn-sm me-3 btn-active-light-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-icon btn-bg-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteImage({{ $image }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $images->links('vendor.pagination.bootstrap-5') }}
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
                deleteImage(image) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: image
                            .title +
                            " fotoğrafını silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/panel/foto-galeri/" + image.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: image.title +
                                            " fotoğrafı başarıyla silindi.",
                                        confirmButtonText: "Tamam"
                                    }).then(() => location.reload());
                                }
                            });
                        }
                    })
                }
            }
        }).mount("#app");

        // Class definition
        var KTDatatablesButtons = function() {
            // Shared variables
            var table;
            var datatable;

            // Private functions
            var initDatatable = function() {
                // Set date data order
                const tableRows = table.querySelectorAll('tbody tr');

                tableRows.forEach(row => {
                    const dateRow = row.querySelectorAll('td');
                    const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT")
                        .format(); // select date from 4th column in table
                    dateRow[3].setAttribute('data-order', realDate);
                });


                // Init datatable --- more info on datatables: https://datatables.net/manual/
                datatable = $(table).DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Public methods
            return {
                init: function() {
                    table = document.querySelector('#image_gallery');

                    if (!table) {
                        return;
                    }

                    initDatatable();
                    handleSearchDatatable();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesButtons.init();
        });
    </script>
@endsection
