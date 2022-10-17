@extends('site.master')

@section('main_content')

<main class="main mt-70">
  <section class="slider-rapley container">
    <div id="slider-rapley" class="carousel slide" data-ride="carousel" data-interval="10000">
    
      <div class="carousel-inner">
        <div class="carousel-item active">
        <a href="{{ url('shop/songs') }}">
          <img src="{{ asset('images/slider/slider-1.png') }}" alt="slider image">
          </a>
        </div>
        <div class="carousel-item">
          <a href="{{ url('shop/shirts') }}">
          <img src="{{ asset('images/slider/slider-2.png') }}" alt="slider image">
          </a>
        </div>
      </div>
    
      <a class="carousel-control-prev" href="#slider-rapley" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#slider-rapley" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    
    </div>
  </section>

  <section class="container mb-0 mt-3" style="position : relative;">
    <div class="product-panel mb-0">
      @foreach ($view_products as $item)
      <div class="d-flex w-100 justify-content-between site-bg-color mb-2">
        <a  href="{{ url('shop/' . $item[0]->url) }}"  class="section-title mb-0 text-white fz-15-m ml-3 mt-6px p-0">{{ $item[0]->title }}</a>
        <a href="{{ url('shop/' . $item[0]->url) }}" class="paction go-cart m-0 site-bg-color border-0 text-white min-w-auto pr-3" title="Go To cateogry">
        <span>move</span>
        </a>
      </div>
      <div class="row row-sm w-100 justify-content-left">
        @foreach ($item->take(4) as $value)
        <div class="col-6 col-md-3">
          <div class="product-default inner-quickview inner-icon">
            <figure>
              <a href="{{ url('shop/' . $value->url . '/' . $value->purl) }}">
                @if ($value->pimage != 'no-image.jpg')
                <img class="of-cover minh-auto" src="{{ asset('images/products/' . $value->pimage) }}" alt="product image">
                @else
                <img class="of-cover minh-auto" src="{{ asset('images/' . $value->pimage) }}" alt="product image">
                @endif
              </a>
              <div class="btn-icon-group">
                @if (!Cart::get($value->id))
                <button data-pid="{{ $value->id }}" class="btn-icon btn-add-cart add-product-to-cart"
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
                  href="{{ url('shop/' . $value->url . '/' . $value->purl) }}">Quick
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
                <a href="{{ url('shop/' . $value->url . '/' . $value->purl) }}">
                  {{ $value->ptitle }}
                </a>
              </h2>
              <div class="price-box">
                <span class="product-price">{{ $value->price }}</span>
              </div><!-- End .price-box -->
            </div><!-- End .product-details -->
          </div>
        </div>
        @endforeach
      </div>
      @endforeach
    </div>
</section>


  <section class="container mb-2" style="position : relative;">
    <div class="product-panel">
        <h2 class="section-title mt-0 site-bg-color w-100 text-white py-2">The newest products</h2>
        <div class="row row-sm w-100 justify-content-center">
          @foreach ($products as $product)
          <div class="col-6 col-md-3">
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
                  <a href="{{ url('shop/' . $product->url . '/' . $product->purl) }}">
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
    </div>
</section>

  <section class="bg-secondary bg-white mt-2 container">
    <div class="container py-5">
      <div class="row row-sm">
        <div class="col-lg-4">
          <div class="service-widget mb-3 mb-lg-auto">
            <h3 class="service-title site-color fs-15">Shop</h4>
              <p class="site-color">
                Shirts, songs and more in direct purchase.
              </p>
            <a href="{{ url('shop') }}" class="link-in-home site-color click-bg-color-2">Go To Shop</a>
          </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block">
          <div class="service-widget mb-3 mb-lg-auto">
            <h3 class="service-title site-color">Contact</h4>
              <p class="site-color">
                Contact us for business.
              </p>
              <a href="{{ url('contact') }}" class="link-in-home site-color click-bg-color-2">More Details</a>
          </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block">
          <div class="service-widget mb-3 mb-lg-auto">
            <h3 class="service-title site-color">Signup</h4>
              <p class="site-color">
                Sign up to buy products after you select them.
              </p>
              <a href="{{ url('user/signup') }}" class="link-in-home site-color click-bg-color-2">Signup</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End .main -->

@endsection