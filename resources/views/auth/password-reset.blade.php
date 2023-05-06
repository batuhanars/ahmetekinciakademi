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
                                <h3 class="text-30 lh-13">Parolanızı mı Unuttunuz?</h3>
                                <p class="mt-10">Şifrenizi sıfırlamak için e-postanızı girin.</p>

                                <form class="contact-form respondForm__form row y-gap-20 pt-30"
                                    action="{{ route('customer.send-email') }}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Mail Adresiniz</label>
                                        <small class="text-red-1 d-inline">{{ $errors->first('email') }}</small>
                                        <input type="text" name="email" placeholder="">
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="submit" name="submit" id="submit"
                                                    class="button -md -blue-1 text-white fw-500 w-1/1">
                                                    Gönder
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ route('customer.login') }}"
                                                    class="button -md -blue-1 text-white fw-500 w-1/1">Vazgeç</a>
                                            </div>
                                        </div>

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
