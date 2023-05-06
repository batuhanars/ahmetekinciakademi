@extends('home.layout.page-layout')
@section('title', 'Eğitmen Ol')
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
                'title' => 'Eğitmen Ol',
            ],
        ],
    ])


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Become an Instructor</h1>

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


    <section class=" layout-pb-lg">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="tabs -active-purple-2 js-tabs">
                        <div class="tabs__controls d-flex js-tabs-controls">
                            <button class="tabs__button js-tabs-button is-active" data-tab-target=".-tab-item-1"
                                type="button">
                                Neden Ahmet Ekinci Akademi?
                            </button>
                            <button class="tabs__button js-tabs-button ml-30" data-tab-target=".-tab-item-2" type="button">
                                Nasıl Eğitmen Olurum
                            </button>
                        </div>

                        <div class="tabs__content pt-60 lg:pt-40 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <p class="text-dark-1">
                                    Ahmet Ekinci Akademi, yeni medya ilkelerine göre tasarlanmış, katılımcıların yaşam boyu
                                    öğrenmesini amaç edinmiş bir platformdur. Eğitmen olarak Ahmet Ekinci Akademi'de
                                    eğitimler vermek, kişisel marka bilinirliği oluşturmanıza ve tecrübelerinizi yüzlerce
                                    katılımcıya ulaştırmanıza olanak sağlar. Katılımcılara yol gösterme ve sektörü daha da
                                    ileriye taşıma gibi düşünceleriniz varsa, aramıza katılmak için önünüzde
                                    hiçbir engel yok!
                                </p>
                            </div>
                            <div class="tabs__pane -tab-item-2">
                                <p class="text-dark-1">
                                    Ahmet Ekinci Akademi'de eğitmen olmak için öncelikle "Başvuru Formu"nu eksiksiz bir
                                    şekilde doldurmanız gerekiyor. Eğer eğitmenlik kriterlerimizi karşılıyorsanız sizinle
                                    iletişim kurarak, toplantı gerçekleştireceğiz. Toplantı esnasında yol haritamızı ve
                                    nasıl bir ilerleme kaydetmek istediğimizi size aktaracağız.
                                    Şartlarımızı ve koşullarımızı kabul etmeniz halinde, sözleşmemizi imzalayarak eğitmen
                                    kadromuza sizi de dahil edeceğiz.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row y-gap-30 justify-between layout-pt-lg">

                <div class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 bg-white rounded-8">
                        <div class="coursesCard__image">
                            <img src="{{ asset('assets/front') }}/img/home-5/learning/1.svg" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Learn with Experts</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Grursus mal suada faci lisis that ipsum
                                ameti
                                consecte.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 bg-white rounded-8">
                        <div class="coursesCard__image">
                            <img src="{{ asset('assets/front') }}/img/home-5/learning/2.svg" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Learn Anything</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Grursus mal suada faci lisis that ipsum
                                ameti
                                consecte.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 bg-white rounded-8">
                        <div class="coursesCard__image">
                            <img src="{{ asset('assets/front') }}/img/home-5/learning/3.svg" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Flexible Learning</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Grursus mal suada faci lisis that ipsum
                                ameti
                                consecte.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 bg-white rounded-8">
                        <div class="coursesCard__image">
                            <img src="{{ asset('assets/front') }}/img/home-5/learning/4.svg" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Industrial Standart</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Grursus mal suada faci lisis that ipsum
                                ameti
                                consecte.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-md bg-light-4">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50 justify-between items-center">
                <div class="col-lg-7 pr-60">
                    <img src="{{ asset('assets') }}/Ahmet-Ekinci-Akademi-Egitmenlik.png" alt="image">
                </div>

                <div class="col-lg-5">
                    <h2 class="text-45 lh-15"><span class="text-purple-1">Aramıza Katılmaya</span> Hazır mısın?</h2>
                    <p class="text-dark-1 mt-25">Eğitmenlik başvurusu için hazırladığımız formu hemen doldurarak eğitmen
                        adayları arasında sende yerini alabilirsin.</p>
                    <div class="d-inline-block mt-30">
                        <a href="{{ route('home.instructor-request') }}" class="button -md -dark-1 text-white">Ekibimize
                            Katıl</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-lg bg-white">
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-8 col-lg-9 col-md-11">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Sıkça Sorulan Sorular.</h2>

                    </div>


                    <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">
                        <div class="accordion__item">
                            <div class="accordion__button">
                                <div class="accordion__icon">
                                    <div class="icon" data-feather="plus"></div>
                                    <div class="icon" data-feather="minus"></div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1">Daha önce eğitim vermedim, eğitmen olabilir miyim?
                                </span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner">
                                    <p>Daha önce eğitim vermeyen kişiler de akademimiz içerisinde eğitmen olabilirler.
                                        Eğitmenlik kriterlerimiz içeisinde, sektörde belirli bir süre deneyim ve tecrübe
                                        sahibi olmanız, kendinizi ifade etme yeteneğinizin yüksek olması ve Türkçeyi doğru
                                        kullanmanız bulunuyor. Bu özelliklerin kendinizde olduğunu düşünüyorsanız,
                                        başvuru yapabilirsiniz.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item">
                            <div class="accordion__button">
                                <div class="accordion__icon">
                                    <div class="icon" data-feather="plus"></div>
                                    <div class="icon" data-feather="minus"></div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1">Eğitmenler nasıl gelir elde ediyor?

                                </span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner">
                                    <p>Akademimizde eğitim veren tüm eğitmenler, komisyon bazlı gelir elde ederler. Komisyon
                                        oranları, eğitmenler ile yapılan toplantıda belirlenir.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item">
                            <div class="accordion__button">
                                <div class="accordion__icon">
                                    <div class="icon" data-feather="plus"></div>
                                    <div class="icon" data-feather="minus"></div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1">Reklam faaliyetleri için eğitmenden kesinti
                                    yapılıyor mu?


                                </span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner">
                                    <p>Hayır, reklam ve tanıtım faaliyetleri Ahmet Ekinci Akademi tarafından yürütülür. Bu
                                        bağlamda eğitmenden reklam faaliyetleri için ek ücret talep edilmez ya da
                                        kesinti yapılmaz</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item">
                            <div class="accordion__button">
                                <div class="accordion__icon">
                                    <div class="icon" data-feather="plus"></div>
                                    <div class="icon" data-feather="minus"></div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1">Eğitim fiyatlarını & kampanya süreçlerini kim
                                    belirliyor?
                                </span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner">
                                    <p>Eğitim fiyatlarını ve kampanyaları Ahmet Ekinci Akademi belirliyor. Sektörel
                                        analizler, eğitmenin tecrübesi, eğitimin konusu, eğitimin süresi gibi faktörler göz
                                        önünde bulundurularak, piyasa şartlarına uygun olacak şekilde
                                        fiyatlandırma yapılıyor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item">
                            <div class="accordion__button">
                                <div class="accordion__icon">
                                    <div class="icon" data-feather="plus"></div>
                                    <div class="icon" data-feather="minus"></div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1">Daha önce çekmiş olduğum eğitim videolarını,
                                    sisteme yükleyerek eğitim verebilir miyim?

                                </span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner">
                                    <p>Hayır. Ahmet Ekinci Akademi içerisinde bulunan eğitmenlerin tüm eğitimlerini,
                                        hazırlanan müfredata ve Ahmet Ekinci Akademi'nin vizyonuna uygun olacak şekilde
                                        hazırlaması gerekiyor. Daha önce kayıt altına alınmış ya da farklı yerlerde
                                        yayınlanmış eğitim videolarını ve farklı platformlarda eğitmenlik yapan kişileri
                                        akademimize kabul etmiyoruz.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item">
                            <div class="accordion__button">
                                <div class="accordion__icon">
                                    <div class="icon" data-feather="plus"></div>
                                    <div class="icon" data-feather="minus"></div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1">Eğitimlerimi sisteme yükledikten sonra aktif olmak
                                    zorunda mıyım?
                                </span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner">
                                    <p>Evet. Eğitmen panelinde, katılımcıların diledikleri zaman soru sorabileceği bir
                                        modülümüz bulunuyor. Her eğitmen, soru modülü üzerinden gönderilen sorulara,
                                        maksimum 24 saat içerisinde cevap vermesi gerekiyor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
