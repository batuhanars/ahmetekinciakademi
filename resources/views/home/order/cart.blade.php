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
                                    <div class="title text-purple-1 mt-5">{{ $payId }}</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">Sipariş Özeti</div>
                                    <div class="title text-purple-1 mt-5">{{ $cart->count() }} Ürün</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">Tarih</div>
                                    <div class="title text-purple-1 mt-5">{{ $payment_at->format('Y-m-d') }}</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">Toplam</div>
                                    <div class="title text-purple-1 mt-5">{{ $total }}₺</div>
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
                            @foreach ($cart as $item)
                                <div class="item">
                                    <span class="">{{ $item->course->title }}</span>
                                    <span class="">{{ $item->course->price }}₺</span>
                                </div>
                            @endforeach
                            <div class="item">
                                <span class="fw-500">Genel Toplam</span>
                                <span class="fw-500">{{ $total }}₺</span>
                            </div>
                            <div class="item d-flex justify-content-center pt-10">
                                <a href="{{ route('account.courses') }}" class="button -blue-1 -md text-white">Öğrenim
                                    İçeriğim</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
