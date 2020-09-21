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
    <div class="row">
      @if ($cart_content ?? 0)
      <div class="col-lg-8">
        <div class="cart-table-container">
          <table class="table table-cart">
            <thead>
              <tr>
                <th class="product-col">Product</th>
                <th class="price-col">Price</th>
                <th class="qty-col">Qty</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cart_content as $product)
              <tr class="product-row">
                <td class="product-col">
                  <figure class="product-image-container">
                    <a href="{{ url($product['attributes']['url']) }}" class="product-image">
                      @if ($product['attributes']['image'] != 'no-image.jpg')
                      <img src="{{ asset('images/products/' . $product['attributes']['image']) }}" alt="product">
                      @else
                      <img src="{{ asset('images/' . $product['attributes']['image']) }}" alt="product">
                      @endif
                    </a>
                  </figure>
                  <h2 class="product-title">
                    <a href="{{ url($product['attributes']['url']) }}">{{ $product['name'] }}</a>
                  </h2>
                </td>
                <td>${{ $product['price'] }}</td>
                <td>
                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                    <input class=" form-control" type="text" value="{{ $product['quantity'] }}" disabled="disabled">
                    <span class="input-group-btn-vertical">
                      <a href="{{ url('shop/cart?pid=' . $product['id'] . '&quantity=plus') }}"
                        class="btn btn-outline bootstrap-touchspin-up icon-up-dir disabled-btn">
                      </a>
                      <a href="{{ url('shop/cart?pid=' . $product['id'] . '&quantity=minus') }}"
                        class="btn btn-outline bootstrap-touchspin-down icon-down-dir disabled-btn"></a>
                    </span>
                  </div>
                </td>
                <td>${{ $product['price'] * $product['quantity'] }}</td>
              </tr>
              <tr class="product-action-row">
                <td colspan="4" class="clearfix">

                  <div class="float-right">
                    <a href="#" data-pid="{{ $product['id'] }}" title="Remove product"
                      class="btn-remove delete-from-cart-btn">
                      <span class="sr-only">Remove</span>
                    </a>
                  </div><!-- End .float-right -->
                </td>
              </tr>
              @endforeach
            </tbody>

            <tfoot>
              <tr>
                <td colspan="4" class="clearfix">
                  <div class="float-left">
                    <a href="{{ URL('shop') }}" class="btn btn-outline-secondary site-hover">Continue Shopping</a>
                  </div><!-- End .float-left -->

                  <div class="float-right">
                    <button type="button" class="btn btn-outline-secondary btn-clear-cart site-hover">Clear Shopping
                      Cart</button>
                  </div><!-- End .float-right -->
                </td>
              </tr>
            </tfoot>
          </table>
        </div><!-- End .cart-table-container -->
      </div><!-- End .col-lg-8 -->

      <div class="col-lg-4">
        <div class="cart-summary">
          <h3>Summary</h3>

          <table class="table table-totals">
            <tbody>
              <tr>
                <td>Subtotal</td>
                <td>${{ $cart_total ?? 0 }}</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td>Order Total</td>
                <td>${{ $cart_total ?? 0 }}</td>
              </tr>
            </tfoot>
          </table>

          <div class="checkout-methods">
            <a href="{{ url('shop/checkout') }}" class="btn btn-block btn-sm btn-primary site-bg-color border-0 " id="checkout-site">Go to Checkout</a>
          </div><!-- End .checkout-methods -->
        </div><!-- End .cart-summary -->
      </div><!-- End .col-lg-4 -->
      @else
      <div class="col-12 my-4">
        <p class="text-center display-4 w-100 px-3">No Products In The Cart!</p>
      </div>
      <div class="col-12 d-flex justify-content-center">
        <div class="dropdown-cart-action col-sm-4">
          <a href="{{ url('shop') }}" class="btn btn-block w-100 bg-br-site">Go To Shop</a>
        </div><!-- End .dropdown-cart-total -->
      </div>
      @endif
    </div><!-- End .row -->

  </div><!-- End .container -->
</main><!-- End .main -->
@endsection