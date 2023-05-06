@extends('home.layout.page-layout')
@section('title', 'Kurumsal Eğitimler')
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
                'title' => 'Kurumsal Eğitimler',
            ],
        ],
    ])


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Kurumsal Eğitimler</h1>
                            <p class="text-dark-1">Şirketiniz ve şirket çalışanlarınızın performansı için hazırlanan
                                eğitimlerimize katılım
                                sağlayın.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 justify-between items-center">
                <div class="col-xl-5 col-lg-6 col-md-9 lg:order-2">
                    <h3 class="text-45 md:text-30 lh-12">Kurum ve Şirket İçi Sosyal
                        Medya & Reklam Eğitimleri
                    </h3>
                    <p class="mt-20 text-dark-1">Sosyal medya ve reklam faaliyetleri yürüten şirket çalışanlarınızın
                        trendlere hakim
                        olmalarını sağlamak ve performanslarını artırmak için şirketinize özel hazırlanan eğitimlerden
                        yararlanabilirsiniz.</p>
                </div>

                <div class="col-lg-6 lg:order-1">
                    <div class="composition -type-3">
                        <div class="-el-1">
                            <div class="bg-dark-1 py-50 px-30 rounded-8">
                                <div class="y-gap-20 pt-25">

                                    <div class="d-flex items-center">
                                        <div
                                            class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                            <i class="text-white size-12" data-feather="check"></i>
                                        </div>
                                        <div class="fw-500 text-white">Özenle seçilmiş yazarlar</div>
                                    </div>

                                    <div class="d-flex items-center">
                                        <div
                                            class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                            <i class="text-white size-12" data-feather="check"></i>
                                        </div>
                                        <div class="fw-500 text-white">Müfredatı takip etmesi kolay</div>
                                    </div>

                                    <div class="d-flex items-center">
                                        <div
                                            class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                            <i class="text-white size-12" data-feather="check"></i>
                                        </div>
                                        <div class="fw-500 text-white">Ücretsiz kurslar</div>
                                    </div>

                                    <div class="d-flex items-center">
                                        <div
                                            class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                            <i class="text-white size-12" data-feather="check"></i>
                                        </div>
                                        <div class="fw-500 text-white">Para iade garantisi</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="-el-2">
                            <img class="w-1/1" src="{{ asset('assets') }}/Ahmet-Ekinci-Akademi-Kurumsal-Egitimler-1.png"
                                alt="Ahmet-Ekinci-Akademi-Kurumsal-Eğitimler">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <img class="w-1/1" src="{{ asset('assets') }}/Ahmet-Ekinci-Akademi-Kurumsal-Egitimler-2.png"
                        alt="Ahmet-Ekinci-Akademi-Kurumsal-Eğitimler">
                </div>

                <div class="col-xl-4 offset-xl-1 col-lg-6">
                    <h3 class="text-24 lh-1">Neden Kurumsal Eğitim Almalısınız?</h3>
                    <p class="mt-20 text-dark-1">Kurumsal eğitimlerimiz, tamamen ilgili şirketin ihtiyaç ve istekleri
                        doğrultusunda,
                        sektörel analizler sonucu hazırlanır. Böylece şirket çalışanları, doğrudan sektörel örnekler ve
                        analizler ile hazırlanan özel bir eğitime katılım sağlamış olurlar.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-4 offset-xl-1 order-lg-1 col-lg-6 order-2">
                    <h3 class="text-24 lh-1">Ücretsiz Teklif & Bilgi Alın.</h3>
                    <p class="mt-20 text-dark-1">Kurumsal eğitim ihtiyacınızın olduğunu düşünüyorsanız, form doldurarak
                        bizimle
                        iletişime geçebilirsiniz. Detayları konuşmak için en kısa süre içerisinde geri dönüş sağlayacağız.
                    </p>
                    <div class="d-inline-block mt-20">
                        <a href="{{ route('home.contact') }}" class="button -md -dark-2 text-white">Teklif & Bilgi
                            Al</a>
                    </div>
                </div>

                <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2 order-1">
                    <img class="w-1/1" src="{{ asset('assets') }}/Ahmet-Ekinci-Akademi-Kurumsal-Egitimler-3.png"
                        alt="Ahmet-Ekinci-Akademi-Kurumsal-Eğitimler">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
@endsection
