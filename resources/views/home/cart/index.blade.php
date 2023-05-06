@extends('home.layout.page-layout')
@section('title', 'Sepet')
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
                'title' => 'Sepet',
            ],
        ],
    ])


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Sepet</h1>

                        </div>

                        <div data-anim="slide-up delay-2">

                            {{-- <p class="page-header__text">We’re on a mission to deliver engaging, curated courses at a
                                reasonable price.</p> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row justify-end">
                <div class="col-12">
                    <div class="px-30 pr-60 py-25 rounded-8 bg-light-6 md:d-none">
                        <div class="row justify-between">
                            <div class="col-md-8">
                                <div class="fw-500 text-purple-1">Eğitim</div>
                            </div>
                            <div class="col-md-2">
                                <div class="fw-500 text-purple-1">Fiyat</div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex justify-end">
                                    <div class="fw-500 text-purple-1">Kaldır</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $total = 0;
                    @endphp

                    <div class="px-30 pr-60 md:px-0">
                        @foreach ($cart as $item)
                            @php
                                $total += $item->course->price;
                            @endphp
                            <div class="row y-gap-20 justify-between items-center pt-30 pb-30 border-bottom-light">
                                <div class="col-md-8">
                                    <div class="d-flex items-center">
                                        <div class="">
                                            <div class="size-100 bg-image rounded-8 js-lazy"
                                                data-bg="{{ $item->course->image }}">
                                            </div>
                                        </div>
                                        <div class="fw-500 text-dark-1 ml-30">{{ $item->course->title }}</div>
                                    </div>
                                </div>

                                <div class="col-md-2 md:mt-15">
                                    <div class="">
                                        <div class="shopCart-products__title d-none md:d-block mb-10">
                                            Fiyat
                                        </div>
                                        <p>{{ $item->course->price }}₺</p>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div v-on:click="deleteCart({{ $item->id }})"
                                        class="md:d-none d-flex justify-end pointer">
                                        <i class="icon" data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="shopCart-footer px-16 mt-30">
                        <div class="row justify-between y-gap-30">
                            <div class="col-xl-5 d-flex justify-content-between">
                                <strong class="text-dark-1">Toplam:</strong>
                                <span>{{ $total }}₺</span>
                            </div>

                            <div class="col-auto">
                                <div class="shopCart-footer__item">
                                    <a href="{{ route('home.cart-summary') }}"
                                        class="button -md -purple-3 text-purple-1">Sepeti Onayla</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-4 col-lg-5 layout-pt-lg">
                    <div class="py-30 bg-light-4 rounded-8 border-light">
                        <h5 class="px-30 text-20 fw-500">
                            Cart Totals
                        </h5>

                        <div class="d-flex justify-between px-30 item mt-25">
                            <div class="py-15 fw-500 text-dark-1">Subtotal</div>
                            <div class="py-15 fw-500 text-dark-1">$1.298</div>
                        </div>

                        <div class="d-flex justify-between px-30 item border-top-dark">
                            <div class="pt-15 fw-500 text-dark-1">Total</div>
                            <div class="pt-15 fw-500 text-dark-1">$3.298</div>
                        </div>
                    </div>

                    <a href="shop-checkout.html" class="button -md -purple-1 text-white col-12 mt-30">Proceed to
                        checkout</a>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
