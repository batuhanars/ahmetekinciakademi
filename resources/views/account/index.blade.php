@extends('account.layout.main')
@section('title', 'Hesap')
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row y-gap-30">

            <div class="col-xl-8 col-md-8">
                <div class="d-flex justify-content-between items-center py-30 px-30 rounded-16 shadow-4"
                    style="background: #0077FF; height: 200px;">
                    <div>
                        <div class="text-35 fw-700 text-white mb-20">
                            Merhaba {{ auth()->user()->fullname }}! 🎉
                        </div>
                        <div class="fw-500 text-white" style="">Seni aramızda gördüğümüz için oldukça
                            mutluyuz. <br> Eğitimlerine
                            devam
                            etmeyi unutma!</div>
                    </div>
                    <img src="{{ asset('assets') }}/Illustration-02.svg" class="mx-auto" alt=""
                        style="width: 340px; margin-bottom: 30px;">
                </div>
                <div class="row mt-30">
                    <div class="col-xl-5 col-md-5">
                        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                            <div class="d-flex justify-between align-items-center py-20 px-30 border-bottom-light">
                                <h2 style="margin: 0 !important;" class="text-16 fw-600">Eğitmen Mesajları</h2>
                                <a href="{{ route('account.messages') }}" class="text-14 text-purple-1 underline">Tümünü
                                    Gör</a>
                            </div>
                            <div class="py-30 px-30">
                                <div class="y-gap-40">
                                    @foreach ($conversations as $conversation)
                                        <div class="d-flex {{ $loop->first ? '' : 'border-top-light' }}">
                                            <div class="shrink-0">
                                                @if ($conversation->receiver->image)
                                                    <img src="{{ $conversation->receiver->image }}" class="size-50"
                                                        style="border-radius: 100px;"
                                                        alt="{{ $conversation->receiver->fullname }}">
                                                @else
                                                    <span class="uppercase text-white text-center fw-600"
                                                        style="border-radius: 999px; width: 50px; height: 50px; font-size: 24px; display:block; line-height: 50px; background: #0077ff;
">{{ Str::limit(auth()->user()->fullname, 2, '') }}</span>
                                                @endif
                                            </div>
                                            <div class="ml-15">
                                                <h4 class="text-15 lh-16 fw-500">{{ $conversation->receiver->fullname }}
                                                </h4>
                                                <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap text-dark-1">
                                                    <div class="text-14 lh-1" style="z-index:999;">
                                                        @foreach ($conversation->receiver->customerMessages as $message)
                                                            @if ($loop->last)
                                                                {{ $message->body }}
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-md-7">
                        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                            <div class="d-flex justify-between align-items-center py-20 px-30 border-bottom-light">
                                <h2 style="margin: 0 !important;" class="text-16 fw-600">Öğrenim İçeriğim</h2>
                                <a href="{{ route('account.courses') }}" class="text-14 text-purple-1 underline">Tümünü
                                    Gör</a>
                            </div>
                            <div class="py-30 px-30">
                                <div class="y-gap-40">
                                    @foreach ($courses as $course)
                                        <div
                                            class="d-flex {{ $loop->first ? '' : 'border-top-light' }} justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <div class="shrink-0">
                                                    <img src="{{ $course->image }}" class="size-50"
                                                        alt="{{ $course->title }}">
                                                </div>
                                                <div class="ml-15">
                                                    <h4 class="text-15 lh-16 fw-500">{{ $course->title }}</h4>
                                                    <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                                        <div class="d-flex items-center">
                                                            @if ($course->instructor->image)
                                                                <img class="size-16 object-cover mr-8"
                                                                    src="{{ $course->instructor->image }}"
                                                                    alt="{{ $course->instructor->fullname }}">
                                                            @else
                                                            @endif
                                                            <div class="text-14 lh-1 text-dark-1">
                                                                {{ $course->instructor->fullname }}
                                                            </div>
                                                        </div>
                                                        <div class="d-flex items-center text-dark-1">
                                                            <i class="icon-document text-16 mr-8"></i>
                                                            <div class="text-14 lh-1">{{ $course->lessonCount() }} ders
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="circlebar" data-circle-startTime="0"
                                                data-circle-maxValue="{{ $course->completeLessonCount($course) }}"
                                                data-circle-dialWidth="5" data-circle-size="60px"
                                                data-circle-Fontcolor="#333333" data-circle-Fontsize="16px"
                                                data-circle-type="progress">
                                                <div class="loader-bg">
                                                    <div class="text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex justify-between align-items-center py-20 px-30 border-bottom-light">
                        <h2 style="margin: 0 !important;" class="text-16 fw-600">Güncellemeler</h2>
                    </div>
                    <div class="py-30 px-30">
                        <div class="y-gap-40">
                            @foreach ($announcements as $announcement)
                                <div class="d-flex justify-content-between items-center pointer" data-toggle="modal"
                                    data-target="#announcement" v-on:click="detailAnnouncement({{ $announcement }})"
                                    style="@if ($announcement->type == 'important') background: #fff0f7; @elseif($announcement->type == 'care') background: #f0fff3; @elseif($announcement->type == 'discount') background: #fff5f0; @elseif($announcement->type == 'update') background: #F0F7FF; @endif  border-radius: 20px; padding-left: 20px; padding-right: 20px;">
                                    <div class="d-flex items-center">
                                        @switch($announcement->type)
                                            @case('important')
                                                <div class="shrink-0"
                                                    style="background: #ff1d86; padding: 15px 25px; border-radius: 100px;">
                                                    <span class="text-white text-24 fw-600" style="line-height: 35px;">1</span>
                                                </div>
                                            @break

                                            @case('care')
                                                <div class="shrink-0"
                                                    style="background: #16d03b; padding: 15px 25px; border-radius: 100px;">
                                                    <span class="text-white text-24 fw-600" style="line-height: 35px;">2</span>
                                                </div>
                                            @break

                                            @case('discount')
                                                <div class="shrink-0"
                                                    style="background: #ff7e3e; padding: 15px 25px; border-radius: 100px;">
                                                    <span class="text-white text-24 fw-600" style="line-height: 35px;">3</span>
                                                </div>
                                            @break

                                            @case('update')
                                                <div class="shrink-0"
                                                    style="background: #0077FF; padding: 15px 25px; border-radius: 100px;">
                                                    <span class="text-white text-24 fw-600" style="line-height: 35px;">4</span>
                                                </div>
                                            @break
                                        @endswitch
                                        <div class="ml-15">
                                            <h4 class="text-18 fw-600 lh-1">{{ $announcement->title }}</h4>
                                            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap">
                                                <div class="text-13 fw-500 text-muted">
                                                    {{ $announcement->created_at->translatedFormat('d F Y') }}
                                                </div>
                                                <div style="background: #0077FF; padding: 4px; border-radius: 50px;"></div>
                                                <div class="text-13 fw-500 text-muted">
                                                    {{ $announcement->created_at->format('H.s') }}
                                                </div>
                                            </div>
                                            <div class="text-13 fw-500 text-muted mt-1">
                                                Detaylar için tıklayın.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shrink-0">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
