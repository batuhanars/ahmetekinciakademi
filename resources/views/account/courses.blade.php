@extends('account.layout.main')
@section('title', 'Kurslarım')
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">Eğitim İçeriğim</h1>
                <div class="mt-10 text-dark-1">Kayıt olduğunuz kurslara buradan erişebilirsiniz.</div>

            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs">


                        <div class="tabs__content py-30 px-30 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <div class="row y-gap-30 pt-30">
                                    @forelse ($courses as $course)
                                        <div class="w-1/5 xl:w-1/3 lg:w-1/2 sm:w-1/1">
                                            <a
                                                href="@if ($course->play_list) {{ route('home.course.lessons', [$course, $course->play_list->video->slug]) }} @endif">
                                                <div class="relative">
                                                    <img class="rounded-8 w-1/1" src="{{ $course->image }}"
                                                        alt="{{ $course->title }}">
                                                </div>

                                                <div class="pt-15">
                                                    <div class="d-flex y-gap-10 justify-between items-center">
                                                        <div class="text-14 lh-1 text-dark-1">
                                                            {{ $course->instructor->fullname }}</div>

                                                        <div class="d-flex items-center">
                                                            <div class="text-14 lh-1 text-yellow-1 mr-10">
                                                                {{ $course->sumRate() }}</div>
                                                            <div class="d-flex x-gap-5 items-center">
                                                                @for ($i = 0; $i < $course->sumRate(); $i++)
                                                                    <i class="icon-star text-9 text-yellow-1"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h3 class="text-16 fw-500 lh-15 mt-10 d-flex justify-content-between">
                                                        {{ $course->title }}
                                                    </h3>
                                                </div>
                                            </a>
                                        </div>
                                    @empty
                                        <div class="d-flex justify-content-center">
                                            Şu anda herhangi bir veri yok
                                        </div>
                                    @endforelse

                                </div>

                                <div class="row justify-center pt-30">
                                    <div class="col-auto">
                                        {{ $courses->links('vendor.pagination.custom') }}
                                    </div>
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-2"></div>
                            <div class="tabs__pane -tab-item-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
