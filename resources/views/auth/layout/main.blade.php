<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ $general->keywords }}">
    <meta name="description" content="{{ $general->description }}">
    <meta name="author" content="Batuhan Arslan Web Developer (batuhan.ars@yahoo.com)">
    <link rel="shortcut icon" href="{{ $general->favicon }}" />

    {{-- Geliştirici Firma --}}
    <meta name="author" content="Marka Press">
    <meta http-equiv="reply-to" content="bilgi@MarkaPress.com">

    {{-- Geliştirici --}}
    <meta name="author" content="Batuhan Arslan">
    <meta http-equiv="reply-to" content="batuhan.ars@yahoo.com">

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


    <title>@yield('title') | {{ $general->title }}</title>
    <style>
        .mobile-button {
            display: none;
        }

        @media(max-width: 780px) {
            .mobile-button {
                display: flex;
            }

            .normal-button {
                display: none;
            }
        }
    </style>
    @yield('css')
</head>

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->


    <main class="main-content
  bg-beige-1
">

        <header data-anim="fade" data-add-bg="" class="header -base js-header">


            <div class="header__container py-10">
                <div class="row justify-between items-center">

                    <div class="col-auto">
                        <div class="header-left">

                            <div class="header__logo">
                                <a data-barba href="{{ route('home.index') }}">
                                    {{-- <img src="{{ $general->white_logo }}" alt="{{ $general->title }}"
                                        style="width: 200px;"> --}}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="{{ asset('assets/front/js') }}/password-score.js"></script>
    <script src="{{ asset('assets/front/js') }}/bootstrap-strength-meter.js"></script>
    <script src="{{ asset('assets/front/js') }}/password-score-options.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <!-- JavaScript -->
    <script src="{{ asset('assets/front') }}/js/leaflet.js"></script>
    <script src="{{ asset('assets/front') }}/js/vendors.js"></script>
    <script src="{{ asset('assets/front') }}/js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    @yield('js')
</body>

</html>
