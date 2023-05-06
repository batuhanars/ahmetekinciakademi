@extends('account.layout.main')
@section('title', 'Ayarlar | Ahmet Ekinci Akademi')
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">Ayarlar</h1>
                <div class="mt-10 text-dark-1">Hesabınıza ilişkin ayarları bu sayfadan düzenleyebilirsiniz.</div>

            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs pt-0">
                        <div
                            class="tabs__controls d-flex x-gap-30 items-center pt-20 px-30 border-bottom-light js-tabs-controls">
                            <button class="tabs__button text-dark-1 js-tabs-button is-active" data-tab-target=".-tab-item-1"
                                type="button">
                                Profil Bilgileri
                            </button>
                            <button class="tabs__button text-dark-1 js-tabs-button" data-tab-target=".-tab-item-2"
                                type="button">
                                Fatura Bilgileri
                            </button>
                            <button class="tabs__button text-dark-1 js-tabs-button" data-tab-target=".-tab-item-3"
                                type="button">
                                Şifre Değişikliği
                            </button>
                            {{-- <button class="tabs__button text-dark-1 js-tabs-button" data-tab-target=".-tab-item-4"
                                type="button">
                                Sosyal Medya Hesapları
                            </button> --}}
                            <button class="tabs__button text-dark-1 js-tabs-button" data-tab-target=".-tab-item-4"
                                type="button">
                                Hesabı Kapat
                            </button>
                        </div>

                        <div class="tabs__content py-30 px-30 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <div>
                                    <form action="{{ route('account.profile.info.update') }}"
                                        class="contact-form row y-gap-30" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="row y-gap-20 x-gap-20 items-center">
                                            <input type="file" name="image" ref="image" v-on:change="loadImage"
                                                class="d-none">
                                            <div class="col-auto">
                                                <img class="size-100" alt="image" :src="">
                                            </div>

                                            <div class="col-auto">
                                                <div class="text-16 fw-500 text-dark-1">Profil Fotoğrafı</div>

                                                <div class="d-flex x-gap-10 y-gap-10 flex-wrap pt-15">
                                                    <div>
                                                        <div class="d-flex justify-center items-center size-40 rounded-8 bg-light-3"
                                                            style="cursor: pointer;" v-on:click="this.$refs.image.click()">
                                                            <div class="icon-cloud text-16"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">

                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Ad - Soyad</label>

                                            <input type="text" name="fullname" value="{{ $user->fullname }}" disabled
                                                style="width:700;">
                                        </div>
                                        <div class="col-md-6">

                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">E-posta</label>

                                            <input type="text" name="email" value="{{ $user->email }}" disabled
                                                style="width:700;">
                                        </div>

                                        <div class="col-md-6">

                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Telefon</label>

                                            <input type="text" name="phone" id="phone_number" disabled
                                                style="width:700;" value="{{ $user->phone }}">
                                        </div>

                                        <div class="col-md-6">

                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Üyelik Tipi</label>

                                            <select name="type">
                                                <option @if ($customer->type == 'corporate') selected @endif value="corporate">
                                                    Kurumsal</option>
                                                <option @if ($customer->type == 'individual') selected @endif
                                                    value="individual">Bireysel</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">


                                        </div>


                                        <div class="col-12">
                                            <button class="button -md -blue-1 text-white">Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-2">
                                <div>
                                    <form action="{{ route('account.invoice.info.update') }}"
                                        class="contact-form row y-gap-30" method="post">
                                        @csrf
                                        @method('PUT')
                                        @if ($customer->type == 'corporate')
                                            <div class="col-md-12">

                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Ticari Ünvan</label>

                                                <input type="text" name="company_name" placeholder=""
                                                    value="{{ $customer->corporate->company_name }}">
                                            </div>
                                        @endif
                                        <div class="col-md-6">

                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">İl</label>

                                            <select name="province_id" id="province">
                                                @foreach ($provinces as $province)
                                                    <option @if ($customer->province_id == $province->id) selected @endif
                                                        value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">

                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">İlçe</label>

                                            <select name="district_id" id="district">
                                                @foreach ($districts as $district)
                                                    <option @if ($customer->district_id == $district->id) selected @endif
                                                        value="{{ $district->id }}">
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">

                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Adres</label>

                                            <textarea name="address" rows="7" placeholder="">{{ $customer->address }}</textarea>
                                        </div>

                                        @if ($user->customer->type == 'corporate')
                                            <div class="col-md-6">

                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Vergi Numarası</label>

                                                <input type="text" name="tax_number" placeholder=""
                                                    value="{{ $customer->corporate->tax_number }}">
                                            </div>
                                        @endif

                                        @if ($user->customer->type == 'individual')
                                            <div class="col-md-6">

                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">T.C Kimlik
                                                    Numarası</label>

                                                <input type="text" name="tc_no" placeholder=""
                                                    value="{{ $customer->individual->tc_no }}">
                                            </div>
                                            <div class="col-md-6">

                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Posta Kodu</label>

                                                <input type="text" name="zip" placeholder=""
                                                    value="{{ $customer->zip }}">
                                            </div>
                                        @else
                                            <div class="col-md-6">

                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Vergi Dairesi</label>

                                                <input type="text" name="tax_administration" placeholder=""
                                                    value="{{ $customer->corporate->tax_administration }}">
                                            </div>

                                            <div class="col-md-6">


                                            </div>
                                        @endif

                                        <div class="col-12">
                                            <button class="button -md -blue-1 text-white">Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-3">
                                <form action="{{ route('account.password.update') }}" class="contact-form row y-gap-30"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-7">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Mevcut Şifre</label>
                                        <small
                                            class="text-red-1 d-inline ms-3">{{ $errors->first('current_password') }}</small>
                                        <input type="password" name="current_password" placeholder="">
                                    </div>


                                    <div class="col-md-7">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Yeni Şifre</label>
                                        <small
                                            class="text-red-1 d-inline ms-3">{{ $errors->first('new_password') }}</small>
                                        <input type="password" name="new_password" placeholder="" v-model="newPassword">
                                    </div>


                                    <div class="col-md-7">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Yeni Şifreyi Onayla</label>
                                        <small
                                            class="text-red-1 d-inline ms-3">{{ $errors->first('confirm_password') }}</small>
                                        <input type="password" name="confirm_password" placeholder=""
                                            v-model="confirmPassword">
                                    </div>

                                    <div class="col-12">
                                        <button class="button -md -blue-1 text-white">Kaydet</button>
                                    </div>
                                </form>
                            </div>

                            {{-- <div class="tabs__pane -tab-item-4">
                                <form action="#" class="contact-form row y-gap-30">

                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Twitter</label>

                                        <input type="text" placeholder="">
                                    </div>


                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Facebook</label>

                                        <input type="text" placeholder="">
                                    </div>


                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Instagram</label>

                                        <input type="text" placeholder="">
                                    </div>


                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">LinkedIn Profile URL</label>

                                        <input type="text" placeholder="">
                                    </div>

                                    <div class="col-12">
                                        <button class="button -md -purple-1 text-white">Save Social Profile</button>
                                    </div>
                                </form>
                            </div> --}}

                            <div class="tabs__pane -tab-item-4">
                                <form action="{{ route('account.close') }}" class="contact-form row y-gap-30"
                                    method="post">
                                    @csrf
                                    <div class="col-12">
                                        <div class="text-16 fw-500 text-dark-1">Hesabı Kapat</div>
                                        <p class="mt-10">Uyarı: Hesabınızı kapatırsanız, sahip olduğunuz
                                            eğitimlerden
                                            çıkarılacak ve erişimi sonsuza kadar kaybedeceksiniz!</p>
                                    </div>


                                    <div class="col-md-7">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Şifenizi Giriniz</label>

                                        <input type="text" name="password" placeholder="">
                                    </div>


                                    <div class="col-12">
                                        <button class="button -md -blue-1 text-white">Hesabı Kapat</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script>
        $("#province").change(function(event) {
            $.ajax({
                type: "POST",
                url: "{{ route('districts') }}",
                data: {
                    "province_id": event.target.value,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(value) {
                    $("#district").html(value);
                }
            });
        });
    </script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        var phoneInput = document.getElementById('phone_number');
        var maskOptions = {
            mask: '(0000) 000-00-00'
        };
        var mask = IMask(phoneInput, maskOptions);
    </script>
@endsection
@endsection
