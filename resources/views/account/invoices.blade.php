@extends('account.layout.main')
@section('title', 'Faturalarım')
@section('content')
    <div class="dashboard__content bg-light-4" id="invoice_app">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">Faturalarım</h1>
                <div class="mt-10 text-dark-1">Fatura bilgilerinizi buradan takip edebilirsiniz.</div>

            </div>
        </div>

        <div class="row y-gap-30 text-dark-1">

            <div class="col-xl-4 col-md-6">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500">Ödenen Faturalar</div>
                        <div class="text-24 lh-1 fw-700 text-dark-1 mt-20">
                            {{ $customer->invoices->where('status', 1)->sum('amount') }}₺
                        </div>
                    </div>

                    <i class="text-40 fas fa-file-invoice-dollar text-purple-1"></i>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500">Ödeme Bekleyen Faturalar</div>
                        <div class="text-24 lh-1 fw-700 text-dark-1 mt-20">
                            {{ $customer->invoices->where('status', 0)->sum('amount') }}₺</div>
                    </div>

                    <i class="text-40 fas fa-receipt text-purple-1"></i>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500">Ödenmeyen Faturalar</div>
                        <div class="text-24 lh-1 fw-700 text-dark-1 mt-20">
                            {{ $customer->invoices->where('due_at', '<=', now())->sum('amount') }}₺
                        </div>
                    </div>

                    <i class="text-40 fas fa-file-invoice text-purple-1"></i>
                </div>
            </div>

        </div>

        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white shadow-4 -dark-bg-dark-1 h-100">

                    <div class="py-30 px-30">

                        <div class="mt-40">
                            <div class="px-30 py-20 bg-light-7 rounded-8">
                                <div class="row x-gap-10">
                                    <div class="col-lg-2">
                                        <div class="text-purple-1">Fatura</div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="text-purple-1">Oluşturulma Tarihi</div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="text-purple-1">Ödendiği Tarih</div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="text-purple-1">Son Ödeme Tarihi</div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="text-purple-1">Tutar</div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="text-purple-1">Durum</div>
                                    </div>
                                    <div class="col-lg-2">
                                    </div>
                                </div>
                            </div>
                            @forelse ($invoices as $invoice)
                                <div class="px-30 border-bottom-light text-dark-1">
                                    <div class="row x-gap-10 items-center py-25">
                                        <div class="col-lg-2">
                                            <div>{{ $invoice->courseInvoice->course_name ?? '' }}
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="text-14 lh-12">{{ $invoice->created_at->format('Y-m-d') }}</div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-14 lh-12">
                                                {{ $invoice->payment_at ? $invoice->payment_at->format('Y-m-d') : '-' }}
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="text-14 lh-12">
                                                {{ $invoice->due_at ? $invoice->due_at->format('Y-m-d') : '-' }}</div>

                                        </div>

                                        <div class="col-lg-1">
                                            {{ $invoice->amount }}₺
                                        </div>

                                        <div class="col-lg-1">
                                            @if ($invoice->due_at && $invoice->status != 1 && $invoice->due_at <= now()->format('Y-m-d'))
                                                <div class="badge badge-info">Ödeme Tarihi Geçti</div>
                                            @else
                                                <div class="badge badge-{{ $invoice->status == 1 ? 'success' : 'danger' }}">
                                                    {{ $invoice->status == 1 ? 'Ödendi' : 'Ödenmedi' }}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="d-flex justify-content-end">
                                                @if ($invoice->status == 0)
                                                    <a href="{{ route('home.checkout.service', [$invoice->serviceInvoice->service, $invoice]) }}"
                                                        type="button"
                                                        class="button px-2 py-2 -blue-1 ms-3 text-11 text-white">
                                                        Faturayı Öde
                                                    </a>
                                                @endif
                                                <button type="button" class="button -light-1 px-2 py-2 ms-3 text-white"
                                                    data-toggle="modal" data-target="#receipt"
                                                    v-on:click="detailInvoice({{ $invoice }})">
                                                    <i class="fas fa-receipt"></i>
                                                </button>
                                                @if ($invoice->invoice_pdf)
                                                    <a href="{{ $invoice->invoice_pdf }}" download
                                                        class="button -light-1 text-dark-1 ms-3 px-2 py-2">
                                                        <i class="fas fa-file-download"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center">
                                    Şu anda herhangi bir veri yok
                                </div>
                            @endforelse
                        </div>

                        <div class="row justify-center pt-30">
                            <div class="col-auto">
                                {{ $invoices->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" tabindex="-1" id="receipt">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Fatura Detayları</h5>

                        <!--begin::Close-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body text-dark-1">
                        <div class="mb-5">
                            <strong class="me-2">Kurs:</strong>
                            <span>@{{ course.course_name }}</span>
                        </div>
                        <div class="mb-5">
                            <strong class="me-2">Oluşturulma Tarihi:</strong>
                            <span>@{{ createdAt(invoice.created_at) }}</span>
                        </div>
                        <div class="mb-5">
                            <strong class="me-2">Ödendiği Tarih:</strong>
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
                        <button type="button" class="btn btn-light" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
