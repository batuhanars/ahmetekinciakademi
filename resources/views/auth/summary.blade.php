@extends('auth.layout.main')
@section('title', 'Eğitmenlik Başvuru Özet')
@section('css')
    <style>
        .form-page-composition img {
            width: 350px;
        }

        @media(max-width: 780px) {
            .form-page-composition img {
                width: 200px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper  js-content-wrapper">

        <section class="form-page js-mouse-move-container">
            <div class="form-page__img bg-dark-1">
                <div class="col-auto">
                    <div class="form-page-composition">
                        <img src="{{ $general->white_logo }}" alt="{{ $general->title }}">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-right d-flex items-center">
                        <div class="header-right__buttons">
                            <a href="{{ route('home.index') }}"
                                class="button -sm -rounded -white text-dark mobile-button">Geri
                                Dön</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-page__content lg:py-50">
                <div class="container">
                    <div class="row justify-center items-center">
                        <div class="col-xl-8 col-lg-9">
                            <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                                <h3 class="text-30 lh-13">Özet</h3>
                                <div class="step row y-gap-20" id="step1">
                                    {{-- <h5 class="lh-13">Kişisel Bilgiler</h5> --}}
                                    <div class="col-lg-12">
                                        <strong class="text-16 lh-1 fw-500 text-dark-1 mb-10">Ad Soyad:
                                        </strong>
                                        {{ $instructorRequest->fullname }}
                                    </div>
                                    <div class="col-lg-12">
                                        <strong class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email Adresi:
                                        </strong>
                                        {{ $instructorRequest->email }}
                                    </div>
                                    <div class="col-lg-12">
                                        <strong class="text-16 lh-1 fw-500 text-dark-1 mb-10">Telefon Numarası:
                                        </strong>
                                        {{ $instructorRequest->phone }}
                                    </div>
                                    <div class="col-lg-12">
                                        <strong class="text-16 lh-1 fw-500 text-dark-1 mb-10">Doğum Tarihi:
                                        </strong>
                                        {{ $instructorRequest->date_of_birth }}
                                    </div>
                                    <div class="col-lg-12">
                                        <strong class="text-16 lh-1 fw-500 text-dark-1 mb-10">Eğitim Durumu:
                                        </strong>
                                        {{ $instructorRequest->education_status }}
                                    </div>
                                    <div class="col-lg-12">
                                        <strong class="text-16 lh-1 fw-500 text-dark-1 mb-10">Eğitmenlik Durumu:
                                        </strong>
                                        {{ $instructorRequest->instructor_status }}
                                    </div>
                                    <div class="col-lg-12">
                                        <strong class="text-16 lh-1 fw-500 text-dark-1 mb-10">Uzmanlık Alanı:
                                        </strong>
                                        {{ $instructorRequest->profession }}
                                    </div>
                                    <div class="bg-success-1">
                                        <span class="text-success-2">Eğitmenlik başvurunuz başarıyla gönderilmiştir.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
