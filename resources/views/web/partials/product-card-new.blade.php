@php
    $firstImage = $product->images->get(0);
    $secondImage = $product->images->get(1);
@endphp

@php
    $whatsappNumber = '917016126901';
    $productName = $product->name;
    $imageUrl = $firstImage
        ? asset('public/assets/images/demos/demo-2/products/' . $firstImage->path)
        : asset('no-image.jpg');
    $message = "Hello, I am interested in this product:\n\n$productName\n\nImage: $imageUrl";
@endphp

<div class="col-12 col-md-3">
    {{-- <div class="col-6 col-sm-4 col-md-3 col-lg-2"> --}}

    <div class="product product-4">
        <figure class="product-media">
            <a href="{{ route('product.show', $product->id) }}">
                <img src="{{ $firstImage ? asset('public/assets/images/demos/demo-2/products/' . $firstImage->path) : asset('public/assets/images/no-image.jpg') }}"
                    alt="{{ $product->name }}" class="product-image">
                <img src="{{ $secondImage ? asset('public/assets/images/demos/demo-2/products/' . $secondImage->path) : asset('public/assets/images/no-image.jpg') }}"
                    alt="{{ $product->name }}" class="product-image-hover">
            </a>
        </figure><!-- End .product-media -->

        <div class="product-body">
            <h3 class="product-title">
                <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
            </h3>
            <div class="product-price">
                @if(strtolower($data['country']) === 'india')
                    ₹{{ $product->display_price }}
                @else
                    ${{ number_format($product->display_price, 2) }}
                @endif
            </div>
        </div><!-- End .product-body -->
        
        <div class="product-action">
            <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode($message) }}" class="btn-product btn-cart" target="_blank">
                <span>Order Now</span>
            </a>
        </div><!-- End .product-action -->
        
    </div><!-- End .product -->
</div><!-- End .col-sm-6 -->