@extends('instructor.layout.main')
@section('title', 'Oynatma Listesi')
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
                        'link' => '',
                        'title' => 'Oynatma Listesi',
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
                                <input type="text" name="ders"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('ders') }}" placeholder="Ders Ara..." />
                                @if (request()->get('ders'))
                                    <a href="{{ route('instructor.playlists.index') }}" class="btn  btn-light">
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
                        <button class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#addPlaylist">
                            <i class="fas fa-plus"></i>
                            </span>
                            Oynatma Listesi Ekle
                        </button>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="playlist">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Başlık</th>
                                <th class="min-w-150px ps-4">Kurs</th>
                                <th class="min-w-150px">Video Sayısı</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($playlists as $playlist)
                                <tr class="odd">
                                    <td class="ps-4">
                                        <a href="#" class="text-dark text-hover-primary ms-5"
                                            title="{{ $playlist->title }}">{{ Str::limit($playlist->title, 40) }}</a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-dark text-hover-primary ms-5"
                                            title="{{ $playlist->course->title ?? '-' }}">{{ Str::limit($playlist->course->title ?? '-', 40) }}</a>
                                    </td>
                                    <td>{{ $playlist->videos->count() }}</td>
                                    <td>
                                        <div class="badge badge-light-{{ $playlist->status == 1 ? 'success' : 'danger' }}">
                                            {{ $playlist->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td>{{ $playlist->created_at }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('instructor.playlists.video.index', $playlist) }}"
                                            class="btn btn-light btn-sm me-3 btn-active-light-primary">
                                            Videolar
                                        </a>
                                        <button class="btn btn-icon btn-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#editPlaylist"
                                            v-on:click="editPlaylist({{ $playlist }}, {{ $playlist->course }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deletePlaylist({{ $playlist }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $playlists->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="addPlaylist">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Oynatma Listesi Ekle</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('instructor.playlists.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="course_id" class="form-label">Kurs</label>
                            <select class="form-select" name="course_id">
                                <option value="0">Boş</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="title" class="form-label">Başlık</label>
                                    <span class="text-danger d-block">{{ $errors->first('title') }}</span>
                                    <input type="text" id="title" name="title" class="form-control"
                                        placeholder="Başlık">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="status" class="form-label">Durum</label>
                                    <select class="form-select" name="status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
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
    <div class="modal fade" tabindex="-1" id="editPlaylist">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ playlist.title }} Oynatma Listesini Güncelle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/panel/oynatma-listesi/' + playlist.id" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="course_id" class="form-label">Kurs</label>
                            <select class="form-select" name="course_id" :value="playlist.course_id">
                                <option value="0">Boş</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="title" class="form-label">Başlık</label>
                                    <span class="text-danger d-block">{{ $errors->first('title') }}</span>
                                    <input type="text" id="title" name="title" class="form-control"
                                        :value="playlist.title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="editStatus" class="form-label">Durum</label>
                                    <span class="text-danger d-block">{{ $errors->first('status') }}</span>
                                    <select id="editStatus" name="status" class="form-select"
                                        v-model="playlist.status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
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
                text: "Oynatma Listesi oluşturulurken bir hata oluştu.",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
    <script>
        Vue.createApp({
            data() {
                return {
                    playlist: {},
                }
            },
            methods: {
                editPlaylist(playlist) {
                    this.playlist = playlist
                },
                deletePlaylist(playlist) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: playlist.title +
                            " oynatma listesini silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/panel/oynatma-listesi/" + playlist.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: playlist.title +
                                            " oynatma listesi başarıyla silindi.",
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
                    table = document.querySelector('#playlist');

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
