@extends('instructor.layout.main')
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
                        'link' => route('instructor.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Müşteri Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Fatura Yönetimi',
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
                                <input type="text" name="musteri"
                                    class="form-control form-control-solid w-250px ps-14 me-5"
                                    value="{{ request()->get('musteri') }}" placeholder="Müşteriye Göre Ara..." />
                                @if (request()->get('musteri'))
                                    <a href="{{ route('instructor.invoices.index') }}" class="btn  btn-light">
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
                </div>
                <div class="card-body">
                    <div :class="{ 'alert alert-danger': error != null }" v-html="error"></div>
                    <table class="table align-middle gs-0 gy-4" id="invoice">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold text-muted bg-light">
                                <th class="min-w-150px ps-4">Fatura</th>
                                <th class="min-w-150px">Müşteri</th>
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
                                        {{ $invoice->courseInvoice->course_name }}
                                    </td>
                                    <td>
                                        {{ $invoice->customer->user->fullname }}
                                    </td>
                                    <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $invoice->payment_at ? $invoice->payment_at->format('Y-m-d') : '-' }}</td>
                                    <td>{{ $invoice->due_at ? $invoice->due_at->format('Y-m-d') : '-' }}</td>
                                    <td>{{ $invoice->amount }}₺</td>
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
                                        {{-- <input type="file" name="invoice_pdf" ref="pdf" class="d-none"
                                            v-on:change="uploadPDF($event, {{ $invoice }})">
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-success me-3"
                                            v-on:click="this.$refs.pdf.click();">
                                            <i class="fas fa-file-upload"></i>
                                        </button> --}}
                                        <button class="btn btn-icon btn-light btn-sm btn-active-light-info me-3"
                                            data-bs-toggle="modal" data-bs-target="#detailInvoice"
                                            v-on:click="detailInvoice({{ $invoice }}, {{ $invoice->courseInvoice }}, {{ $invoice->customer->user }})">
                                            <i class="fas fa-receipt"></i>
                                        </button>
                                        {{-- <button class="btn btn-icon btn-light btn-sm btn-active-light-danger"
                                            v-on:click="deleteInvoice()">
                                            <i class="fas fa-trash"></i>
                                        </button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $invoices->links('vendor.pagination.bootstrap-5') }}
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
                        <strong class="me-2">Müşteri:</strong>
                        <span>@{{ customer.fullname }}</span>
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
                    course: {},
                    customer: {},
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

                    axios.post("/panel/faturalar/" + invoice.id, fd).then(res => {
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
                detailInvoice(invoice, courseInvoice, customer) {
                    this.invoice = invoice;
                    this.course = courseInvoice;
                    this.customer = customer
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
                                url: "/panel/faturalar/" + invoice.id + "/sil",
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
