<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="@yield('keywords', $general->keywords)">
    <meta name="description" content="@yield('keywords', $general->description)">
    <link rel="shortcut icon" href="{{ $general->favicon }}" />

    {{-- Geliştirici Firma --}}
    <meta name="author" content="Marka Press">
    <meta http-equiv="reply-to" content="bilgi@MarkaPress.com">

    {{-- Geliştirici --}}
    <meta name="author" content="Batuhan Arslan">
    <meta http-equiv="reply-to" content="batuhan.ars@yahoo.com">

    <meta name="copyright" content="Marka Press"><!-- Sayafayı Hazırlayan Firma-->
    <meta name="content-language" content="tr-TR">
    <!--Sayfa Dili-->
    <meta name="robots" content="index, follow">
    <!--Tüm Arama Motorları Tarafından İndexle-->
    <meta name="revisit-after" content="general">
    <!--Robotlar Her 7 Günce Bir Ziyaret Etsin-->

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold?styles=20876,20877,20878,20879,20880" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/base.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/choices.min.css">

    <link rel="stylesheet" href="{{ asset('/assets/front') }}/css/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('/assets/front') }}/css/leaflet.css" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/assets/front') }}/css/vendors.css">
    <link rel="stylesheet" href="{{ asset('/assets/front') }}/css/main.css">

    <link rel="stylesheet" href="{{ asset('assets/ckeditorstyles.css') }}">
    @yield('css')
    <style>
        a:hover {
            text-decoration: none;
        }
    </style>
    <title> @yield('title') | {{ $general->title }}</title>

    <style>
        .breadcrumbs {
            margin-top: 140px;
        }

        @media(max-width: 780px) {
            .breadcrumbs {
                margin-top: 120px;
            }
        }
    </style>
    <style>
        #cookiePopup {
            background: white;
            border: 1px solid #eeedf3;
            position: fixed;
            left: 50%;
            bottom: 20px;
            padding: 30px 30px;
            transform: translate(-50%, 0);
            align-items: center;
            justify-content: space-between;
            z-index: 999;
            border-radius: 20px;
            width: 90%;
        }

        #cookiePopup p {
            text-align: left;
            font-size: 15px;
            color: #4e4e4e;
        }

        #cookiePopup button {
            border: navajowhite;
            background: #4a3aff;
            padding: 10px 30px;
            border-radius: 20px;
            color: white;
            /* width: 150px; */
            box-shadow: 0 0 3px #4a3aff;
        }

        #cookiePopup button:last-child {
            background: white;
            color: #000;
            border: 1px solid #eeedf3;
            /* width: 80px; */
            box-shadow: 0px 0px 3px #cccccc;
            /* padding: 10px 5px; */
        }

        .hideProfile {
            display: none;
        }

        .showProfile {
            display: block;
        }

        .hideCart {
            display: none;
        }

        .showCart {
            display: block;
        }

        .hideNotification {
            display: none;
        }

        .showNotification {
            display: block;
        }

        .basket-button:hover .icon-basket,
        .notification-button:hover .icon-notification {
            color: #000 !important;
        }

        @media(min-width:800px) {
            .header__container {
                padding: 0 210px !important;
            }
        }
    </style>
