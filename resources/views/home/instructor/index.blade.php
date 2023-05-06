@extends('home.layout.page-layout')
@section('title', 'Eğitmenler')
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
                'title' => 'Eğitmenler',
            ],
        ],
    ])


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Eğitmenler</h1>

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


    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-20 items-center justify-between pb-30">
                {{-- <div class="col-auto">
                    <div class="text-14 lh-12">Showing <span class="text-dark-1 fw-500">250</span> total results</div>
                </div> --}}

                {{-- <div class="col-auto">
                    <div class="row x-gap-20 y-gap-20 items-center">
                        <div class="col-auto">
                            <form class="search-field h-50" action="https://creativelayers.net/themes/educrat-html/post">
                                <input class="bg-light-3 pr-50" type="text" placeholder="Search Instructors">
                                <button class="" type="submit">
                                    <i class="icon-search text-20"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-auto">

                            <div class="dropdown js-dropdown js-category-active">
                                <div class="dropdown__button d-flex items-center text-14 rounded-8 px-20 py-10 text-14 lh-12"
                                    data-el-toggle=".js-category-toggle" data-el-toggle-active=".js-category-active">
                                    <span class="js-dropdown-title">Category</span>
                                    <i class="icon text-9 ml-40 icon-chevron-down"></i>
                                </div>

                                <div
                                    class="toggle-element -dropdown -dark-bg-dark-2 -dark-border-white-10 js-click-dropdown js-category-toggle">
                                    <div class="text-14 y-gap-15 js-dropdown-list">

                                        <div><a href="#" class="d-block js-dropdown-link">Animation</a></div>

                                        <div><a href="#" class="d-block js-dropdown-link">Design</a></div>

                                        <div><a href="#" class="d-block js-dropdown-link">Illustration</a></div>

                                        <div><a href="#" class="d-block js-dropdown-link">Business</a></div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-auto">

                            <div class="dropdown js-dropdown js-category-active">
                                <div class="dropdown__button d-flex items-center text-14 rounded-8 px-20 py-10 text-14 lh-12"
                                    data-el-toggle=".js-category-toggle" data-el-toggle-active=".js-category-active">
                                    <span class="js-dropdown-title">Sort by: Default</span>
                                    <i class="icon text-9 ml-40 icon-chevron-down"></i>
                                </div>

                                <div
                                    class="toggle-element -dropdown -dark-bg-dark-2 -dark-border-white-10 js-click-dropdown js-category-toggle">
                                    <div class="text-14 y-gap-15 js-dropdown-list">

                                        <div><a href="#" class="d-block js-dropdown-link">Animation</a></div>

                                        <div><a href="#" class="d-block js-dropdown-link">Design</a></div>

                                        <div><a href="#" class="d-block js-dropdown-link">Illustration</a></div>

                                        <div><a href="#" class="d-block js-dropdown-link">Business</a></div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="row y-gap-30">
                @foreach ($users as $user)
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('home.instructors.detail', $user) }}" data-anim-child="slide-left delay-2"
                            class="teamCard -type-1">
                            <div class="teamCard__image text-dark-1">
                                <img src="{{ $user->image }}" alt="{{ $user->fullname }}">
                            </div>
                            <div class="teamCard__content">
                                <h4 class="teamCard__title">{{ $user->fullname }}</h4>
                                <p class="teamCard__text text-dark-1">{{ $user->instructor->profession }}</p>
                                <div class="d-flex x-gap-10 pt-10">
                                    {{-- <div class="d-flex items-center">
                                        <div class="icon-star text-yellow-1 text-14"></div>
                                        <div class="text-13 lh-1 ml-8">4.5</div>
                                    </div> --}}

                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-person-3 text-14"></div>
                                        <div class="text-13 lh-1 ml-8">{{ $user->feedbackCount() }} Öğrenci
                                        </div>
                                    </div>

                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-play text-14"></div>
                                        <div class="text-13 lh-1 ml-8">{{ $user->courses->count() }} Kurs</div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

            <div class="row justify-center pt-60 lg:pt-40">
                <div class="col-auto">
                    {{ $users->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </section>
@endsection
