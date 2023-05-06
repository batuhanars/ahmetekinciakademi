@extends('admin.layout.main')
@section('title', 'Hakkımda Ayarları')
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
                        'title' => 'Hakkımda Ayarları',
                    ],
                ],
            ])
            <form action="{{ route('panel.save.about') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-5">
                                <label for="title" class="form-label">Başlık</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $about->title }}">
                            </div>
                            <div class="form-group mb-5">
                                <label for="trailer" class="form-label">Site Anahtar Kelimeler</label>
                                <input type="text" name="trailer" id="trailer" class="form-control"
                                    value="{{ $about->trailer }}">
                            </div>
                            <div class="form-group mb-5">
                                <label for="content" class="form-label">Açıklama</label>
                                <textarea name="content" id="content" class="form-control" data-kt-autosize="true">{{ $about->content }}</textarea>
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
    <script></script>
@endsection