</head>

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->


    <main class="main-content" id="app">
        <header data-anim="fade" data-add-bg="bg-dark-1" class="header -type-5 bg-dark-1">
            {{-- <div class="d-flex items-center bg-dark-3 py-12">
                <div class="header__container" style="padding: 0 210px !important">
                    <div class="row y-gap-5 justify-between items-center">
                        <div class="col-auto">
                            <div class="d-flex x-gap-40 y-gap-10 items-center">
                                <div class="d-flex items-center text-white md:d-none">
                                    <div class="icon-phone mr-10"></div>
                                    <div class="text-15 lh-1">0 (0850) 307 1259</div>
                                </div>
                                <div class="d-flex items-center text-white">
                                    <div class="text-15 lh-1">egitim@ahmetekinciakademi.com</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="d-flex x-gap-30 y-gap-10">
                                <div>
                                    <div class="d-flex x-gap-20 items-center text-white">
                                        <a href="{{ $socialMedia->whatsapp }}" target="_blank">
                                            <img src="{{ asset('assets') }}/WhatsApp-B.svg" alt=""
                                                style="width: 24px;">
                                        </a>
                                        <a href="{{ $socialMedia->telegram }}" target="_blank">
                                            <img src="{{ asset('assets') }}/Telegram-B.svg" alt=""
                                                style="width: 24px;">
                                        </a>
                                        <a href="{{ $socialMedia->twitter }}" target="_blank">
                                            <img src="{{ asset('assets') }}/Twitter-B.svg" alt=""
                                                style="width: 24px;">
                                        </a>
                                        <a href="{{ $socialMedia->instagram }}" target="_blank">
                                            <img src="{{ asset('assets') }}/Instagram-B.svg" alt=""
                                                style="width: 24px;">
                                        </a>
                                        <a href="{{ $socialMedia->linkedin }}" target="_blank">
                                            <img src="{{ asset('assets') }}/LinkedIn-B.svg" alt=""
                                                style="width: 24px;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="header__container py-10">
                <div class="row justify-content-between align-items-center">

                    <div class="col-auto">
                        <div class="header-left d-flex items-center">

                            <div class="header__logo ">
                                <a data-barba href="{{ route('home.index') }}">
                                    <img src="{{ $general->white_logo }}" alt="{{ $general->title }}"
                                        style="width: 150px;">
                                </a>
                            </div>

                            <div class="header-menu js-mobile-menu-toggle ">
                                <div class="header-menu__content">
                                    <div class="mobile-bg js-mobile-bg"></div>

                                    <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                                        @if (auth()->user())
                                            @if (auth()->user()->membership_type != 'customer')
                                                <a href="{{ route('customer.login') }}" class="text-dark-1">Giriş
                                                    Yap</a>
                                                <a href="{{ route('register') }}" class="text-dark-1 ml-30">Kayıt
                                                    Ol</a>
                                            @endif
                                        @else
                                            <a href="{{ route('customer.login') }}" class="text-dark-1">Giriş Yap</a>
                                            <a href="{{ route('register') }}" class="text-dark-1 ml-30">Kayıt
                                                Ol</a>
                                        @endif
                                    </div>

                                    <div class="menu js-navList">
                                        <ul class="menu__nav text-dark-1 ml-50 xl:ml-30 -is-active"
                                            style="list-style: none; margin:0; padding:0;">
                                            @foreach ($headerMenu as $item)
                                                <li
                                                    class="{{ $item->subMenu->count() ? 'menu-item-has-children' : '' }}">
                                                    <a data-barba
                                                        href="{{ $item->subMenu->count() ? '#' : $item->link }}"
                                                        class="text-white">
                                                        {{ $item->title }}
                                                        @if ($item->subMenu->count())
                                                            <i class="icon-chevron-right text-13 ml-10"></i>
                                                        @endif
                                                    </a>
                                                    @if ($item->subMenu->count())
                                                        <ul class="subnav">
                                                            <li class="menu__backButton js-nav-list-back">
                                                                <a href="#"><i
                                                                        class="icon-chevron-left text-13 mr-10"></i>
                                                                    {{ $item->title }}</a>
                                                            </li>
                                                            @foreach ($item->subMenu as $subItem)
                                                                <li><a
                                                                        href="{{ $subItem->link }}">{{ $subItem->title }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                                        <div class="mobile-footer__number">
                                            <div class="text-17 fw-500 text-white">Telefon</div>
                                            <div class="text-17 fw-500 text-purple-1">{{ $contact->phone }}</div>
                                        </div>

                                        <div class="lh-2 mt-10">
                                            <div>{{ $contact->address }}</div>
                                            <div>{{ $contact->email }}</div>
                                        </div>

                                        <div class="mobile-socials mt-10">

                                            <a href="{{ $socialMedia->whatsapp }}" target="_blank"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <img src="{{ asset('assets') }}/WhatsApp.svg" alt=""
                                                    style="width: 24px;">
                                            </a>

                                            <a href="{{ $socialMedia->telegram }}" target="_blank"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <img src="{{ asset('assets') }}/Telegram.svg" alt=""
                                                    style="width: 24px;">
                                            </a>

                                            <a href="{{ $socialMedia->twitter }}" target="_blank"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <img src="{{ asset('assets') }}/Twitter.svg" alt=""
                                                    style="width: 24px;">
                                            </a>

                                            <a href="{{ $socialMedia->instagram }}" target="_blank"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <img src="{{ asset('assets') }}/Instagram.svg" alt=""
                                                    style="width: 24px;">
                                            </a>

                                            <a href="{{ $socialMedia->linkedin }}" target="_blank"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <img src="{{ asset('assets') }}/LinkedIn.svg" alt=""
                                                    style="width: 24px;">
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                                    <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                                        <div class="icon-close text-dark-1 text-16"></div>
                                    </div>
                                </div>

                                <div class="header-menu-bg"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="header-right d-flex items-center">
                            <div class="header-right__icons text-white d-flex items-center">

                                {{-- <div class="">
                                    <button class="d-flex items-center text-white" data-el-toggle=".js-search-toggle">
                                        <i class="text-20 icon icon-search"></i>
                                    </button>

                                    <div class="toggle-element js-search-toggle">
                                        <div class="header-search pt-90 bg-white shadow-4">
                                            <div class="container">
                                                <div class="header-search__field">
                                                    <div class="icon icon-search text-dark-1"></div>
                                                    <input type="text"
                                                        class="col-12 text-18 lh-12 text-dark-1 fw-500"
                                                        placeholder="What do you want to learn?">

                                                    <button
                                                        class="d-flex items-center justify-center size-40 rounded-full bg-purple-3"
                                                        data-el-toggle=".js-search-toggle">
                                                        <img src="{{ asset('assets/front') }}/img/menus/close.svg"
                                                            alt="icon">
                                                    </button>
                                                </div>

                                                <div class="header-search__content mt-30">
                                                    <div class="text-17 text-dark-1 fw-500">Popular Right Now</div>

                                                    <div class="d-flex y-gap-5 flex-column mt-20">
                                                        <a href="courses-single-1.html" class="text-dark-1">The
                                                            Ultimate Drawing Course - Beginner to Advanced</a>
                                                        <a href="courses-single-2.html" class="text-dark-1">Character
                                                            Art School: Complete Character Drawing Course</a>
                                                        <a href="courses-single-3.html" class="text-dark-1">Complete
                                                            Blender Creator: Learn 3D Modelling for Beginners</a>
                                                        <a href="courses-single-4.html" class="text-dark-1">User
                                                            Experience Design Essentials - Adobe XD UI UX Design</a>
                                                        <a href="courses-single-5.html" class="text-dark-1">Graphic
                                                            Design Masterclass - Learn GREAT Design</a>
                                                        <a href="courses-single-6.html" class="text-dark-1">Adobe
                                                            Photoshop CC – Essentials Training Course</a>
                                                    </div>

                                                    <div class="mt-30">
                                                        <button class="uppercase underline">PRESS ENTER TO SEE ALL
                                                            SEARCH RESULTS</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="header-search__bg" data-el-toggle=".js-search-toggle"></div>
                                    </div>
                                </div> --}}

                                @if (auth()->user() && auth()->user()->membership_type == 'customer')
                                    <div class="relative">
                                        <button v-on:mouseover="showCart"
                                            class="d-flex items-center d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light basket-button">
                                            <i class="text-20 icon icon-basket text-white"></i>
                                        </button>
                                        @if ($cart->count())
                                            <span class="bg-blue-1 text-white"
                                                style="position:absolute; top:5px; right:5px; padding: 0 8px; display:block; border-radius: 999px; font-size: 12px;">
                                                {{ $cart->count() }}
                                            </span>
                                        @endif
                                        @php
                                            $total = 0;
                                        @endphp
                                        <div :class="{ 'hideCart': toggleCart == false, 'showCart': toggleCart == true }"
                                            v-on:mouseover="showCart" v-on:mouseleave="hideCart">
                                            <div class="header-cart bg-white -dark-bg-dark-1 rounded-8">
                                                <div class="px-30 pt-30 pb-10">
                                                    @forelse ($cart as $item)
                                                        @php
                                                            $total += $item->course->price;
                                                        @endphp
                                                        <div class="row justify-between x-gap-40 pb-20">
                                                            <div class="col">
                                                                <div class="row x-gap-10 y-gap-10">
                                                                    <div class="col-auto">
                                                                        <img src="{{ $item->course->image }}"
                                                                            alt="{{ $item->course->title }}"
                                                                            style="width: 100px;">
                                                                    </div>

                                                                    <div class="col">
                                                                        <div class="text-dark-1 lh-15">
                                                                            {{ $item->course->title }}</div>

                                                                        <div class="d-flex items-center mt-10">
                                                                            <div
                                                                                class="lh-12 fw-500 line-through text-dark-1 mr-10">
                                                                            </div>
                                                                            <div
                                                                                class="text-18 lh-12 fw-500 text-dark-1">
                                                                                {{ $item->course->price }}₺
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-auto">
                                                                <button
                                                                    v-on:click="deleteCart({{ $item->id }})"><img
                                                                        src="{{ asset('assets/front') }}/img/menus/close.svg"
                                                                        alt="icon"></button>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <span class="text-18 lh-12 fw-500 text-dark-1">
                                                            Sepetiniz şu anda boş.
                                                        </span>
                                                    @endforelse

                                                </div>

                                                <div class="px-30 pt-20 pb-30 border-top-light">
                                                    @if ($cart->count())
                                                        <div class="d-flex justify-between">
                                                            <div class="text-18 lh-12 text-dark-1 fw-500">Toplam:</div>
                                                            <div class="text-18 lh-12 text-dark-1 fw-500">
                                                                {{ $total }}₺
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row x-gap-20 y-gap-10 pt-30">
                                                        @if ($cart->count())
                                                            <div class="col-sm-6">
                                                                <a href="{{ route('home.cart') }}"
                                                                    class="button py-20 -dark-1 text-white -dark-button-white col-12">Sepete
                                                                    Git</a>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <a href="{{ route('home.cart-summary') }}"
                                                                    class="button py-20 -purple-1 text-white col-12">Sepeti
                                                                    Onayla</a>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-12">
                                                                <a href="{{ route('home.course.index') }}"
                                                                    class="button py-20 -purple-1 text-white col-12">Dükkana
                                                                    Git</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <button v-on:mouseover="showNotification"
                                            class="d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light notification-button">
                                            <i class="text-24 icon icon-notification text-white"></i>
                                        </button>
                                        @if ($announcements->count())
                                            <span
                                                style="position:absolute; top:13px; right:13px; width:10px; height: 10px; display:block; border-radius: 999px; background: #d40000;">
                                            </span>
                                        @endif
                                        <div :class="{
                                            'hideNotification': toggleNotification ==
                                                false,
                                            'showNotification': toggleNotification == true
                                        }"
                                            v-on:mouseover="showNotification" v-on:mouseleave="hideNotification">
                                            <div
                                                class="toggle-bottom -notifications bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-10">
                                                <div class="py-30 px-30">
                                                    <div class="y-gap-40">
                                                        @foreach ($announcements as $announcement)
                                                            <div class="d-flex justify-content-between items-center pointer"
                                                                data-toggle="modal" data-target="#announcement"
                                                                v-on:click="detailAnnouncement({{ $announcement }})"
                                                                style="@if ($announcement->type == 'important') background: #fff0f7; @elseif($announcement->type == 'care') background: #f0fff3; @elseif($announcement->type == 'discount') background: #fff5f0; @elseif($announcement->type == 'update') background: #F0F7FF; @endif  border-radius: 20px; padding-left: 20px; padding-right: 20px;">
                                                                <div class="d-flex items-center">
                                                                    @switch($announcement->type)
                                                                        @case('important')
                                                                            <div class="shrink-0"
                                                                                style="background: #ff1d86; padding: 15px 25px; border-radius: 100px;">
                                                                                <span class="text-white text-24 fw-600"
                                                                                    style="line-height: 35px;">1</span>
                                                                            </div>
                                                                        @break

                                                                        @case('care')
                                                                            <div class="shrink-0"
                                                                                style="background: #16d03b; padding: 15px 25px; border-radius: 100px;">
                                                                                <span class="text-white text-24 fw-600"
                                                                                    style="line-height: 35px;">2</span>
                                                                            </div>
                                                                        @break

                                                                        @case('discount')
                                                                            <div class="shrink-0"
                                                                                style="background: #ff7e3e; padding: 15px 25px; border-radius: 100px;">
                                                                                <span class="text-white text-24 fw-600"
                                                                                    style="line-height: 35px;">3</span>
                                                                            </div>
                                                                        @break

                                                                        @case('update')
                                                                            <div class="shrink-0"
                                                                                style="background: #0077FF; padding: 15px 25px; border-radius: 100px;">
                                                                                <span class="text-white text-24 fw-600"
                                                                                    style="line-height: 35px;">4</span>
                                                                            </div>
                                                                        @break
                                                                    @endswitch
                                                                    <div class="ml-15">
                                                                        <h4 class="text-18 fw-600 lh-1 text-dark-1">
                                                                            {{ $announcement->title }}</h4>
                                                                        <div
                                                                            class="d-flex items-center x-gap-20 y-gap-10 flex-wrap">
                                                                            <div class="text-13 fw-500 text-muted">
                                                                                {{ $announcement->created_at->translatedFormat('d F Y') }}
                                                                            </div>
                                                                            <div
                                                                                style="background: #0077FF; padding: 4px; border-radius: 50px;">
                                                                            </div>
                                                                            <div class="text-13 fw-500 text-muted">
                                                                                {{ $announcement->created_at->format('H.s') }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-13 fw-500 text-muted mt-1">
                                                                            Detaylar için tıklayın.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="shrink-0">
                                                                    <i class="fas fa-chevron-right text-dark-1"></i>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div class="d-none xl:d-block ml-20">
                                    <button class="text-white items-center" data-el-toggle=".js-mobile-menu-toggle">
                                        <i class="text-11 icon icon-mobile-menu"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="header-right__buttons d-flex items-center xl:ml-20 lg:d-none">

                                @if (auth()->user())
                                    @if (auth()->user()->membership_type != 'customer')
                                        <a href="{{ route('customer.login') }}"
                                            class="button -underline text-white">Giriş
                                            Yap</a>
                                        <a href="{{ route('register') }}"
                                            class="button px-25 h-50 -dark-1 text-white ml-20">Kayıt Ol</a>
                                    @else
                                        <div class="relative d-flex items-center ml-10">
                                            <a href="#" class="d-flex align-items-center py-5 px-10"
                                                v-on:mouseover="showProfile"
                                                style="background: #f0f7ff; border-radius:8px;">
                                                <div class="mr-3">
                                                    @if (auth()->user()->image)
                                                        <img class="size-50" style="border-radius: 5px;"
                                                            src="{{ auth()->user()->image }}"
                                                            alt="{{ auth()->user()->fullname }}">
                                                    @else
                                                        <span class="uppercase text-white text-center"
                                                            style="background: #0077ff;border-radius: 5px; width: 30px; height: 30px; font-size: 30px; display:block; line-height: 30px;">{{ Str::limit(auth()->user()->fullname, 1, '') }}</span>
                                                    @endif
                                                </div>
                                                <span class="text-dark-1 ml-5">{{ auth()->user()->fullname }}</span>
                                                <i class="fas fa-chevron-down ms-3 text-13 text-dark-1"></i>
                                            </a>

                                            <div :class="{
                                                'hideProfile': toggleProfile ==
                                                    false,
                                                'showProfile': toggleProfile == true
                                            }"
                                                v-on:mouseover="showProfile" v-on:mouseleave="hideProfile">
                                                <div
                                                    class="toggle-bottom -profile bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-10">
                                                    <div class="px-30 py-30">

                                                        <div class="sidebar -dashboard">

                                                            <div
                                                                class="sidebar__item {{ Request::routeIs('account.index') ? '-is-active' : '' }} -dark-bg-dark-2">
                                                                <a href="{{ route('account.index') }}"
                                                                    class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white text-dark-1">
                                                                    <i class="text-20 icon-discovery mr-15"></i>
                                                                    Panel
                                                                </a>
                                                            </div>

                                                            <div
                                                                class="sidebar__item {{ Request::routeIs('account.courses') ? '-is-active' : '' }}">
                                                                <a href="{{ route('account.courses') }}"
                                                                    class="d-flex items-center text-17 lh-1 fw-500 text-dark-1">
                                                                    <i class="text-20 icon-play-button mr-15"></i>
                                                                    Kurslar
                                                                </a>
                                                            </div>

                                                            <div
                                                                class="sidebar__item {{ Request::routeIs('account.invoices') ? '-is-active' : '' }}">
                                                                <a href="{{ route('account.invoices') }}"
                                                                    class="d-flex items-center text-17 lh-1 fw-500 text-dark-1">
                                                                    <i class="text-20 icon-list mr-15"></i>
                                                                    Faturalar
                                                                </a>
                                                            </div>

                                                            <div
                                                                class="sidebar__item {{ Request::routeIs('account.certificates') ? '-is-active' : '' }}">
                                                                <a href="{{ route('account.certificates') }}"
                                                                    class="d-flex items-center text-17 lh-1 fw-500 text-dark-1">
                                                                    <i class="text-20 icon-document mr-15"></i>
                                                                    Sertifikalar
                                                                </a>
                                                            </div>

                                                            <div
                                                                class="sidebar__item {{ Request::routeIs('account.messages') ? '-is-active' : '' }}">
                                                                <a href="{{ route('account.messages') }}"
                                                                    class="d-flex items-center text-17 lh-1 fw-500 text-dark-1">
                                                                    <i class="text-20 icon-document mr-15"></i>
                                                                    Mesajlar
                                                                </a>
                                                            </div>

                                                            <div
                                                                class="sidebar__item {{ Request::routeIs('account.settings') ? '-is-active' : '' }}">
                                                                <a href="{{ route('account.settings') }}"
                                                                    class="d-flex items-center text-17 lh-1 fw-500 text-dark-1">
                                                                    <i class="text-20 icon-setting mr-15"></i>
                                                                    Ayarlar
                                                                </a>
                                                            </div>

                                                            <div class="sidebar__item ">
                                                                <a href="{{ route('customer.logout') }}"
                                                                    class="d-flex items-center text-17 lh-1 fw-500 text-dark-1">
                                                                    <i class="text-20 icon-power mr-15"></i>
                                                                    Çıkış Yap
                                                                </a>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <a href="{{ route('customer.login') }}"
                                        class="button -underline text-white">Giriş
                                        Yap</a>
                                    <a href="{{ route('register') }}" class="button px-25 -dark-1 text-white ml-20"
                                        style="height: 50px;">Kayıt Ol</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <div class="content-wrapper  js-content-wrapper">
            @yield('content')
            @include('home.layout.footer')
        </div>
        <div class="modal fade" tabindex="-1" id="announcement">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@{{ announcement.title }}</h5>

                        <!--begin::Close-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body">
                        @{{ announcement.description }}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="cookiePopup">
        <div style="width: 75%; display: flex; align-items:center;">
            <svg width="50" height="50" viewBox="0 0 77 77" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_1206_203)">
                    <path
                        d="M47.6548 0C34.0302 0 22.9824 11.0478 22.9824 24.6795C22.9824 38.3042 34.0302 49.3519 47.6548 49.3519C61.2866 49.3519 72.3344 38.3042 72.3344 24.6795C72.3344 11.0478 61.2866 0 47.6548 0Z"
                        fill="#D28147" />
                    <path
                        d="M28.6795 18.9849C15.0478 18.9849 4 30.0326 4 43.6573C4 57.289 15.0478 68.3368 28.6795 68.3368C42.3042 68.3368 53.3519 57.289 53.3519 43.6573C53.3519 30.0326 42.3042 18.9849 28.6795 18.9849Z"
                        fill="#F6B059" />
                    <path
                        d="M25.8335 37.9617C23.2068 37.9617 21.0855 40.0901 21.0855 42.7097C21.0855 45.3293 23.2068 47.4577 25.8335 47.4577C28.4531 47.4577 30.5744 45.3293 30.5744 42.7097C30.5744 40.0901 28.4531 37.9617 25.8335 37.9617ZM29.6276 26.5723C28.0544 26.5723 26.7802 27.8465 26.7802 29.4196C26.7802 30.9928 28.0544 32.267 29.6276 32.267C31.2008 32.267 32.475 30.9928 32.475 29.4196C32.475 27.8465 31.2008 26.5723 29.6276 26.5723ZM36.2691 49.3512C34.1763 49.3512 32.475 51.0525 32.475 53.1524C32.475 55.2452 34.1763 56.9465 36.2691 56.9465C38.369 56.9465 40.0703 55.2452 40.0703 53.1524C40.0703 51.0525 38.369 49.3512 36.2691 49.3512ZM14.444 43.6564C12.8709 43.6564 11.5967 44.9306 11.5967 46.5038C11.5967 48.077 12.8709 49.3512 14.444 49.3512C16.0172 49.3512 17.2914 48.077 17.2914 46.5038C17.2914 44.9306 16.0172 43.6564 14.444 43.6564ZM41.0171 37.9617C39.4439 37.9617 38.1697 39.2359 38.1697 40.8091C38.1697 42.3823 39.4439 43.6564 41.0171 43.6564C42.5902 43.6564 43.8644 42.3823 43.8644 40.8091C43.8644 39.2359 42.5902 37.9617 41.0171 37.9617ZM22.9861 55.0459C21.9326 55.0459 21.0855 55.9001 21.0855 56.9465C21.0855 57.9929 21.9326 58.8471 22.9861 58.8471C24.0325 58.8471 24.8796 57.9929 24.8796 56.9465C24.8796 55.9001 24.0325 55.0459 22.9861 55.0459Z"
                        fill="#6D420D" />
                    <path
                        d="M41.9631 7.59642C39.8702 7.59642 38.1689 9.2906 38.1689 11.3905C38.1689 13.4905 39.8702 15.1846 41.9631 15.1846C44.063 15.1846 45.7643 13.4905 45.7643 11.3905C45.7643 9.2906 44.063 7.59642 41.9631 7.59642ZM52.4058 17.0853C50.8326 17.0853 49.5584 18.3595 49.5584 19.9326C49.5584 21.5058 50.8326 22.78 52.4058 22.78C53.9789 22.78 55.2531 21.5058 55.2531 19.9326C55.2531 18.3595 53.9789 17.0853 52.4058 17.0853ZM54.2993 5.6958C52.7261 5.6958 51.4519 6.97 51.4519 8.54316C51.4519 10.1163 52.7261 11.3905 54.2993 11.3905C55.8724 11.3905 57.1466 10.1163 57.1466 8.54316C57.1466 6.97 55.8724 5.6958 54.2993 5.6958ZM60.9479 26.5741C59.9014 26.5741 59.0472 27.4283 59.0472 28.4747C59.0472 29.5211 59.9014 30.3753 60.9479 30.3753C61.9943 30.3753 62.8485 29.5211 62.8485 28.4747C62.8485 27.4283 61.9943 26.5741 60.9479 26.5741Z"
                        fill="#7A441D" />
                </g>
                <defs>
                    <filter id="filter0_d_1206_203" x="0" y="0" width="76.3344" height="76.3369"
                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix"
                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                        <feOffset dy="4" />
                        <feGaussianBlur stdDeviation="2" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1206_203" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1206_203"
                            result="shape" />
                    </filter>
                </defs>
            </svg>

            <p style="width: 75%; margin-left: 20px;">
                Sitemize ziyaretinizi daha iyi anlamak, kullanıcı deneyiminizi kişiselleştirmek, iyileştirmek ve size
                uygun teklifleri sunabilmek için çerezler kullanıyoruz. Çerez aydınlatma metnimize Çerez Aydınlatma
                Metni ve Gizlilik Politikası üzerinden ulaşabilirsiniz. <a href="/cerez-politikasi"><b>Çerez Aydınlatma
                        Metni</b></a></p>
        </div>
        <div style="display: flex; align-items:center;">
            <button id="acceptCookie">
                <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.4755 5.05264V5.05542C13.8234 5.89319 14.0003 6.78343 14.0003 7.70231C14.0003 11.538 10.8779 14.6605 7.04215 14.6605C3.20643 14.6605 0.0839844 11.538 0.0839844 7.70231C0.0839844 3.86657 3.20643 0.744141 7.04215 0.744141C7.76696 0.744141 8.48312 0.857066 9.16497 1.07773C9.16778 1.07773 9.16778 1.08051 9.16778 1.08051H9.1765C9.18624 1.08384 9.19414 1.08978 9.2023 1.09589L9.20999 1.10155L9.21329 1.10383L9.21699 1.1062L9.21898 1.10737L9.22303 1.10955C9.23772 1.1183 9.25522 1.12108 9.26957 1.13261C9.26957 1.13261 9.26957 1.13355 9.27012 1.13434C9.27046 1.13491 9.27115 1.13539 9.27231 1.13539C9.28796 1.15133 9.29922 1.16729 9.31199 1.18536L9.31569 1.19066C9.31741 1.19291 9.31919 1.19504 9.32105 1.19713L9.3251 1.20162C9.32873 1.20562 9.33237 1.20962 9.33553 1.21407C9.338 1.21746 9.3402 1.22114 9.34191 1.22525C9.34658 1.2334 9.3496 1.24229 9.35186 1.25158L9.35303 1.25676L9.35434 1.26309L9.35626 1.27455L9.35893 1.28188L9.36182 1.28945L9.36202 1.29001C9.36683 1.30254 9.37177 1.31549 9.37376 1.32982C9.37376 1.33456 9.37314 1.33938 9.37252 1.34437V1.34667C9.37177 1.35318 9.37095 1.36006 9.37095 1.36759C9.37095 1.39383 9.3682 1.41689 9.36223 1.44314V1.44592C9.35887 1.45569 9.35296 1.46457 9.34727 1.47302C9.3428 1.47971 9.33855 1.48611 9.33594 1.49244C9.32722 1.50994 9.32125 1.52743 9.30972 1.54174C8.93832 1.99423 8.73557 2.55963 8.73557 3.13934C8.73557 4.52779 9.86596 5.6586 11.2548 5.6586C11.9101 5.6586 12.5304 5.40651 13.0031 4.94846C13.007 4.94522 13.0109 4.94246 13.0148 4.93997C13.0205 4.9364 13.0261 4.9334 13.0317 4.93041C13.0367 4.9278 13.0416 4.9252 13.0465 4.92223C13.064 4.9107 13.0755 4.89916 13.093 4.89041H13.0989C13.1192 4.88206 13.1427 4.87888 13.1658 4.8761C13.18 4.8761 13.1948 4.86735 13.2091 4.87013C13.2266 4.87013 13.2409 4.8761 13.2584 4.87888C13.2787 4.88166 13.2989 4.88444 13.3164 4.89041C13.324 4.89407 13.3304 4.8991 13.3371 4.90459L13.3408 4.90764L13.3483 4.91348C13.3713 4.92501 13.3916 4.93654 13.4118 4.95404C13.4118 4.9557 13.4118 4.95637 13.4124 4.95665C13.4129 4.95682 13.4135 4.95682 13.4146 4.95682C13.4262 4.97113 13.4349 4.98862 13.4437 5.00612C13.4524 5.02043 13.4667 5.02918 13.4727 5.04667C13.4727 5.04842 13.4727 5.04921 13.4732 5.05003L13.474 5.05113L13.4755 5.05264ZM2.11338 8.57187C2.11338 9.21283 2.63269 9.73171 3.27321 9.73171C3.91374 9.73171 4.43305 9.21283 4.43305 8.57187C4.43305 7.93094 3.91374 7.41206 3.27321 7.41206C2.63228 7.41206 2.11338 7.93133 2.11338 8.57187ZM5.01234 3.64312C4.53401 3.64312 4.14278 4.03476 4.14278 4.51308C4.14278 4.99141 4.53442 5.38306 5.01234 5.38266C5.49109 5.38266 5.88232 4.99141 5.88232 4.51308C5.88232 4.03435 5.49068 3.64312 5.01234 3.64312ZM6.7523 11.4712C6.7523 11.95 7.14353 12.3412 7.62186 12.3412C8.1002 12.3412 8.49184 11.9496 8.49184 11.4712C8.49184 10.9929 8.1002 10.6017 7.62186 10.6017C7.14353 10.6017 6.7523 10.9929 6.7523 11.4712ZM7.04215 7.55718C7.04215 8.19813 7.56146 8.71701 8.20199 8.71701C8.84251 8.71701 9.36141 8.19813 9.36182 7.55718C9.36182 6.91624 8.84251 6.39736 8.20199 6.39736C7.56105 6.39736 7.04215 6.91664 7.04215 7.55718Z"
                        fill="white" />
                </svg>
                Çerezleri Kabul Et
            </button>
            <button id="declineCookie" style="margin-left: 10px;">Reddet</button>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="{{ asset('/assets/front') }}/js/leaflet.js"></script>
    <script src="{{ asset('/assets/front') }}/js/vendors.js"></script>
    <script src="{{ asset('/assets/front') }}/js/main.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        Vue.createApp({
            data() {
                return {
                    announcement: {},
                    toggleProfile: false,
                    toggleCart: false,
                    toggleNotification: false,
                }
            },
            methods: {
                detailAnnouncement(announcement) {
                    this.announcement = announcement;
                },
                showProfile() {
                    this.toggleProfile = true
                    this.toggleCart = false
                    this.toggleNotification = false
                },
                hideProfile() {
                    this.toggleProfile = false
                },
                showCart() {
                    this.toggleCart = true
                    this.toggleProfile = false
                    this.toggleNotification = false
                },
                hideCart() {
                    this.toggleCart = false
                },
                showNotification() {
                    this.toggleNotification = true
                    this.toggleProfile = false
                    this.toggleCart = false
                },
                hideNotification() {
                    this.toggleNotification = false
                },
                deleteCart(id) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: "Bu ürün sepetten silinecek emin misiniz?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Evet Sil!',
                        cancelButtonText: 'İptal Et'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.get('/hesap/sepet/' + id + '/sil').then(res => {
                                Swal.fire({
                                    icon: "success",
                                    title: "Silindi",
                                    text: "Ürün sepetten başarıyla silindi!",
                                    confirmButtonText: "Tamam"
                                }).then(() => location.reload());
                            });
                        }
                    })
                }
            },
        }).mount("#app")
    </script>
    <script type="text/javascript">
        // set cookie according to you
        var cookieName = "Çerezler";
        var cookieValue = "Çerezleri Kabul Ettim";
        var cookieExpireDays = 30;
        // when users click accept button
        let acceptCookie = document.getElementById("acceptCookie");
        let declineCookie = document.getElementById("declineCookie");
        acceptCookie.onclick = function() {
            createCookie(cookieName, cookieValue, cookieExpireDays);
        }
        declineCookie.onclick = function() {
            document.getElementById("cookiePopup").style.display = "none";
        }
        // function to set cookie in web browser
        let createCookie = function(cookieName, cookieValue, cookieExpireDays) {
            let currentDate = new Date();
            currentDate.setTime(currentDate.getTime() + (cookieExpireDays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + currentDate.toGMTString();
            document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
            if (document.cookie) {
                document.getElementById("cookiePopup").style.display = "none";
            } else {
                alert("Unable to set cookie. Please allow all cookies site from cookie setting of your browser");
            }
        }
        // get cookie from the web browser
        let getCookie = function(cookieName) {
            let name = cookieName + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        // check cookie is set or not
        let checkCookie = function() {
            let check = getCookie(cookieName);
            if (check == "") {
                document.getElementById("cookiePopup").style.display = "flex";
            } else {

                document.getElementById("cookiePopup").style.display = "none";
            }
        }
        checkCookie();
    </script>
    @yield('js')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "Başarılı",
                text: "{!! session('success') !!}",
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: "{!! session('error') !!}",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
</body>

</html>
