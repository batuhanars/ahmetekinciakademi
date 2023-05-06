@extends('home.layout.page-layout')
@section('title', 'Sipariş')
@section('content')
    @include('home.breadcrumb', [
        'dark' => false,
        'items' => [
            [
                'link' => route('home.index'),
                'title' => 'Anasayfa',
            ],
            [
                'link' => '',
                'title' => 'Ödeme',
            ],
        ],
    ])

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="shopCompleted-header">
                        <div class="icon">
                            <i data-feather="check"></i>
                        </div>
                        <h2 class="title">
                            Siparişiniz Tamamlandı!
                        </h2>
                        <div class="subtitle">
                            Teşekkürler. Siparişiniz alındı.
                        </div>
                    </div>
                    <div class="shopCompleted-info">
                        <div class="row no-gutters y-gap-32">
                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">Sipariş Numarası</div>
                                    <div class="title text-purple-1 mt-5">{{ $invoice->pay_id }}</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">Sipariş Özeti</div>
                                    <div class="title text-purple-1 mt-5">1 Ürün</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">Tarih</div>
                                    <div class="title text-purple-1 mt-5">{{ $invoice->payment_at->format('Y-m-d') }}</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">Toplam</div>
                                    <div class="title text-purple-1 mt-5">{{ $invoice->amount }}₺</div>
                                </div>
                            </div>

                            {{-- <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">Ödeme Yöntemi</div>
                                    <div class="title text-purple-1 mt-5">Direct Bank Transfer</div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="shopCompleted-footer bg-light-4 border-light rounded-8">
                        <div class="shopCompleted-footer__wrap">
                            <h5 class="title">
                                Sipariş Detayı
                            </h5>

                            <div class="item">
                                <span class="fw-500">Ürün</span>
                                <span class="fw-500">Ara Toplam</span>
                            </div>

                            <div class="item">
                                <span class="">{{ $course->title }}</span>
                                <span class="">{{ $course->price }}₺</span>
                            </div>
                            <div class="item">
                                <span class="fw-500">Genel Toplam</span>
                                <span class="fw-500">{{ $invoice->amount }}₺</span>
                            </div>
                            <div class="item d-flex justify-content-center pt-10">
                                @if ($course->play_list && $course->play_list->video)
                                    <a href="{{ route('home.course.lessons', [$course, $course->play_list->video->slug]) }}"
                                        class="button -blue-1 -md text-white">Kurs'a Git</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
