@extends('home.layout.page-layout')
@section('title', 'Hakkımda')
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
                'title' => 'Hakkımda',
            ],
        ],
    ])


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Hakkımızda</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-md">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50 justify-between items-center">
                <div class="col-lg-6 pr-50 sm:pr-15">
                    <div class="composition -type-8">
                        <div class="-el-1" style="width: 650px;">
                            <img src="{{ asset('assets') }}/Ahmet-Ekinci-Akademi-6.png" alt="Ahmet-Ekinci-Akademi">
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <h2 class="text-30 lh-16">Yeni Medya Trendlerini Aktaran Yeni Nesil Akademi</h2>
                    <p class="text-dark-1 mt-30">
                        Ahmet Ekinci Akademi, Sosyal Medya Uzmanı Ahmet Ekinci ve iş ortakları tarafından geliştirilen, yeni
                        medya ilkeleri ile oluşturulmuş, sürekli gelişim ve yaşam boyu öğrenim modelini benimseyen online
                        eğitim platformudur.
                    </p>
                    <p class="text-dark-1 mt-30">
                        Akademi içerisinde bulunan eğitimlerin tamamı güncel, trendleri ve gelişmeleri takip eden eğitim
                        müfredatından oluşur. Katılımcıların, her daim güncelliğini korumaları amaçlanmış ve tüm eğitimler
                        bu düşünce yapısı içerisinde hazırlanmıştır.
                    </p>
                    <div class="d-inline-block">
                        <a href="{{ route('home.course.index') }}" class="button -md -purple-1 text-white mt-30">Eğitimleri
                            İncele </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-20 justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Öğrenmeye Şimdi Başlayın</h2>

                        <p class="sectionTitle__text text-dark-1">Süreç Nasıl İşliyor?</p>

                    </div>

                </div>
            </div>

            <div class="row y-gap-30 justify-between pt-60 lg:pt-40">

                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="d-flex flex-column items-center text-center">
                        <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
                            <img src="{{ asset('assets/front') }}/img/home-3/works/1.svg" alt="image">
                            <div class="side-badge">
                                <div
                                    class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                                    <span class="text-14 fw-500 text-white">01</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-17 fw-500 text-dark-1 mt-30">Ahmet Ekinci Akademi'ye üye olun.</div>
                    </div>
                </div>


                <div class="col-auto xl:d-none">
                    <div class="pt-30">
                        <img src="{{ asset('assets/front') }}/img/misc/lines/1.svg" alt="icon">
                    </div>
                </div>


                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="d-flex flex-column items-center text-center">
                        <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
                            <img src="{{ asset('assets/front') }}/img/home-3/works/2.svg" alt="image">
                            <div class="side-badge">
                                <div
                                    class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                                    <span class="text-14 fw-500 text-white">02</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-17 fw-500 text-dark-1 mt-30">Size en uygun eğitim paketini seçerek, kaydınızı
                            oluşturun.</div>
                    </div>
                </div>


                <div class="col-auto xl:d-none">
                    <div class="pt-30">
                        <img src="{{ asset('assets/front') }}/img/misc/lines/2.svg" alt="icon">
                    </div>
                </div>


                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="d-flex flex-column items-center text-center">
                        <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
                            <img src="{{ asset('assets/front') }}/img/home-3/works/3.svg" alt="image">
                            <div class="side-badge">
                                <div
                                    class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                                    <span class="text-14 fw-500 text-white">03</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-17 fw-500 text-dark-1 mt-30">Özenle hazırlanan, ömür boyu erişim ve güncelleme
                            şansınızın olduğu eğitimlerin tadını çıkarın.</div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="section-bg layout-pt-lg layout-pb-md">
        <div class="section-bg__item -full -height-half bg-dark-5"></div>

        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title text-white">Elde Ettiğiniz Avantajlar</h2>

                        <p class="sectionTitle__text text-white">Ahmet Ekinci Akademi'de Katılımcıları Neler Bekliyor?</p>

                    </div>

                </div>
            </div>

            <div data-anim-wrap class="row y-gap-30 justify-between pt-60 lg:pt-50">

                <div data-anim-child="slide-up delay-1" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <lord-icon src="https://cdn.lordicon.com/osvvqecf.json" trigger="hover"
                                style="width:80px;height:80px">
                            </lord-icon>
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Ömür Boyu Erişim</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Ahmet Ekinci Akademi'de katıldığınız her
                                eğitim için
                                ömür boyu erişim imkanına sahip olursunuz.</p>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-2" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <lord-icon src="https://cdn.lordicon.com/jefnhaqh.json" trigger="hover"
                                style="width:80px;height:80px">
                            </lord-icon>
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Ömür Boyu Destek</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Katılım sağladığınız her eğitimin
                                eğitmeninden,
                                panelinizde yer alan "Eğitmene Sor" bölümünden ömür boyu destek alabilirsiniz</p>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-3" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <lord-icon src="https://cdn.lordicon.com/gowvgfsi.json" trigger="morph"
                                style="width:80px;height:80px">
                            </lord-icon>
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Güncel Eğitimler</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Ahmet Ekinci Akademi'de bulunan tüm
                                eğitimler,
                                trendlere ve gelişmelere göre düzenli olarak güncellenir.</p>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-4" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <lord-icon src="https://cdn.lordicon.com/ddqkigxl.json" trigger="hover"
                                style="width:80px;height:80px">
                            </lord-icon>
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Bire Bir Eğitim Modeli</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Bire bir eğitim modeli ile bu özelliğin
                                olduğu tüm
                                eğitimlerde, birebir ve gerçek zamanlı olarak eğitmenden eğitim alabilirsiniz.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-20 justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Katılımcılar Neler Söyledi?</h2>

                    </div>

                </div>
            </div>

            <div class="row justify-center pt-60">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="overflow-hidden js-testimonials-slider">
                        <div class="swiper-wrapper">
                            @foreach ($customerFeedbacks as $feedback)
                                <div class="swiper-slide h-100">
                                    <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                        <div class="testimonials__icon">
                                            <img src="{{ asset('assets/front') }}/img/misc/quote.svg" alt="quote">
                                        </div>
                                        <div class="testimonials__text md:text-20 fw-500 text-dark-1">
                                            {{ $feedback->message }}</div>
                                        <div class="testimonials__author">
                                            <h5 class="text-17 lh-15 fw-500">{{ $feedback->customer->user->fullname }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="pt-60 lg:pt-40">
                            <div
                                class="pagination -avatars row x-gap-40 y-gap-20 justify-center js-testimonials-pagination">
                                @foreach ($customerFeedbacks as $feedback)
                                    <div class="col-auto">
                                        <div class="pagination__item is-active">
                                            <img src="{{ $feedback->customer->user->image }}"
                                                alt="{{ $feedback->customer->user->fullname }}"
                                                style="width: 85px; height: 85px; border-radius: 100px">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
@endsection
