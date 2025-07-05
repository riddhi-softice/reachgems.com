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

    </style>
</head> 
<body>
    <div class="page-wrapper">

        @include('web.layouts.home_header')

        <main class="main">      

            <div class="intro-slider-container">
                <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav":false, "dots": false, "loop": false}'>
                
                    {{-- <div class="intro-slide position-relative">
                        <!-- Background Video -->
                        <video autoplay muted loop playsinline class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover z-n1">
                            <source src="{{ asset('public/assets/videos/1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    
                        <!-- Overlay Content -->
                        <div class="container intro-content text-center position-relative z-1">
                            <h3 class="intro-subtitle">Want to know what's hot?</h3>
                            <h1 class="intro-title text-white">Spring Lookbook 2019</h1>
                    
                            <a href="#scroll-to-content" class="btn btn-outline-primary-2 scroll-to">
                                <span>Start scrolling</span>
                                <i class="icon-long-arrow-down"></i>
                            </a>
                        </div>
                    </div> --}}

                    
                    <div class="intro-slide" style="background-image: url('{{ asset('public/assets/images/demos/demo-15/slider/slide-1.jpg') }}');">
                        <div class="container intro-content text-center">
                            <h3 class="intro-subtitle">Want to know what's hot?</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title text-white">Spring Lookbook 2019</h1><!-- End .intro-title -->

                            <a href="#scroll-to-content" class="btn btn-outline-primary-2 scroll-to">
                                <span>Start scrolling</span>
                                <i class="icon-long-arrow-down"></i>
                            </a>
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .intro-slider owl-carousel owl-simple -->

                <span class="slider-loader text-white"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

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
</body>

<!-- molla/index-15.html  22 Nov 2019 10:00:09 GMT -->
</html>