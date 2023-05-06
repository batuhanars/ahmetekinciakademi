@extends('home.layout.page-layout')
@section('title', 'Ödeme')
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
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Ödeme</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-lg">

        <div class="container">
            <div class="row y-gap-50">
                <div class="col-lg-8">
                    <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                    <iframe src="https://www.paytr.com/odeme/guvenli/{{ $token }}" id="paytriframe" frameborder="0"
                        scrolling="no" style="width: 100%;"></iframe>
                </div>

                <div class="col-lg-4">
                    <div class="">
                        <div class="pt-30 pb-15 bg-white border-light rounded-8 bg-light-4">
                            <h5 class="px-30 text-20 fw-500">
                                Sipariş Özeti
                            </h5>

                            <div class="d-flex justify-between px-30 mt-25">
                                <div class="py-15 fw-500 text-dark-1">Ürün</div>
                                <div class="py-15 fw-500 text-dark-1">Ara Toplam</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 text-grey">{{ $course->title }}</div>
                                <div class="py-15 text-grey">{{ $course->price }}₺</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 fw-500 text-dark-1">Genel Toplam</div>
                                <div class="py-15 fw-500 text-dark-1">{{ $course->price }}₺</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()
@section('js')

    <script>
        iFrameResize({
            scrolling: false,
            initCallback: () => {}
        }, '#paytriframe');
    </script>
@endsection
