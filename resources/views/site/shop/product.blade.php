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
    @if ($product->pimage ?? 0)
    <div class="row">
      <div class="col-lg-9">
        <div class="product-single-container product-single-default">
          <div class="row">
            <div class="col-lg-7 col-md-6 product-single-gallery">
              <div class="product-slider-container product-item">
                <div class="product-single-carousel owl-carousel owl-theme">
                  <div class="product-item">
                    @if ($product->pimage != 'no-image.jpg')
                    <img class="product-single-image product-image" src="{{ asset('images/products/' . $product->pimage) }}" alt="product image" data-zoom-image="{{ asset('images/products/' . $product->pimage) }}">
                    @else
                    <img class="product-single-image product-image" src="{{ asset('images/' . $product->pimage) }}" alt="product image" data-zoom-image="{{ asset('images/' . $product->pimage) }}">
                    @endif
                  </div>
                </div>
                <!-- End .product-single-carousel -->
                <span class="prod-full-screen">
                  <i class="icon-plus"></i>
                </span>
              </div>
              <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                <div class="col-3 owl-dot">
                  @if ($product->pimage != 'no-image.jpg')
                  <img src="{{ asset('images/products/' . $product->pimage) }}" />
                  @else
                  <img src="{{ asset('images/' . $product->pimage) }}" />
                  @endif
                </div>
              </div>
            </div><!-- End .col-lg-7 -->

            <div class="col-lg-5 col-md-6">
              <div class="product-single-details">
                <h1 class="product-title">{{ $product->ptitle }}</h1>

                <div class="price-box">
                  <span class="product-price site-color">${{ $product->price }}</span>
                </div><!-- End .price-box -->

                <div class="product-desc">
                  <p>
                    {!! $product->particle !!}
                  </p>
                </div><!-- End .product-desc -->

                <div class="sticky-header mp-lg-minus-25">
                  <div class="container">
                    <div class="sticky-img">
                      <img src="{{ asset('images/products/' . $product->pimage) }}" />
                    </div>
                    <div class="sticky-detail">
                      <div class="sticky-product-name">
                        <h2 class="product-title">{{ $product->ptitle }}</h2>
                        <div class="price-box">
                          <span class="product-price site-color">${{ $product->price }}</span>
                        </div><!-- End .price-box -->
                      </div>
                    </div><!-- End .sticky-detail -->
                    @if (!Cart::get($product->id))
                    <button data-pid="{{ $product->id }}" class="paction add-cart add-product-to-cart"
                      title="Add to Cart">
                      <span>Add to Cart</span>
                    </button>
                    @else
                    <button class="paction add-cart in-cart" title="In Cart" disabled="disabled">
                      <span>In cart!</span>
                    </button>
                    @endif
                  </div><!-- end .container -->
                </div><!-- end .sticky-header -->

                <div class="product-action product-all-icons pt-2">
                  @if (!Cart::get($product->id))
                  <div class="product-single-qty text-rapley">
                    <input class="horizontal-quantity form-control product_size" type="text">
                  </div><!-- End .product-single-qty -->
                  <button data-pid="{{ $product->id }}" class="paction add-cart add-product-to-cart"
                    title="Add to Cart">
                    <span>Add to Cart</span>
                  </button>
                  @else
                  <button class="paction add-cart in-cart" title="In Cart" disabled="disabled">
                    <span>In cart!</span>
                  </button>
                  @endif
                  <a href="{{ url('shop/cart') }}" class="paction go-cart" title="Go To Cart">
                    <span>Buy Now</span>
                  </a>
                </div><!-- End .product-action -->
              </div><!-- End .product-single-details -->
            </div><!-- End .col-lg-5 -->
          </div><!-- End .row -->
        </div><!-- End .product-single-container -->
      </div><!-- End .col-lg-9 -->

      <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
        <div class="sidebar-wrapper">

          <div class="widget widget-info">
            <ul>
              <li>
                <i class="icon-shipping site-color"></i>
                <h4>FREE<br>SHIPPING</h4>
              </li>
              <li>
                <i class="icon-us-dollar site-color"></i>
                <h4>100% MONEY<br>BACK GUARANTEE</h4>
              </li>
              <li>
                <i class="icon-online-support site-color"></i>
                <h4>ONLINE<br>SUPPORT 24/7</h4>
              </li>
            </ul>
          </div><!-- End .widget -->

      </aside><!-- End .col-md-3 -->
    </div><!-- End .row -->
    @endif
  </div><!-- End .container -->
</main><!-- End .main -->
@endsection