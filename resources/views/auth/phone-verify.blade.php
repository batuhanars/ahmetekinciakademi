@extends('auth.layout.main')
@section('title', 'Telefon Doğrulama | Ahmet Ekinci Akademi')
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
                <div class="col-auto">
                    <div class="form-page-composition">
                        <img src="{{ $general->white_logo }}" alt="{{ $general->title }}">
                    </div>
                </div>
            </div>

            <div class="form-page__content lg:py-50">
                <div class="container">
                    <div class="row justify-center items-center">
                        <div class="col-xl-8 col-lg-9">
                            <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                                <h3 class="text-30 lh-13">Telefon Doğrulama</h3>
                                <p class="mt-10">
                                    Kayıt olduğunuz için teşekkür ederiz. Önce telefon numaraınızı doğrulamaya ihtiyacınız
                                    var.
                                </p>
                                <p class="mt-10">
                                    Lütfen {{ auth()->user()->phone }} telefon numaranıza gönderdiğimiz kodu giriniz.
                                </p>

                                <form class="contact-form respondForm__form row y-gap-20 pt-30"
                                    action="{{ route('verify-mobile.post') }}" method="post">
                                    @csrf
                                    <div class="col-lg-12">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Doğrulama Kodu
                                        </label>
                                        <small class="text-error-2 lh-1 fw-500">{{ $errors->first('mobile_verify_code') }}
                                        </small>
                                        <input type="text" name="mobile_verify_code" autocomplete="off">
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit"
                                            class="button -md -dark-2 text-white fw-500 w-1/1" style="margin-top:10px;">
                                            Doğrula
                                        </button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
