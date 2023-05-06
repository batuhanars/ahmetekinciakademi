@extends('home.layout.page-layout')
@section('title', $page->title)
@section('keywords', $page->seo_keywords)
@section('description', $page->seo_description)

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
                'title' => $page->title,
            ],
        ],
    ])


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">


                            <h1 class="page-header__title lh-14">{{ $page->title }}
                            </h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($page->image)
        <section class="layout-pt-md">
            <div class="container">
                <div class="ratio ratio-16:9 rounded-8 bg-image js-lazy" data-bg="{{ $page->image }}"></div>
            </div>
        </section>
    @endif

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="blogSection">
                <div class="blogCard">
                    <div class="row justify-center">
                        <div class="col-xl-8 col-lg-9 col-md-11">
                            <div class="blogCard__content ck-content">
                                {!! $page->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
