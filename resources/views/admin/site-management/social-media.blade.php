@extends('admin.layout.main')
@section('title', 'Sosyal Medya Ayarları')
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
                        'title' => 'Sosyal Medya Ayarları',
                    ],
                ],
            ])
            <div class="card">
                <form action="{{ route('panel.save.social-media.settings') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="input-group mb-5">
                            <div class="input-group-append">
                                <div class="btn" style="background-color: rgb(59, 89, 152);">
                                    <i class="fab fa-facebook-f fs-3 text-white"></i>
                                </div>
                            </div>
                            <input type="text" name="facebook" id="facebook" class="form-control"
                                value="{{ $socialMedia->facebook }}">
                        </div>
                        <div class="input-group mb-5">
                            <div class="input-group-append">
                                <div class="btn" style="background-color: rgb(29, 161, 242);">
                                    <i class="fab fa-twitter fs-3 text-white"></i>
                                </div>
                            </div>
                            <input type="text" name="twitter" id="twitter" class="form-control"
                                value="{{ $socialMedia->twitter }}">
                        </div>
                        <div class="input-group mb-5">
                            <div class="input-group-append">
                                <div class="btn" style="background-color: rgb(131, 58, 180);">
                                    <i class="fab fa-instagram fs-3 text-white"></i>
                                </div>
                            </div>
                            <input type="text" name="instagram" id="instagram" class="form-control"
                                value="{{ $socialMedia->instagram }}">
                        </div>
                        <div class="input-group mb-5">
                            <div class="input-group-append">
                                <div class="btn" style="background-color: rgb(40, 103, 178);">
                                    <i class="fab fa-linkedin fs-3 text-white"></i>
                                </div>
                            </div>
                            <input type="text" name="linkedin" id="linkedin" class="form-control"
                                value="{{ $socialMedia->linkedin }}">
                        </div>
                        <div class="input-group mb-5">
                            <div class="input-group-append">
                                <div class="btn" style="background-color: rgb(29, 161, 242);">
                                    <i class="fab fa-telegram fs-3 text-white"></i>
                                </div>
                            </div>
                            <input type="text" name="telegram" id="telegram" class="form-control"
                                value="{{ $socialMedia->telegram }}">
                        </div>
                        <div class="input-group mb-5">
                            <div class="input-group-append">
                                <div class="btn" style="background-color: #28d367;">
                                    <i class="fab fa-whatsapp fs-3 text-white"></i>
                                </div>
                            </div>
                            <input type="text" name="whatsapp" id="whatsapp" class="form-control"
                                value="{{ $socialMedia->whatsapp }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('js')
@endsection
