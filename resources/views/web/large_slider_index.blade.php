@extends('web.layouts2.app')
@section('content')

<div class="intro-section bg-lighter pt-5 pb-6">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                    <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside"
                        data-toggle="owl" data-owl-options='{
                                        "nav": false, 
                                        "responsive": {
                                            "768": {
                                                "nav": true
                                            }
                                        }
                                    }'>

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <!--<picture>-->
                                <!--    <source media="(max-width: 480px)"-->
                                <!--        srcset="{{ asset('public/assets/images/slider/slide-1-480w.jpg') }}">-->
                                <!--    <img src="{{ asset('public/assets/images/slider/slide-1.jpg') }}" alt="Image Desc">-->
                                <!--</picture>-->
                                 <picture>
                                    <source srcset="{{ asset('public/assets/images/slider/slide-1-480w.jpg') }}" type="image/webp">
                                    <img src="{{ asset('public/assets/images/slider/slide-1.jpg') }}" alt="Image Desc" width="100%" height="auto" fetchpriority="high">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Topsale Collection</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">Living Room<br>Furniture</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)"
                                        srcset="{{ asset('public/assets/images/slider/slide-2-480w.jpg') }}">
                                    <img src="{{ asset('public/assets/images/slider/slide-2.jpg') }}" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">News and Inspiration</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">New Arrivals</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)"
                                        srcset="{{ asset('public/assets/images/slider/slide-3-480w.jpg') }}">
                                    <img src="{{ asset('public/assets/images/slider/slide-3.jpg') }}" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Outdoor Furniture</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">Outdoor Dining <br>Furniture</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->
                    </div><!-- End .intro-slider owl-carousel owl-simple -->

                    <span class="slider-loader"></span><!-- End .slider-loader -->
                </div><!-- End .intro-slider-container -->
            </div><!-- End .col-lg-8 -->
            
           <!-- <div class="col-lg-4">
                <div class="intro-banners">
                    <div class="row row-sm">
                        
                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display">
                                <a href="#">
                                    <img src="{{ asset('public/assets/images/banners/home/intro/banner-1.jpg') }}"
                                        alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite"><a href="#">Clearence</a></h4>
                                    <h3 class="banner-title text-white"><a href="#">Chairs & Chaises <br>Up to 40%
                                            off</a></h3>
                                    <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                            class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display mb-0">
                                <a href="#">
                                    <img src="{{ asset('public/assets/images/banners/home/intro/banner-2.jpg') }}"
                                        alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite"><a href="#">New in</a></h4>
                                    <h3 class="banner-title text-white"><a href="#">Best Lighting <br>Collection</a>
                                    <a href="#" class="btn btn-outline-white banner-link">Discover Now<i
                                            class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> -->
            
        </div><!-- End .row -->

    </div><!-- End .container -->
</div><!-- End .bg-lighter -->

<div class="mb-6"></div><!-- End .mb-6 -->

<div class="mb-5"></div><!-- End .mb-6 -->

<div class="container">

    <div class="heading heading-center mb-6">
        <h2 class="title">Recent Arrivals</h2>
    </div>
    <!-- End .heading -->

    <div class="tab-content">
        <!-- All Products Tab -->
        <div class="tab-pane fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
            <div class="row justify-content-center g-4">
                @foreach ($data['all_products'] as $product)
                    @include('web.partials.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
    <!-- .End .tab-pane -->

</div><!-- End .tab-content -->

<!--@if(count($data['all_products']) == 4)
<div class="more-container text-center">
    <a href="{{ route('product.more') }}" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
</div>
@endif-->

<div class="container">
    <hr>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rocket"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Delivery</h3>
                    <p>Free shipping worldwide.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rotate-left"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Payment</h3>
                    <p>Available at Affordable price.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-life-ring"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Quality Support</h3>
                    <p>24/7 support available.</p>
                </div>
            </div>
        </div>
    </div><!-- End .row -->

    <div class="mb-2"></div><!-- End .mb-2 -->
</div><!-- End .container -->

<!--<div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url({{ asset('public/assets/images/backgrounds/cta/bg-6.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-8">
                <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                    <div class="col">
                        <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3>
                        <p class="cta-desc text-white">Molla presents the best in interior design</p>
                       
                    </div>

                    <div class="col-auto">
                        <a href="login.html" class="btn btn-outline-white"><span>SIGN UP</span><i
                                class="icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

@endsection
@section('javascript')
@endsection