@extends('home.layout.page-layout')
@section('title', $course->title)
@section('css')
    <style>
        .form-group .rating {
            display: inline-block;
            position: relative;
            height: 30px;
            line-height: 30px;
            font-size: 30px;
        }

        .form-group .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .form-group .rating label:last-child {
            position: static;
        }

        .form-group .rating label:nth-child(1) {
            z-index: 5;
        }

        .form-group .rating label:nth-child(2) {
            z-index: 4;
        }

        .form-group .rating label:nth-child(3) {
            z-index: 3;
        }

        .form-group .rating label:nth-child(4) {
            z-index: 2;
        }

        .form-group .rating label:nth-child(5) {
            z-index: 1;
        }

        .form-group .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .form-group .rating label .icon {
            float: left;
            color: transparent;
        }

        .form-group .rating label:last-child .icon {
            color: #000;
        }

        .form-group .rating:not(:hover) label input:checked~.icon,
        .form-group .rating:hover label:hover input~.icon {
            color: orange;
        }

        .form-group .rating label input:focus:not(:checked)~.icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #09f;
        }

        .tab {
            display: none;
            animation: fadeEffect .5s;
        }

        /* Go from zero to full opacity */
        @keyframes fadeEffect {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
@endsection
@section('content')
    @include('home.breadcrumb', [
        'dark' => false,
        'items' => [
            [
                'link' => route('home.index'),
                'title' => 'Anasayfa',
            ],
            [
                'link' => route('home.course.index'),
                'title' => 'Kurslar',
            ],
            [
                'link' => '',
                'title' => $course->title,
            ],
        ],
    ])


    <section class="page-header -type-5 bg-light-6 text-dark-1">
        <div class="js-pin-container">
            <div class="page-header__bg">
                <div class="bg-image js-lazy" data-bg="img/event-single/bg.png"></div>
            </div>

            <div class="container">
                <div class="page-header__content pt-90 pb-90">
                    <div class="row y-gap-30 relative">
                        <div class="col-xl-7 col-lg-8">
                            {{-- <div class="d-flex x-gap-15 y-gap-10 pb-20">
                                    <div>
                                        <div class="badge px-15 py-8 text-11 bg-green-1 text-dark-1 fw-400 uppercase">Çok
                                            Satan
                                        </div>
                                    </div>
                                    <div>
                                        <div class="badge px-15 py-8 text-11 bg-orange-1 text-white fw-400 uppercase">Yenİ
                                        </div>
                                    </div>
                                    <div>
                                        <div class="badge px-15 py-8 text-11 bg-purple-1 text-white fw-400 uppercase">
                                            Popüler</div>
                                    </div>
                                </div> --}}

                            <div data-anim="slide-up delay-1">
                                <h1 class="text-30 lh-14 pr-60 lg:pr-0">{{ $course->title }}</h1>
                            </div>

                            <p class="col-xl-9 mt-20">{{ $course->description }}</p>

                            <div class="d-flex x-gap-30 y-gap-10 items-center flex-wrap pt-20">
                                <div class="d-flex items-center">
                                    <div class="text-14 lh-1 text-yellow-1 mr-10">
                                        {{ Str::limit($course->sumRate(), 3, '') }}</div>
                                    <div class="d-flex x-gap-5 items-center">
                                        @for ($i = 0; $i < $course->sumRate(); $i++)
                                            <div class="icon-star text-11 text-yellow-1"></div>
                                        @endfor
                                    </div>
                                </div>


                                <div class="d-flex items-center text-dark-1">
                                    <div class="icon icon-person-3 text-13"></div>
                                    <div class="text-14 ml-8"> kişi bu kursu satın aldı
                                    </div>
                                </div>

                                <div class="d-flex items-center text-dark-1">
                                    <div class="icon icon-wall-clock text-13"></div>
                                    <div class="text-14 ml-8">Son Güncelleme {{ $course->updated_at->format('m/Y') }}
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex items-center pt-20">
                                @if ($course->instructor->image)
                                    <div class="bg-image size-30 rounded-full js-lazy"
                                        data-bg="{{ $course->instructor->image }}">
                                    </div>
                                @else
                                    <span
                                        class="uppercase bg-black px-2 rounded-16 text-white">{{ Str::limit($course->instructor->fullname, 1, '') }}</span>
                                @endif
                                <div class="text-14 lh-1 ml-10">{{ $course->instructor->fullname }}</div>
                            </div>
                        </div>
                        <div class="courses-single-info">
                            <span class="js-pin-content"></span>
                            <div class="bg-white shadow-4 rounded-8 border-light py-10 px-10">
                                <div class="relative">
                                    <img class="w-1/1" src="{{ $course->image }}" style="height: 250px;" alt="image">
                                    @if ($course->play_list && $course->play_list->video)
                                        <div class="absolute-full-center d-flex justify-center items-center">
                                            <a href="{{ $course->play_list->video->link }}"
                                                class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery"
                                                data-gallery="gallery1">
                                                <div class="icon-play text-18"></div>
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="courses-single-info__content pt-30 px-20" style="overflow:hidden;">
                                    <div class="d-flex justify-between items-center">
                                        <div class="text-24 lh-1 text-dark-1 fw-500">{{ $course->price }}₺</div>
                                        <div class="lh-1 line-through"></div>
                                    </div>
                                    @if ($course->status == 0)
                                        <button type="button" disabled class="button -md -dark-1 text-white"
                                            style="width:100%;">Çok
                                            Yakında</button>
                                    @else
                                        @if (auth()->user())
                                            @if (auth()->user()->membership_type == 'customer' &&
                                                    auth()->user()->customer->courseContent($course->id))
                                                @if ($course->play_list && $course->play_list->video)
                                                    <a href="{{ route('home.course.lessons', [$course, $course->play_list->video->slug]) }}"
                                                        class="button -md -dark-1 text-white">Eğitime
                                                        Git</a>
                                                @endif
                                                @if ($course->document)
                                                    <a href="{{ $course->document->image }}" download
                                                        class="button -md -outline-dark-1 text-dark-1 w-1/1 mt-10">Döküman
                                                        İndir</a>
                                                @endif
                                            @elseif (auth()->user()->membership_type != 'customer')
                                                @if ($course->play_list && $course->play_list->video)
                                                    <a href="{{ route('home.course.lessons', [$course, $course->play_list->video->slug]) }}"
                                                        class="button -md -dark-2 text-white">Eğitime
                                                        Git</a>
                                                @endif
                                            @else
                                                <a href="{{ route('account.add-to-cart', $course) }}"
                                                    class="button -md -purple-1 text-white w-1/1">Sepete
                                                    Ekle</a>
                                                <a href="{{ route('home.order-summary.course', $course) }}"
                                                    class="button -md -outline-dark-1 text-dark-1 w-1/1 mt-10">Kursa
                                                    Katıl</a>
                                            @endif
                                        @else
                                            <a href="{{ route('account.add-to-cart', $course) }}"
                                                class="button -md -purple-1 text-white w-1/1">Sepete Ekle</a>
                                            <a href="{{ route('home.order-summary.course', $course) }}"
                                                class="button -md -outline-dark-1 text-dark-1 w-1/1 mt-10">Kursa
                                                Katıl</a>
                                        @endif
                                    @endif

                                    {{-- <div class="text-14 lh-1 text-center mt-30">30-Day Money-Back Guarantee</div> --}}

                                    <div class="mt-25">
                                        <div class="d-flex justify-between py-8 ">
                                            <div class="d-flex items-center text-dark-1">
                                                <div class="icon-video-file"></div>
                                                <div class="ml-10">Dersler</div>
                                            </div>
                                            <div>{{ $course->lessonCount() }}</div>
                                        </div>

                                        <div class="d-flex justify-between py-8 border-top-light">
                                            <div class="d-flex items-center text-dark-1">
                                                <div class="icon-translate"></div>
                                                <div class="ml-10">Dil</div>
                                            </div>
                                            <div>Türkçe</div>
                                        </div>

                                        <div class="d-flex justify-between py-8 border-top-light">
                                            <div class="d-flex items-center text-dark-1">
                                                <div class="icon-badge"></div>
                                                <div class="ml-10">Katılım Belgesi</div>
                                            </div>
                                            <div> Evet </div>
                                        </div>

                                        <div class="d-flex justify-between py-8 border-top-light">
                                            <div class="d-flex items-center text-dark-1">
                                                <div class="icon-infinity"></div>
                                                <div class="ml-10">Ömür Boyu Erişim</div>
                                            </div>
                                            <div>Evet</div>
                                        </div>

                                        <div class="d-flex justify-between py-8 border-top-light">
                                            <div class="d-flex items-center text-dark-1">
                                                <div class="icon-infinity"></div>
                                                <div class="ml-10">Ömür Boyu Destek</div>
                                            </div>
                                            <div>Evet</div>
                                        </div>

                                        <div class="d-flex justify-between py-8 border-top-light">
                                            <div class="d-flex items-center text-dark-1">
                                                <div class="icon-puzzle"></div>
                                                <div class="ml-10">Birebir Eğitim</div>
                                            </div>
                                            <div>Evet</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-md text-dark-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-nav-menu -line">
                        <div class="d-flex x-gap-30">
                            <div><button class="pb-12 page-nav-menu__link is-active"
                                    onclick="openTab(event, 'overview')">Genel
                                    Bakış</button>
                            </div>
                            <div><button class="pb-12 page-nav-menu__link" onclick="openTab(event, 'course-content')">Eğitim
                                    İçeriği</button>
                            </div>
                            <div><button class="pb-12 page-nav-menu__link"
                                    onclick="openTab(event, 'instructors')">Eğitmen</button>
                            </div>
                            <div><button class="pb-12 page-nav-menu__link"
                                    onclick="openTab(event, 'reviews')">Yorumlar</button>
                            </div>
                        </div>
                    </div>

                    <div id="overview" class="pt-60 lg:pt-40 to-over tab">
                        <h4 class="text-18 fw-500">Açıklama</h4>

                        <div class="show-more mt-30">
                            <div class="ck-content">
                                {!! $course->content !!}
                            </div>
                        </div>
                    </div>

                    <div id="course-content" class="pt-60 lg:pt-40 tab">
                        <h2 class="text-20 fw-500">Eğitim İçeriği</h2>

                        <div class="d-flex justify-between items-center mt-30">
                            <div class="">{{ $playLists->count() }} bölüm •
                                {{ $course->lessonCount() }} ders</div>
                            <button class="underline text-purple-1" onclick="expandAll()">Tüm Bölümleri
                                Aç</button>
                        </div>

                        <div class="mt-10">
                            <div class="accordion -block-2 text-left js-accordion">
                                @foreach ($playLists as $playList)
                                    <div class="accordion__item">
                                        <div class="accordion__button py-20 px-30 bg-light-4">
                                            <div class="d-flex items-center">
                                                <div class="accordion__icon">
                                                    <div class="icon" data-feather="chevron-down"></div>
                                                    <div class="icon" data-feather="chevron-up"></div>
                                                </div>
                                                <span class="text-17 fw-500 text-dark-1">{{ $playList->title }}</span>
                                            </div>

                                            <div>{{ $playList->videos->count() }} ders</div>
                                        </div>

                                        <div class="accordion__content">
                                            <div class="accordion__content__inner px-30 py-30">
                                                <div class="y-gap-20">
                                                    @foreach ($playList->videos->where('status', '1') as $video)
                                                        <div class="d-flex justify-between">
                                                            <div class="d-flex items-center">
                                                                <div
                                                                    class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                                                    <div class="icon-play text-9"></div>
                                                                </div>
                                                                <div>{{ $video->name }}</div>
                                                            </div>

                                                            <div class="d-flex x-gap-20 items-center">
                                                                @if ($video->preview == 1)
                                                                    <a href="{{ $video->link }}"
                                                                        class="text-14 lh-1 text-purple-1 underline js-gallery"
                                                                        data-gallery="gallery2">Ön İzle</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div id="instructors" class="pt-60 lg:pt-40 tab">
                        <h2 class="text-20 fw-500">Eğitmen</h2>

                        <div class="mt-30">
                            <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                                <div class="size-120">
                                    @if ($course->instructor->image)
                                        <img class="object-cover" style="border-radius: 999px; width: 100%; height: 100%;"
                                            src="{{ $course->instructor->image }}"
                                            alt="{{ $course->instructor->fullname }}">
                                    @else
                                        <span class="uppercase bg-black text-white text-center"
                                            style="border-radius: 999px; width: 100px; height: 100px; font-size: 50px; display:block; line-height: 100px;">{{ Str::limit($course->instructor->fullname, 1, '') }}</span>
                                    @endif
                                </div>

                                <div class="">
                                    <h5 class="text-17 lh-14 fw-500">
                                        <a
                                            href="{{ route('home.instructors.detail', $course->instructor) }}">{{ $course->instructor->fullname }}</a>
                                    </h5>

                                    <div class="d-flex x-gap-20 y-gap-10 flex-wrap items-center pt-10">
                                        {{-- <div class="d-flex items-center">
                                                <div class="d-flex items-center mr-8">
                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                    <div class="text-14 lh-12 text-yellow-1 ml-5">
                                                        {{ $course->instructor->courses()->withCount('customer_feedbacks')->get() }}
                                                    </div>
                                                </div>
                                                <div class="text-13 lh-1">Instructor Rating</div>
                                            </div> --}}

                                        <div class="d-flex items-center text-dark-1">
                                            <div class="icon-comment text-13 mr-8"></div>
                                            <div class="text-13 lh-1">
                                                {{ $course->instructor->feedbackCount() }}
                                                Yorumlar</div>
                                        </div>

                                        <div class="d-flex items-center text-dark-1">
                                            <div class="icon-person-3 text-13 mr-8"></div>
                                            <div class="text-13 lh-1">
                                                {{ $course->instructor->studentCount() }}
                                                Öğrenci
                                            </div>
                                        </div>

                                        <div class="d-flex items-center text-dark-1">
                                            <div class="icon-wall-clock text-13 mr-8"></div>
                                            <div class="text-13 lh-1">{{ $course->instructor->courses->count() }}
                                                Kurs
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="mt-30">
                                {{ $course->instructor->instructor->about }}
                            </div>
                        </div>
                    </div>

                    <div id="reviews" class="pt-60 lg:pt-40 tab">
                        <div class="blogPost -comments">
                            <div class="blogPost__content">
                                <h2 class="text-20 fw-500">Öğrenci Yorumları</h2>
                                <div class="row x-gap-10 y-gap-10 pt-30">
                                    <div class="col-md-4">
                                        <div
                                            class="d-flex items-center justify-center flex-column py-50 text-center bg-light-6 rounded-8">
                                            <div class="text-60 lh-11 text-dark-1 fw-500">
                                                {{ Str::limit($course->sumRate(), 3, '') }}
                                            </div>
                                            <div class="d-flex x-gap-5 mt-10">
                                                @for ($i = 0; $i < $course->sumRate(); $i++)
                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                @endfor
                                            </div>
                                            <div class="mt-10">Kurs Değerlendirmesi</div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="py-20 px-30 bg-light-6 rounded-8">
                                            <div class="row y-gap-15">

                                                <div class="col-12">
                                                    <div class="d-flex items-center">
                                                        <div class="progress-bar w-1/1 mr-15">
                                                            <div class="progress-bar__bg bg-light-12"></div>
                                                            <div class="progress-bar__bar bg-purple-1"
                                                                style="width: {{ $course->rate(1) }}%"></div>
                                                        </div>
                                                        <div class="d-flex x-gap-5 pr-15">
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                        </div>
                                                        <div class="text-dark-1">{{ $course->rate(1) }}%</div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-flex items-center">
                                                        <div class="progress-bar w-1/1 mr-15">
                                                            <div class="progress-bar__bg bg-light-12"></div>
                                                            <div class="progress-bar__bar bg-purple-1"
                                                                style="width: {{ $course->rate(2) }}%"></div>
                                                        </div>
                                                        <div class="d-flex x-gap-5 pr-15">
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                        </div>
                                                        <div class="text-dark-1">{{ $course->rate(2) }}%</div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-flex items-center">
                                                        <div class="progress-bar w-1/1 mr-15">
                                                            <div class="progress-bar__bg bg-light-12"></div>
                                                            <div class="progress-bar__bar bg-purple-1"
                                                                style="width: {{ $course->rate(3) }}%"></div>
                                                        </div>
                                                        <div class="d-flex x-gap-5 pr-15">
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                        </div>
                                                        <div class="text-dark-1">{{ $course->rate(3) }}%</div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-flex items-center">
                                                        <div class="progress-bar w-1/1 mr-15">
                                                            <div class="progress-bar__bg bg-light-12"></div>
                                                            <div class="progress-bar__bar bg-purple-1"
                                                                style="width: {{ $course->rate(4) }}%"></div>
                                                        </div>
                                                        <div class="d-flex x-gap-5 pr-15">
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                        </div>
                                                        <div class="text-dark-1">{{ $course->rate(4) }}%</div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-flex items-center">
                                                        <div class="progress-bar w-1/1 mr-15">
                                                            <div class="progress-bar__bg bg-light-12"></div>
                                                            <div class="progress-bar__bar bg-purple-1"
                                                                style="width: {{ $course->rate(5) }}%"></div>
                                                        </div>
                                                        <div class="d-flex x-gap-5 pr-15">
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                            <div class="icon-star text-11 text-yellow-1"></div>
                                                        </div>
                                                        <div class="text-dark-1">{{ $course->rate(5) }}%</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="text-20 fw-500 mt-60 lg:mt-40">Geri Bildirimler</h2>
                                <ul class="comments__list mt-30">
                                    @foreach ($customerFeedbacks as $feedback)
                                        <li class="comments__item">
                                            <div class="comments__item-inner md:direction-column">
                                                <div class="comments__img mr-20">
                                                    <div class="bg-image rounded-full js-lazy"
                                                        data-bg="{{ $feedback->customer->user->image }}"></div>
                                                </div>

                                                <div class="comments__body md:mt-15">
                                                    <div class="comments__header">
                                                        <h4 class="text-17 fw-500 lh-15">
                                                            {{ $feedback->customer->user->fullname }}
                                                            <span
                                                                class="text-13 text-dark-1 fw-400">{{ $feedback->created_at->diffForHumans() }}</span>
                                                        </h4>
                                                        <div class="rate d-flex x-gap-5">
                                                            @for ($i = 0; $i < $feedback->rate; $i++)
                                                                <div class="icon-star text-11 text-yellow-1"></div>
                                                            @endfor
                                                        </div>
                                                    </div>

                                                    <h5 class="text-15 fw-500 mt-15">{{ $feedback->title }}</h5>
                                                    <div class="comments__text mt-10">
                                                        <p>
                                                            {{ $feedback->message }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                    <li class="comments__item">
                                        <div class="d-flex justify-center">
                                            <button class="text-purple-1 lh-12 underline fw-500">Bütün Geri
                                                Bildirimleri Gör</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if (auth()->user())
                            @if (auth()->user()->membership_type != 'customer' ||
                                    (auth()->user()->membership_type == 'customer' &&
                                        auth()->user()->customer->courseContent($course->id)))
                                <div class="respondForm pt-60">
                                    <h3 class="text-20 fw-500">
                                        Yorum Yaz
                                    </h3>


                                    <form class="contact-form respondForm__form row y-gap-30 pt-30"
                                        action="{{ route('home.course.feedback.send', $course) }}" method="post">
                                        @csrf
                                        <div class="mt-30">
                                            <h4 class="text-16 fw-500">Bu Kurs İhtiyaçlarınızı Karşıladı mı?</h4>
                                            <div class="form-group">
                                                <span class="text-danger d-block">{{ $errors->first('rate') }}</span>
                                                <div class="rating">
                                                    <label>
                                                        <input type="radio" name="rate" value="1" />
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rate" value="2" />
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rate" value="3" />
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rate" value="4" />
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rate" value="5" />
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                        <span class="icon" style="font-size: 30px;">★</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Başlık</label>
                                            <small class="text-red-1 d-inline error" id="titleError"></small>
                                            <input type="text" name="title" placeholder="Kurs Muhteşem">
                                        </div>
                                        <div class="col-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Mesaj</label>
                                            <small class="text-red-1 d-inline error" id="messageError"></small>
                                            <textarea name="message" placeholder="Mesaj" rows="8"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" name="submit" id="submit"
                                                onclick="reviewValidation(event)" class="button -md -purple-1 text-white">
                                                Gönder
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        const tabLinks = document.querySelectorAll(".page-nav-menu__link")
        const tabs = document.querySelectorAll(".tab");

        document.getElementById("overview").style.display = "block";

        function openTab(event, tabName) {
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none"
            }
            for (let i = 0; i < tabLinks.length; i++) {
                tabLinks[i].className = tabLinks[i].className.replace(" is-active", "");
            }
            document.getElementById(tabName).style.display = "block";
            event.currentTarget.className += " is-active";
        }

        function expandAll() {
            const sections = document.querySelectorAll(".accordion__item"),
                total = sections.length;
            for (let i = 0; i < total; i++) {
                if (!sections[i].classList.contains("is-active")) {
                    sections[i].className += " is-active";
                    sections[i].querySelector(".accordion__content").style.maxHeight =
                        `${sections[i].querySelector(".accordion__content__inner").clientHeight}px`
                }
            }
        }

        const submit = document.getElementById("submit");
        const title = document.querySelector("input[name='title']");
        const message = document.querySelector("textarea[name='message']");

        const titleError = document.querySelector("#titleError");
        const messageError = document.querySelector("#messageError");
        const rateError = document.querySelector("#rateError");

        function reviewValidation(event) {
            if (title.value == "") {
                titleError.innerHTML = "Başlık boş bırakılamaz"
                return false
            } else titleError.innerHTML = ""
            if (message.value == "") {
                messageError.innerHTML = "Mesaj boş bırakılamaz"
                return false
            } else messageError.innerHTML = ""
            event.target.type = "submit"
        }
    </script>
@endsection
