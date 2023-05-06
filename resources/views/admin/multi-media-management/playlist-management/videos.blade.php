@extends('admin.layout.main')
@section('title', $playlist->title)
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
                        'title' => 'Multi Medya Yönetimi',
                    ],
                    [
                        'link' => route('panel.playlists.index'),
                        'title' => 'Oynatma Listesi',
                    ],
                    [
                        'link' => '',
                        'title' => $playlist->title,
                    ],
                    [
                        'link' => '',
                        'title' => 'Videolar',
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
                                <input type="text" name="video"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('video') }}" placeholder="Video Ara..." />
                                @if (request()->get('video'))
                                    <a href="{{ route('panel.playlists.video.index') }}" class="btn  btn-light">
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
                        <button class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#selectList">
                            <i class="fas fa-plus"></i>
                            </span>
                            Listeden Seç
                        </button>
                        <button class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#addVideo">
                            <i class="fas fa-plus"></i>
                            </span>
                            Yeni Video Oluştur
                        </button>
                        <!--end::Export dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle gs-0 gy-4" id="video_gallery">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Video</th>
                                <th class="min-w-150px ps-4">Oluşturan</th>
                                <th class="min-w-150px">Bağlantı</th>
                                <th class="min-w-150px">Durum</th>
                                <th class="min-w-150px">Ön İzlenebilir</th>
                                <th class="min-w-150px">Tarih</th>
                                <th class="text-end pe-5"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($playlistVideos as $video)
                                <tr class="odd">
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-45px">
                                            <img src="{{ $video->image }}" alt="" class="">
                                        </div>
                                        <a href="#" class="text-dark text-hover-primary ms-5"
                                            title="{{ $video->name }}">{{ Str::limit($video->name, 40) }}</a>
                                    </td>
                                    <td>
                                        {{ $video->user->fullname }}
                                    </td>
                                    <td>
                                        <a href="{{ $video->link }}" target="_blank">{{ $video->link }}</a>
                                    </td>
                                    <td>
                                        <div class="badge badge-light-{{ $video->status == 1 ? 'success' : 'danger' }}">
                                            {{ $video->status == 1 ? 'Aktif' : 'Pasif' }}</div>
                                    </td>
                                    <td>
                                        <div class="badge badge-light-{{ $video->preview == 1 ? 'success' : 'danger' }}">
                                            {{ $video->preview == 1 ? 'Evet' : 'Hayır' }}</div>
                                    </td>
                                    <td>{{ $video->created_at }}</td>
                                    <td class="text-end">
                                        <button class="btn btn-icon btn-bg-light btn-sm me-3 btn-active-light-primary"
                                            data-bs-toggle="modal" data-bs-target="#editVideo"
                                            v-on:click="editVideo({{ $video }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-icon btn-bg-light btn-sm btn-active-light-danger me-3"
                                            v-on:click="removeVideo({{ $video }})">
                                            <i class="fas fa-video-slash"></i>
                                        </button>
                                        <button class="btn btn-icon btn-bg-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteVideo({{ $video }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $playlistVideos->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="addVideo">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Video Ekle</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('panel.playlists.video.store', $playlist) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="image" class="form-label">Video Görseli</label>
                                    <small class="text-danger ms-3">{{ $errors->first('image') }}</small>
                                    <input type="file" id="image" name="image" class="form-control"
                                        v-on:change="loadImage($event)" accept="image/*">
                                    <img :src="image_preview" alt="" id="image_preview" class="mt-2"
                                        style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="video" class="form-label">Video</label>
                                    <small class="text-danger ms-3">{{ $errors->first('video') }}</small>
                                    <input type="file" id="video" name="video" class="form-control"
                                        accept=".mp4">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="name" class="form-label">Video Başlığı</label>
                            <small class="text-danger ms-3">{{ $errors->first('name') }}</small>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Video Başlığı">
                        </div>
                        <div class="form-group mb-5">
                            <label for="description" class="form-label">Video Açıklama <small>(Opsiyonel)</small></label>
                            <textarea class="form-control" name="description" placeholder="Video Açıklama"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="status" class="form-label">Durum</label>
                                    <select class="form-select" name="status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="preview" class="form-label">Ön İzlenebilir</label>
                                    <select class="form-select" name="preview">
                                        <option value="1">Evet</option>
                                        <option value="0">Hayır</option>
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
    <div class="modal fade" tabindex="-1" id="selectList">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Listeden Seç</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('panel.playlists.video.select', $playlist) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mb-5">
                            <label for="videos" class="form-label">Video</label>
                            <small class="text-danger ms-3">{{ $errors->first('videos') }}</small>
                            <select id="videos" name="videos[]" class="form-select" data-control="select2"
                                data-dropdown-parent="#selectList" data-placeholder="Video Seç" multiple>
                                <option value=""></option>
                                @foreach ($videos as $video)
                                    <option value="{{ $video->id }}">{{ $video->name }}</option>
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
    <div class="modal fade" tabindex="-1" id="editVideo">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ video.title }} Videosunu Güncelle</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form :action="'/sistem/video-galeri/' + video.id" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="uri" :value="video.uri">
                        {{-- <div class="form-group mb-5">
                            <label for="edit_image" class="form-label">Video Görseli</label>
                            <span class="text-danger d-block">{{ $errors->first('image') }}</span>
                            <input type="file" id="edit_image" name="image" class="form-control"
                                v-on:change="loadImage($event, 'edit')">
                            <img :src="edit_image_preview ?? video.image" alt="" id="image_preview"
                                class="mt-2" style="width: 250px;">
                        </div> --}}

                        <div class="form-group mb-5">
                            <label for="name" class="form-label">Video Başlığı</label>
                            <small class="text-danger ms-3">{{ $errors->first('name') }}</small>
                            <input type="text" id="name" name="name" class="form-control"
                                :value="video.name">
                        </div>
                        <div class="form-group mb-5">
                            <label for="description" class="form-label">Video Açıklama <small>(Opsiyonel)</small></label>
                            <textarea class="form-control" name="description" :value="video.description"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="status" class="form-label">Durum</label>
                                    <select class="form-select" name="status" v-model="video.status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="preview" class="form-label">Ön İzlenebilir</label>
                                    <select class="form-select" name="preview" v-model="video.preview">
                                        <option value="1">Evet</option>
                                        <option value="0">Hayır</option>
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
                text: "{{ $errors->has('videos') ? 'Video eklenirken bir hata oluştu.' : 'Video oluşturulurken bir hata oluştu.' }}",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
    <script>
        Vue.createApp({
            data() {
                return {
                    video: {},
                    image_preview: null,
                    edit_image_preview: null,
                }
            },
            methods: {
                loadImage(event, type) {
                    let file = URL.createObjectURL(event.target.files[0]);
                    this.image_preview = file;
                    if (type == 'edit') {
                        this.edit_image_preview = file;
                    }
                },
                editVideo(video) {
                    this.video = video
                },
                deleteVideo(video) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: video.name +
                            " videosunu silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/video-galeri/" + video.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: video.name +
                                            " videosu başarıyla silindi.",
                                        confirmButtonText: "Tamam"
                                    }).then(() => location.reload());
                                }
                            });
                        }
                    })
                },
                removeVideo(video) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: video.name +
                            " videosunu listeden çıkarmak istiyor musunuz?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Evet Çıkar!',
                        cancelButtonText: 'İptal Et'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "GET",
                                url: "/sistem/oynatma-listesi/" + {{ $playlist->id }} + '/video/' +
                                    video.id,
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: video.name +
                                            " videosu başarıyla listeden çıkarıldı.",
                                        confirmButtonText: "Tamam"
                                    }).then(() => location.reload());
                                }
                            });
                        }
                    })
                },
            }
        }).mount("#app");
    </script>
@endsection
