@extends('admin.layout.main')
@section('title', 'Bakım Modu')
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
                        'title' => 'Bakım Modu',
                    ],
                ],
            ])
            <div class="card">
                <form action="{{ route('panel.save.maintenance') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-5">
                            <label for="opening_date" class="form-label">Açılış Tarihi</label>
                            <input type="text" name="opening_date" id="opening_date" class="form-control"
                                value="{{ $maintenance->opening_date }}">
                        </div>
                        <div class="form-group mb-5">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $maintenance->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea name="description" id="description" class="form-control" data-kt-autosize="true">{{ $maintenance->description }}</textarea>
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
    <script>
        $("#opening_date").flatpickr({
            minDate: "{{ now() }}"
        });
    </script>
@endsection
