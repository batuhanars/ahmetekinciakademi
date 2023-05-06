<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>@yield('title') | ahmetekinci</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets') }}/favicon-siyah.png" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('assets/back/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/back/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/back/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/back/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" href="{{ asset('assets/ckeditorstyles.css') }}">
    @yield('css')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="{{ route('panel.index') }}" class="mt-6">
                        <img alt="akademi" src="{{ asset('assets/Akademi-Beyaz.png') }}" class="logo"
                            style="width: 180px;" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Aside toggler-->
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                        data-kt-toggle-name="aside-minimize">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                        <span class="svg-icon svg-icon-1 rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Aside toggler-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside menu-->
                <div class="aside-menu flex-column-fluid">
                    <!--begin::Aside Menu-->
                    <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                        <!--begin::Menu-->
                        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                            id="#kt_aside_menu" data-kt-menu="true">
                            <div class="menu-item">
                                <a href="{{ route('panel.index') }}" class="menu-link active">
                                    <span class="menu-icon">
                                        <i class="bi bi-columns-gap fs-3"></i>
                                    </span>
                                    <span class="menu-title text-white">İstatistikler</span>
                                </a>
                            </div>
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->site_management)
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-window-sidebar fs-3 text-white"></i>
                                        </span>
                                        <span class="menu-title text-white">Site Yönetimi</span>
                                        <span class="menu-arrow text-white"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a href="{{ route('panel.general') }}" class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="bi bi-dash fs-3"></i>
                                                </span>
                                                <span class="menu-title">Genel Ayarlar</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a href="{{ route('panel.api-settings') }}" class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="bi bi-dash fs-3"></i>
                                                </span>
                                                <span class="menu-title">Api Ayarları</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a href="{{ route('panel.contact-settings') }}" class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="bi bi-dash fs-3"></i>
                                                </span>
                                                <span class="menu-title">İletişim Ayarları</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a href="{{ route('panel.social-media-settings') }}" class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="bi bi-dash fs-3"></i>
                                                </span>
                                                <span class="menu-title">Sosyal Medya Ayarları</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a href="{{ route('panel.maintenance') }}" class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="bi bi-dash fs-3"></i>
                                                </span>
                                                <span class="menu-title">Bakım Modu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->menu_management)
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-list fs-3 text-white"></i>
                                        </span>
                                        <span class="menu-title text-white">Menü Yönetimi</span>
                                        <span class="menu-arrow text-white"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a href="{{ route('panel.header-menu.index') }}" class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="bi bi-dash fs-3"></i>
                                                </span>
                                                <span class="menu-title">Header Menü</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->managers)
                                <div class="menu-item">
                                    <a href="{{ route('panel.managers.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-person fs-3 text-white"></i>
                                        </span>
                                        <span class="menu-title text-white">Yöneticiler</span>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->instructors)
                                <div class="menu-item">
                                    <a href="{{ route('panel.instructors.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-person fs-3 text-white"></i>
                                        </span>
                                        <span class="menu-title text-white">Eğitmenler</span>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->customer_management)
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Müşteri
                                            Yönetimi</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.customers.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-file-earmark-person fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Müşteriler</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.invoices.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-receipt fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Fatura Yönetimi</span>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->sales_management)
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Satış
                                            Yönetimi</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.course-sales') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-collection-play fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Kurs Satışları</span>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->content_management)
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">İçerik
                                            Yönetimi</span>
                                    </div>
                                </div>
                                @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->education_management)
                                    <div class="menu-item">
                                        <a href="{{ route('panel.courses.index') }}" class="menu-link">
                                            <span class="menu-icon">
                                                <i class="text-white bi bi-mortarboard fs-3"></i>
                                            </span>
                                            <span class="text-white menu-title">Kurs Yönetimi</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->blog_management)
                                    <div class="menu-item">
                                        <a href="{{ route('panel.blog.index') }}" class="menu-link">
                                            <span class="menu-icon">
                                                <i class="text-white bi bi-newspaper fs-3"></i>
                                            </span>
                                            <span class="menu-title text-white">Haber Yönetimi</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->page_management)
                                    <div class="menu-item">
                                        <a href="{{ route('panel.pages.index') }}" class="menu-link">
                                            <span class="menu-icon">
                                                <i class="text-white bi bi-file-earmark fs-3"></i>
                                            </span>
                                            <span class="text-white menu-title">Sayfa Yönetimi</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->sss_management)
                                    <div class="menu-item">
                                        <a href="{{ route('panel.faq.index') }}" class="menu-link">
                                            <span class="menu-icon">
                                                <i class="text-white bi bi-question fs-3"></i>
                                            </span>
                                            <span class="text-white menu-title">S.S.S Yönetimi</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->help_management)
                                    <div class="menu-item">
                                        <a href="{{ route('panel.helps.index') }}" class="menu-link">
                                            <span class="menu-icon">
                                                <i class="text-white bi bi-question fs-3"></i>
                                            </span>
                                            <span class="text-white menu-title">Yardım Yönetimi</span>
                                        </a>
                                    </div>
                                @endif
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->document_management)
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Döküman
                                            Yönetimi</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.documents.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-folder fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Belge Yönetimi</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.certificates.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-award fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Sertifika Yönetimi</span>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->multimedia_management)
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Multimedya
                                            Yönetimi</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.image-gallery.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-images fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Fotoğraf Galeri</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.video-gallery.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-camera-video fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Video Galeri</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.playlists.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-collection-play fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Oynatma Listesi</span>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->integration_management)
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Entegrasyon
                                            Yönetimi</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.netgsm') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-send fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">NetGSM Entegrasyonu</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.paytr') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-credit-card fs-3"></i>
                                        </span>
                                        <span class="menu-title text-white">PayTR Entegrasyonu</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.vimeo') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-vimeo fs-3"></i>
                                        </span>
                                        <span class="menu-title text-white">Vimeo Entegrasyonu</span>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->notification_management)
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Bildirim
                                            Yönetimi</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.messages.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-envelope fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Formlar</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.customer-messages') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-envelope fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Öğrenci Mesajları</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.customer-feedbacks.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-chat-left-text fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Müşteri Görüşleri</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.instructor-requests.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-bookmark fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Eğitmenlik Talepleri</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.announcements.index') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-bookmark fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Duyurular</span>
                                    </a>
                                </div>
                            @endif
                            @if (auth()->user()->membership_type == 'superadmin' || auth()->user()->authority->sms_management)
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Sms
                                            Yönetimi</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.multi-sms') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-reply-all fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">Toplu Sms Gönder</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="{{ route('panel.sms.logs') }}" class="menu-link">
                                        <span class="menu-icon">
                                            <i class="text-white bi bi-inbox fs-3"></i>
                                        </span>
                                        <span class="text-white menu-title">SMS Logları</span>
                                    </a>
                                </div>
                            @endif
                            <div class="menu-item">
                                <div class="menu-content pt-8 pb-2">
                                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Diğer</span>
                                </div>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('logout') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <i class="text-white bi bi-box-arrow-left fs-3"></i>
                                    </span>
                                    <span class="text-white menu-title">Çıkış Yap</span>
                                </a>
                            </div>
                        </div>
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Aside menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid justify-content-between" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Aside mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                                <i class="bi bi-list fs-1"></i>
                            </div>
                        </div>
                        <!--end::Aside mobile toggle-->
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="../../demo13/dist/index.html" class="d-lg-none">
                                <img alt="Logo" src="" class="h-25px" />
                            </a>
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <!--begin::Navbar-->
                            <div class="d-flex align-items-stretch" id="kt_header_nav">
                                <!--begin::Menu wrapper-->
                                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                                    data-kt-drawer-name="header-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                    data-kt-drawer-direction="end"
                                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                    <!--begin::Menu-->
                                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                                        id="#kt_header_menu" data-kt-menu="true">
                                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                            class="menu-item here show menu-lg-down-accordion me-lg-1">
                                            <a href="#" class="menu-link py-3">
                                                <span class="menu-title">Siteyi Görüntüle</span>
                                                <span class="menu-arrow d-lg-none"></span>
                                            </a>
                                        </div>
                                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                            class="menu-item here show menu-lg-down-accordion me-lg-1">
                                            <a href="#" class="menu-link py-3">
                                                <span class="menu-title">ahmetekinci.com.tr</span>
                                                <span class="menu-arrow d-lg-none"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::Navbar-->
                            <!--begin::Toolbar wrapper-->
                            <div class="topbar d-flex align-items-stretch flex-shrink-0">
                                <!--begin::Quick links-->
                                <!--end::Quick links-->
                                <!--begin::User-->
                                <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                        <span class="text-white me-5">
                                            <span class="fw-bold">Merhaba,</span>
                                            <span
                                                class="text-muted fw-bold">{{ ucfirst(auth()->user()->fullname) }}</span>
                                        </span>
                                        @if (auth()->user()->image)
                                            <img src="{{ auth()->user()->image }}" alt="" />
                                        @else
                                            <span class="text-white fs-3 text-success text-uppercase">
                                                {{ Str::limit(auth()->user()->fullname, 1, '') }}
                                            </span>
                                        @endif
                                    </div>
                                    <!--begin::User account menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    @if (auth()->user()->image)
                                                        <img alt="{{ auth()->user()->fullname }}"
                                                            src="{{ auth()->user()->image }}" />
                                                    @else
                                                        <span class="text-uppercase fs-1 mx-3">
                                                            {{ Str::limit(auth()->user()->fullname, 1, '') }}</span>
                                                    @endif
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                                        {{ auth()->user()->fullname }}
                                                    </div>
                                                    <a href="#"
                                                        class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5 my-1">
                                            <a href="{{ route('panel.account') }}" class="menu-link px-5">Hesap
                                                Ayarları</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{ route('logout') }}" class="menu-link px-5">Çıkış
                                                Yap</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::User account menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::User -->
                                <!--begin::Heaeder menu toggle-->
                                <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                                    <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                                        <i class="bi bi-text-left fs-1"></i>
                                    </div>
                                </div>
                                <!--end::Heaeder menu toggle-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div id="app">
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Toolbar-->
                        <div class="toolbar" id="kt_toolbar">
                            <!--begin::Container-->
                            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                                <!--begin::Page title-->
                                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                    <!--begin::Title-->
                                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">
                                        @yield('title')
                                    </h1>
                                    <!--end::Title-->
                                    <!--begin::Separator-->
                                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                                    <!--end::Separator-->
                                    @yield('navigation')
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Container-->
                        </div>
                        @yield('content')
                    </div>
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column bg-white" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex flex-column align-items-center">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2022 © </span>
                            <a href="" target="_blank"
                                class="text-gray-800 text-hover-primary">ahmetekinciakademi.com</a>
                        </div>
                        <!--end::Copyright-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/back/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/back/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('assets/back/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/back/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/back/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/custom/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('') }}assets/back/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @yield('js')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
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
</body>
<!--end::Body-->

</html>
