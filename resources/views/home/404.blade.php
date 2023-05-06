<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="@yield('keywords', $general->keywords)">
    <meta name="description" content="@yield('keywords', $general->description)">
    <link rel="shortcut icon" href="{{ $general->favicon }}" />

    <meta name="author" content="Marka Press">
    <!--Sayfayı Hazırlayan Tasarımcısı-->
    <meta http-equiv="reply-to" content="bilgi@MarkaPress.com">
    <!--Sayfayı Hazırlayan Tasarımcı Mail Adresi-->
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

    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/base.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/choices.min.css">

    <link rel="stylesheet" href="{{ asset('/assets/front') }}/css/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('/assets/front') }}/css/leaflet.css" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/assets/front') }}/css/vendors.css">
    <link rel="stylesheet" href="{{ asset('/assets/front') }}/css/main.css">
    @yield('css')

    <title> @yield('title') | {{ $general->title }}</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->

    <section class="no-page layout-pt-lg layout-pb-lg bg-beige-1">
        <div class="container">
            <div class="row y-gap-50 justify-between items-center">
                <div class="col-lg-6">
                    <div class="no-page__img">
                        <img src="{{ asset('assets/front') }}/img/404/1.svg" alt="image">
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6">
                    <div class="no-page__content">
                        <h1 class="no-page__main text-dark-1">
                            40<span class="text-purple-1">4</span>
                        </h1>
                        <h2 class="text-35 lh-12 mt-5">Hata! Kaybolmuş gibi görünüyorsun.</h2>
                        <div class="mt-10">
                            Aradığınız sayfa mevcut değil. Tekrar aramayı deneyin </div>
                        <a href="{{ route('home.index') }}" class="button -md -purple-1 text-white mt-20">Anasayfaya
                            Dön</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript -->
    <script src="{{ asset('/assets/front') }}/js/leaflet.js"></script>
    <script src="{{ asset('/assets/front') }}/js/vendors.js"></script>
    <script src="{{ asset('/assets/front') }}/js/main.js"></script>
    <script>
        function lineChart() {
            const ctx = document.getElementById('lineChart');
            if (!ctx) return;

            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: '#',
                        data: [],
                        tension: 0.4,
                        backgroundColor: '#336CFB',
                        borderColor: '#336CFB',
                        borderWidth: 2,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 300,
                            ticks: {
                                stepSize: 50
                            }
                        }
                    },
                },
            });
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "{!! session('success') !!}",
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
