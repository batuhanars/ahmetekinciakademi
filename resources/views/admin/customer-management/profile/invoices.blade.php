@extends('admin.layout.main')
@section('title', 'Faturalar')
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
                        'title' => 'Müşteri Yönetimi',
                    ],
                    [
                        'link' => route('panel.customers.index'),
                        'title' => 'Müşteriler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Profil',
                    ],
                    [
                        'link' => '',
                        'title' => 'Faturalar',
                    ],
                ],
            ])
            <div class="row">
                @include('admin.customer-management.profile.include.profile-card')
                <div class="col-md-9">
                    <div class="card card-custom">
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label fw-bolder text-dark">Faturalar</h3> <span
                                    class="text-muted fw-bold fs-7 mt-1">Müşterinin oluşturmuş olduğu
                                    fatura bilgileri.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center mb-5">
                                <div class="col-xl-4">
                                    <div class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path
                                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                            fill="currentColor" fill-rule="nonzero" opacity="0.3">
                                                        </path>
                                                        <path
                                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                            fill="currentColor" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">
                                                {{ $customer->invoices->where('due_at', '<=', now())->sum('amount') }}₺
                                            </div>
                                            <div class="fw-bold text-white">Ödenmeyen
                                                Faturalar</div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card bg-info hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24">
                                                        </rect>
                                                        <rect fill="currentColor" opacity="0.3" x="13"
                                                            y="4" width="3" height="16" rx="1.5">
                                                        </rect>
                                                        <rect fill="currentColor" x="8" y="9"
                                                            width="3" height="11" rx="1.5">
                                                        </rect>
                                                        <rect fill="currentColor" x="18" y="11"
                                                            width="3" height="9" rx="1.5"></rect>
                                                        <rect fill="currentColor" x="3" y="13"
                                                            width="3" height="7" rx="1.5">
                                                        </rect>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">
                                                {{ $customer->invoices->where('status', 1)->sum('amount') }}₺
                                            </div>
                                            <div class="fw-bold text-white">Ödenen
                                                Faturalar</div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24">
                                                        </rect>
                                                        <path
                                                            d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                            fill="currentColor" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">
                                                {{ $customer->invoices->where('due_at', '<=', now())->sum('amount') }}₺
                                            </div>
                                            <div class="fw-bold text-white">Ödeme Bekleyen
                                                Faturalar</div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                            </div>
                            <div :class="{ 'alert alert-danger': error != null }" v-html="error"></div>
                            <table class="table align-middle gs-0 gy-4" id="invoice">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="min-w-150px ps-4">Fatura</th>
                                        <th class="min-w-150px">Oluşturulma Tarihi</th>
                                        <th class="min-w-150px">Ödendiği Tarih</th>
                                        <th class="min-w-150px">Son Ödeme Tarihi</th>
                                        <th class="min-w-150px">Tutar</th>
                                        <th class="min-w-150px">Durum</th>
                                        <th class="text-end pe-5"></th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($invoices as $invoice)
                                        <tr class="odd">
                                            <td class="ps-4">
                                                {{ $invoice->courseInvoice->course_name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $invoice->created_at->format('Y-m-d') }}
                                            </td>
                                            <td>
                                                {{ $invoice->payment_at ? $invoice->payment_at->format('Y-m-d') : '-' }}
                                            </td>
                                            <td>
                                                {{ $invoice->due_at ? $invoice->due_at->format('Y-m-d') : '-' }}
                                            </td>
                                            <td>
                                                {{ $invoice->amount }}₺
                                            </td>
                                            <td>
                                                @if ($invoice->due_at && $invoice->status != 1 && $invoice->due_at <= now()->format('Y-m-d'))
                                                    <div class="badge badge-light-info">Ödeme Tarihi Geçti</div>
                                                @else
                                                    <div
                                                        class="badge badge-light-{{ $invoice->status == 1 ? 'success' : 'danger' }}">
                                                        {{ $invoice->status == 1 ? 'Ödendi' : 'Ödenmedi' }}</div>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <input type="file" name="invoice_pdf" ref="pdf" class="d-none"
                                                    v-on:change="uploadPDF($event, {{ $invoice }})">
                                                <button class="btn btn-icon btn-light btn-sm btn-active-light-success me-3"
                                                    v-on:click="this.$refs.pdf.click();">
                                                    <i class="fas fa-file-upload"></i>
                                                </button>
                                                <button class="btn btn-icon btn-light btn-sm btn-active-light-info me-3"
                                                    data-bs-toggle="modal" data-bs-target="#detailInvoice"
                                                    v-on:click="detailInvoice({{ $invoice }})">
                                                    <i class="fas fa-receipt"></i>
                                                </button>
                                                <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                                    v-on:click="deleteInvoice()">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $invoices->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" tabindex="-1" id="detailInvoice">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fatura Detayları</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"><i class="fas fa-times"></i></span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="mb-5">
                        <strong class="me-2">Kurs:</strong>
                        <span>@{{ course.course_name }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Oluşturulma Tarihi:</strong>
                        <span>@{{ createdAt(invoice.created_at) }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Ödendiği Tarihi:</strong>
                        <span>@{{ createdAt(invoice.payment_at) }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Son Ödeme Tarihi:</strong>
                        <span>@{{ dueAt(invoice.due_at) }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Ara Toplam:</strong>
                        <span>@{{ invoice.subtotal }}₺</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Vergi Oranı:</strong>
                        <span>%@{{ invoice.tax_rate }}</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Vergi Tutarı:</strong>
                        <span>@{{ invoice.tax_amount }}₺</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Genel Toplam:</strong>
                        <span>@{{ invoice.amount }}₺</span>
                    </div>
                    <div class="mb-5">
                        <strong class="me-2">Fatura PDF:</strong>
                        <a :href="invoice.invoice_pdf" target="_blank">PDF Görüntüle</a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        Vue.createApp({
            data() {
                return {
                    invoice: {},
                    service: {},
                    course: {},
                    guide: {},
                    error: null,
                }
            },
            methods: {
                createdAt(value) {
                    return moment(value).format("YYYY-MM-DD")
                },
                dueAt(value) {
                    if (value != null) return moment(value).format("YYYY-MM-DD");
                    else return "-";
                },
                uploadPDF(event, invoice) {
                    let fd = new FormData();
                    fd.append("invoice_pdf", event.target.files[0]);
                    fd.append("_method", "PUT");

                    axios.post("/sistem/faturalar/" + invoice.id, fd).then(res => {
                        Swal.fire({
                            icon: 'success',
                            title: res.data.success,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => location.reload());
                    }).catch(error => {
                        if (error.response.status === 422) {
                            this.error = error.response.data.message
                            setTimeout(() => {
                                this.error = null;
                            }, 1500);
                        }
                    });
                },
                detailInvoice(invoice) {
                    this.invoice = invoice;
                    this.service = invoice.service_invoice ?? "";
                    this.course = invoice.course_invoice ?? ""
                    this.guide = invoice.guide_invoice ?? ""
                },
                deleteInvoice(invoice) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: "Faturayı silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
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
                                url: "/sistem/faturalar/" + invoice.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: "Fatura başarıyla silindi.",
                                        confirmButtonText: "Tamam"
                                    }).then(() => location.reload());
                                }
                            });
                        }
                    })
                }
            }
        }).mount("#app");
    </script>
@endsection
