@extends('lesson.main')
@section('title', $video->name)
@section('css')
    <style>
        .iframe-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 56.25%;
            /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
        }

        /* Then style the iframe to fit in the container div with full height and width */
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

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
    <section class="lesson-image" style="margin-top: 60px;">
        <div class="relative pt-40">
            {{-- <img class="w-1/1" src="{{ $video->image }}" alt="image"> --}}
            <div class=" d-flex justify-center items-center">
                {{-- <a href="{{ $video->link }}"
                    class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery"
                    data-gallery="gallery1">
                    <div class="icon-play text-18"></div>
                </a> --}}
                {{-- <div data-vimeo-id="{{ explode('/', $video->uri)[2] }}" data-vimeo-width="1400" class="rounded-16"
                    id="handstick">
                </div> --}}
                <div class="iframe-container">
                    <iframe class="responsive-iframe" src="{{ $video->player_embed_url }}" width="" height=""
                        frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </section>

    <div class="d-flex flex-column">
        <section class="layout-pt-md layout-pb-md">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="page-nav-menu -line">
                            <div class="d-flex x-gap-30">
                                <div><button class="pb-12 page-nav-menu__link is-active"
                                        onclick="openTab(event, 'overview')">Genel
                                        Bakış</button>
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
                                <div class="ck-content text-dark-1">
                                    {!! $course->content !!}
                                </div>
                            </div>
                        </div>

                        <div id="instructors" class="pt-60 lg:pt-40 tab">
                            <h2 class="text-20 fw-500">Eğitmen</h2>

                            <div class="mt-30">
                                <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                                    <div class="size-120">
                                        @if ($course->instructor->image)
                                            <img class="object-cover"
                                                style="border-radius: 999px; width: 100%; height: 100%;"
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
                                                <div class="mt-10 text-dark-1">Kurs Değerlendirmesi</div>
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
                                                        <div class="comments__text mt-10 text-dark-1">
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
                                                    onclick="reviewValidation(event)"
                                                    class="button -md -purple-1 text-white">
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

        <aside class="lesson-sidebar -type-2 lg:order-1">
            <div class="px-30 sm:px-20">
                <div class="d-flex justify-content-between align-items-center">
                    <form class="lesson-sidebar-search">
                        <input type="text" name="bolum" value="{{ request()->get('bolum') }}" placeholder="Ara">
                        <button class="" type="submit">
                            <i class="icon-search text-20"></i>
                        </button>
                    </form>
                    @if (request()->get('bolum'))
                        <a href="{{ route('home.course.lessons', [$course, $video->slug]) }}">
                            <i class="fas fa-sync"></i>
                        </a>
                    @endif
                </div>

                <div class="accordion -block-2 text-left js-accordion mt-30">
                    @foreach ($playLists as $playlist)
                        <div class="accordion__item">
                            <div class="accordion__button py-20 px-30 bg-light-4">
                                <div class="d-flex items-center">
                                    <div class="accordion__icon">
                                        <div class="icon" data-feather="chevron-down"></div>
                                        <div class="icon" data-feather="chevron-up"></div>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1">{{ $playlist->title }}</span>
                                </div>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner px-30 py-30">
                                    <div class="y-gap-30">
                                        @foreach ($playlist->videos as $video)
                                            <div class="lesson"
                                                data-uri="{{ route('home.course.lessons', [$course, $video->slug]) }}">
                                                <div class="d-flex">
                                                    <div
                                                        class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                                        <div class="icon-play text-9"></div>
                                                    </div>

                                                    <div class="">
                                                        <div>
                                                            <a href="{{ route('home.course.lessons', [$course, $video->slug]) }}"
                                                                class="text-dark-1">{{ $video->name }}</a>

                                                            @if (auth()->user()->customer->videos()->where('video_id', $video->id)->first()->status == 1)
                                                                <i class="fas fa-check ms-2 text-success-2"></i>
                                                            @endif
                                                        </div>
                                                    </div>
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
        </aside>
    </div>
@endsection
@section('js')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        let videos = document.querySelectorAll(".lesson")
        for (let j = 0; j < videos.length; j++) {
            console.log(videos[j].baseURI);
            if (videos[j].baseURI == videos[j].dataset.uri) {
                videos[j].querySelector("a").className = "text-purple-1";
                videos[j].parentElement.parentElement.parentElement.parentElement.className += " is-active"
                videos[j].parentElement.parentElement.parentElement.style.maxHeight =
                    `${videos[j].parentElement.parentElement.clientHeight}px`
            }
        }
        // const iframe = document.querySelector('iframe');

        // const options = {
        //     id: 59777392,
        //     width: 840,
        //     height: 840,
        //     loop: true
        // };

        // const player = new Vimeo.Player(iframe, options);

        // player.on('play', function() {
        //     console.log('played the video!');
        // });

        // player.getVideoTitle().then(function(title) {
        //     console.log('title:', title);
        // });

        // player.setVolume(1);

        // player.on('play', function() {
        //     console.log('played the video!');
        // });

        const handstickPlayer = new Vimeo.Player('handstick');
        handstickPlayer.on('play', function(data) {
            console.log(data)
            console.log('played the handstick video!');
        });
    </script>
@endsection
