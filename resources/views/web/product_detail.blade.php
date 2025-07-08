@extends('web.layouts2.app')

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('more-products') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="product-details-top">
            <div class="row">

                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">

                            {{-- MAIN IMAGE --}}
                            @php
                                $primaryImage = $product->images->firstWhere('is_primary', 1) ?? $product->images->first();
                            @endphp

                            @if ($primaryImage)
                            <figure class="product-main-image">
                                <img id="product-zoom"
                                    src="{{ asset('public/assets/images/demos/demo-2/products/' . $primaryImage->path) }}"
                                    data-zoom-image="{{ asset('public/assets/images/demos/demo-2/products/' . $primaryImage->path) }}"
                                    alt="Main product image">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                            </figure>
                            @endif

                            {{-- GALLERY --}}
                            <div id="product-zoom-gallery" class="product-image-gallery">
                                @foreach ($product->images as $image)
                                <a class="product-gallery-item {{ $loop->first ? 'active' : '' }}" href="#"
                                    data-image="{{ asset('public/assets/images/demos/demo-2/products/' . $image->path) }}"
                                    data-zoom-image="{{ asset('public/assets/images/demos/demo-2/products/' . $image->path) }}">
                                    <img src="{{ asset('public/assets/images/demos/demo-2/products/' . $image->path) }}"
                                        alt="product image">
                                </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                        <div class="product-price">
                            <!--<span style="color: red; text-decoration: line-through;">
                                ${{ number_format($product->reseller_price, 2) }}
                            </span>-->
                            <span style="text-decoration: line-through;">
                                @if(strtolower($country) === 'india')
                                    MRP : ₹{{ $product->reseller_display_price }}
                                @else
                                    MRP : ${{ number_format($product->reseller_display_price, 2) }}
                                @endif
                            </span>
                        </div>

                        <div class="product-price">
                            <!--${{ number_format($product->price, 2) }}-->
                            <span style="color: red;">
                                @if(strtolower($country) === 'india')
                                    SALE PRICE : ₹{{ $product->display_price }}
                                @else
                                    SALE PRICE : ${{ number_format($product->display_price, 2) }}
                                @endif
                            </span>
                        </div>

                        <div class="product-content">
                            <p>{{ $product->description }}</p>
                        </div>
                        
                        @php
                            $whatsappNumber = '917016126901';
                            $productName = $product->name;
                            $message = "Hello, I am interested in this product:\n\n$productName";
                        @endphp

                        <div class="product-details-action">
                            <a  href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode($message) }}" class="btn-product btn-cart"><span>Order Now</span></a>
                        </div>

                        <div class="product-details-footer">
                            <div class="social-icons social-icons-sm">
                                <span class="social-label">Share:</span>
                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                        class="icon-facebook-f"></i></a>
                                <!-- <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                        class="icon-twitter"></i></a> -->
                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                        class="icon-instagram"></i></a>
                                <!-- <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                        class="icon-pinterest"></i></a> -->
                            </div>
                        </div>

                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->

            </div><!-- End .row -->
        </div><!-- End .product-details-top -->

        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                        role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab"
                        aria-controls="product-info-tab" aria-selected="false">Additional
                        information</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab"
                        role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-faq-link" data-toggle="tab" href="#product-faq-tab"
                        role="tab" aria-controls="product-faq-tab" aria-selected="false">FAQ</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        {!! $product->long_desc !!}
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <!-- <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <p>{!! $product->additional_info !!}</p>
                    </div>
                </div> -->

                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        {!! $product->shipping_info !!}
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
              
                <div class="tab-pane fade" id="product-faq-tab" role="tabpanel" aria-labelledby="product-faq-link">
                    <div class="accordion accordion-rounded" id="accordion-3">

                        
                        @foreach ($data['product_faq'] as $key => $valFaq)
                        
                            @php $i = $key +  1; @endphp
                            <div class="card card-box card-sm bg-light">
                                <div class="card-header" id="heading3-{{ $i }}">
                                    <h2 class="card-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-{{ $i }}" aria-expanded="false" aria-controls="collapse3-{{ $i }}">
                                            {{ $valFaq->question }}
                                        </a>
                                    </h2>
                                </div><!-- End .card-header -->
                                <div id="collapse3-{{ $i }}" class="collapse" aria-labelledby="heading3-{{ $i }}" data-parent="#accordion-3">
                                    <div class="card-body">
                                        {{ $valFaq->answer }}
                                    </div><!-- End .card-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .card -->
                                
                        @endforeach
                        
                    </div><!-- End .accordion -->
                </div><!-- .End .tab-pane -->

            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        {{-- category view --}}
        <div class="blog-posts mb-9">
            <div class="container-fluid">
                <div class="heading text-center" style="margin-bottom: 4.4rem;">
                    <h2 class="title" style="margin-bottom: 2rem; font-size: 3rem; font-weight: 600; letter-spacing: -.01em;">{{ $data['common_settings']['cat_heading'] }}</h2>
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

        {{-- brand view --}}
        <div class="blog-posts mb-9">
            <div class="container-fluid">

                <div class="heading text-center" style="margin-bottom: 4.4rem;">
                    <h2 class="title" style="margin-bottom: 2rem; font-size: 3rem; font-weight: 600; letter-spacing: -.01em;">{{ $data['common_settings']['brand_heading'] }}</h2>
                    <p class="title-desc">{{ $data['common_settings']['brand_desc'] }}</p>
                </div><!-- End .heading -->
        
                <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {"items": 2},
                            "420": {"items": 3},
                            "600": {"items": 4},
                            "900": {"items": 5},
                            "1024": {"items": 6}
                        }
                    }'>
                    @foreach ($data['brands'] as $brand)
                        <a href="#" class="brand">
                            <img src="{{ asset('public/assets/images/brands/' . $brand->logo) }}" alt="{{ $brand->name }}">
                        </a>
                    @endforeach
                </div>

            </div><!-- End .container-fluid -->
        </div><!-- End .blog-posts -->

    </div><!-- End .container -->
</div><!-- End .page-content -->

<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

@endsection
@section('javascript')
@endsection