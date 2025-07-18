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
        .display-row {
            padding-top: 3rem;
            /* padding-bottom: 0; */
        }

        .product.product-11:hover, .product.product-11:focus {
            z-index: 10;
        }
        .product:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        .product.product-11 .product-action {
            bottom: 2rem;
        }
        .product:hover .product-action, .product:focus .product-action {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }
        .product-action {
            /* background-color: transparent; */
        }
    </style>
</head> 
<body>
    <div class="page-wrapper">

        @include('web.layouts2._header')
        <main class="main">

        {{-- <div class="display-row bg-light">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-12"> --}}

            <div class="display-row bg-light w-100 px-lg-5 px-0">
                <div class="w-100">
                    <div class="row gx-3">
                        <div class="w-100">
        
                            {{-- Category Tabs --}}
                            <div class="heading heading-center mb-5">
                                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link {{ !$data['selected_category_id'] ? 'active' : '' }}"
                                           href="{{ route('more-products') }}">All</a>
                                    </li>
                                    @foreach ($data['categories'] as $category)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $data['selected_category_id'] == $category->id ? 'active' : '' }}"
                                               href="{{ route('more-products', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            {{-- Products --}}
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                                    <div class="row justify-content-center">
                                        @forelse ($data['all_products'] as $product)
                                     
                                            @include('web.partials.product-card', ['product' => $product])
                                        @empty
                                            <p>No products found.</p>
                                        @endforelse
                                    </div>
        
                                    {{-- Pagination --}}
                                    @if ($data['all_products']->lastPage() > 1)
                                        @php $paginator = $data['all_products']; @endphp
                                        <nav aria-label="Page navigation">
                                            {{-- <ul class="pagination justify-content-center align-items-center"> --}}
                                            <ul class="pagination justify-content-center align-items-center mt-4">
                                                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link page-link-prev" href="{{ $paginator->previousPageUrl() ?? '#' }}">
                                                        <span><i class="icon-long-arrow-left"></i></span> Prev
                                                    </a>
                                                </li>
                                                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                                                    <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor
                                                <li class="page-item-total mx-2 text-muted">of {{ $paginator->lastPage() }}</li>
                                                <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                                                    <a class="page-link page-link-next" href="{{ $paginator->nextPageUrl() ?? '#' }}">
                                                        Next <span><i class="icon-long-arrow-right"></i></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    @endif
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>

        </main>
        @include('web.layouts2._footer')
        
        

    </div><!-- End .page-wrapper -->
    
    
    <!-- ======= Mobile Menu  ======= -->
    @include('web.layouts2._mobile-menu')
    <!-- ======= End Mobile Menu  ======= -->

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