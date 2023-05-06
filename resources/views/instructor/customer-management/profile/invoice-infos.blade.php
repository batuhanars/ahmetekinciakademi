@extends('instructor.layout.main')
@section('title', 'Fatura Bilgileri')
@section('css')
@endsection
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @include('instructor.breadcrumb', [
                'items' => [
                    [
                        'link' => route('instructor.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Müşteri Yönetimi',
                    ],
                    [
                        'link' => route('instructor.customers.index'),
                        'title' => 'Müşteriler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Profil',
                    ],
                    [
                        'link' => '',
                        'title' => 'Fatura Bilgileri',
                    ],
                ],
            ])
            <div class="row">
                @include('instructor.customer-management.profile.include.profile-card')
                <div class="col-md-9">
                    <div class="card">
                        <form acion="{{ route('instructor.customers.invoice.info.update', $user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header py-3">
                                <div class=" align-items-start flex-column">
                                    <h3 class="card-title fw-bolder text-dark">Fatura Bilgileri</h3>
                                    <span class="text-muted fw-bold fs-sm mt-1">Müşteri fatura bilgilerini bu
                                        alandan değiştirebilirsiniz.</span>
                                </div>
                                <div class="card-toolbar"><button type="submit" class="btn btn-success me-2">
                                        Kaydet
                                    </button></div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="fw-bold mt-10 mb-6">Fatura Bilgileri</h5>
                                    </div>
                                </div>
                                @if ($user->customer->type == 'corporate')
                                    <div class="form-group mb-5 row">
                                        <label for="company_name" class="col-xl-3 col-lg-3 col-form-label">Ticari
                                            Ünvan</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="text" id="company_name" name="company_name"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{ $customer->corporate->company_name }}">
                                            <span class="form-text text-muted">Lütfen vergi levhasında yazılan ticari
                                                ünvan
                                                ile aynı yazın.</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group mb-5 row">
                                    <label for="province" class="col-xl-3 col-lg-3 col-form-label">İl</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select name="province_id" class="form-select form-select-lg form-select-solid"
                                            id="province" data-control="select2">
                                            @foreach ($provinces as $province)
                                                <option @if ($customer->province_id == $province->id) selected @endif
                                                    value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="district" class="col-xl-3 col-lg-3 col-form-label">İlçe</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select name="district_id" class="form-select form-select-lg form-select-solid"
                                            id="district" data-control="select2">
                                            @foreach ($districts as $district)
                                                <option @if ($customer->district_id == $district->id) selected @endif
                                                    value="{{ $district->id }}">
                                                    {{ $district->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="address" class="col-xl-3 col-lg-3 col-form-label">Adres</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <textarea cols="30" rows="3" name="address" class="form-control form-control-lg form-control-solid">{{ $customer->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-5 row">
                                    <label for="zip" class="col-xl-3 col-lg-3 col-form-label">Posta
                                        Kodu</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="number" name="zip"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $customer->zip }}">
                                    </div>
                                </div>
                                <!---->
                                @if ($user->customer->type == 'corporate')
                                    <div class="form-group mb-5 row">
                                        <label for="tax_administration" class="col-xl-3 col-lg-3 col-form-label">Vergi
                                            Dairesi</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="text" name="tax_administration"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{ $customer->corporate->tax_administration }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tax_number" class="col-xl-3 col-lg-3 col-form-label">Vergi
                                            Numarası</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="text" name="tax_number"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{ $customer->corporate->tax_number }}">
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <label for="tax_number" class="col-xl-3 col-lg-3 col-form-label">T.C.
                                            Numarası</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="text" name="tc_no"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{ $customer->individual->tc_no }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('js')
    <script>
        $("#province").change(function(event) {
            $.ajax({
                type: "POST",
                url: "{{ route('districts') }}",
                data: {
                    "province_id": event.target.value,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(value) {
                    $("#district").html(value);
                }
            });
        });
    </script>
@endsection
