<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Batuhan Arslan Web Developer (batuhan.ars@yahoo.com)">
    <meta name="keywords" content="{{ $general->keywords }}">
    <meta name="description" content="{{ $general->description }}">

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
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="shortcut icon" href="{{ $general->favicon }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/leaflet.css" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/vendors.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/main.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/circle.css">

    <title>@yield('title') | {{ $general->title }}</title>
    @yield('css')
    <style>
        a {
            text-decoration: none !important;
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

        .sidebar__item {
            color: #000000;
        }
    </style>
</head>

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->

    <!-- barba container start -->
    <div class="barba-container" data-barba="container" id="app">


        <main class="main-content">


            <header class="header -dashboard -dark-bg-dark-1 js-header">
                <div class="header__container py-20 px-30">
                    <div class="row justify-between items-center">
                        <div class="col-auto">
                            <div class="d-flex items-center">
                                <div class="header__explore text-dark-1">
                                    <button class="d-flex items-center js-dashboard-home-9-sidebar-toggle">
                                        <i class="icon -dark-text-white icon-explore"></i>
                                    </button>
                                </div>

                                <div class="header__logo ml-30 md:ml-20" style="width: 150px; height: auto;">
                                    <a data-barba href="{{ route('home.index') }}">
                                        <img class="-light-d-none" src="{{ $general->white_logo }}"
                                            alt="{{ $general->title }}" style="width: 100%; height: 100%;">
                                        <img class="-dark-d-none" src="{{ $general->dark_logo }}"
                                            alt="{{ $general->title }}" style="width: 100%; height: 100%;">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="d-flex items-center">
                                <div class="d-flex items-center sm:d-none">

                                    {{-- <div class="relative">
                                        <a href="#" class="d-flex items-center text-dark-1 ml-20"
                                            data-el-toggle=".js-courses-toggle">
                                            Eğitim İçeriğim <i class="text-9 icon-chevron-down ml-10"></i>
                                        </a>

                                        <div class="toggle-element js-courses-toggle -is-el-visible">
                                            <div
                                                class="toggle-bottom -courses bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-20">
                                                <div class="px-30 py-30">

                                                    <div class="d-flex mb-20">
                                                        <img class="size-80 fit-cover" src="img/menus/cart/1.png"
                                                            alt="image">

                                                        <div class="ml-15">
                                                            <div class="text-dark-1 lh-15 fw-500">Complete Python
                                                                Bootcamp From Zero to Hero in Python</div>
                                                            <div class="progress-bar mt-20">
                                                                <div class="progress-bar__bg bg-light-3"></div>
                                                                <div class="progress-bar__bar bg-purple-1 w-1/3"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex mb-20">
                                                        <img class="size-80 fit-cover" src="img/menus/cart/2.png"
                                                            alt="image">

                                                        <div class="ml-15">
                                                            <div class="text-dark-1 lh-15 fw-500">The Ultimate Drawing
                                                                Course Beginner to Advanced</div>
                                                            <div class="progress-bar mt-20">
                                                                <div class="progress-bar__bg bg-light-3"></div>
                                                                <div class="progress-bar__bar bg-purple-1 w-1/3"></div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="mt-20">
                                                        <a href="#"
                                                            class="button py-20 -dark-1 text-white -dark-bg-purple-1 -dark-border-dark-2 col-12">Hepsini
                                                            Gör</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="relative">
                                        <button v-on:mouseover="showCart"
                                            class="d-flex items-center d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                                            <i class="text-20 icon icon-basket"></i>
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
                                                    @foreach ($cart as $item)
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
                                                    @endforeach

                                                </div>

                                                <div class="px-30 pt-20 pb-30 border-top-light">
                                                    <div class="d-flex justify-between">
                                                        <div class="text-18 lh-12 text-dark-1 fw-500">Toplam:</div>
                                                        <div class="text-18 lh-12 text-dark-1 fw-500">
                                                            {{ $total }}₺
                                                        </div>
                                                    </div>

                                                    <div class="row x-gap-20 y-gap-10 pt-30">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <button v-on:mouseover="showNotification"
                                            class="d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                                            <i class="text-24 icon icon-notification"></i>
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
                                                                        <h4 class="text-18 fw-600 lh-1">
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
                                </div>

                                <div class="relative d-flex items-center ml-10">
                                    <a href="#" class="d-flex align-items-center py-5 px-10"
                                        v-on:mouseover="showProfile" style="background: #f0f7ff; border-radius:8px;">
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
                                                            class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                                                            <i class="text-20 icon-discovery mr-15"></i>
                                                            Panel
                                                        </a>
                                                    </div>

                                                    <div
                                                        class="sidebar__item {{ Request::routeIs('account.courses') ? '-is-active' : '' }}">
                                                        <a href="{{ route('account.courses') }}"
                                                            class="d-flex items-center text-17 lh-1 fw-500">
                                                            <i class="text-20 icon-play-button mr-15"></i>
                                                            Kurslar
                                                        </a>
                                                    </div>

                                                    <div
                                                        class="sidebar__item {{ Request::routeIs('account.invoices') ? '-is-active' : '' }}">
                                                        <a href="{{ route('account.invoices') }}"
                                                            class="d-flex items-center text-17 lh-1 fw-500">
                                                            <i class="text-20 icon-list mr-15"></i>
                                                            Faturalar
                                                        </a>
                                                    </div>

                                                    <div
                                                        class="sidebar__item {{ Request::routeIs('account.certificates') ? '-is-active' : '' }}">
                                                        <a href="{{ route('account.certificates') }}"
                                                            class="d-flex items-center text-17 lh-1 fw-500">
                                                            <i class="text-20 icon-document mr-15"></i>
                                                            Sertifikalar
                                                        </a>
                                                    </div>

                                                    <div
                                                        class="sidebar__item {{ Request::routeIs('account.messages') ? '-is-active' : '' }}">
                                                        <a href="{{ route('account.messages') }}"
                                                            class="d-flex items-center text-17 lh-1 fw-500">
                                                            <i class="text-20 icon-document mr-15"></i>
                                                            Mesajlar
                                                        </a>
                                                    </div>

                                                    <div
                                                        class="sidebar__item {{ Request::routeIs('account.settings') ? '-is-active' : '' }}">
                                                        <a href="{{ route('account.settings') }}"
                                                            class="d-flex items-center text-17 lh-1 fw-500">
                                                            <i class="text-20 icon-setting mr-15"></i>
                                                            Ayarlar
                                                        </a>
                                                    </div>

                                                    <div class="sidebar__item ">
                                                        <a href="{{ route('customer.logout') }}"
                                                            class="d-flex items-center text-17 lh-1 fw-500">
                                                            <i class="text-20 icon-power mr-15"></i>
                                                            Çıkış Yap
                                                        </a>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <div class="content-wrapper js-content-wrapper">
                <div class="dashboard -home-9 js-dashboard-home-9">
                    <div class="dashboard__sidebar d-flex flex-column justify-content-between"
                        style="overflow: hidden !important;">


                        <div class="sidebar -dashboard">

                            <div
                                class="sidebar__item {{ Request::routeIs('account.index') ? '-is-active' : '' }} -dark-bg-dark-2">
                                <a href="{{ route('account.index') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                                    <i class="text-20 icon-discovery mr-15"></i>
                                    Panel
                                </a>
                            </div>

                            <div class="sidebar__item {{ Request::routeIs('account.courses') ? '-is-active' : '' }}">
                                <a href="{{ route('account.courses') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-play-button mr-15"></i>
                                    Kurslar
                                </a>
                            </div>

                            <div class="sidebar__item {{ Request::routeIs('account.invoices') ? '-is-active' : '' }}">
                                <a href="{{ route('account.invoices') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-list mr-15"></i>
                                    Faturalar
                                </a>
                            </div>

                            <div
                                class="sidebar__item {{ Request::routeIs('account.certificates') ? '-is-active' : '' }}">
                                <a href="{{ route('account.certificates') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-document mr-15"></i>
                                    Sertifikalar
                                </a>
                            </div>

                            <div class="sidebar__item {{ Request::routeIs('account.messages') ? '-is-active' : '' }}">
                                <a href="{{ route('account.messages') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-document mr-15"></i>
                                    Mesajlar
                                </a>
                            </div>

                            <div class="sidebar__item {{ Request::routeIs('account.settings') ? '-is-active' : '' }}">
                                <a href="{{ route('account.settings') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-setting mr-15"></i>
                                    Ayarlar
                                </a>
                            </div>

                            <div class="sidebar__item ">
                                <a href="{{ route('home.index') }}" class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-arrow-left mr-15"></i>
                                    Anasayfaya Dön
                                </a>
                            </div>



                        </div>
                        <div class="sidebar -dashboard">
                            <div class="sidebar__item " style="color: #e55858;">
                                <a href="{{ route('customer.logout') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-power mr-15"></i>
                                    Çıkış Yap
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard__main">
                        @yield('content')

                        <footer class="footer -dashboard py-30">
                            <div class="row items-center justify-between">
                                <div class="col-auto">
                                    <div class="text-13 lh-1"> © Ahmet Ekinci Akademi 2023. Tüm Hakları Saklıdır.</div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-13 lh-1"> <a href="https://www.markapress.com/" target="_blank">
                                            Marka Press -
                                            Dijital Software Agency</a> </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </main>

        <aside class="sidebar-menu toggle-element js-msg-toggle js-dsbh-sidebar-menu">
            <div class="sidebar-menu__bg"></div>

            <div class="sidebar-menu__content scroll-bar-1 py-30 px-40 sm:py-25 sm:px-20 bg-white -dark-bg-dark-1">
                <div class="row items-center justify-between mb-30">
                    <div class="col-auto">
                        <div class="-sidebar-buttons">
                            <button data-sidebar-menu-button="messages"
                                class="text-17 text-dark-1 fw-500 -is-button-active">
                                Messages
                            </button>

                            <button data-sidebar-menu-button="messages-2" data-sidebar-menu-target="messages"
                                class="d-flex items-center text-17 text-dark-1 fw-500">
                                <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                                Messages
                            </button>

                            <button data-sidebar-menu-button="settings" data-sidebar-menu-target="messages"
                                class="d-flex items-center text-17 text-dark-1 fw-500">
                                <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                                Settings
                            </button>

                            <button data-sidebar-menu-button="contacts" data-sidebar-menu-target="messages"
                                class="d-flex items-center text-17 text-dark-1 fw-500">
                                <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                                Contacts
                            </button>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="row x-gap-10">
                            <div class="col-auto">
                                <button data-sidebar-menu-target="settings"
                                    class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                                    <i class="icon-setting text-16"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <button data-sidebar-menu-target="contacts"
                                    class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                                    <i class="icon-friend text-16"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <button data-el-toggle=".js-msg-toggle"
                                    class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                                    <i class="icon-close text-14"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative js-menu-switch">
                    <div data-sidebar-menu-open="messages"
                        class="sidebar-menu__item -sidebar-menu -sidebar-menu-opened">
                        <form class="search-field rounded-8 h-50"
                            action="https://creativelayers.net/themes/educrat-html/post">
                            <input class="bg-light-3 pr-50" type="text" placeholder="Search Courses">
                            <button class="" type="submit">
                                <i class="icon-search text-dark-1 text-20"></i>
                            </button>
                        </form>

                        <div class="accordion -block text-left pt-20 js-accordion">

                            <div class="accordion__item border-light rounded-16">
                                <div class="accordion__button">
                                    <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                                        <div class="icon d-flex items-center justify-center">
                                            <span class="lh-1 fw-500">2</span>
                                        </div>
                                        <div class="icon d-flex items-center justify-center">
                                            <span class="lh-1 fw-500">2</span>
                                        </div>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1 pt-3">Starred</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner pl-20 pr-20 pb-20">
                                        <div data-sidebar-menu-target="messages-2"
                                            class="row x-gap-10 y-gap-10 pointer">
                                            <div class="col-auto">
                                                <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages/1.png"
                                                    alt="image">
                                            </div>
                                            <div class="col">
                                                <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson
                                                </div>
                                                <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span>
                                                    Hello</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-13 lh-12 pt-8">35 mins</div>
                                            </div>
                                        </div>

                                        <div data-sidebar-menu-target="messages-2"
                                            class="row x-gap-10 y-gap-10 pt-15 pointer">
                                            <div class="col-auto">
                                                <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages/1.png"
                                                    alt="image">
                                            </div>
                                            <div class="col">
                                                <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson
                                                </div>
                                                <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span>
                                                    Hello</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-13 lh-12 pt-8">35 mins</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item border-light rounded-16">
                                <div class="accordion__button">
                                    <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                                        <div class="icon d-flex items-center justify-center">
                                            <span class="lh-1 fw-500">2</span>
                                        </div>
                                        <div class="icon d-flex items-center justify-center">
                                            <span class="lh-1 fw-500">2</span>
                                        </div>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1 pt-3">Group</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner pl-20 pr-20 pb-20">
                                        <div data-sidebar-menu-target="messages-2"
                                            class="row x-gap-10 y-gap-10 pointer">
                                            <div class="col-auto">
                                                <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages/1.png"
                                                    alt="image">
                                            </div>
                                            <div class="col">
                                                <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson
                                                </div>
                                                <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span>
                                                    Hello</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-13 lh-12 pt-8">35 mins</div>
                                            </div>
                                        </div>

                                        <div data-sidebar-menu-target="messages-2"
                                            class="row x-gap-10 y-gap-10 pt-15 pointer">
                                            <div class="col-auto">
                                                <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages/1.png"
                                                    alt="image">
                                            </div>
                                            <div class="col">
                                                <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson
                                                </div>
                                                <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span>
                                                    Hello</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-13 lh-12 pt-8">35 mins</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item border-light rounded-16">
                                <div class="accordion__button">
                                    <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                                        <div class="icon d-flex items-center justify-center">
                                            <span class="lh-1 fw-500">2</span>
                                        </div>
                                        <div class="icon d-flex items-center justify-center">
                                            <span class="lh-1 fw-500">2</span>
                                        </div>
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1 pt-3">Private</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner pl-20 pr-20 pb-20">
                                        <div data-sidebar-menu-target="messages-2"
                                            class="row x-gap-10 y-gap-10 pointer">
                                            <div class="col-auto">
                                                <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages/1.png"
                                                    alt="image">
                                            </div>
                                            <div class="col">
                                                <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson
                                                </div>
                                                <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span>
                                                    Hello</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-13 lh-12 pt-8">35 mins</div>
                                            </div>
                                        </div>

                                        <div data-sidebar-menu-target="messages-2"
                                            class="row x-gap-10 y-gap-10 pt-15 pointer">
                                            <div class="col-auto">
                                                <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages/1.png"
                                                    alt="image">
                                            </div>
                                            <div class="col">
                                                <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson
                                                </div>
                                                <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span>
                                                    Hello</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-13 lh-12 pt-8">35 mins</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div data-sidebar-menu-open="messages-2" class="sidebar-menu__item -sidebar-menu">
                        <div class="row x-gap-10 y-gap-10">
                            <div class="col-auto">
                                <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages-2/1.png"
                                    alt="image">
                            </div>
                            <div class="col">
                                <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Arlene McCoy</div>
                                <div class="text-14 lh-1 mt-5">Active</div>
                            </div>
                        </div>

                        <div class="mt-20 pt-30 border-top-light">
                            <div class="row y-gap-20">
                                <div class="col-12">
                                    <div class="row x-gap-10 y-gap-10 items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages-2/2.png"
                                                alt="image">
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 lh-12 fw-500 text-dark-1">Albert Flores</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-14 lh-1 ml-3">35 mins</div>
                                        </div>
                                    </div>
                                    <div class="bg-light-3 rounded-8 px-30 py-20 mt-15">
                                        How likely are you to recommend our company to your friends and family?
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row x-gap-10 y-gap-10 items-center justify-end">
                                        <div class="col-auto">
                                            <div class="text-14 lh-1 mr-3">35 mins</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 lh-12 fw-500 text-dark-1">You</div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages-2/3.png"
                                                alt="image">
                                        </div>
                                    </div>
                                    <div
                                        class="text-right bg-light-7 -dark-bg-dark-2 text-purple-1 rounded-8 px-30 py-20 mt-15">
                                        How likely are you to recommend our company to your friends and family?
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row x-gap-10 y-gap-10 items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/messages-2/3.png"
                                                alt="image">
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 lh-12 fw-500 text-dark-1">Cameron Williamson</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-14 lh-1 ml-3">35 mins</div>
                                        </div>
                                    </div>
                                    <div class="bg-light-3 rounded-8 px-30 py-20 mt-15">
                                        Ok, Understood!
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-30 pb-20">
                            <form class="contact-form row y-gap-20"
                                action="https://creativelayers.net/themes/educrat-html/post">

                                <div class="col-12">

                                    <textarea placeholder="Write a message" rows="7"></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="button -md -purple-1 text-white">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div data-sidebar-menu-open="contacts" class="sidebar-menu__item -sidebar-menu">
                        <div class="tabs -pills js-tabs">
                            <div class="tabs__controls d-flex js-tabs-controls">

                                <button class="tabs__button px-15 py-8 rounded-8 text-dark-1 js-tabs-button is-active"
                                    data-tab-target=".-tab-item-1" type="button">Contacts</button>

                                <button class="tabs__button px-15 py-8 rounded-8 text-dark-1 js-tabs-button "
                                    data-tab-target=".-tab-item-2" type="button">Request</button>

                            </div>

                            <div class="tabs__content pt-30 js-tabs-content">

                                <div class="tabs__pane -tab-item-1 is-active">
                                    <div class="row x-gap-10 y-gap-10 items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/contacts/1.png"
                                                alt="image">
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 lh-12 fw-500 text-dark-1">Darlene Robertson</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tabs__pane -tab-item-2 ">
                                    <div class="row x-gap-10 y-gap-10 items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/front') }}/img/dashboard/right-sidebar/contacts/1.png"
                                                alt="image">
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 lh-12 fw-500 text-dark-1">Darlene Robertson</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div data-sidebar-menu-open="settings" class="sidebar-menu__item -sidebar-menu">
                        <div class="text-17 text-dark-1 fw-500">Privacy</div>
                        <div class="text-15 mt-5">You can restrict who can message you</div>
                        <div class="mt-30">

                            <div class="form-radio d-flex items-center ">
                                <div class="radio">
                                    <input type="radio">
                                    <div class="radio__mark">
                                        <div class="radio__icon"></div>
                                    </div>
                                </div>
                                <div class="lh-1 text-13 text-dark-1 ml-12">My contacts only</div>
                            </div>


                            <div class="form-radio d-flex items-center mt-15">
                                <div class="radio">
                                    <input type="radio">
                                    <div class="radio__mark">
                                        <div class="radio__icon"></div>
                                    </div>
                                </div>
                                <div class="lh-1 text-13 text-dark-1 ml-12">My contacts and anyone in my courses</div>
                            </div>


                            <div class="form-radio d-flex items-center mt-15">
                                <div class="radio">
                                    <input type="radio">
                                    <div class="radio__mark">
                                        <div class="radio__icon"></div>
                                    </div>
                                </div>
                                <div class="lh-1 text-13 text-dark-1 ml-12">Anyone on the site</div>
                            </div>

                        </div>

                        <div class="text-17 text-dark-1 fw-500 mt-30 mb-30">Notification preferences</div>
                        <div class="form-switch d-flex items-center">
                            <div class="switch">
                                <input type="checkbox">
                                <span class="switch__slider"></span>
                            </div>
                            <div class="text-13 lh-1 text-dark-1 ml-10">Email</div>
                        </div>

                        <div class="text-17 text-dark-1 fw-500 mt-30 mb-30">General</div>
                        <div class="form-switch d-flex items-center">
                            <div class="switch">
                                <input type="checkbox">
                                <span class="switch__slider"></span>
                            </div>
                            <div class="text-13 lh-1 text-dark-1 ml-10">Use enter to send</div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
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
                    <div class="modal-body text-dark-1">
                        @{{ announcement.description }}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- barba container end -->

    <!-- JavaScript -->
    <script src="{{ asset('assets/front') }}/js/Chart.js/3.7.1/chart.min.js"></script>
    <script src="{{ asset('assets/front') }}/js/leaflet.js"></script>
    <script src="{{ asset('assets/front') }}/js/vendors.js"></script>
    <script src="{{ asset('assets/front') }}/js/main.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="//code.jquery.com/jquery.min.js"></script>

    <script src="{{ asset('assets') }}/circle.js"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "Başarılı",
                text: "{{ session('success') }}",
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
                text: "{{ session('error') }}",
                confirmButtonText: 'Tamam',
            })
        </script>
    @endif
    {{-- @if (auth()->user()->customer->invoices()->where('status', '0')->count())
        <script>
            setInterval(() => {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı',
                    text: "{{ auth()->user()->customer->invoices()->where('status', '0')->count() }} ödenmemiş faturanız var!",
                    confirmButtonText: 'Tamam',
                })
            }, 300000);
        </script>
    @endif --}}

    {{-- var uri = "{{ route('home', [':id']) }}"
                     var url = uri.replace(':id', conversation.id) --}}
    <script>
        Vue.createApp({
            data() {
                return {
                    invoice: {},
                    course: {},
                    image_preview: "{{ auth()->user()->image }}",
                    conversations: JSON.parse(localStorage.getItem("conversations")),
                    conversation: JSON.parse(localStorage.getItem("conversation")),
                    chat: JSON.parse(localStorage.getItem("chat")),
                    body: null,
                    announcement: {},
                    toggleProfile: false,
                    toggleCart: false,
                    toggleNotification: false,
                }
            },
            methods: {
                createdAt(value) {
                    return moment(value).format("YYYY-MM-DD")
                },
                dueAt(value) {
                    if (value != null) return moment(value).format("YYYY-MM-DD");
                    else return "-";
                },
                detailInvoice(invoice) {
                    this.invoice = invoice;
                    this.course = invoice.course_invoice ?? ""
                },
                detailAnnouncement(announcement) {
                    this.announcement = announcement;
                },
                messages(conversation) {
                    axios.get("/hesap/mesajlar/" + conversation.id).then(res => {
                        this.chat = res.data.messages
                        this.conversation = res.data.conversation
                        this.conversations = res.data.conversations
                        localStorage.setItem("conversation", JSON.stringify(res.data.conversation))
                        localStorage.setItem("conversations", JSON.stringify(res.data.conversations))
                        localStorage.setItem("chat", JSON.stringify(res.data.messages))
                    });
                },
                createMessage(conversation) {
                    axios.post("/hesap/mesajlar/" + conversation.id, {
                        body: this.body
                    }).then(res => {
                        this.messages(res.data.conversation)
                        this.body = null
                    });
                },
                loadImage(event) {
                    let file = event.target.files[0]
                    this.image_preview = URL.createObjectURL(file)
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
            },
            mounted() {
                axios.get("/hesap/mesajlar/" + this.conversation.id).then(res => {
                    if (res.data.conversations) {
                        localStorage.removeItem("conversation");
                        localStorage.removeItem("conversations");
                        localStorage.removeItem("chat");
                    } else {
                        this.chat = res.data.messages
                        this.conversation = res.data.conversation
                        this.conversations = res.data.conversations
                        localStorage.setItem("conversation", JSON.stringify(res.data.conversation))
                        localStorage.setItem("conversations", JSON.stringify(res.data.conversations))
                        localStorage.setItem("chat", JSON.stringify(res.data.messages))
                    }
                });
            }
        }).mount("#app")
        const ctx = document.getElementById('myChart');

        $(".myInstance").Circlebar({
            // startValue: 0,
            // maxValue: 60,
            // counter: 1000,
            // triggerPercentage: false,
            // type: "timer",
            // dialWidth: 5,
            // fontSize: "20px",
            // fontColor: "rgb(135, 206, 235)",
            // skin: "",
            // size: "150px"
        })
    </script>

    @yield('js')
</body>

</html>
