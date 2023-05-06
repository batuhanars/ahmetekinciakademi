@extends('home.layout.page-layout')
@section('title', 'Siparişi Onayla')
@section('content')
    @include('home.breadcrumb', [
        'dark' => false,
        'items' => [
            [
                'link' => route('home.index'),
                'title' => 'Anasayfa',
            ],
            [
                'link' => '',
                'title' => 'Ödeme',
            ],
        ],
    ])
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">Siparişi Onayla</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-lg">

        <div class="container">
            <div class="row y-gap-50">
                <div class="col-lg-8">
                    <div style="box-shadow: 0 0 5px #bdc3c7; padding:20px; margin-bottom:50px;" class="rounded-8">
                        <a href="#" class="coursesCard -type-1 row y-gap-20 flex-row items-center">
                            <div class="col-xl-4 col-lg-4">
                                <div class="coursesCard__image rounded-8 relative">
                                    <img class="w-1/1 rounded-8" src="{{ $course->image }}" alt="{{ $course->title }}">
                                    <div class="coursesCard__image_overlay rounded-8"></div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-flex items-center">
                                    <div class="text-14 lh-1 text-yellow-1 mr-10">{{ $course->sumRate() }}</div>
                                    <div class="d-flex x-gap-5 items-center">
                                        @for ($i = 0; $i < $course->sumRate(); $i++)
                                            <div class="icon-star text-9 text-yellow-1"></div>
                                        @endfor
                                    </div>
                                </div>

                                <div class="col-xl-7 text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $course->title }}</div>
                                <div class="mt-8" title="{{ $course->description }}">
                                    {{ Str::limit($course->description, 200) }}
                                </div>

                                <div class="row x-gap-10 y-gap-10 items-center pt-10">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            @if ($course->instructor->image)
                                                <img src="{{ $course->instructor->image }}"
                                                    alt="{{ $course->instructor->fullname }}" class="rounded-16"
                                                    style="width: 34px;">
                                            @else
                                                <span
                                                    class="uppercase bg-black px-2 rounded-16 text-white">{{ Str::limit($course->instructor->fullname, 1, '') }}</span>
                                            @endif
                                            <div class="ml-10">{{ $course->instructor->fullname }}</div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <img class="mr-8"
                                                src="{{ asset('assets/front') }}/img/coursesCards/icons/1.svg"
                                                alt="icon">
                                            <div class="text-14 lh-1">{{ $course->lessonCount() }} ders</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div style="box-shadow: 0 0 5px #bdc3c7; padding:20px;" class="rounded-8">
                        <h3 class="mt-20">Ön Bilgilendirme Formu</h3>
                        <div style="margin-top:50px; height: 400px; overflow-y:auto;">
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">TANIMLAR</span></b></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">İNTERNET SİTESİ:&nbsp;SATICI’nın, ürün ve hizmetlerini internet üzerinden
                                    Tüketici’ye
                                    satışını gerçekleştirdiği mecra olup işbu sözleşmede&nbsp;</span><a
                                    href="http://ahmetekinciakademi.com" rev="en_rl_none"
                                    class="en-link">ahmetekinciakademi.com</a><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">&nbsp;olarak temsil edilmektedir.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">SATICI:&nbsp;AHMET EKİNCİ</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">ÜRÜN/ÜRÜNLER:&nbsp;İNTERNET SİTESİ’nde ALICI’lara satışı yapılan tüm mal
                                    ve
                                    hizmetleri
                                    kapsamaktadır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">ALICI:&nbsp;İNTERNET SİTESİ üzerinden ÜRÜN/HİZMET sipariş etmekte olan
                                    kişileri
                                    belirtmektedir.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">SÖZLEŞME:&nbsp;İNTERNET SİTESİ üzerinden SATICI’nın TÜKETİCİ’ye
                                    gerçekleştirmiş olduğu
                                    satış işleminin şart ve yükümlülüklerini içermektedir.</span></div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">1. KONU</span></b></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">İşbu
                                    Ön Bilgilendirme Formu’nun (“Form”) konusu aşağıda nitelik ve satış fiyatı belirtilen
                                    Ürünlerin,
                                    (“Ürünler”) Hizmetlerin (“Hizmetler”) satışı ve teslimi ile ilgili olarak 6502 sayılı
                                    Tüketicilerin
                                    Korunması Hakkında Kanun ve 27 Kasım 2014 tarihli ve 29188 sayılı Resmi Gazete’de
                                    yayımlanan
                                    Mesafeli Sözleşmelere Dair Yönetmelik hükümleri gereğince bilgilendirilmesidir.</span>
                            </div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">2. SATICI BİLGİLERİ</span></b></strong>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Ünvanı:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    ahmetekincicomtr (Bundan böyle Ahmet Ekinci ya da Hizmet Sağlayıcı olarak
                                    anılacaktır.)</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Adres:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">&nbsp;</span><span
                                    style="--darkmode-color: rgb(249, 249, 249); --lightmode-color: rgb(43, 43, 43);"
                                    class="UrtAp">Eryaman Mahallesi, Şapka Devrimi Caddesi NO: 30 -
                                    Ankara/Etimesgut</span>
                            </div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Telefon:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    0531 880 4653 - 0850 307 1259</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">E-posta:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                </span><a href="mailto:iletisim@ahmetekinciakademi.com" rev="en_rl_none"
                                    class="en-link">iletisim@ahmetekinciakademi.com</a></div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">3. ALICI BİLGİLERİ</span></b></strong>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Teslim edilecek kişi:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">&nbsp;{{ auth()->user()->fullname }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Teslimat Adresi:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->customer->address }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Telefon:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->phone }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Eposta/kullanıcı adı:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->email }}</span></div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">4. FORM KONUSU ÜRÜN/ÜRÜNLER BİLGİLERİ</span></b></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">4.1
                                    Malın / Ürün-Ürünlerin / Hizmetin temel özellikleri (türü, miktarı, marka/modeli, rengi,
                                    adedi)
                                    HİZMET SAĞLAYICI’ya&nbsp;ait internet sitesinde yer almaktadır.</span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp"><span data-markholder="true"></span></span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">4.2
                                    Listelenen ve sitede ilan edilen fiyatlar satış fiyatıdır. İlan edilen fiyatlar ve
                                    vaatler
                                    güncelleme yapılana ve değiştirilene kadar geçerlidir. Süreli olarak ilan edilen
                                    fiyatlar
                                    ise
                                    belirtilen süre sonuna kadar geçerlidir.</span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp"><span data-markholder="true"></span></span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">4.3
                                    Form konusu mal ya da hizmetin tüm vergiler dahil satış fiyatı aşağıdaki tabloda
                                    gösterilmiştir.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp"><b>Ürün:</b> {{ $course->title }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Teslimat Adresi:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->customer->address }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Fatura Adresi:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->customer->address }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Sipariş Tarihi:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ now() }}</span></div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">5. GENEL HÜKÜMLER</span></b></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.1
                                    Alıcı, İşbu Form’da satışa konu Ürünün temel nitelikleri, satış fiyatı ve ödeme şekli
                                    ile
                                    teslimata
                                    ilişkin ön bilgileri okuyup bilgi sahibi olduğunu ve yazılı olarak gerekli teyidi
                                    verdiğini
                                    beyan
                                    eder.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.2
                                    Alıcı; İşbu Form’u yazılı olarak teyit etmekle, mesafeli sözleşmelerin akdinden önce,
                                    Satıcı
                                    tarafından tüketiciye verilmesi gereken adres, siparişi verilen ürünlere ait temel
                                    özellikler,
                                    ürünlerin vergiler dahil fiyatı, ödeme ve teslimat bilgilerini de doğru ve eksiksiz
                                    olarak
                                    edindiğini teyit etmiş olur.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.3
                                    Hizmet Sağlayıcı, Ürünler’in teslim edilmesinin&nbsp;imkansızlaşması&nbsp;halinde bu
                                    durumu,
                                    sözleşmeden doğan ifa yükümlülüğünün süresi dolmadan Alıcı’ya bildirir ve 14 (on dört)
                                    günlük süre
                                    içinde toplam bedeli Alıcı’ya iade eder.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.4
                                    Herhangi bir nedenle Ürün bedeli ödenmez veya banka kayıtlarında iptal edilir ise,
                                    Hizmet
                                    Sağlayıcı,
                                    ürünün teslimi yükümlülüğünden kurtulmuş kabul edilir.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.5
                                    Ürünler’in bedelinin herhangi bir sebepten dolayı Hizmet Sağlayıcı’ya ödememesi halinde,
                                    Alıcı,
                                    Hizmet Sağlayıcı’nın bildiriminden itibaren en geç 3 gün içinde Ürünleri tüm masrafları
                                    kendisine
                                    ait olmak üzere Hizmet Sağlayıcı’ya iade eder. Hizmet Sağlayıcı’nın Ürün bedeli
                                    alacağını
                                    takip
                                    dahil diğer tüm akdi-kanuni hakları ayrıca ve her halükarda saklıdır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.6
                                    ALICI,&nbsp;HİZMET SAĞLAYICI’dan&nbsp;aldığı eğitim programının içinde verilecek olan
                                    eğitim
                                    materyallerini (Video, PDF, PowerPoint Sunumu vb.) hiçbir şekilde kopyalayamaz,
                                    çoğaltamaz,
                                    satamaz.
                                    ALICI herhangi bir şekilde söz konusu materyalleri kopyaladığı takdirde bu ürünlerle
                                    ilgili&nbsp;HİZMET SAĞLAYICI’nın&nbsp;uğrayacağı tüm maddi ve manevi zararları ile
                                    yoksun
                                    kalınan
                                    kazancı tazmin edeceği gibi cezai yaptırımlarla da karşı karşıya kalacaktır.</span>
                            </div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">6. FATURA BİLGİLERİ</span></b></strong>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Ad/Soyad/Unvan:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->fullname }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Adres:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->customer->address }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Telefon:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->phone }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Eposta/kullanıcı adı:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ auth()->user()->email }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Fatura teslim:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    Fatura, ödeme işleminden sonra ilgili mail adresine e-arşiv fatura olarak teslim
                                    edilecektir.</span>
                            </div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">7. CAYMA HAKKI</span></b></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">7.1
                                    Mesafeli Satış Yönetmeliği’nin 15(g) maddesi uyarınca işbu satış sözleşmesinden cayma
                                    hakkı
                                    mevcut
                                    olmayıp, yapılan satışlar kural ile kesindir ve iadesi mümkün değildir.</span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp"><span data-markholder="true"></span></span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">7.2
                                    Birebir eğitimler dışında diğer videolu eğitimlere katılım sağlayan katılımcıların,
                                </span>"Cayma
                                Hakkı Kullanılamayacak Ürünler" hükümleri çerçevesinde kullanılmamış olması şartı ile 14 (on
                                dört) gün
                                içerisinde cayma haklarını kullanabileceklerdir.</div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">8. YETKİLİ MAHKEME</span></b></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Hizmet Sağlayıcı,&nbsp;şikayet&nbsp;ve itirazları konusunda
                                    başvurularını,
                                    T.C. Sanayi
                                    ve Ticaret Bakanlığı tarafından her yıl Aralık ayında belirlenen parasal
                                    sınırlar&nbsp;dahilinde&nbsp;mal veya hizmeti satın aldığı veya ikâmetgahının bulunduğu
                                    yerdeki
                                    tüketici sorunları hakem heyetine veya tüketici mahkemesine yapabilir.</span></div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">9. DİĞER HÜKÜMLER</span></b></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">İşbu
                                    Ön Bilgilendirme Formu elektronik ortamda Alıcı tarafından okunarak kabul edildikten
                                    sonra
                                    Uzak
                                    Mesafeli Satış Sözleşmesi kurulması aşamasına geçilecektir.&nbsp;İşbu Ön Bilgilendirme
                                    Formu’nda
                                    belirtilen ön bilgileri edindiğimi teyit ederim.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">Hizmet Sağlayıcı:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    Ahmet Ekinci – ahmetekincicomtr</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">ALICI:&nbsp;</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">{{ auth()->user()->fullname }}</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><b><span
                                        style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                        class="UrtAp">TARİH:</span></b><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                    {{ now() }}</span></div>
                        </div>
                    </div>
                    <div style="box-shadow: 0 0 5px #bdc3c7; padding:20px; margin-top: 50px;" class="rounded-8">
                        <h3 class="mt-20">Mesafeli Satış Sözleşmesi</h3>
                        <div style="margin-top:50px; height: 400px; overflow-y:auto;">
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">TANIMLAR</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">İşbu
                                    sözleşmenin uygulanmasında ve yorumlanmasında aşağıda yazılı terimler karşılarındaki
                                    yazılı
                                    açıklamaları ifade edeceklerdir.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Kanun:&nbsp;6502 sayılı Tüketicinin Korunması Hakkında Kanun</span>
                            </div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Kanun:&nbsp;6098 sayılı Türk Borçlar Kanunu (Şirketler için)</span>
                            </div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Yönetmelik:&nbsp;Mesafeli Sözleşmeler Yönetmeliği
                                    (RG:27.11.2014/29188)</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Ürün:&nbsp;Bir ücret veya menfaat karşılığında yapılan ya da yapılması
                                    taahhüt edilen
                                    mal sağlama dışındaki her türlü tüketici işleminin konusu</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Hizmet Sağlayıcı:&nbsp;Ticari veya mesleki faaliyetleri kapsamında
                                    müşterisine hizmet
                                    sunan şirket veya “ahmetekincicomtr”</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Müşteri:&nbsp;Hizmet Sağlayıcının sunduğu bir hizmeti edinen, kullanan
                                    veya
                                    yararlanan
                                    gerçek ya da tüzel kişi veya “Alıcı”</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Site:&nbsp;Hizmet Sağlayıcı’ya ait internet sitesi</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Taraflar:&nbsp;Hizmet Sağlayıcı ve Müşteri</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Sözleşme:&nbsp;Hizmet Sağlayıcı ve Müşteri arasında akdedilen işbu
                                    sözleşme</span>
                            </div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">1.
                                    HİZMET SAĞLAYICI</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Ünvanı: Ahmet Ekinci – ahmetekincicomtr (Bundan böyle “Ahmet Ekinci”
                                    veya
                                    “Hizmet
                                    Sağlayıcı” olarak anılacaktır.)</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Adres: Eryaman Mahallesi, Şapka Devrimi Caddesi NO: 30 –
                                    Ankara/Etimesgut</span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Telefon: 0 (531) 880 4653</span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">E-posta: </span><a href="mailto:iletisim@ahmetekinciakademi.com"
                                    rev="en_rl_none" class="en-link">iletisim@ahmetekinciakademi.com</a><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                </span></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">2.
                                    MÜŞTERİ</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Bundan böyle Alıcı ve Hizmet Sağlayıcı birlikte “Taraflar” olarak
                                    anılacaktır.</span>
                            </div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">3.
                                    SÖZLEŞMENİN KONUSU</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">İşbu
                                    sözleşmenin konusu, Hizmet Sağlayıcı’nın, Alıcı’ya satışını yaptığı, işbu sözleşmenin
                                    3’ncü
                                    maddesinde nitelikleri ve satış fiyatı belirtilen hizmetlerin satışı ve ifası ile ilgili
                                    olarak 6502
                                    sayılı Tüketicinin Korunması Hakkında Kanun, 29188 sayılı Mesafeli Sözleşmeler
                                    Yönetmeliği
                                    ve ilgili
                                    diğer yasal hükümler uyarınca tarafların hak ve yükümlülüklerinin
                                    belirlenmesidir.</span>
                            </div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">İşbu
                                    sözleşmenin konusu, Hizmet Sağlayıcı’nın, Alıcı’ya satışını yaptığı, işbu sözleşmenin
                                    3’ncü
                                    maddesinde nitelikleri ve satış fiyatı belirtilen hizmetlerin satışı ve ifası ile ilgili
                                    olarak 6098
                                    sayılı Borçlar Kanunu, 29188 sayılı Mesafeli Sözleşmeler Yönetmeliği ve ilgili diğer
                                    yasal
                                    hükümler
                                    uyarınca tarafların hak ve yükümlülüklerinin belirlenmesidir. (Şirketler için)</span>
                            </div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">4.
                                    HİZMET DETAYLARI</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">İşbu
                                    Sözleşme konusu hizmete ve ödeme şekillerine ait bilgiler aşağıdaki gibidir:</span>
                            </div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Hizmet:&nbsp;{{ $course->title }}</span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Satış Fiyatı:&nbsp;{{ $course->price }}₺</span></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.
                                    HİZMETİN İFASI ve İFA ŞEKLİ</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.1&nbsp;Birebir eğitim olarak sunulan hizmetler, online ortamda veya
                                    Alıcı’ya
                                    bildirilen başka bir adreste ve bildirilen tarihte ifa edilecektir. İfa anında Alıcı ifa
                                    yerinde
                                    bulunmaması halinde Hizmet Sağlayıcı edimini tam ve eksiksiz olarak yerine getirmiş
                                    olarak
                                    kabul
                                    edilecektir. Kayıtlı videolu eğitim hizmetine ise Ahmet Ekinci Akademi içerisinden
                                    ulaşım
                                    sağlanabilecektir.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">5.2&nbsp;Sözleşme konusu hizmetin ifası için işbu Sözleşme’nin Alıcı
                                    tarafından
                                    onaylanması ve hizmet bedelinin Hizmet Sağlayıcı’nın sunduğu ödeme şekillerinden biri
                                    ile
                                    ödenmiş
                                    olması şarttır. Herhangi bir nedenle hizmet bedeli ödenmez veya banka kayıtlarında iptal
                                    edilir ise
                                    Hizmet Sağlayıcı, Sözleşme’ye konu hizmeti ifa etme yükümlülüğünden kurtulmuş kabul
                                    edilir.</span>
                            </div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.
                                    GENEL HÜKÜMLER</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.1&nbsp;Alıcı, Hizmet Sağlayıcı’nın isim, unvan, açık adres, telefon ve
                                    diğer erişim
                                    bilgileri, satışa konu hizmetlerin temel nitelikleri, vergiler dahil satış fiyatı, ödeme
                                    şekli, ifa
                                    yeri, ifa koşulları ve satışa konu hizmet ile ilgili tüm ön bilgiler ve cayma hakkı
                                    konusu
                                    dahil
                                    fakat bunlarla sınırlı olmamak üzere hizmet ile ilgili her türlü bilgi sahibi olduğunu,
                                    bu
                                    ön
                                    bilgileri elektronik ortamda teyit ettiğini ve sonrasında hizmeti satın aldığını işbu
                                    Sözleşme
                                    hükümlerince kabul ve beyan eder.&nbsp;</span>www.ahmetekinciakademi.com<span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">&nbsp;sitesinde yer alan ön bilgilendirme ve fatura işbu Sözleşmenin
                                    ayrılmaz
                                    parçalarıdır. Hizmet bedeli ödendiği vakit, bu Sözleşme kurulmuş ve Alıcı, Sözleşme’nin
                                    tüm
                                    koşullarını kabul etmiş sayılır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.2&nbsp;Hizmet Sağlayıcı, sözleşme konusu etkinliğe ilişkin
                                    olarak&nbsp;</span><a href="http://www.ahmetekinciakademi.com'da" rev="en_rl_none"
                                    class="en-link">www.ahmetekinciakademi.com'da</a><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">
                                </span>yer verilen bilgilerin doğruluğu ve hizmetin belirtilen niteliklere uygun olmasından
                                kendisinin
                                sorumlu olduğunu kabul, beyan ve taahhüt eder.</div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.3&nbsp;Eğitim içeriği, eğitim esnasında, Hizmet Sağlayıcı’nın ekip
                                    dinamiklerine
                                    veya başka bir sebebe bağlı olarak değişiklik gösterebilir. Bu durumda katılımcının
                                    ücret
                                    iade hakkı
                                    doğmamaktadır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.4&nbsp;Hizmet Sağlayıcı, programda açıklanan eğitim günü, saati, yeri
                                    değiştirme
                                    hakkını saklı tutar.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.5&nbsp;Eğitimlerin belirtilen saatten daha erken ya da daha geç
                                    bitmesi
                                    eğitmenin
                                    inisiyatifinde olup, bu durum Alıcı’ya bir talep hakkı vermeyeceği gibi, planlanandan
                                    daha
                                    uzun
                                    süren eğitimler için Hizmet Sağlayıcı’ya, Müşteri’den ek bir ücret talep etme hakkı
                                    vermez.</span>
                            </div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.6&nbsp;Eğitim esnasında, eğitmene veya diğer katılımcılara sözlü
                                    olarak
                                    sataşma,
                                    kışkırtma, hakaret ya da şikayete konu olacak herhangi bir eylem ya da davranışın vukuu
                                    bulması
                                    halinde, Hizmet Sağlayıcı bu eylemi gerçekleştiren katılımcıyı veya katılımcıları online
                                    sınıftan
                                    çıkarma ve bu katılımcı veya katılımcılar açısından eğitimi sonlandırma hakkına
                                    sahiptir. Bu
                                    durumda
                                    katılımcı veya katılımcılar konu eğitime katılmak için ödediği bedelin iadesini talep
                                    edemez.</span>
                            </div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.7&nbsp;Alıcı, Hizmet Sağlayıcı’dan aldığı eğitim programının içinde
                                    verilecek olan
                                    eğitim materyallerini (PDF, PowerPoint Sunumu vb.) hiçbir şekilde kopyalayamaz,
                                    çoğaltamaz,
                                    satamaz
                                    ya da ücretli/ücretsiz olarak dağıtamaz. Alıcı, herhangi bir şekilde söz konusu
                                    materyalleri
                                    kopyaladığı takdirde bu ürünlerle ilgili Hizmet Sağlayıcı’nın uğrayacağı tüm maddi ve
                                    manevi
                                    zararları ile yoksun kılınan kazancı tazmin edeceği gibi cezai yaptırımlarla da karşı
                                    karşıya
                                    kalacaktır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.8&nbsp;Eğitime katılım bağlantısı, Alıcı’ya Hizmet Sağlayıcı
                                    tarafından
                                    e-posta ya
                                    da WhatsApp ya da SMS yoluyla gönderilecek olup, bunun takibi Alıcı’ya ait olacaktır.
                                    Hizmet
                                    Sağlayıcı tarafından gönderilen e-posta ya da SMS ya da WhatsApp mesajı katılımcıya
                                    ulaşmaması
                                    halinde, sorun katılımcıdan kaynaklanıyorsa, Hizmet Sağlayıcı herhangi bir mesuliyet
                                    kabul
                                    etmez ve
                                    konu bildirim katılımcıya yapılmış sayılır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.9&nbsp;Eğitim yeterli kontenjana ulaşmadığı takdirde, ücret iadesi
                                    yapılması veya bu
                                    hakkın başka bir eğitime katılım için kullanılmasına imkan verilmesi tamamen Hizmet
                                    Sağlayıcı’nın
                                    tasarrufundadır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.10&nbsp;Taraflar, Sözleşme’nin hükümlerinin haksız şart sayılabilecek
                                    bir
                                    özellik
                                    taşımadığını, menfaatler dengesi bakımından bir haksızlık bulunmadığını kabul
                                    ederler.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.11&nbsp;İşbu sözleşme hükümleri 6098 sayılı Borçlar Kanunu ve 29188
                                    sayılı
                                    Mesafeli
                                    Sözleşmeler Yönetmeliği hükümleri dikkate alınarak hazırlanmıştır. İşbu sözleşme
                                    hükümlerinden
                                    hiçbiri işbu Sözleşme’nin niteliğine ve işin özelliğine yabancı nitelik
                                    taşımaz.(Şirketler
                                    için)</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">6.12&nbsp;İşbu Sözleşme’nin tüm maddeleri Hizmet Sağlayıcı ve Alıcı
                                    tarafından okunmuş
                                    ve kabul edilmiş olup, bu Sözleşme ilgili etkinliğe ilişkin satışın tamamlandığı tarihte
                                    yürürlüğe
                                    girer.</span></div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">7.
                                    HİZMET BEDELİNİN ÖDENMESİ</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">7.1&nbsp;Alıcı’nın kredi kartı ile ödemede bulunabilmesi için kredi
                                    kartı
                                    bilgilerini
                                    tam ve eksiksiz olarak doldurması gerekmektedir.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">7.2
                                    Kredi kartı ile tek çekimde ödemede bulunulabileceği gibi, ödemeler taksitli olarak da
                                    yapılabilir.
                                    Taksitlendirme işlemlerinde, Alıcı ile banka arasında imzalanmış bulunan sözleşme
                                    hükümleri
                                    geçerlidir. Banka, kampanyalar düzenleyerek Alıcı’nın seçtiği taksit adedinin daha
                                    üzerinde
                                    bir
                                    taksit adedi uygulama ve/veya taksit erteleme gibi hizmetler sunabilir. Bu tür
                                    kampanyalar
                                    bankanın
                                    tasarrufundadır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">7.3&nbsp;Banka havalesi ya da EFT yoluyla yapılan ödemelerde
                                    Sözleşme’nin
                                    kurulma anı,
                                    ödemenin Hizmet Sağlayıcı’nın banka hesabına ulaştığı tarihtir. Banka havalesi ya da EFT
                                    yoluyla
                                    yapılan ödemelerde, 2 (İki) iş günü içinde ödemenin gerçekleşmemesi durumunda, Hizmet
                                    Sağlayıcı,
                                    hizmete ilişkin satış işlemini iptal etme hakkına haiz olacaktır.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">7.4&nbsp;Ödemenin kredi kartı veya benzeri bir ödeme kartı ile yapılması
                                    halinde,
                                    hizmetin alınmasından sonra, Alıcı’ya ait kredi kartının, Alıcı’nın rızası dışında
                                    yetkisiz
                                    kişilerce haksız veya hukuka aykırı olarak kullanılması nedeniyle, banka veya finans
                                    kuruluşunun
                                    ürün bedelini Hizmet Sağlayıcı’ya ödememesi halinde, Hizmet Sağlayıcı sözleşmeye konu
                                    hizmeti ifa
                                    etmekten kaçınabilir.</span></div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">8.
                                    CAYMA HAKKI</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">8.1
                                    Mesafeli Satış Yönetmeliği’nin 15(g) maddesi uyarınca işbu satış sözleşmesinden cayma
                                    hakkı
                                    mevcut
                                    olmayıp, yapılan satışlar kural ile kesindir ve iadesi mümkün değildir.</span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp"><span data-markholder="true"></span></span></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">8.2
                                    Birebir eğitimler dışında diğer videolu eğitimlere katılım sağlayan katılımcıların,
                                </span>"Cayma
                                Hakkı Kullanılamayacak Ürünler" hükümleri çerçevesinde kullanılmamış olması şartı ile 14 (on
                                dört) gün
                                içerisinde cayma haklarını kullanabileceklerdir.</div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">9.
                                    BİLDİRİMLER</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">9.1
                                    İşbu Sözleşme tahtında Taraflar arasında yapılacak her türlü yazışma, Kanunda sayılan
                                    zorunlu haller
                                    dışında, e-posta ya da WhatsApp aracılığıyla yapılacaktır. Alıcı, işbu Sözleşme’den
                                    doğabilecek
                                    ihtilaflarda Hizmet Sağlayıcı ile yaptığı e-posta ya da WhatsApp yazışmalarının
                                    bağlayıcı,
                                    kesin ve
                                    münhasır delil teşkil edeceğini, bu maddenin Hukuk Muhakemeleri Kanunu’nun 193. maddesi
                                    anlamında
                                    delil sözleşmesi niteliğinde olduğunu kabul, beyan ve taahhüt eder.</span></div>
                            <div class="para"><br></div>
                            <strong style="text-align:start;"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">10.
                                    YETKİLİ MAHKEMELER</span></strong>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Hizmet Sağlayıcı,&nbsp;şikayet&nbsp;ve itirazları konusunda
                                    başvurularını,
                                    T.C. Sanayi
                                    ve Ticaret Bakanlığı tarafından her yıl Aralık ayında belirlenen parasal
                                    sınırlar&nbsp;dahilinde&nbsp;mal veya hizmeti satın aldığı veya ikâmetgahının bulunduğu
                                    yerdeki
                                    tüketici sorunları hakem heyetine veya tüketici mahkemesine yapabilir.</span></div>
                            <div class="para"><br></div>
                            <div style="text-align:start;" class="para"><span
                                    style="--darkmode-color: rgb(247, 248, 248); --lightmode-color: rgb(44, 47, 52);"
                                    class="UrtAp">Hizmet Sağlayıcı : Ahmet Ekinci – ahmetekincicomtr</span></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <form action="{{ route('home.checkout.course', $course) }}" method="post">
                        @csrf
                        <div class="">
                            <div class="pt-30 pb-15 bg-white border-light rounded-8 bg-light-4">
                                <h5 class="px-30 text-20 fw-500">
                                    Sipariş Özeti
                                </h5>

                                <div class="d-flex justify-between px-30 mt-25">
                                    <div class="py-15 fw-500 text-dark-1">Ürün</div>
                                    <div class="py-15 fw-500 text-dark-1">Ara Toplam</div>
                                </div>

                                <div class="d-flex justify-between border-top-dark px-30">
                                    <div class="py-15 text-grey">{{ $course->title }}</div>
                                    <div class="py-15 text-grey">{{ $course->price }}₺</div>
                                </div>

                                <div class="d-flex justify-between border-top-dark px-30">
                                    <div class="py-15 fw-500 text-dark-1">Genel Toplam</div>
                                    <div class="py-15 fw-500 text-dark-1">{{ $course->price }}₺</div>
                                </div>

                                <div class="d-flex justify-between border-top-dark px-30 pt-15">
                                    <input type="checkbox" name="agreement" class="me-3" id="agreement"
                                        value="Onayladım">
                                    <span id="agreementLabel">
                                        Ön bilgilendirme formu ve Mesafeli Satış sözleşmesini okudum, onaylıyorum
                                    </span>
                                </div>
                            </div>
                            <button type="submit" id="orderApply" class="button -blue-1 -md text-white mt-15"
                                style="width:100%;">Siparişi
                                Onayla</b>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection()
@section('js')
    <script>
        const agreeement = document.querySelector("#agreement");
        const agreeementLabel = document.querySelector("#agreementLabel");
        const orderApply = document.querySelector("#orderApply");

        orderApply.setAttribute("type", "button");
        agreement.addEventListener("change", (e) => {
            if (e.target.checked == true) {
                orderApply.setAttribute("type", "submit");
            } else {
                iframe.style.display = "none"
            }

        })

        orderApply.addEventListener("click", function() {
            if (agreeement.checked == false) {
                agreeementLabel.style.color = 'red'
            }
        })
    </script>
@endsection
