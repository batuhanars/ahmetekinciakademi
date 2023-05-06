@extends('home.layout.page-layout')
@section('title', 'İletişim')
@section('content')
    <section class="page-header -type-4 bg-beige-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title">İletişim</h1>
                        </div>

                        <div data-anim="slide-up delay-2">
                            <p class="page-header__text text-dark-1">İletişim bilgilerimden veya direk buradan mesaj atarak
                                ulaşabilirsiniz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-50 justify-between">
                <div class="col-xl-5 col-lg-6">
                    <div class="row y-gap-30 pt-40">

                        <div class="col-sm-6">
                            <div class="text-20 fw-500 text-dark-1">Uşak</div>
                            <div class="y-gap-10 pt-15 text-dark-1">
                                <a href="#" class="d-block">{{ $contact->address }}</a>
                                <a href="#" class="d-block">{{ $contact->phone }}</a>
                                <a href="#" class="d-block">{{ $contact->email }}</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="px-40 py-40 bg-white border-light shadow-1 rounded-8 contact-form-to-top">
                        <h3 class="text-24 fw-500">Mesaj Gönder</h3>

                        <form class="contact-form pt-60 lg:pt-40" action="{{ route('home.message.send') }}" method="post">
                            @csrf
                            <div class="row y-gap-30" id="contact-form">
                                <div class="col-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Ad Soyad</label>
                                    <small class="text-red-1 d-inline error" id="fullname"></small>
                                    <input type="text" name="fullname" placeholder="Ad soyad..."
                                        value="{{ old('fullname') }}">
                                </div>
                                <div class="col-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email Adresi</label>
                                    <small class="text-red-1 d-inline error" id="email"></small>
                                    <input type="email" name="email" placeholder="Email..." value="{{ old('email') }}">
                                </div>
                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Telefon Numarası</label>
                                    <small class="text-red-1 d-inline error" id="phone"></small>
                                    <input type="text" name="phone" id="phone_number" placeholder="Telefon..."
                                        value="{{ old('phone') }}">
                                </div>
                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Konu</label>
                                    <small class="text-red-1 d-inline error" id="topic"></small>
                                    <input type="text" name="topic" placeholder="Konu..." value="{{ old('topic') }}">
                                </div>
                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Mesaj</label>
                                    <small class="text-red-1 d-inline error" id="message"></small>
                                    <textarea name="message" placeholder="Mesaj" rows="8">{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="button" name="submit" id="submit" onclick="contactValidation()"
                                        class="button -md -purple-1 text-white">
                                        Mesaj Gönder
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-lg bg-light-">
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-8 col-lg-9 col-md-11">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Sıkça Sorulan Sorular.</h2>

                    </div>


                    <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">
                        @foreach ($faq as $f)
                            <div class="accordion__item">
                                <div class="accordion__button">
                                    <div class="accordion__icon">
                                        <div class="icon" data-feather="plus"></div>
                                        <div class="icon" data-feather="minus"></div>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1">{{ $f->title }}</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner">
                                        <p>{{ $f->content }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="https://unpkg.com/imask"></script>
    <script>
        var phoneInput = document.getElementById('phone_number');
        var maskOptions = {
            mask: '(0000) 000-00-00'
        };
        var mask = IMask(phoneInput, maskOptions);
    </script>
    <script>
        const fullname = document.querySelector('input[name="fullname"]');
        const email = document.querySelector('input[name="email"]');
        const topic = document.querySelector('input[name="topic"]');
        const message = document.querySelector('textarea[name="message"]');

        const form = document.querySelector("#contact-form");
        const submitButton = document.querySelector("#submit")
        const errors = form.querySelectorAll('.error');

        const fullnameError = document.querySelector('#fullname');
        const emailError = document.querySelector('#email');
        const topicError = document.querySelector('#topic');
        const messageError = document.querySelector('#message');

        function contactValidation() {
            const inputs = form.querySelectorAll("input");
            var emailPattern = /^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].value === "") {
                    errors[i].innerHTML = "Gerekli.";
                    return false
                } else {
                    errors[i].innerHTML = "";
                }
                if (inputs[i].type === "email") {
                    if (!inputs[i].value.match(emailPattern)) {
                        errors[i].innerHTML = "Lütfen geçerli bir email adresi giriniz.";
                        return false
                    } else {
                        errors[i].innerHTML = "";
                    }
                }
            }
            if (message.value == "") {
                messageError.innerHTML = "Mesaj boş olamaz."
                return false
            } else {
                messageError.innerHTML = "";
            }
            submitButton.type = "submit"
        }
    </script>
@endsection
