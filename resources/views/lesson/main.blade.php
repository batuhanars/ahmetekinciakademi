<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ $general->keywords }}">
    <meta name="description" content="{{ $general->description }}">
    <meta name="author" content="Batuhan Arslan Web Developer (batuhan.ars@yahoo.com)">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/base.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/choices.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/leaflet.css" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/vendors.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/main.css">
    @yield('css')

    <title>@yield('title') | {{ $general->title }}</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->


    <main class="main-content  ">

        <header data-anim="fade" data-add-bg="" class="header -type-1 js-header">


            <div class="header__container">
                <div class="row justify-between items-center">

                    <div class="col-auto">
                        <div class="header-left">
                            <div class="header__logo" style="width: 160px;">
                                <a data-barba href="{{ route('home.index') }}">
                                    <img src="{{ $general->white_logo }}" alt="{{ $general->title }}">
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-auto lg:d-none">
                        <div class="text-20 lh-1 text-white fw-500">@yield('title')
                        </div>
                    </div>


                    <div class="col-auto">
                        <div class="header-right d-flex items-center">
                            <div class="header-right__buttons">
                                <a href="{{ route('home.course.detail', $course) }}"
                                    class="button -sm -rounded -white text-dark-1">Geri Dön</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>


        <div class="content-wrapper  js-content-wrapper">

            @yield('content')


        </div>
    </main>

    <!-- JavaScript -->
    <script src="{{ asset('assets/front') }}/js/leaflet.js"></script>
    <script src="{{ asset('assets/front') }}/js/vendors.js"></script>
    <script src="{{ asset('assets/front') }}/js/main.js"></script>
    <script>
        const tabLinks = document.querySelectorAll(".page-nav-menu__link")
        const tabs = document.querySelectorAll(".tab");

        document.getElementById("overview").style.display = "block";

        function openTab(event, tabName) {
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none"
            }
            for (let i = 0; i < tabLinks.length; i++) {
                tabLinks[i].className = tabLinks[i].className.replace(" is-active", "");
            }
            document.getElementById(tabName).style.display = "block";
            event.currentTarget.className += " is-active";
        }

        const submit = document.getElementById("submit");
        const title = document.querySelector("input[name='title']");
        const message = document.querySelector("textarea[name='message']");

        const titleError = document.querySelector("#titleError");
        const messageError = document.querySelector("#messageError");
        const rateError = document.querySelector("#rateError");

        function reviewValidation(event) {
            if (title.value == "") {
                titleError.innerHTML = "Başlık boş bırakılamaz"
                return false
            } else titleError.innerHTML = ""
            if (message.value == "") {
                messageError.innerHTML = "Mesaj boş bırakılamaz"
                return false
            } else messageError.innerHTML = ""
            event.target.type = "submit"
        }
    </script>
    @yield('js')
</body>

</html>
