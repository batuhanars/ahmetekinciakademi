@extends('admin.layout.main')
@section('title', 'Genel Ayarlar')
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
                        'title' => 'Site Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Genel Ayarlar',
                    ],
                ],
            ])
            <form action="{{ route('panel.save.general') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-5">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Siyah Logo</h3>
                            </div>
                            <div class="card-body">
                                <span class="text danger d-block">{{ $errors->first('dark_logo') }}</span>
                                <input type="file" v-on:change="loadImage($event, 'dark_logo')" name="dark_logo"
                                    id="dark_logo" class="form-control" accept="image/*">
                                <div class="text-center mt-5">
                                    <img :src="dark_logo_preview" alt="" id="dark_logo_preview"
                                        style="width: 250px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark">
                            <div class="card-header">
                                <h3 class="card-title text-white">Beyaz Logo</h3>
                            </div>
                            <div class="card-body">
                                <span class="text danger d-block">{{ $errors->first('white_logo') }}</span>
                                <input type="file" v-on:change="loadImage($event, 'white_logo')" name="white_logo"
                                    id="white_logo" class="form-control" accept="image/*">
                                <div class="text-center mt-5">
                                    <img :src="white_logo_preview" alt="" id="white_logo_preview"
                                        style="width: 250px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Favicon</h3>
                            </div>
                            <div class="card-body">
                                <span class="text danger d-block">{{ $errors->first('favicon') }}</span>
                                <input type="file" v-on:change="loadImage($event, 'favicon')" name="favicon"
                                    id="favicon" class="form-control" accept="image/*">
                                <div class="text-center mt-5">
                                    <img :src="favicon_preview" alt="" id="favicon_preview" style="width: 35px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-5">
                            <label for="title" class="form-label">Site Başlık</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $general->title }}">
                        </div>
                        <div class="form-group mb-5">
                            <label for="keywords" class="form-label">Site Anahtar Kelimeler</label>
                            <input type="text" name="keywords" id="keywords" class="form-control"
                                value="{{ $general->keywords }}">
                        </div>
                        <div class="form-group mb-5">
                            <label for="description" class="form-label">Site Açıklama</label>
                            <textarea name="description" id="description" class="form-control" data-kt-autosize="true">{{ $general->description }}</textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                        </div>
                    </div>
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('js')
    <script>
        Vue.createApp({
            data() {
                return {
                    dark_logo_preview: "{{ $general->dark_logo }}",
                    white_logo_preview: "{{ $general->white_logo }}",
                    favicon_preview: "{{ $general->favicon }}",
                }
            },
            methods: {
                loadImage(event, type) {
                    let file = event.target.files[0];
                    if (type == 'dark_logo') {
                        this.dark_logo_preview = URL.createObjectURL(file);
                    }
                    if (type == 'white_logo') {
                        this.white_logo_preview = URL.createObjectURL(file);
                    }
                    if (type == 'favicon') {
                        this.favicon_preview = URL.createObjectURL(file);
                    }
                }
            },
        }).mount("#app");
    </script>
@endsection
