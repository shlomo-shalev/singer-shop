@extends('site.master')

@section('main_content')
<main class="main mt-70">

  <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
      @component('components.mini_nav', ['mini_nav' => $mini_nav ?? []])
      @endcomponent
    </div><!-- End .container -->
  </nav>

  <div class="container">
    @if ( $products[0]->pimage ?? 0 )
    <nav class="toolbox mb-4">
      <div class="toolbox-left">
        <div class="toolbox-item toolbox-sort">
          <div class="select-custom">
            <select name="orderby" class="form-control" id="sorting">
              <option value="" @if($order_by == '') selected="selected" @endif>
                Default sorting
              </option>
              <option value="low" @if($order_by == 'low') selected="selected" @endif>
                Price high to low
              </option>
              <option value="high" @if($order_by == 'high') selected="selected" @endif>
                Price low to high
              </option>
            </select>
          </div><!-- End .select-custom -->

          <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending
              Direction</span></a>
        </div><!-- End .toolbox-item -->
      </div><!-- End .toolbox-left -->

      <div class="toolbox-item toolbox-show">
        @component('components.items_data_paginate', ['paginate' => $paginate_data])
        @endcomponent
      </div><!-- End .toolbox-item -->

    </nav>

    <div class="row row-sm">
      @foreach ($products as $product)
      <div class="col-6 col-md-4 col-xl-5col">
        <div class="product-default inner-quickview inner-icon">
          <figure>
            <a href="{{ url('shop/' . $product->url . '/' . $product->purl) }}">
              @if ($product->pimage != 'no-image.jpg')
              <img class="of-cover minh-auto" src="{{ asset('images/products/' . $product->pimage) }}" alt="product image">
              @else
              <img class="of-cover minh-auto" src="{{ asset('images/' . $product->pimage) }}" alt="product image">
              @endif
            </a>
            <div class="btn-icon-group">
              @if (!Cart::get($product->id))
              <button data-pid="{{ $product->id }}" class="btn-icon btn-add-cart add-product-to-cart"
                data-toggle="modal" data-target="#addCartModal">
                <i class="icon-bag"></i>
              </button>
              @else
              <button class="btn-icon btn-add-cart in-cart">
                in!
              </button>
              @endif
            </div>
            <button class="btn-quickview p-0">
              <a class="py-4 w-100 text-white bg-br-site"
                href="{{ url('shop/' . $product->url . '/' . $product->purl) }}">Quick
                View</a>
            </button>
          </figure>
          <div class="product-details">
            <div class="category-wrap">
              <div class="category-list">
                <span class="product-category">product</span>
              </div>
            </div>
            <h2 class="product-title">
              <a href="{{ url('shop/' . $product->url . '/' . $product->purl) }}" class="site-color-to-icon">
                {{ $product->ptitle }}
              </a>
            </h2>
            <div class="price-box">
              <span class="product-price">{{ $product->price }}</span>
            </div><!-- End .price-box -->
          </div><!-- End .product-details -->
        </div>
      </div>
      @endforeach
    </div>

      @component('components.paginate', ['paginate' => $paginate_data])
      @endcomponent

    @else
    <div class="toolbox mb-4">
      <p class="text-center display-4 w-100 px-3">No Products available...</p>
    </div>
    @endif
  </div><!-- End .container -->
</main><!-- End .main -->
<script>
  var URL_PAGE = '{{ url('shop/' . $curl) }}';
  var CURRENT_PAGE = '{{ $paginate_data['current_page'] }}';
</script>
@endsection