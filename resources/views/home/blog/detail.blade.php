@extends('home.layout.page-layout')
@section('title', $blog->title)
@section('keywords', $blog->seo_keywords)
@section('description', $blog->seo_description)
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
                'title' => $blog->title,
            ],
        ],
    ])
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title lh-14">{{ $blog->title }}
                            </h1>


                            <p class="page-header__text">{{ $blog->created_at->translatedFormat('F d, Y') }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="layout-pt-md">
                    <div class="container">
                        <div class="ratio ratio-16:9 rounded-8 bg-image js-lazy" data-bg="{{ $blog->image }}"></div>
                    </div>
                </section>

                <section class="layout-pt-md layout-pb-lg">
                    <div class="container">
                        <div class="blogSection">
                            <div class="blogCard">
                                <div class="row justify-center">
                                    <div class="col-xl-12 col-lg-9 col-md-11">
                                        <div class="blogCard__content ck-content">
                                            {!! $blog->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-center pt-30">
                                <div class="col-xl-12 col-lg-9 col-md-11">
                                    <div class="d-flex border-bottom-light border-top-light py-30">
                                        <div class="">
                                            @if ($blog->user->image)
                                                <div class="bg-image size-70 rounded-full js-lazy"
                                                    data-bg="{{ $blog->user->image }}"></div>
                                            @else
                                                <span class="uppercase bg-black text-white text-center"
                                                    style="border-radius: 999px; width: 120px; height: 120px; font-size: 50px; display:block; line-height: 120px;">{{ Str::limit($blog->user->fullname, 1, '') }}</span>
                                            @endif

                                        </div>

                                        <div class="ml-30 md:ml-20">
                                            <h4 class="text-17 lh-15 fw-500">
                                                <a
                                                    href="{{ route('home.instructors.detail', $blog->user) }}">{{ $blog->user->fullname }}</a>
                                            </h4>
                                            <div class="mt-5">{{ $blog->user->instructor->profession }}</div>
                                            <p class="mt-25">{{ $blog->user->instructor->about }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-center">
                                <div class="col-xl-12 col-lg-9 col-md-11">
                                    <div class="border-bottom-light py-30">
                                        <div class="row x-gap-50 justify-between items-center">
                                            @if ($prevBlog)
                                                <div class="col-md-4 col-6">
                                                    <a href="{{ route('home.blog.detail', $prevBlog) }}"
                                                        class="related-nav__item -prev decoration-none">
                                                        <div class="related-nav__arrow">
                                                            <i class="icon size-20 pt-5" data-feather="arrow-left"></i>
                                                        </div>
                                                        <div class="related-nav__content">
                                                            <div class="text-17 text-dark-1 fw-500">Önceki</div>
                                                            <p class="text-dark-1 mt-8">{{ $prevBlog->title }}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="col-auto lg:d-none">
                                                <div class="related-nav__icon row">

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                    <div class="col-4">
                                                        <span></span>
                                                    </div>

                                                </div>
                                            </div>
                                            @if ($nextBlog)
                                                <div class="col-md-4 col-6 d-flex justify-end">
                                                    <a href="{{ route('home.blog.detail', $nextBlog) }}"
                                                        class="related-nav__item -next text-right decoration-none">
                                                        <div class="related-nav__content">
                                                            <div class="text-17 text-dark-1 fw-500">Sonraki</div>
                                                            <p class="text-dark-1 mt-8">{{ $nextBlog->title }}
                                                            </p>
                                                        </div>
                                                        <div class="related-nav__arrow">
                                                            <i class="icon size-20 pt-5" data-feather="arrow-right"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3">

                <div data-anim="slide-up delay-3" class="sidebar -blog is-in-view">
                    <div class="sidebar__item">
                        <h5 class="sidebar__title">Categories</h5>

                        <div class="sidebar-content -list">

                            <a class="text-dark-1" href="#">College</a>

                            <a class="text-dark-1" href="#">Gym</a>

                            <a class="text-dark-1" href="#">High School</a>

                            <a class="text-dark-1" href="#">Primary</a>

                            <a class="text-dark-1" href="#">School</a>

                            <a class="text-dark-1" href="#">University</a>

                        </div>
                    </div>

                    <div class="sidebar__item">
                        <h5 class="sidebar__title">En Çok Okunan Haberler</h5>

                        <div class="sidebar-content -recent y-gap-20">
                            @foreach ($blogs as $blog)
                                <a href="{{ route('home.blog.detail', $blog) }}"
                                    class="sidebar-recent d-flex items-center">
                                    <div class="sidebar-recent__image mr-15">
                                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                                    </div>

                                    <div class="sidebar-recent__content">
                                        <h5 class="text-15 lh-15 fw-500">{{ $blog->title }}</h5>
                                        <div class="text-13 lh-1 mt-5">{{ $blog->created_at->translatedFormat('F d, Y') }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>

                    <div class="sidebar__item">
                        <h5 class="sidebar__title">Tags</h5>

                        <div class="sidebar-content -tags">

                            <div class="sidebar-tag">
                                <a class="text-11 fw-500 text-dark-1" href="#">Courses</a>
                            </div>

                            <div class="sidebar-tag">
                                <a class="text-11 fw-500 text-dark-1" href="#">Learn</a>
                            </div>

                            <div class="sidebar-tag">
                                <a class="text-11 fw-500 text-dark-1" href="#">Online</a>
                            </div>

                            <div class="sidebar-tag">
                                <a class="text-11 fw-500 text-dark-1" href="#">Education</a>
                            </div>

                            <div class="sidebar-tag">
                                <a class="text-11 fw-500 text-dark-1" href="#">LMS</a>
                            </div>

                            <div class="sidebar-tag">
                                <a class="text-11 fw-500 text-dark-1" href="#">Training</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
