@extends('admin.layout.main')
@section('title', 'İletişim Ayarları')
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
                        'title' => 'İletişim Ayarları',
                    ],
                ],
            ])
            <div class="card">
                <form action="{{ route('panel.save.contact-settings') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-5">
                            <label for="title" class="form-label">Ünvan</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $contact->title }}">
                        </div>
                        <div class="form-group mb-5">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                value="{{ $contact->phone }}">
                        </div>
                        <div class="form-group mb-5">
                            <label for="email" class="form-label">E-Posta</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value={{ $contact->email }}>
                        </div>
                        <div class="form-group mb-5">
                            <label for="address" class="form-label">Adres</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $contact->address }}">
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
        Inputmask({
            "mask": "(999) 999-9999",
            "placeholder": "(999) 999-9999",
        }).mask("#phone");
    </script>
@endsection
