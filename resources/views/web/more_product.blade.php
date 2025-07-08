@extends('web.layouts2.app')
@section('content')

<div class="mb-5"></div><!-- End .mb-6 -->

<div class="container">

    <div class="heading heading-center mb-6">
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
    
    <div class="tab-content">
        <div class="tab-pane fade show active" role="tabpanel">

            <div class="row justify-content-center">
                @forelse ($data['all_products'] as $product)
                    @include('web.partials.product-card', ['product' => $product])
                @empty
                    <p>No products found.</p>
                @endforelse
            </div>
        </div>

        @if ($data['all_products']->lastPage() > 1)
            @php $paginator = $data['all_products']; @endphp
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center align-items-center">

                    {{-- Previous Page Link --}}
                    <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link page-link-prev" 
                        href="{{ $paginator->previousPageUrl() ?? '#' }}"
                        aria-label="Previous">
                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>
                            Prev
                        </a>
                    </li>

                    {{-- Page Numbers --}}
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- "of X" display --}}
                    <li class="page-item-total mx-2 text-muted">
                        of {{ $paginator->lastPage() }}
                    </li>

                    {{-- Next Page Link --}}
                    <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link page-link-next" 
                        href="{{ $paginator->nextPageUrl() ?? '#' }}"
                        aria-label="Next">
                            Next
                            <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif

    </div>
    <!-- .End .tab-pane -->
</div><!-- End .tab-content -->

@endsection
@section('javascript')
@endsection