@extends('home.layout.main')
@section('title', 'Ana Sayfa')
@section('css')
    <style>
        .why svg {
            width: 60px;
            fill: #1A1A1A;
        }

        .why .why-item .coursesCard:hover svg {
            fill: #fff;
        }

        @media(min-width:800px) {
            .masthead__container {
                padding: 0 210px !important;
            }
        }
    </style>
@endsection
@section('content')
    <section data-anim-wrap class="masthead -type-5">
        <div class="masthead__bg"></div>

        <div class="masthead__container">
            <div class="row y-gap-50 items-center">
                <div class="col-lg-6">
                    <div class="masthead__content">
                        <div data-anim-child="slide-up delay-2" class="text-17 lh-15 text-orange-1 fw-500 mb-10">
                            Kendini geliştirmek için ilk adımı at.
                        </div>
                        <h1 data-anim-child="slide-up delay-2" class="masthead__title">
                            Yeni Medya Dinamikleriyle
                            Hazırlanan, Yeni Nesil
                            Eğitimler
                        </h1>
                        <p data-anim-child="slide-up delay-3" class="mt-5 text-dark-1">
                            Birebir eğitimler, ömür boyu destek, güncel eğitimler ve daha fazlası Ahmet Ekinci Akademi'de!
                        </p>
                        <div data-anim-child="slide-up delay-4" class="row items-center x-gap-20 y-gap-20 pt-20">
                            <div class="col-auto">
                                <a href="{{ route('home.course.index') }}" class="button -md -blue-5 text-white">Eğitimleri
                                    İncele</a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('register') }}" class="button -md -outline-light-5 text-dark-1">Ücretsiz
                                    Kaydol</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div data-anim-child="slide-up delay-6" class="masthead__image">
                        <img src="{{ asset('assets/front') }}/img/home-8/hero/image.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-md why">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Neden Ahmet Ekinci Akademi?</h2>

                        <p class="sectionTitle__text text-dark-1">Ahmet Ekinci Akademi, sadece yeni nesil eğitimler sunmak
                            yerine,
                            katılımcıların hayat boyu öğrenme ilkesini benimser. <br> Çünkü öğrenmenin bir sınırı ya da
                            süresi
                            yoktur.</p>

                    </div>

                </div>
            </div>

            <div class="row y-gap-30 justify-between pt-60 lg:pt-50">

                <div class="col-lg-3 col-md-6 why-item">
                    <div class="coursesCard -type-3 px-0 text-center">
                        <div class="coursesCard__icon bg-white shadow-2">
                            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                            <lord-icon src="https://cdn.lordicon.com/kqcykigc.json" trigger="hover"
                                style="width:75px;height:75px">
                            </lord-icon>
                        </div>

                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Güncel Eğitimler</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Akademi içerisinde yer alan tüm
                                eğitimler, düzenli
                                olarak güncellenir. Katılımcıların güncel kalması sağlanır.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 why-item">
                    <div class="coursesCard -type-3 px-0 text-center">
                        <div class="coursesCard__icon bg-white shadow-2">
                            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                            <lord-icon src="https://cdn.lordicon.com/hatrfdfo.json" trigger="hover"
                                style="width:75px;height:75px">
                            </lord-icon>
                        </div>

                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Ömür Boyu Destek</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Akademide katıldığınız tüm eğitimlerin
                                eğitmenlerinden, ücretsiz olarak ömür boyu destek alma şansına sahip olursunuz.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 why-item">
                    <div class="coursesCard -type-3 px-0 text-center">
                        <div class="coursesCard__icon bg-white shadow-2">
                            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                            <lord-icon src="https://cdn.lordicon.com/osvvqecf.json" trigger="hover"
                                style="width:85px;height:85px">
                            </lord-icon>
                        </div>

                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Ömür Boyu Erişim</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Katıldığınız eğitimlere, ömür boyu erişim
                                elde
                                edersiniz. Dilediğiniz yerde, zamanda eğitim içeriklerine ulaşım sağlayabilirsiniz.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 why-item">
                    <div class="coursesCard -type-3 px-0 text-center">
                        <div class="coursesCard__icon bg-white shadow-2">
                            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                            <lord-icon src="https://cdn.lordicon.com/kjkiqtxg.json" trigger="hover"
                                style="width:75px;height:75px">
                            </lord-icon>
                        </div>

                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Birebir Eğitim Ayrıcalığı</h5>
                            <p class="coursesCard__text text-14 mt-10 text-dark-1">Katıldığınız eğitimlerde, hem birebir
                                eğitim
                                alabilir
                                hemde özel olarak hazırlanan videolu eğitimlere erişim sağlayabilirsiniz.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @if ($courses->count())
        <section class="layout-pt-lg layout-pb-lg bg-dark-2">
            <div data-anim-wrap class="container">
                <div class="row justify-center text-center">
                    <div class="col-auto">

                        <div class="sectionTitle">

                            <h2 class="sectionTitle__title text-white">Öne Çıkan Eğitimler</h2>

                            <p class="sectionTitle__text text-white">Katılımcılar tarafından en çok tercih edilen
                                ve beğenilen eğitimleri keşfederek, <br> size
                                uygun eğitimin seçimini yapabilirsiniz.</p>

                        </div>

                    </div>
                </div>

                <div class="relative pt-60 lg:pt-50 js-section-slider" data-gap="30" data-slider-cols="xl-3 lg-2">
                    <div class="swiper-wrapper">
                        @foreach ($courses as $course)
                            <div class="swiper-slide">
                                <div data-anim-child="slide-up delay-1">

                                    <a href="{{ route('home.course.detail', $course) }}"
                                        class="coursesCard -type-1 shadow-3 rounded-8 bg-white">
                                        <div class="relative">
                                            <div class="coursesCard__image overflow-hidden rounded-top-8">
                                                <img class="w-1/1" style="height: 250px;" src="{{ $course->image }}"
                                                    alt="{{ $course->title }}">
                                                <div class="coursesCard__image_overlay rounded-top-8"></div>
                                            </div>
                                            <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">
                                                @if ($course->status == 0)
                                                    <div>
                                                        <div class="px-15 rounded-200 bg-purple-1">
                                                            <span class="text-11 lh-1 uppercase fw-500 text-white">Çok
                                                                Yakında</span>
                                                        </div>
                                                    </div>
                                                @endif

                                                {{-- <div>
                                                    <div class="px-15 rounded-200 bg-green-1">
                                                        <span class="text-11 lh-1 uppercase fw-500 text-dark-1">Best
                                                            sellers</span>
                                                    </div>
                                                </div> --}}

                                            </div>
                                        </div>

                                        <div class="h-100 pt-20 pb-15 pl-30 pr-40">
                                            <div class="d-flex items-center">
                                                <div class="text-14 lh-1 text-yellow-1 mr-10">{{ $course->sumRate() }}
                                                </div>
                                                <div class="d-flex x-gap-5 items-center">
                                                    @for ($i = 0; $i < $course->sumRate(); $i++)
                                                        <div class="icon-star text-9 text-yellow-1"></div>
                                                    @endfor
                                                </div>
                                            </div>

                                            <div class="text-17 lh-15 fw-500 text-dark-1 mt-10"
                                                title="{{ $course->title }}">
                                                {{ Str::limit($course->title, 40) }}</div>

                                            <div class="d-flex x-gap-10 items-center pt-10">

                                                <div class="d-flex items-center">
                                                    <div class="mr-8">
                                                        <img src="{{ asset('assets/front') }}/img/coursesCards/icons/1.svg"
                                                            alt="icon">
                                                    </div>
                                                    <div class="text-14 lh-1 text-dark-1">{{ $course->lessonCount() }}
                                                        ders</div>
                                                </div>

                                            </div>

                                            <div class="coursesCard-footer">
                                                <div class="coursesCard-footer__author">
                                                    @if ($course->instructor->image)
                                                        <img src="{{ $course->instructor->image }}"
                                                            alt="{{ $course->instructor->fullname }}">
                                                    @else
                                                        <span
                                                            class="uppercase bg-black px-2 rounded-16 text-white">{{ Str::limit($course->instructor->fullname, 1, '') }}</span>
                                                    @endif
                                                    <div class="text-dark-1">{{ $course->instructor->fullname }}</div>
                                                </div>

                                                <div class="coursesCard-footer__price">
                                                    <div></div>
                                                    <div>{{ $course->price }}₺</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        @endforeach

                    </div>


                    <button
                        class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-prev">
                        <i class="icon icon-arrow-left text-24"></i>
                    </button>

                    <button
                        class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-next">
                        <i class="icon icon-arrow-right text-24"></i>
                    </button>

                </div>

                <div class="row justify-center pt-60 lg:pt-50">
                    <div class="col-auto">

                        <a href="{{ route('home.course.index') }}" class="button -icon -white text-dark-2">
                            Tüm Eğitimleri Keşfet
                            <i class="icon-arrow-top-right text-13 ml-10"></i>
                        </a>

                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($customerFeedbacks->count())
        <section class="layout-pt-lg layout-pb-lg bg-dark-5">
            <div class="container">
                <div class="row justify-center text-center">
                    <div class="col-auto">

                        <div class="sectionTitle ">

                            <h2 class="sectionTitle__title text-white">Katılımcılar Neler Söyledi?</h2>

                            <p class="sectionTitle__text text-white">Ahmet Ekinci Akademi’nin eğitimlerine katılım
                                göstererek, <br>
                                memnuniyetlerini dile getiren bazı katılımcılarımız.</p>

                        </div>

                    </div>
                </div>

                <div class="pt-60 lg:pt-50 js-section-slider" data-gap="30" data-pagination data-slider-cols="xl-2"
                    data-anim-wrap>
                    <div class="swiper-wrapper">
                        @foreach ($customerFeedbacks as $feedback)
                            <div class="swiper-slide">
                                <div data-anim-child="slide-left delay-1"
                                    class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                                    <div class="row y-gap-30 md:text-center md:justify-center">
                                        <div class="col-md-auto">
                                            <div class="testimonials__image">
                                                <img src="{{ $feedback->customer->user->image }}"
                                                    alt="{{ $feedback->customer->user->fullname }}"
                                                    style="width: 150px; height: 150px;">
                                            </div>
                                        </div>

                                        <div class="col-md">
                                            <div class="d-flex items-center md:justify-center">
                                                <span class="text-14 lh-1 text-yellow-1">{{ $feedback->rate }}</span>
                                                <div class="x-gap-5 px-10">
                                                    @for ($i = 0; $i < $feedback->rate; $i++)
                                                        <i class="text-11 icon-star text-yellow-1"></i>
                                                    @endfor
                                                </div>
                                            </div>

                                            <p class="testimonials__text text-16 lh-17 fw-500 mt-15">
                                                “{{ $feedback->message }}”
                                            </p>

                                            <div class="mt-15">
                                                <div class="text-15 lh-1 text-dark-1 fw-500">
                                                    {{ $feedback->customer->user->fullname }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-left-hover js-prev">
                                <i class="icon text-white icon-arrow-left"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <div class="pagination -arrows js-pagination"></div>
                        </div>
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-right-hover js-next">
                                <i class="icon text-white icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($blogs->count())
        <section class="layout-pt-lg layout-pb-lg">
            <div data-anim-wrap class="container">
                <div data-anim-child="slide-left delay-1" class="row y-gap-20 justify-between items-center">
                    <div class="col-lg-6">

                        <div class="sectionTitle ">

                            <h2 class="sectionTitle__title ">Blog</h2>

                            <p class="sectionTitle__text text-dark-1">Sosyal medya ve dijital pazarlama ilişkin en güncel
                                blog
                                yazılarımıza anında ulaşın.</p>

                        </div>

                    </div>

                    <div class="col-auto">

                        <a href="{{ route('home.blog.index') }}" class="button -icon -dark-2 text-white">
                            Diğer Blog Yazıları
                            <i class="icon-arrow-top-right text-13 ml-10"></i>
                        </a>

                    </div>
                </div>

                <div class="row y-gap-30 pt-60">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ $blog->link }}" class="rounded-16" data-anim-child="slide-left delay-2"
                                class="blogCard -type-1">
                                <div class="blogCard__image">
                                    <img src="{{ $blog->image }}" class="text-dark-1" alt="{{ $blog->title }}">
                                </div>
                                <div class="blogCard__content mt-20">
                                    <h4 class="blogCard__title text-17 lh-15 mt-5 text-dark-1">{{ $blog->title }}</h4>
                                    <div class="blogCard__date text-14 mt-5 text-muted">
                                        {{ $blog->created_at->isoFormat('MMMM d, Y') }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
@endsection
