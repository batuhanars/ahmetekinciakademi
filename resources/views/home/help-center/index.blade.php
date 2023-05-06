@extends('home.layout.page-layout')
@section('title', 'Yardım Merkeiz')
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
                'title' => 'Yardım',
            ],
        ],
    ])


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Nasıl yardımcı olabilirim?</h1>

                        </div>

                        <div data-anim="slide-up delay-2">

                            <p class="page-header__text">Amacım sizlere güvenilir, ilgi çekici ve derlenmiş içerikler
                                oluşturmak</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-6 col-lg-8">
                    <form class="form-single-field -help">
                        <input type="text" name="yardim" placeholder="Konu Başlığı"
                            value="{{ request()->get('yardim') }}">
                        @if (!request()->get('yardim'))
                            <button class="button -purple-1 text-white" type="submit">
                                <i class="icon-search text-20 mr-15"></i>
                                Ara
                            </button>
                        @else
                            <a href="{{ route('home.help-center') }}"></a>
                            <button type="button" onclick="this.form.querySelector('a').click()"
                                class="button -purple-1 text-white">
                                <i class="fas fa-sync text-20 mr-15"></i>
                                Temizle
                            </button>
                        @endif
                    </form>
                </div>
            </div>

            <div class="row y-gap-30 justify-between pt-90 lg:pt-50">
                @foreach ($helps as $help)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('home.help-center.detail', $help) }}"
                            class="py-40 px-45 rounded-16 bg-light-4 d-block">
                            <div class="d-flex justify-center items-center size-70 rounded-full bg-white">
                                <img src="{{ $help->icon }}" alt="{{ $help->title }}">
                            </div>
                            <h4 class="text-20 lh-11 fw-500 mt-25">{{ $help->title }}</h4>
                            <p class="mt-10">{{ $help->content }}</p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    @if ($faq->count())
        <section class="layout-pt-lg layout-pb-lg bg-light-4">
            <div class="container">
                <div class="row justify-center text-center">
                    <div class="col-xl-8 col-lg-9 col-md-11">

                        <div class="sectionTitle ">

                            <h2 class="sectionTitle__title ">Sıkça Sorulan Sorular.</h2>

                            <p class="sectionTitle__text ">Belkide sorularınızın cevabını burada bulabilirsiniz.</p>

                        </div>


                        <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">
                            @foreach ($faq as $f)
                                <div class="accordion__item">
                                    <div class="accordion__button">
                                        <div class="accordion__icon">
                                            <div class="icon" data-feather="plus"></div>
                                            <div class="icon" data-feather="minus"></div>
                                        </div>
                                        <span class="text-17 fw-500 text-dark-1">{{ $f->title }}</span>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="accordion__content__inner">
                                            <p>{{ $f->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
