@extends('home.layout.page-layout')
@section('title', $help->title)
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
            [
                'link' => '',
                'title' => $help->title,
            ],
        ],
    ])
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title lh-14">{{ $help->title }}</h1>


                            <p class="page-header__text">{{ $help->content }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row y-gap-30">
                        @foreach ($blogs as $blog)
                            <div data-anim-child="slide-up delay-3" class="col-lg-4 col-md-6 is-in-view">
                                <a href="{{ route('home.blog.detail', $blog) }}" class="blogCard -type-1">
                                    <div class="blogCard__image">
                                        <img class="w-1/1 rounded-8" src="{{ $blog->image }}" alt="{{ $blog->title }}">
                                    </div>
                                    <div class="blogCard__content mt-20">
                                        <h4 class="blogCard__title text-18 lh-15 fw-500 mt-5">{{ $blog->title }}</h4>
                                        <div class="blogCard__date mt-5">{{ $blog->created_at->translatedFormat('F d, Y') }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-3">
                    <div data-anim="slide-up delay-3" class="sidebar -blog is-in-view">
                        <div class="sidebar__item">
                            <h5 class="sidebar__title">Diğer Konular</h5>

                            <div class="sidebar-content -list">
                                @foreach ($helps as $help)
                                    <a class="text-dark-1"
                                        href="{{ route('home.help-center.detail', $help) }}">{{ $help->title }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
