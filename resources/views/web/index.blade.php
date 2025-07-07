<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reach Gems - Diamond Luxury Watch</title>

    {{-- SEO Meta --}}
    <meta name="description"
        content="Buy luxury diamond watches at Reach Gems. Explore premium collections of elegant timepieces.">
    <meta name="keywords" content="Luxury Watches, Diamond Watch, Reach Gems, Men's Watch, Women's Watch">
    <meta name="author" content="Reach Gems">

    {{-- Viewport & Charset --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Robots --}}
    <meta name="robots" content="index, follow">

    {{-- Open Graph (Social Sharing) --}} 
    <meta property="og:title" content="Reach Gems - Diamond Luxury Watch">
    <meta property="og:description" content="Explore our exclusive diamond watch collection. Style meets elegance.">
    <meta property="og:image" content="{{ asset('public/assets/images/slider/slide-1.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Reach Gems - Diamond Luxury Watch">
    <meta name="twitter:description" content="Explore our exclusive diamond watch collection. Style meets elegance.">
    <meta name="twitter:image" content="{{ asset('public/assets/images/slider/slide-1.webp') }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/assets/images/icons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/assets/images/icons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/images/icons/favicon.png') }}">
    <link rel="manifest" href="{{ asset('public/assets/images/icons/site.html') }}">
    <link rel="shortcut icon" href="{{ asset('public/assets/images/icons/favicon.png') }}">
    <meta name="apple-mobile-web-app-title" content="Reach Gems">
    <meta name="application-name" content="Reach Gems">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('public/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/demos/demo-15.css') }}">
    <style>
        .display-row .title {
            font-size: 2.5rem;
        }
        .more-container {
            margin-top: 6rem;
        }
        .header-top {
            margin-top: -19px;
        }

        /* .header-main, .intro-slider, .your-next-section {
            margin-top: 0 !important;
            padding-top: 0 !important;
            background-color: transparent !important;
        }
        .header-top {
            border-bottom: none !important;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
            box-shadow: none !important;
            z-index: 10;
        }
        .header-top + * {
            margin-top: 0 !important;
            padding-top: 0 !important;
        } */
    </style>
</head> 
<body>
    <div class="page-wrapper">

        @include('web.layouts.home_header')
        <main class="main">      

            <div class="intro-slider-container" style="overflow-x: hidden;">
                <div class="intro-slide position-relative" style="max-width: 100%; background-image: url('{{ asset('public/assets/images/demos/demo-15/slider/slide-1.jpg') }}');">
                    {{-- <div class="intro-slide position-relative" style="max-width: 100%;">
                        <video autoplay muted loop playsinline
                            class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover z-n1"
                            style="max-width: 100vw; max-height: 100vh;">
                            <source src="{{ asset('public/assets/videos/1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video> --}}

                    <div class="container intro-content text-center position-relative z-1">
                        <h1 class="intro-title text-white">{{ $data['common_settings']['video_heading'] }}</h1>
                        <h3 class="intro-subtitle">{{ $data['common_settings']['video_description'] }}</h3>
                        <a href="{{ url('more-products') }}" class="btn btn-outline-primary-2">
                            <span>Shop Now</span>
                            <i class="icon-long-arrow-down"></i>
                        </a>
                    </div>                   
                </div>
            </div><!-- End .intro-slider owl-carousel owl-simple -->
            
            </div>

            <div class="display-row bg-light">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        
                        <div class="col-lg-12">
                            <div class="heading text-center">
                                <h2 class="title">Recently arrived</h2>
                                {{-- <h2 class="title">About This Look</h2><!-- End .title text-center -->
                                <p class="title-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p><!-- End .title-desc --> --}}
                            </div><!-- End .heading -->

                            <div class="row">

                                @foreach ($data['all_products'] as $product)
                                    @include('web.partials.product-card-new', ['product' => $product])
                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .display-row .bg-light -->

            <div class="more-container text-center">
                <a href="{{ route('product.more') }}" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
            </div>

            <div class="blog-posts mb-9">
                <div class="container-fluid">
                    <div class="heading text-center">
                        <h2 class="title">{{ $data['common_settings']['cat_heading'] }}</h2>
                        <p class="title-desc">{{ $data['common_settings']['cat_desc'] }}</p>
                    </div><!-- End .heading -->

                    <div class="owl-carousel owl-simple" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "520": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                }
                            }
                        }'>

                        @foreach ($data['all_categories'] as $cat)
                            <article class="entry">
                                <figure class="entry-media">
                                    <a href="#">
                                        <img src="{{ asset('public/assets/images/sub_categories/'. $cat->image) }}" alt="image desc" style="height: 300px !important" height="300">
                                    </a>
                                </figure><!-- End .entry-media -->
                                <div class="entry-body text-center">
                                    <h3 class="entry-title">
                                        <a href="#">{{ $cat->name }}</a>
                                    </h3><!-- End .entry-title -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                        @endforeach
                        
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container-fluid -->
            </div><!-- End .blog-posts -->
            
        </main><!-- End .main -->
        @include('web.layouts2._footer')

    </div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Plugins JS File -->
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.hoverIntent.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('public/assets/js/superfish.min.js') }}"></script>
<script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap-input-spinner.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Main JS File -->
<script src="{{ asset('public/assets/js/main.js') }}"></script>
<script src="{{ asset('public/assets/js/demos/demo-15.js') }}"></script>
<script>
    function getMidnightTimestamp() {
        const now = new Date();
        const midnight = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1); // Tomorrow 12:00 AM
        return midnight.getTime();
    }
    const countdownEndTime = getMidnightTimestamp();

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = countdownEndTime - now;

        if (distance <= 0) {
            document.getElementById("hours").innerText = "00";
            document.getElementById("minutes").innerText = "00";
            document.getElementById("seconds").innerText = "00";
            return;
        }

        const hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((distance / (1000 * 60)) % 60);
        const seconds = Math.floor((distance / 1000) % 60);

        document.getElementById("hours").innerText = String(hours).padStart(2, '0');
        document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
        document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');
    }
    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>
</body>
</html>