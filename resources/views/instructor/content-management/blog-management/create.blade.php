@extends('instructor.layout.main')
@section('title', 'Haber Ekle')
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
                        'title' => 'İçerik Yönetimi',
                    ],
                    [
                        'link' => route('instructor.blog.index'),
                        'title' => 'Haber Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Haber Ekle',
                    ],
                ],
            ])
            <div class="card">
                <form action="{{ route('instructor.blog.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="image" class="form-label">Listeleme Görseli</label>
                                    <small class="text-danger ms-3">{{ $errors->first('image') }}</small>
                                    <input type="file" name="image" v-on:change="loadImage($event)" id="image"
                                        class="form-control" accept="image/*">
                                    <img :src="image_preview" alt="" id="image_preview" class="mt-2"
                                        style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="title" class="form-label">Başlık</label>
                                    <small class="text-danger ms-3">{{ $errors->first('title') }}</small>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Başlık">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="status" class="form-label">Durum</label>
                            <small class="text-danger ms-3">{{ $errors->first('status') }}</small>
                            <select name="status" id="addStatus" class="form-select" data-control="select2"
                                data-hide-search="true">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="spot_text" class="form-label">Spot Metni</label>
                            <small class="text-danger ms-3">{{ $errors->first('spot_text') }}</small>
                            <textarea name="spot_text" id="spot_text" class="form-control" placeholder="Spot Metni" data-kt-autosize="true"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="seo_description" class="form-label">SEO Açıklama</label>
                                    <small class="text-danger ms-3">{{ $errors->first('seo_description') }}</small>
                                    <input type="text" name="seo_description" id="seo_description" class="form-control"
                                        placeholder="SEO Açıklama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="seo_keywords" class="form-label">SEO Anahtar Kelimeler</label>
                                    <small class="text-danger ms-3">{{ $errors->first('seo_keywords') }}</small>
                                    <input type="text" name="seo_keywords" id="seo_keywords" class="form-control"
                                        placeholder="SEO Anahtar Kelimeler">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="content" class="form-label">İçerik</label>
                            <small class="text-danger ms-3">{{ $errors->first('content') }}</small>
                            <textarea name="content" id="content" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
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
                    image_preview: null,
                }
            },
            methods: {
                loadImage(event, type) {
                    let file = event.target.files[0];
                    this.image_preview = URL.createObjectURL(file);
                }
            },
        }).mount("#app");

        ClassicEditor
            .create(document.querySelector('#content'), {

            })
            .then(editor => {
                //  editor.execute('htmlEmbed');
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: y9lkfsfe20pr-jujsj4qk5w31');
                console.error(error);
            });
    </script>
@endsection
