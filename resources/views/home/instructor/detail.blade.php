@extends('home.layout.page-layout')
@section('title', $user->fullname)
{{-- @section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
@endsection --}}
@section('content')
    @include('home.breadcrumb', [
        'dark' => false,
        'items' => [
            [
                'link' => route('home.index'),
                'title' => 'Anasayfa',
            ],
            [
                'link' => route('home.instructors.index'),
                'title' => 'Eğitmenler',
            ],
            [
                'link' => '',
                'title' => $user->fullname,
            ],
        ],
    ])


    <section class="page-header -type-3">
        <div class="page-header__bg bg-dark-2"></div>
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="page-header__content">
                        <div class="page-header__img">
                            @if ($user->image)
                                <img src="{{ $user->image }}" alt="{{ $user->fullname }}"
                                    style="width: 120px; height: 120px; border-radius: 999px">
                            @else
                                <span class="uppercase bg-black text-white text-center"
                                    style="border-radius: 999px; width: 120px; height: 120px; font-size: 50px; display:block; line-height: 120px;">{{ Str::limit($user->fullname, 1, '') }}</span>
                            @endif

                        </div>

                        <div class="page-header__info pt-20">
                            <h1 class="text-30 lh-14 fw-700 text-white">{{ $user->fullname }}</h1>
                            <div class="text-white">{{ $user->instructor->profession }}</div>
                            <div class="d-flex x-gap-20 pt-15">

                                {{-- <div class="d-flex items-center text-white">
                                    <div class="icon-star mr-10"></div>
                                    <div class="text-13 lh-1">Eğitmen Puanı</div>
                                </div> --}}

                                <div class="d-flex items-center text-white">
                                    <div class="icon-video-file mr-10"></div>
                                    <div class="text-13 lh-1">{{ $user->feedbackCount() }} Geri Bildirim</div>
                                </div>

                                <div class="d-flex items-center text-white">
                                    <div class="icon-person-3 mr-10"></div>
                                    <div class="text-13 lh-1">{{ $user->studentCount() }} Öğrenci</div>
                                </div>

                                <div class="d-flex items-center text-white">
                                    <div class="icon-play mr-10"></div>
                                    <div class="text-13 lh-1">{{ $user->courses->count() }} Eğitim</div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex items-center mt-30">
                            {{-- <button class="button -md -green-1 text-dark-1 me-3" data-toggle="modal"
                                data-target="#exampleModal">Mesaj Gönder</button> --}}

                            <div class="d-flex items-center x-gap-20 text-white ml-4">
                                <a href="{{ $user->instructor->facebook }}" target="_blank"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="{{ $user->instructor->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="{{ $user->instructor->instagram }}" target="_blank"><i
                                        class="fa fa-instagram"></i></a>
                                <a href="{{ $user->instructor->linkedin }}" target="_blank"><i
                                        class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="tabs -active-purple-2 js-tabs">
                        <div class="tabs__controls d-flex js-tabs-controls">
                            <button class="tabs__button js-tabs-button is-active" data-tab-target=".-tab-item-1"
                                type="button">
                                Eğitmen Hakkında
                            </button>
                            <button class="tabs__button js-tabs-button ml-30" data-tab-target=".-tab-item-2" type="button">
                                Eğitimler
                            </button>
                        </div>

                        <div class="tabs__content pt-60 lg:pt-40 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <h4 class="text-20">Eğitmen Hakkında</h4>
                                <p class="text-light-1 mt-30">
                                    {{ $user->instructor->about }}
                                </p>
                                <button class="button underline text-purple-1 mt-30">Daha Fazla Göster</button>
                            </div>

                            <div class="tabs__pane -tab-item-2">
                                <div class="row">
                                    @foreach ($user->courses as $course)
                                        <div data-anim="slide-up delay-1" class="col-md-6">

                                            <a href="courses-single-1.html"
                                                class="coursesCard -type-1 rounded-8 shadow-3 bg-white">
                                                <div class="relative">
                                                    <div class="coursesCard__image overflow-hidden rounded-top-8">
                                                        <img class="w-1/1" src="{{ $course->image }}"
                                                            alt="{{ $course->title }}">
                                                        <div class="coursesCard__image_overlay rounded-top-8"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                    </div>
                                                </div>

                                                <div class="h-100 pt-20 pb-15 px-30">
                                                    <div class="d-flex items-center">
                                                        <div class="text-14 lh-1 text-yellow-1 mr-10">
                                                            {{ $course->sumRate() }}</div>
                                                        <div class="d-flex x-gap-5 items-center">
                                                            @for ($i = 0; $i < $course->sumRate(); $i++)
                                                                <div class="icon-star text-9 text-yellow-1"></div>
                                                            @endfor
                                                        </div>
                                                    </div>

                                                    <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">
                                                        {{ $course->title }}</div>

                                                    <div class="d-flex x-gap-10 items-center pt-10">

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img src="{{ asset('assets/front') }}/img/coursesCards/icons/1.svg"
                                                                    alt="icon">
                                                            </div>
                                                            <div class="text-14 lh-1">{{ $course->lessonCount() }} Ders
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="coursesCard-footer">
                                                        <div class="coursesCard-footer__author">
                                                            <img src="{{ $course->instructor->image }}"
                                                                alt="{{ $course->instructor->fullname }}">
                                                            <div>{{ $course->instructor->fullname }}</div>
                                                        </div>

                                                        <div class="coursesCard-footer__price">
                                                            <div></div>
                                                            <div>{{ $course->price }}₺</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eğitmene Mesaj Gönder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('home.instructor.message.send') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <label for="">Dosya <small>(Opsiyonel)</small></label>
                        <input type="file" name="file" class="form-control">
                        <label for="">Konu</label>
                        <input type="text" name="topic" class="form-control" style="border: 1px solid #ced4da;" />
                        <label for="">Mesaj</label>
                        <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
{{-- @section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        $('#exampleModal').on('shown.bs.modal')
    </script>
@endsection --}}
