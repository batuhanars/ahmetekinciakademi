<footer class="footer -type-5 pt-60 text-dark-1">
    <div class="container-xxl">
        <div class="row y-gap-30 pb-60">
            <div class="col-xl-3 col-lg-5 col-md-6">
                <div class="footer-header__logo">
                    <img src="{{ $general->dark_logo }}" alt="{{ $general->title }}" width="225">
                </div>

                <div class="mt-30">
                    <div class="text-17 text-dark-1"><b>WhatsApp</b></div>
                    <div class="text-17 lh-1 fw-500 text-dark-1 mt-3">0 (850) 307 1259</div>
                </div>

                <div class="mt-30 pr-20">
                    <div class="lh-17">
                        {{ $contact->address }}
                        {{ $contact->email }}
                    </div>
                </div>

                <div class="footer-header-socials mt-40">
                    <div class="text-17 text-dark-1"><b>Sosyal Medya</b></div>
                    <div class="footer-header-socials__list d-flex items-center"
                        style="margin-top:-1px; margin-left:-5px;">
                        <a href="{{ $socialMedia->whatsapp }}" target="_blank"
                            class="size-40 d-flex justify-center items-center"> <img
                                src="{{ asset('assets') }}/whatsap.svg" alt="" style="width: 28px;"></a>
                        <a href="{{ $socialMedia->telegram }}" target="_blank"
                            class="size-40 d-flex justify-center items-center"> <img
                                src="{{ asset('assets') }}/telegra.svg" alt="" style="width: 28px;"></a>
                        <a href="{{ $socialMedia->twitter }}" target="_blank"
                            class="size-40 d-flex justify-center items-center"> <img
                                src="{{ asset('assets') }}/instagra.svg" alt="" style="width: 28px;"></a>
                        <a href="{{ $socialMedia->linkedin }}" target="_blank"
                            class="size-40 d-flex justify-center items-center"> <img
                                src="{{ asset('assets') }}/linkedi.svg" alt="" style="width: 28px;"></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-4 col-md-6">
                <div class="text-17 fw-500 text-dark-1 uppercase mb-30"><b>Kurumsal</b></div>
                <div class="d-flex y-gap-10 flex-column">
                    <a href="{{ route('home.about') }}">Hakkımızda</a>
                    <a href="/misyon-vizyon">Misyon - Vizyon</a>
                    <a href="{{ route('home.blog.index') }}">Blog</a>
                    <a href="{{ route('home.help-center') }}">Sıkça Sorulan Sorular</a>
                    <a href="{{ route('home.contact') }}">İletişim</a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-4 col-md-6">
                <div class="text-17 fw-500 text-dark-1 uppercase mb-25"><b>AKADEMİ</b></div>
                <div class="row justify-between y-gap-20">
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="{{ route('home.corporate-courses') }}">Kurumsal Eğitimler</a>
                        <a href="{{ route('home.course.index') }}">Bireysel Eğitimler</a>
                        <a href="{{ route('home.instructors.index') }}">Eğitmenler</a>
                        <a href="{{ route('home.instructors.become') }}">Eğitmenlik Başvurusu</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-4 col-md-6">
                <div class="text-17 fw-500 text-dark-1 uppercase mb-25"><b>DESTEK</b></div>
                <div class="d-flex y-gap-10 flex-column">
                    <a href="{{ route('home.help-center') }}">Yardım</a>
                    <a href="{{ $socialMedia->whatsapp }}" target="_blank">Whatsapp Destek</a>
                    <a href="{{ $socialMedia->instagram }}" target="_blank">Instagram'da Biz</a>
                    <a href="{{ $socialMedia->linkedin }}" target="_blank">LinkedIn'de Biz</a>
                    <a href="/odeme-secenekleri">Ödeme Seçenekleri</a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-4 col-md-6">
                <div class="text-17 fw-500 text-dark-1 uppercase mb-25"><b>DİĞER</b></div>
                <div class="d-flex y-gap-10 flex-column">
                    <a href="/mesafeli-satis-sozlesmesi">Mesafeli Satış Sözleşmesi</a>
                    <a href="/kullanim-kosullari">Kullanım Koşulları</a>
                    <a href="/gizlilik-politikasi">Gizlilik Politikası</a>
                    <a href="/cerez-politikasi">Çerez Politikası</a>
                    <a href="/kisisel-verilerin-korunmasi-kanunu">Kişisel Verilerin Korunması</a>
                    <a href="/iptal-ve-iade-sartlari">İptal ve İade Şartları</a>
                </div>
            </div>
        </div>

        <div class="py-30 border-top-light">
            <div class="row justify-between items-center y-gap-20">
                <div class="col-auto">
                    <div class="footer-footer__copyright d-flex items-center h-100">
                        © Ahmet Ekinci Akademi 2023. Tüm Hakları Saklıdır.
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-footer__copyright d-flex items-center h-100">
                        <a href="https://www.markapress.com/" target="_blank"> Marka Press -
                            Dijital Software Agency</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
