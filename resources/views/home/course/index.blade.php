@extends('home.layout.page-layout')
@section('title', 'Kurslar')
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
                'title' => 'Kurslar',
            ],
        ],
    ])
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Eğitimler</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-lg">
        <div data-anim="slide-up delay-2" class="container">
            <div class="row y-gap-20 items-center justify-between pb-30">
                <div class="col-lg-6">
                    <div class="text-14 lh-12 text-dark-1">{{ $courses->total() }}</span> kayıttan
                        {{ $courses->firstItem() }} ile {{ $courses->lastItem() }} arasında gösteriliyor</div>
                </div>

                <div class="col-6">
                    <div class="row x-gap-20 y-gap-20 justify-content-end">
                        <div class="col-auto">
                            <form>
                                <input type="text" class="form-control" name="kurs"
                                    value="{{ request()->get('kurs') }}" placeholder="Kurs Ara...">
                            </form>

                        </div>
                        {{-- <div class="col-auto">

                            <div class="dropdown js-dropdown js-ratings-active">
                                <div class="dropdown__button d-flex items-center text-14 rounded-8 px-20 py-10 text-14 lh-12"
                                    data-el-toggle=".js-ratings-toggle" data-el-toggle-active=".js-ratings-active">
                                    <span class="js-dropdown-title">Puan</span>
                                    <i class="icon text-9 ml-40 icon-chevron-down"></i>
                                </div>

                                <div
                                    class="toggle-element -dropdown -dark-bg-dark-2 -dark-border-white-10 js-click-dropdown js-ratings-toggle">
                                    <div class="text-14 y-gap-15 js-dropdown-list">

                                        <div><a href="{{ route('home.course.index', ['puan' => 5]) }}"
                                                class="d-block js-dropdown-link">5</a></div>

                                        <div><a href="{{ route('home.course.index', ['puan' => 4]) }}"
                                                class="d-block js-dropdown-link">4</a></div>

                                        <div><a href="{{ route('home.course.index', ['puan' => 3]) }}"
                                                class="d-block js-dropdown-link">3</a></div>

                                        <div><a href="{{ route('home.course.index', ['puan' => 2]) }}"
                                                class="d-block js-dropdown-link">2</a></div>

                                        <div><a href="{{ route('home.course.index', ['puan' => 1]) }}"
                                                class="d-block js-dropdown-link">1</a></div>

                                    </div>
                                </div>
                            </div>

                        </div> --}}

                        @if (request()->get('kurs'))
                            <div class="col-auto">
                                <a href="{{ route('home.course.index') }}" class="button -light-1 text-white px-15 py-15">
                                    <i class="fas fa-sync"></i>
                                </a>
                            </div>
                        @endif

                        {{-- <div class="col-auto">

                            <div class="dropdown js-dropdown js-instructors-active">
                                <div class="dropdown__button d-flex items-center text-14 rounded-8 px-20 py-10 text-14 lh-12"
                                    data-el-toggle=".js-instructors-toggle" data-el-toggle-active=".js-instructors-active">
                                    <span class="js-dropdown-title">Eğitmen</span>
                                    <i class="icon text-9 ml-40 icon-chevron-down"></i>
                                </div>

                                <div
                                    class="toggle-element -dropdown -dark-bg-dark-2 -dark-border-white-10 js-click-dropdown js-instructors-toggle">
                                    <div class="text-14 y-gap-15 js-dropdown-list">

                                        <div><a href="#" class="d-block js-dropdown-link">Jane Cooper</a></div>

                                    </div>
                                </div>
                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row y-gap-30">
                @foreach ($courses as $course)
                    <div class=" col-lg-4 col-md-6">

                        <a href="{{ route('home.course.detail', $course) }}" class="coursesCard -type-1 ">
                            <div class="relative">
                                <div class="coursesCard__image overflow-hidden rounded-8">
                                    <img class="w-1/1" src="{{ $course->image }}" alt="{{ $course->title }}"
                                        style="height:250px;">
                                    <div class="coursesCard__image_overlay rounded-8"></div>
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

                            <div class="h-100 pt-15">
                                <div class="d-flex items-center">
                                    <div class="text-14 lh-1 text-yellow-1 mr-10">{{ $course->sumRate() }}</div>
                                    <div class="d-flex x-gap-5 items-center">
                                        @for ($i = 0; $i < $course->sumRate(); $i++)
                                            <div class="icon-star text-9 text-yellow-1"></div>
                                        @endfor
                                    </div>
                                </div>

                                <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $course->title }}</div>

                                <div class="d-flex x-gap-10 items-center pt-10">

                                    <div class="d-flex items-center">
                                        <div class="mr-8">
                                            <img src="{{ asset('assets/front') }}/img/coursesCards/icons/1.svg"
                                                alt="icon">
                                        </div>
                                        <div class="text-14 lh-1 text-dark-1">{{ $course->lessonCount() }} ders</div>
                                    </div>

                                </div>

                                <div class="coursesCard-footer">
                                    {{-- <div class="coursesCard-footer__author">
                                        <img src="{{ $course->user->image }}" alt="{{ $course->user->fullname }}">
                                        <div>{{ $course->user->fullname }}</div>
                                    </div> --}}

                                    <div class="coursesCard-footer__price">
                                        <div></div>
                                        <div>{{ $course->price }}₺ + KDV</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach

            </div>

            <div class="row justify-center pt-90 lg:pt-50">
                <div class="col-auto">
                    {{ $courses->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </section>
@endsection
