@extends('auth.layout.main')
@section('title', 'Giriş Yap')
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
            <div class="form-page__img bg-dark-2">
                <div class="row items-center">
                    <div class="col-auto">
                        <div class="form-page-composition">
                            <img src="{{ $general->white_logo }}" alt="{{ $general->title }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-page__content lg:py-50">
                <div class="container">
                    <div class="row justify-center items-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                                <h3 class="text-30 lh-13">Yeni Parola Ayarla</h3>
                                <p class="mt-10">Parolanızı zaten sıfırladınız mı?
                                    <a href="{{ route('customer.change-password.put', ['token' => $passwordReset->token, 'email' => request()->get('email')]) }}"
                                        class="text-blue-1">Giriş Yapın</a>
                                </p>

                                <form class="contact-form respondForm__form row y-gap-20 pt-30"
                                    action="{{ route('customer.change-password.put', ['token' => $passwordReset->token, 'email' => request()->get('email')]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Şifreniz</label>
                                                <small class="text-red-1 d-inline">{{ $errors->first('password') }}</small>
                                            </div>
                                        </div>
                                        <input type="password" name="password" placeholder="">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit"
                                            class="button -md -blue-1 text-white fw-500 w-1/1">
                                            Şifre Değiştir
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
