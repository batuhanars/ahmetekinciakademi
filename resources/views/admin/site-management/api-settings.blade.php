@extends('admin.layout.main')
@section('title', 'API Ayarları')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/tomorrow-night-eighties.min.css" />
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
                        'title' => 'API Ayarları',
                    ],
                ],
            ])
            <div class="card">
                <form action="{{ route('panel.save.api-settings') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-5">
                            <label for="whatsapp" class="form-label">Whatsapp Kodu</label>
                            <textarea name="whatsapp" id="whatsapp" class="form-control">{{ $api->whatsapp }}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="google_analytics" class="form-label">Google Analytics.js Kodu</label>
                            <textarea name="google_analytics" id="google_analytics" class="form-control">{{ $api->google_analytics }}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="webmaster_tools" class="form-label">Webmaster Tools Site Doğrulama
                                Kodu</label>
                            <textarea name="webmaster_tools" id="webmaster_tools" class="form-control">{{ $api->webmaster_tools }}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="contact_map" class="form-label">İletişim Harita Embed Kodu</label>
                            <textarea name="contact_map" id="contact_map" class="form-control">{{ $api->contact_map }}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="live_support" class="form-label">Canlı Destek Kodu</label>
                            <textarea name="live_support" id="live_support" class="form-control">{{ $api->live_support }}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="facebook_pixel" class="form-label">Facebook Pixel Kodu</label>
                            <textarea name="facebook_pixel" id="facebook_pixel" class="form-control">{{ $api->facebook_pixel }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tiktok_pixel" class="form-label">Tiktok Pixel Kodu</label>
                            <textarea name="tiktok_pixel" id="tiktok_pixel" class="form-control">{{ $api->tiktok_pixel }}</textarea>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/htmlmixed/htmlmixed.min.js"></script>
    <script>
        CodeMirror.fromTextArea(document.getElementById("whatsapp"), {
            theme: "tomorrow-night-eighties",
            lineNumbers: true
        });
        CodeMirror.fromTextArea(document.getElementById("google_analytics"), {
            theme: "tomorrow-night-eighties",
            mode: "javascript",
            lineNumbers: true
        });
        CodeMirror.fromTextArea(document.getElementById("webmaster_tools"), {
            theme: "tomorrow-night-eighties",
            lineNumbers: true
        });
        CodeMirror.fromTextArea(document.getElementById("contact_map"), {
            theme: "tomorrow-night-eighties",
            mode: "htmlmixed",
            lineNumbers: true
        });
        CodeMirror.fromTextArea(document.getElementById("live_support"), {
            theme: "tomorrow-night-eighties",
            lineNumbers: true
        });
        CodeMirror.fromTextArea(document.getElementById("facebook_pixel"), {
            theme: "tomorrow-night-eighties",
            lineNumbers: true
        });
        CodeMirror.fromTextArea(document.getElementById("tiktok_pixel"), {
            theme: "tomorrow-night-eighties",
            lineNumbers: true
        });
    </script>
@endsection
