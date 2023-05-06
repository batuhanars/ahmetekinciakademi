@extends('auth.layout.main')
@section('title', 'Eğitmenlik Başvuru Formu')
@section('css')
    <style>
        .step {
            display: none;
        }

        .progress-bar__bar {
            transition: 250ms all linear;
        }
    </style>
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
                                <h3 class="text-30 lh-13">Eğitmenlik Başvuru Formu</h3>

                                <div class="progress-bar mt-30">
                                    <div class="progress-bar__bg bg-light-3"></div>
                                    <div class="progress-bar__bar bg-blue-1" style="width: 0%"></div>
                                </div>

                                <form class="contact-form respondForm__form pt-30"
                                    action="{{ route('home.instructor-request.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="step row y-gap-20" id="step1">
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Ad Soyad</label>
                                            <small class="text-red-1 d-inline error" id="fullname"></small>
                                            <input type="text" name="fullname" placeholder="Ad Soyad">
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email</label>
                                            <small class="text-red-1 d-inline error" id="email"></small>
                                            <input type="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Telefon Numarası
                                            </label>
                                            <small class="text-red-1 d-inline error" id="phone"></small>
                                            <input type="text" name="phone" id="phone_number"
                                                placeholder="Telefon Numarası">
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Doğum Tarihi
                                            </label>
                                            <small class="text-red-1 d-inline error" id="date_of_birth"></small>
                                            <input type="date" name="date_of_birth" placeholder="Doğum Tarihi">
                                        </div>
                                    </div>
                                    <div class="step row y-gap-20" id="step2">
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Eğitim Durumu
                                            </label>
                                            <small class="text-red-1 d-inline error" id="education_status"></small>
                                            <input type="text" name="education_status"
                                                placeholder="Okuduğunuz veya Mezun Olduğunuz Okul ">
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Daha Önce Eğitim Verdiniz
                                                mi?
                                            </label>
                                            <small class="text-red-1 d-inline error" id="instructor_status"></small>
                                            <input type="text" name="instructor_status"
                                                placeholder="Eğitmenlik Durumu (Evet, Hayır)">
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Uzmanlık Alanınız Nedir?
                                            </label>
                                            <small class="text-red-1 d-inline error" id="profession"></small>
                                            <input type="text" name="profession" placeholder="Uzmanlık Alanınız">
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Hangi Alanda Eğitim Vermek
                                                İstiyorsunuz?
                                            </label>
                                            <small class="text-red-1 d-inline error" id="branch"></small>
                                            <input type="text" name="branch"
                                                placeholder="Eğitim Vermek İstediğiniz Alan">
                                        </div>
                                    </div>
                                    <div class="step row y-gap-20" id="step3">
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Neden Ahmet Ekinci
                                                Akademi'yi Tercih Ettiniz?
                                            </label>
                                            <small class="text-red-1 d-inline error" id="description_1"></small>
                                            <textarea name="description_1" rows="4"></textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Sizi Neden Eğtimen Olarak
                                                Tercih Etmeliyiz?
                                            </label>
                                            <small class="text-red-1 d-inline error" id="description_2"></small>
                                            <textarea name="description_2" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="step row y-gap-20" id="step4">
                                        <div class="col-lg-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 d-block">Öz Geçmiş</label>
                                            <small class="text-red-1 d-inline error" id="resume"></small>
                                            <input type="file" name="resume" style="width:100%;">
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-6">
                                            <button type="button" id="prevBtn" onclick="nextPrev(-1)"
                                                class="button -md -blue-1 text-white fw-500 w-1/1">
                                                <i class="fas fa-arrow-left"></i> Geri </button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" id="nextBtn" onclick="nextPrev(1)"
                                                class="button -md -blue-1 text-white fw-500 w-1/1">
                                                İleri <i class="fas fa-arrow-right"></i>
                                            </button>
                                            <button type="button" id="submit"
                                                class="button -md -blue-1 text-white fw-500 w-1/1">
                                                Gönder
                                            </button>
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
        const steps = document.querySelectorAll(".step"),
            total = steps.length;
        const prev = document.getElementById("prevBtn");
        const next = document.getElementById("nextBtn");
        const submitButton = document.getElementById("submit");
        const progress = document.querySelector(".progress-bar__bar");
        let currentStep = 0;
        let file = "";
        const resume = document.querySelector("input[type='file']");

        showStep(currentStep)

        function showStep(step) {

            steps[step].style.display = "block";

            if (step == 0) {
                prev.style.display = 'none';
            } else {
                prev.style.display = 'inline';
            }
            if (step == (total - 1)) {
                submitButton.style.display = 'inline';
                next.style.display = 'none';
            } else {
                submitButton.style.display = 'none';
                next.style.display = 'inline';
            }
        }

        function nextPrev(step) {
            if (step == 1 && !validateForm()) return false;
            steps[currentStep].style.display = "none";
            currentStep = currentStep + step
            showStep(currentStep);
            progress.style.width = (100 / (total - currentStep)) == 25 ? 0 : (100 / (total - currentStep)) +
                "%";
        }

        function validateForm() {

            const inputs = steps[currentStep].querySelectorAll("input");
            const descriptions = steps[currentStep].querySelectorAll("textarea");
            const errors = steps[currentStep].querySelectorAll(".error")
            const errorDescription1 = steps[currentStep].querySelector("#description")

            var emailPattern = /^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;
            var numberPattern = /^(|[0-9]*)$/;

            for (let i = 0; i < descriptions.length; i++) {
                if (descriptions[i].value == "") {
                    errors[i].innerHTML = "Gerekli"
                    return false
                } else {
                    errors[i].innerHTML = ""
                }
            }
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].value === "") {
                    console.log(inputs[i])
                    errors[i].innerHTML = "Gerekli"
                    return false;
                } else {
                    errors[i].innerHTML = ""
                }
                if (inputs[i].type === "email") {
                    if (!inputs[i].value.match(emailPattern)) {
                        errors[i].innerHTML = "Lütfen geçerli bir email adresi giriniz."
                        return false;
                    } else {
                        errors[i].innerHTML = ""
                    }
                }
            }
            return true
        }

        resume.addEventListener("change", (e) => {
            file = e.target.files[0];
        })

        submitButton.addEventListener("click", (event) => {
            const errorResume = document.querySelector("#resume");
            if (file == "") {
                errorResume.innerHTML = "Gerekli"
                return false
            } else {
                errorResume.innerHTML = ""
            }

            submitButton.type = "submit"
        })
    </script>
@endsection
