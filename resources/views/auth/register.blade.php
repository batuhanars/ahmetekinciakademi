@extends('auth.layout.main')
@section('title', 'Kayıt Ol | Ahmet Ekinci Akademi')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .form-page-composition img {
            width: 350px;
        }

        @media(max-width: 780px) {
            .form-page-composition img {
                width: 200px;
            }
        }

        #password-strength {
            height: 5px;
            width: 100%;
            display: block;
            background-color: #ccc;
        }

        #password-strength span {
            display: block;
            height: 5px;
            border-radius: 2px;
            transition: all 500ms ease;
        }

        .strength-0 span {
            background-color: red;
            width: 5%;
        }

        .strength-1 span {
            background-color: orangered;
            width: 25%;
        }

        .strength-2 span {
            background-color: orange;
            width: 50%;
        }

        .strength-3 span {
            background-color: yellowgreen;
            width: 75%;
        }

        .strength-4 span {
            background-color: green;
            width: 100%;
        }

        .hide {
            display: none;
        }

        .show {
            display: block;
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
                                <h3 class="text-30 lh-13">Kayıt Ol</h3>
                                <p class="mt-10">Zaten hesabınız var mı? <a href="{{ route('customer.login') }}"
                                        class="text-blue-1"><b>Giriş Yap</b></a></p>

                                <form class="contact-form respondForm__form row y-gap-20 pt-30"
                                    action="{{ route('register.post') }}" method="post">
                                    @csrf
                                    <div class="col-lg-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Adınız & Soyadınız
                                        </label>
                                        <input type="text" name="fullname" placeholder="Ad Soyad"
                                            value="{{ old('fullname') }}">
                                        <small class="text-red-1 lh-1 fw-500">{{ $errors->first('fullname') }} </small>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Mail Adresiniz </label>
                                        <input type="text" name="email" placeholder="Mail Adresi"
                                            value="{{ old('email') }}">
                                        <small class="text-red-1 d-inline">{{ $errors->first('email') }}</small>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Telefon Numaranız
                                        </label>
                                        <input type="text" name="phone" id="phone_number"
                                            placeholder="Telefon Numarası" value="{{ old('phone') }}">
                                        <small class="text-red-1 d-inline">{{ $errors->first('phone') }}</small>
                                    </div>
                                    <div class="col-lg-6" style="position: relative;">
                                        <div class="d-flex justify-content-between">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Şifreniz
                                            </label>
                                            <div>
                                                <span id="password-strength-text"></span>
                                                <i class="fas fa-info text-muted" id="passwordTips"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="password" id="password" placeholder="Şifre"
                                            style="padding-right: 40px;">
                                        <button type="button" style="position:absolute; top:55px; right: 30px;"
                                            id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <div id="password-strength" style="margin-top: 5px;"><span></span></div>
                                        <small class="text-red-1 d-inline">{{ $errors->first('password') }}</small>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Üyelik Tipiniz
                                        </label>
                                        <select name="type">
                                            <option value="individual">Bireysel</option>
                                            <option value="corporate">Kurumsal</option>
                                        </select>
                                        <small class="text-red-1 d-inline">{{ $errors->first('type') }}</small>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex items-center">
                                            <label class="form-switch">
                                                <div class="switch" style="">
                                                    <input type="checkbox" name="kvkk" id="kvkk" value="Onayladım">
                                                    <span class="switch__slider"></span>
                                                </div>
                                            </label>
                                            <div class="text-13 lh-1 text-dark-1 ml-10 {{ $errors->first('password') ? 'text-red-1' : '' }}"
                                                style="margin-top:-8px;">
                                                <b data-toggle="modal" data-target="#exampleModal"
                                                    style="cursor: pointer;">Site
                                                    Kullanım Koşulları</b> ve <b data-toggle="modal"
                                                    data-target="#exampleModal2" style="cursor: pointer;">KVKK Açık Rıza
                                                    Metnini</b> okudum,
                                                onayladım.
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit"
                                            class="button -md -dark-2 text-white fw-500 w-1/1" style="margin-top:10px;">
                                            Kayıt Ol
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
    <div id="hint"
        style="position:absolute; top: 46%; right:25px; border: 1px solid #cccccc; background: #f8f8f8; padding: 10px 5px;"
        class="hide">
        <strong style="margin-left: 15px;">Güvenli parola ipuçları:</strong>
        <ul class="text-muted">
            <li>8'den fazla karakter içermelidir.</li>
            <li>Hem küçük hemde büyük harfler içermelidir.</li>
            <li>En az bir sayısal karakter içermelidir.</li>
        </ul>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Site Kullanım Koşulları</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Bu
                            web sitesini (Kısaca “SİTE” olarak anılacaktır) kullanmak için lütfen aşağıda yazılı koşulları
                            okuyunuz. Bu SİTE’de sunulan hizmetlerden yararlananlar veya herhangi bir şekilde SİTE’ye erişim
                            sağlayan her gerçek ve tüzel kişi aşağıdaki kullanım koşullarını kabul etmiş
                            sayılmaktadır.</span>
                    </div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp"><span data-markholder="true"></span></span></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Bu
                            SİTE’de sunulan hizmetler ve içerikler AHMET EKİNCİ tarafından sağlanmaktadır ve SİTE’nin yasal
                            sahibi AHMET EKİNCİ olup, SİTE üzerinde her türlü kullanım ve tasarruf yetkisi AHMET EKİNCİ’YE
                            aittir.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">SİTE
                            hizmetlerinden yararlanan ve SİTE’ye erişim sağlayan her gerçek ve tüzel kişi, AHMET EKİNCİ
                            tarafından işbu kullanım koşulları hükümlerinde yapılan her değişikliği, önceden kabul etmiş
                            sayılmaktadır.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">AHMET EKİNCİ, bu SİTE’ de yer alan veya alacak olan bilgileri, formları ve
                            içeriği
                            dilediği zaman değiştirme hakkını saklı tutmaktadır.</span></div>
                    <div class="para"><br></div>
                    <h2 style="text-align:start;"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Sözleşme Tanımları</span></h2>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">SİTE: AHMET EKİNCİ tarafından belirlenen çerçeve içerisinde çeşitli hizmetlerin
                            ve
                            içeriklerin sunulduğu çevrimiçi (online) ortamdan erişimi mümkün olan web sitesidir.</span>
                    </div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">KULLANICI: </span><a href="http://ahmetekinciakademi.com" rev="en_rl_none"
                            class="en-link">ahmetekinciakademi.com</a> <span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">web
                            sitesini alışveriş yaparak ya da alışveriş yapmaksızın ziyaret eden kişidir.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">LİNK: SİTE üzerinden bir başka web sitesine, dosyalara, içeriğe veya başka bir
                            web
                            sitesinden SİTE’ye, dosyalara ve içeriğe erişimi mümkün kılan bağlantıdır.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">İÇERİK: SİTE’de ve/veya herhangi bir web sitesinde yayınlanan veya erişimi
                            mümkün olan
                            her türlü bilgi, dosya, resim, program, rakam, fiyat, vs. görsel, yazınsal ve işitsel
                            imgelerdir.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">WEB
                            SİTESİ KULLANIM KOŞULLARI VE ÜYELİK SÖZLEŞMESİ: </span></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">SİTE
                            vasıtasıyla sunulmakta olan ticari ve kişiye özel nitelikteki hizmetlerden yararlanacak gerçek
                            ve/veya tüzel kişilerle AHMET EKİNCİ arasında elektronik ortamda akdedilen işbu
                            sözleşmedir.</span>
                    </div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">KİŞİSEL BİLGİ: Üyenin kimliği, adresi, elektronik posta adresi, telefon
                            numarası, IP
                            adresi, SİTE’nin hangi bölümlerini ziyaret ettiği, domain tipi, browser tipi, ziyaret tarihi,
                            saati,
                            vs. bilgilerdir.</span></div>
                    <div class="para"><br></div>
                    <h2 style="text-align:start;"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Genel Hükümler</span></h2>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">SİTE
                            üzerinden, AHMET EKİNCİ’nin kendi kontrolünde olmayan ve başkaca üçüncü kişilerin sahip olduğu
                            ve
                            işlettiği başka web SİTElerine ve/veya başka içeriklere link verilebilir. Bu linkler
                            KULLANICI’lara
                            ve ÜYE’lere yönlenme kolaylığı sağlamak amacıyla konmuş olup herhangi bir web sitesini veya o
                            siteyi
                            işleten kişiyi desteklememektedir. Link verilen web sitesinin içerdiği bilgilere yönelik
                            herhangi
                            bir türde bir beyan veya garanti niteliği taşımamaktadır. SİTE üzerindeki linkler vasıtasıyla
                            erişilen web siteleri ve içerikleri hakkında AHMET EKİNCİ’nin herhangi bir sorumluluğu yoktur ve
                            bu
                            sitelerin kullanımıyla doğabilecek zararlar, KULLANICI’ların ve ÜYE’lerin kendi
                            sorumluluğundadır.
                            AHMET EKİNCİ bu tür link verilen web sitelerine erişimi, kendi yazılı muvafakatine
                            bağlayabileceği
                            gibi, AHMET EKİNCİ uygun görmeyeceği linklere erişimi her zaman kesebilir.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">AHMET EKİNCİ, SİTE’de mevcut olan bilgilerin doğruluk ve güncelliğini sürekli
                            olarak
                            kontrol etmektedir. Ancak gösterilen çabaya rağmen, SİTE üzerindeki bilgiler fiili
                            değişikliklerin
                            gerisinde kalabilir. SİTE muhteviyatında yer alan materyal ve bilgiler SİTE’ye verildiği anda
                            sunulmaktadır, ilgili hizmet veya bilginin güncel durumu ile SİTE’de yer alan durumu arasında
                            farklılık olabilir. SİTE’de yer alan bilgilerin, güncelliği, doğruluğu, şartları, kalitesi,
                            performansı, pazarlanabilirliği, belli bir amaca uygunluğu ve AHMET EKİNCİ’nin SİTE’de mevcut ve
                            bunlarla sınırlı olmayan, bunlarla bağlantılı veya bağımsız diğer bilgi, hizmet veya ürünlere
                            etkisi
                            ile tamlığı hakkında herhangi bir sarih ya da zımni garanti verilmemekte ve taahhütte
                            bulunulmamaktadır.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">KULLANICI ve ÜYE, SİTE’deki, yüklenmeye (download) ve/veya paylaşıma müsait
                            dosya,
                            bilgi ve belgelerin, virüslerden, wormlardan, truva atlarından, dialer programlarından spam,
                            spyware
                            veya bunlar gibi diğer her türlü kötü ve zarar verme amaçlı kodlardan veya materyallerden
                            arındırılamamış olabileceğini ve bu hususlarda SİTE’nin garanti vermediğini kabul etmektedir. Bu
                            tip
                            kötü ve zarar verme amaçlı programların, kodların veya materyallerin önlenmesi, veri giriş –
                            çıkışlarının doğruluğu veya herhangi bir kayıp verinin geri kazanılması için gereken tüm yazılım
                            ve
                            donanım ihtiyaçlarını karşılamak, bakım ve güncellemelerini yapmak tamamen KULLANICI’nın ve
                            ÜYE’nin
                            sorumluluğundadır. Bu tür kötü amaçlı programlar, kodlar veya materyallerin sebep olabileceği,
                            veri
                            yanlışlıkları veya kayıplarından dolayı KULLANICI ve ÜYE’nin veya üçüncü kişilerin
                            uğrayabileceği
                            hiçbir zarardan AHMET EKİNCİ sorumlu değildir.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">AHMET EKİNCİ, işbu SİTE ve SİTE uzantısında mevcut her tür hizmet, ürün,
                            kampanya, vs.
                            bilgiler ve SİTE’yi kullanma koşulları ile SİTE’de sunulan bilgileri önceden bir ihtara gerek
                            olmaksızın değiştirme, SİTE’yi ve içeriğini yeniden düzenleme, yayını durdurma ve/veya
                            duraklatma
                            hakkını saklı tutar. Değişiklikler, SİTE’de yayınlanmalarıyla yürürlüğe girerler. SİTE’nin
                            kullanımı
                            ya da SİTE’ye giriş ile bu değişiklikler de kabul edilmiş sayılır. Bu koşullar link verilen
                            diğer
                            web sayfaları için de geçerlidir. AHMET EKİNCİ, sözleşmenin ihlali, haksız fiil, ihmal veya
                            diğer
                            sebepler neticesinde; işlemin kesintiye uğraması, hata, ihmal, kesinti, silinme, kayıp, işlemin
                            veya
                            iletişimin gecikmesi, bilgisayar virüsü, iletişim hatası, hırsızlık, imha veya izinsiz olarak
                            kayıtlara girilmesi, değiştirilmesi veya kullanılması hususunda ve durumunda herhangi bir
                            sorumluluk
                            kabul etmez.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">SİTE’yi kullananlar, yalnızca hukuka uygun ve şahsi amaçlarla SİTE üzerinde
                            işlem
                            yapabilirler. KULLANICI’ların ve ÜYE’lerin, SİTE dahilinde yaptığı her işlem ve eylemdeki hukuki
                            ve
                            cezai sorumlulukları kendilerine aittir. Her KULLANICI ve her ÜYE, AHMET EKİNCİ ve/veya başka
                            bir
                            üçüncü kişinin haklarına tecavüz teşkil edecek nitelikteki herhangi bir faaliyette
                            bulunmayacağını
                            taahhüt eder. KULLANICI ve ÜYE’lerin SİTE üzerindeki faaliyetleri nedeniyle üçüncü kişilerin
                            uğradıkları veya uğrayabilecekleri zararlardan dolayı AHMET EKİNCİ’nin doğrudan ve/veya dolaylı
                            hiçbir sorumluluğu yoktur.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">İşbu
                            SİTE’nin sahibi AHMET EKİNCİ’dir. Bu SİTE’de bulunan bilgiler, yazılar, resimler, markalar,
                            slogan
                            ve diğer işaretler ile sair sınaî ve fikri mülkiyet haklarına ilişkin bilgilerin korunmasına
                            yönelik
                            programlarla, sayfa düzeni ve SİTE’nin sunumu AHMET EKİNCİ’nin izin ve lisans aldığı
                            kuruluşların
                            mülkiyetindedir. İşbu SİTE’deki bilgilerin ya da SİTE sayfalarına ilişkin her tür veritabanı,
                            web
                            sitesi, software-code’ların, html kodu ve diğer kodlar vs. ile SİTE içeriğinde bulunan
                            ürünlerin,
                            tasarımların, resimlerin, metinlerin, görsel, işitsel vesair imgelerin, video kliplerin,
                            dosyaların,
                            katalogların ve listelerin kısmen ya da tamamen kopyalanması, değiştirilmesi, yayınlanması,
                            online
                            ya da diğer bir medya kullanılmak suretiyle gönderimi, dağıtımı, satılması yasaktır. KULLANICI
                            ve
                            ÜYE, yukarıda sayılan ve bunlarla sınırlı olmayan SİTE yazılım, donanım ve içeriğini
                            çoğaltmayacağını, kopyalamayacağını, dağıtmayacağını, işlemeyeceğini, gerek bu eylemleri ile
                            gerekse
                            de başka yollarla AHMET EKİNCİ ile doğrudan ve/veya dolaylı olarak rekabete girmeyeceğini kabul
                            ve
                            taahhüt etmektedir. KULLANICI ve ÜYE, AHMET EKİNCİ’nin hizmetlerini, AHMET EKİNCİ’nin
                            bilgilerini ve
                            AHMET EKİNCİ’nin telif haklarına tâbi çalışmalarını yeniden satmak, işlemek, paylaşmak,
                            dağıtmak,
                            sergilemek veya başkasının AHMET EKİNCİ’nin hizmetlerine erişmesi veya kullanmasına izin vermek
                            hakkına sahip değildir. Bu sayfadaki bilgilerin kısmen kopyalanması, basılması, işlenmesi,
                            dağıtılması, çoğaltılması, sergilenmesi ancak ticari olmayan kişisel ihtiyaçlar için ve AHMET
                            EKİNCİ’nin yazılı izni ile mümkündür.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">AHMET EKİNCİ, SİTE üzerinden KULLANICI’lar ve ÜYE’ler tarafından kendisine
                            iletilen
                            bilgileri “Gizlilik Politikası” ve “Web Sitesi Kullanım Koşulları” hükümleri doğrultusunda
                            kullanabilir. Bu bilgileri işleyebilir, bir veritabanı üzerinde tasnif edip muhafaza edebilir.
                            AHMET
                            EKİNCİ aynı zamanda; KULLANICI ve ÜYE’nin kimliği, adresi, elektronik posta adresi, telefon
                            numarası, IP adresi, SİTE’nin hangi bölümlerini ziyaret ettiği, domain tipi, browser tipi,
                            ziyaret
                            tarihi, saati vs bilgileri de istatistiki değerlendirme, kampanyaların duyurusunu yapma ve
                            kişiye
                            yönelik hizmetler sunma gibi amaçlarla kullanabilir. KULLANICI’lara ve ÜYE’lere ait kişisel
                            bilgiler, kanunla yetkili kılınan mercilerin talebi ve aşağıda sayılan haller hariç olmak üzere
                            gerçek ve tüzel üçüncü kişilere açıklanmayacaktır.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">İşbu
                            SİTE Kullanım Koşulları dahilinde AHMET EKİNCİ tarafından açıkça yetki verilmediği hallerde
                            AHMET
                            EKİNCİ; AHMET EKİNCİ hizmetleri, AHMET EKİNCİ bilgileri, AHMET EKİNCİ telif haklarına tâbi
                            çalışmaları, AHMET EKİNCİ ticari markaları, AHMET EKİNCİ ticari görünümü veya bu SİTE
                            vasıtasıyla
                            sağladığı başkaca varlık ve bilgilere yönelik tüm haklarını saklı tutmaktadır.</span></div>
                    <div class="para"><br></div>
                    <h2 style="text-align:start;"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Sorumluluğun Sınırlandırılması</span></h2>
                    <div class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp"><span data-markholder="true"></span></span></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">AHMET EKİNCİ, SİTE’ye erişilmesi, SİTE’nin ya da SİTE’deki bilgilerin ve diğer
                            verilerin programların vs. kullanılması sebebiyle, sözleşmenin ihlali, haksız fiil, ya da
                            başkaca
                            sebeplere binaen, doğabilecek doğrudan ya da dolaylı hiçbir zarardan sorumlu değildir. AHMET
                            EKİNCİ,
                            sözleşmenin ihlali, haksız fiil, ihmal veya diğer sebepler neticesinde; işlemin kesintiye
                            uğraması,
                            hata, ihmal, kesinti hususunda herhangi bir sorumluluk kabul etmez. Bu SİTE’ye ya da link
                            verilen
                            diğer web sitelerine erişilmesi ya da SİTE’nin kullanılması ile AHMET EKİNCİ’nin,
                            kullanım/ziyaret
                            sonucunda, doğabilecek her tür sorumluluktan, mahkeme ve diğer masraflar da dahil olmak üzere
                            her
                            tür zarar ve talep hakkından ayrı kılındığı kabul edilmektedir.</span></div>
                    <div class="para"><br></div>
                    <h2 style="text-align:start;"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Sözleşmenin Devri</span></h2>
                    <div class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp"><span data-markholder="true"></span></span></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">AHMET EKİNCİ, bu sözleşmeyi bildirimsiz olarak istediği zaman kısmen veya
                            bütünüyle
                            devredebilir. Ancak KULLANICI ve ÜYE bu sözleşmeyi veya herhangi bir kısmını başka bir tarafa
                            devredemez. Bu türden bir devir girişimi geçersizdir.</span></div>
                    <div class="para"><br></div>
                    <h2 style="text-align:start;"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Mücbir Sebepler</span></h2>
                    <div class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp"><span data-markholder="true"></span></span></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Hukuken mücbir sebep sayılan tüm durumlarda, AHMET EKİNCİ işbu “WEB SİTESİ
                            KULLANIM
                            KOŞULLARI'nı" geç ifa etmekten veya ifa etmemekten dolayı yükümlü değildir. Bu ve bunun gibi
                            durumlar, AHMET EKİNCİ açısından, gecikme veya ifa etmeme veya temerrüt addedilmeyecek veya bu
                            durumlar için AHMET EKİNCİ’nin herhangi bir tazminat yükümlülüğü doğmayacaktır.</span></div>
                    <div class="para"><br></div>
                    <h2 style="text-align:start;"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Uygulanacak Hukuk ve Yetki</span></h2>
                    <div class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp"><span data-markholder="true"></span></span></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">İşbu
                            “WEB SİTESİ KULLANIM KOŞULLARI VE ÜYELİK SÖZLEŞMESİ'nden" kaynaklanacak ihtilaflar Türk
                            Hukuku’na
                            tabidir ve Ankara Merkez Mahkemeleri ve İcra Daireleri yetkilidir. AHMET EKİNCİ’nin, KULLANICI
                            ve
                            ÜYE’nin bulunduğu şehirde dava açma hakkı saklıdır.</span></div>
                    <div class="para"><br></div>
                    <h2 style="text-align:start;"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">Yürürlülük ve Kabul</span></h2>
                    <div class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp"><span data-markholder="true"></span></span></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                            class="UrtAp">“İşbu “WEB SİTESİ KULLANIM KOŞULLARI VE ÜYELİK SÖZLEŞMESİ”, AHMET EKİNCİ
                            tarafından
                            SİTE içeriğinde ilan edildiği tarihte yürürlülük kazanır. KULLANICI’lar ve ÜYE’ler, işbu
                            sözleşme
                            hükümlerini SİTE’yi kullanmakla kabul etmiş olmaktadırlar. AHMET EKİNCİ, dilediği zaman işbu
                            sözleşme hükümlerinde değişikliğe gidebilir, değişiklikler, sürüm numarası ve değişiklik tarihi
                            belirtilerek SİTE üzerinden yayınlanır ve aynı tarihte yürürlüğe girer.</span></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kişisel Verilerin İşlenmesine İlişkin Rıza Metni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                            class="UrtAp">Şirketimiz AHMET EKİNCİ AKADEMİ tarafından </span><a
                            href="http://ahmetekinciakademi.com" rev="en_rl_none"
                            class="en-link">ahmetekinciakademi.com</a>
                        ve
                        <a href="http://ahmetekinci.com.tr" rev="en_rl_none" class="en-link">ahmetekinci.com.tr</a>
                        i<span style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                            class="UrtAp">nternet siteleri üzerinden yürütülen faaliyetlerle ilgili olarak bilgi vermek
                            istiyoruz.</span>
                    </div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                            class="UrtAp">Açık rızanıza bağlı olarak;</span></div>
                    <div style="text-align:start;" class="para"><b><span
                                style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                                class="UrtAp">a. İşlenen Kişisel Veriler ve Toplama Yöntemleri:</span></b></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                            class="UrtAp">Müşterilerimizin çevrimiçi ve/veya basılı formlar vasıtasıyla paylaştığı kimlik
                            bilgileri (isim, soyisim, doğum tarihi, uyruk, T.C. kimlik numarası, cinsiyet), iletişim
                            bilgileriniz (e-posta adresi, fatura ve teslimat adresleri, cep telefonu numarası); internet
                            sitemizi kullanımız sırasında toplanan müşteri işlem bilgileriniz (talep bilgileri, sipariş
                            bilgileri, fatura bilgileri, müşteri yorumları), pazarlama bilgileriniz (çerez kayıtları,
                            alışveriş
                            geçmişi), işlem güvenliği bilgileri (IP Adresi Bilgileri, İnternet Sitesi Giriş Çıkış Bilgileri,
                            Kullanıcı Adı Bilgileri, Şifre Bilgileri, Bağlantı Zamanı / Süresi gibi Trafik Verileri) ile
                            internet sitemizi kullanırken internet tarayıcınızdaki tercihlerinize göre toplanabilecek
                            lokasyon
                            verileriniz işlenecektir.</span></div>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><b><span
                                style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                                class="UrtAp">b. İşlenen Kişisel Verilerin İşleme Amaçları ve Hukuki Sebebi:</span></b>
                    </div>
                    <div class="para"><span
                            style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                            class="UrtAp">Yukarıda sayılan kişisel verileriniz, rıza göstererek Ahmet Ekinci Akademi üyesi
                            olmanız halinde; size özel reklam, promosyon ve kampanyaların oluşturulması, hedef kitle
                            belirlenmesi, müşteri hareketleriniz takip edilerek kullanıcı deneyiminizi artırıcı
                            faaliyetlerin
                            yürütülmesi, doğrudan ve doğrudan olmayan pazarlama, kişiye özel pazarlama ve yeniden pazarlama
                            faaliyetlerinin yürütülmesi, kişiye özel segmentasyon, hedefleme, analiz ve raporlama
                            faaliyetlerinin yürütülmesi amaçları dahil olmak üzere Ahmet Ekinci Akademi ile anlaşmalı
                            profesyonel iş ortaklarının ürün ve/veya hizmetlerinin satış ve pazarlama süreçlerinin
                            planlanması
                            ve icrası kapsamında; KVKK’nın 5. maddesinin 1. fıkrası “açık rıza” hukuki sebebine bağlı olarak
                            işlenebilecek ve aynı amaçlar ve hukuki sebep kapsamında yurtiçindeki üçüncü kişilerle ve
                            KVKK’nın
                            9. maddesindeki kurallara uyularak yurtdışındaki üçüncü kişilerle, iş ortaklarımızla
                            paylaşılabilecektir. <br></span></div>
                    <div class="para"><span
                            style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                            class="UrtAp"><span data-markholder="true"></span></span></div>
                    <div style="text-align:start;" class="para"><b><span
                                style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                                class="UrtAp"><br>c. İşlenen Kişisel Verilere İlişkin Haklarınız:</span></b></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                            class="UrtAp">KVKK’nın 11. maddesi kapsamında;</span></div>
                    <div class="para"><br></div>
                    <ul role="list" style="padding-left: 20px;">
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">Kişisel verilerinizin işlenip işlenmediğini öğrenme,</span></div>
                            </div>
                        </li>
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme,</span>
                                </div>
                            </div>
                        </li>
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">Kişisel verilerinizin işlenme amacını ve bunların amacına uygun
                                        kullanılıp
                                        kullanılmadığını öğrenme,</span></div>
                            </div>
                        </li>
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">Yurt içinde veya yurt dışında kişisel verilerinizin aktarıldığı
                                        üçüncü
                                        kişileri bilme,</span></div>
                            </div>
                        </li>
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">Kişisel verilerinizin eksik veya yanlış işlenmiş olması halinde
                                        bunların
                                        düzeltilmesini isteme,</span></div>
                            </div>
                        </li>
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">KVKK mevzuatında öngörülen şartlar çerçevesinde kişisel
                                        verilerinizin
                                        silinmesini veya yok edilmesini isteme,</span></div>
                            </div>
                        </li>
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">Eksik veya yanlış verilerinizin düzeltilmesi ile kişisel
                                        verilerinizin
                                        silinmesi veya yok edilmesini talep ettiğinizde, bu durumun kişisel verilerinizin
                                        aktarıldığı üçüncü kişilere bildirilmesini isteme,</span></div>
                            </div>
                        </li>
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">İşlenen verilerinizin münhasıran otomatik sistemler vasıtasıyla
                                        analiz
                                        edilmesi suretiyle aleyhe bir sonucun ortaya çıkması durumunda sonuca itiraz etme
                                        ve</span></div>
                            </div>
                        </li>
                        <li style="list-style: square !important;">
                            <div class="list-bullet"></div>
                            <div class="list-content">
                                <div class="para"><span
                                        style="--darkmode-color: rgb(239, 239, 239); --lightmode-color: rgb(72, 72, 72);"
                                        class="UrtAp">Kişisel verilerinizin kanuna aykırı olarak işlenmesi sebebiyle
                                        zarara
                                        uğraması halinde bu zararın giderilmesini talep etme,</span></div>
                            </div>
                        </li>
                    </ul>
                    <div class="para"><br></div>
                    <div style="text-align:start;" class="para"><span
                            style="--darkmode-color: rgb(223, 223, 223); --lightmode-color: rgb(100, 100, 100);"
                            class="UrtAp">haklarına sahipsiniz.</span></div>
                    <div style="text-align:start;" class="para"><br></div>
                    <div style="text-align:start;" class="para">Yukarıda yer alan tüm kişisel verilerinizin belirtilen
                        işleme
                        amaçları ile sınırlı olmak üzere işlenmesine hiçbir baskı altında kalmadan ve açık biçimde muvafakat
                        ettiğinizi, üye ol sayfasındaki “hesabımı oluştur” butonuna tıklayarak kabul etmiş olursunuz.</div>
                    <div class="para"><br></div>
                    <div class="para"><br></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
    <script>
        var phoneInput = document.getElementById('phone_number');
        var maskOptions = {
            mask: '(0000) 000-00-00'
        };
        var mask = IMask(phoneInput, maskOptions);

        // var kvkk = document.querySelector("#kvkk");
        // var submit = document.querySelector("#submit");

        // submit.setAttribute("disabled", true);

        // kvkk.addEventListener("change", function(e) {
        //     if (e.target.checked == true) {
        //         submit.removeAttribute("disabled");
        //     } else {
        //         submit.setAttribute("disabled", "");
        //     }
        // });

        const pwd = document.getElementById("password");
        const pwdStrength = document.getElementById("password-strength");
        const pwdStrengthText = document.getElementById("password-strength-text");

        pwd.addEventListener("input", function() {
            const pwdVal = pwd.value;
            let result = zxcvbn(pwdVal);
            switch (result.score) {
                case (0):
                    pwdStrength.classList.add("strength-0");
                    pwdStrength.classList.remove("strength-1");
                    pwdStrength.classList.remove("strength-2");
                    pwdStrength.classList.remove("strength-3");
                    pwdStrength.classList.remove("strength-4");

                    pwdStrengthText.classList.add("text-red-1");
                    pwdStrengthText.classList.remove("text-warning");
                    pwdStrengthText.classList.remove("text-green-1");
                    pwdStrengthText.classList.remove("text-green-5");
                    pwdStrengthText.innerHTML = "Zayıf";
                    break;
                case (1):
                    pwdStrength.classList.add("strength-1");
                    pwdStrength.classList.remove("strength-0");
                    pwdStrength.classList.remove("strength-2");
                    pwdStrength.classList.remove("strength-3");
                    pwdStrength.classList.remove("strength-4");

                    pwdStrengthText.classList.add("text-red-1");
                    pwdStrengthText.classList.remove("text-warning");
                    pwdStrengthText.classList.remove("text-green-1");
                    pwdStrengthText.classList.remove("text-green-5");
                    pwdStrengthText.innerHTML = "Zayıf";
                    break;
                case (2):
                    pwdStrength.classList.add("strength-2");
                    pwdStrength.classList.remove("strength-1");
                    pwdStrength.classList.remove("strength-0");
                    pwdStrength.classList.remove("strength-3");
                    pwdStrength.classList.remove("strength-4");

                    pwdStrengthText.classList.add("text-warning");
                    pwdStrengthText.classList.remove("text-red-1");
                    pwdStrengthText.classList.remove("text-green-1");
                    pwdStrengthText.classList.remove("text-green-5");
                    pwdStrengthText.innerHTML = "Orta";
                    break;
                case (3):
                    pwdStrength.classList.add("strength-3");
                    pwdStrength.classList.remove("strength-1");
                    pwdStrength.classList.remove("strength-2");
                    pwdStrength.classList.remove("strength-0");
                    pwdStrength.classList.remove("strength-4");

                    pwdStrengthText.classList.add("text-green-1");
                    pwdStrengthText.classList.remove("text-warning");
                    pwdStrengthText.classList.remove("text-red-1");
                    pwdStrengthText.classList.remove("text-green-5");
                    pwdStrengthText.innerHTML = "İyi";
                    break;
                case (4):
                    pwdStrength.classList.add("strength-4");
                    pwdStrength.classList.remove("strength-1");
                    pwdStrength.classList.remove("strength-2");
                    pwdStrength.classList.remove("strength-3");
                    pwdStrength.classList.remove("strength-0");

                    pwdStrengthText.classList.add("text-green-5");
                    pwdStrengthText.classList.remove("text-warning");
                    pwdStrengthText.classList.remove("text-green-1");
                    pwdStrengthText.classList.remove("text-green-1");
                    pwdStrengthText.innerHTML = "Cok İyi";
                    break;
            }
        });

        const togglePassword = document.querySelector("#togglePassword")
        togglePassword.addEventListener("click", function(e) {
            if (pwd.type == 'password') {
                pwd.type = "text"
                e.target.classList.remove("fa-eye")
                e.target.classList.add("fa-eye-slash")
            } else {
                pwd.type = "password"
                e.target.classList.add("fa-eye")
                e.target.classList.remove("fa-eye-slash")
            }
        })

        const passwordTips = document.querySelector("#passwordTips")
        const hint = document.querySelector("#hint")
        passwordTips.addEventListener("mouseenter", function(e) {
            hint.classList.add("show")
            hint.classList.remove("hide")
        })
        passwordTips.addEventListener("mouseleave", function(e) {
            hint.classList.remove("show")
            hint.classList.add("hide")
        })
    </script>
@endsection
