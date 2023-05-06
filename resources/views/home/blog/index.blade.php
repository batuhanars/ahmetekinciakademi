@extends('home.layout.page-layout')
@section('title', 'Haberler')
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
                'title' => 'Haberler',
            ],
        ],
    ])
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Haberler</h1>

                        </div>

                        <div data-anim="slide-up delay-2">

                            <p class="page-header__text text-dark-1">Sektör hakkında en güncel haberleri buradan takip
                                edebilirsiniz.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-sm layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="tabs -pills js-tabs">
                {{-- <div data-anim-child="slide-up delay-3"
                    class="tabs__controls d-flex justify-center x-gap-10 js-tabs-controls">

                    <div>
                        <button class="tabs__button px-15 py-8 rounded-8 js-tabs-button is-active"
                            data-tab-target=".-tab-item-1" type="button">All Categories</button>
                    </div>

                    <div>
                        <button class="tabs__button px-15 py-8 rounded-8 js-tabs-button " data-tab-target=".-tab-item-2"
                            type="button">Animation</button>
                    </div>

                    <div>
                        <button class="tabs__button px-15 py-8 rounded-8 js-tabs-button " data-tab-target=".-tab-item-3"
                            type="button">Design</button>
                    </div>

                    <div>
                        <button class="tabs__button px-15 py-8 rounded-8 js-tabs-button " data-tab-target=".-tab-item-4"
                            type="button">Illustration</button>
                    </div>

                    <div>
                        <button class="tabs__button px-15 py-8 rounded-8 js-tabs-button " data-tab-target=".-tab-item-5"
                            type="button">Lifestyle</button>
                    </div>

                    <div>
                        <button class="tabs__button px-15 py-8 rounded-8 js-tabs-button " data-tab-target=".-tab-item-6"
                            type="button">Photo &amp; Film</button>
                    </div>

                    <div>
                        <button class="tabs__button px-15 py-8 rounded-8 js-tabs-button " data-tab-target=".-tab-item-7"
                            type="button">Business</button>
                    </div>

                    <div>
                        <button class="tabs__button px-15 py-8 rounded-8 js-tabs-button " data-tab-target=".-tab-item-8"
                            type="button">Writing</button>
                    </div>

                </div> --}}

                <div class="tabs__content pt-40 js-tabs-content">

                    <div class="tabs__pane -tab-item-1 is-active">
                        <div class="row y-gap-30">
                            @foreach ($blogs as $blog)
                                <div data-anim-child="slide-up delay-4" class="col-lg-4 col-md-6">
                                    <a href="{{ $blog->link }}" class="blogCard -type-1">
                                        <div class="blogCard__image">
                                            <img class="w-1/1 rounded-8 text-dark-1" src="{{ $blog->image }}"
                                                alt="{{ $blog->title }}">
                                        </div>
                                        <div class="blogCard__content mt-20">
                                            <h4 class="blogCard__title text-20 lh-15 fw-500 mt-5">{{ $blog->title }}</h4>
                                            <div class="blogCard__date text-14 mt-5 text-dark-1">
                                                {{ $blog->created_at->isoFormat('MMMM d, Y') }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                        <div class="row justify-center pt-60 lg:pt-40">
                            <div class="col-auto">
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
