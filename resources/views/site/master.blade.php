<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ $page_title ?? 'Rapley' }}</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('images/rapley-icon.ico') }}">


  <script type="text/javascript">
    WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = "{{ asset('lib/porto/assets/js/webfont.js') }}";
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
  </script>

  <script>
    var BASIC_URL = '{{ url('') }}/';
  </script>

  <!-- Plugins CSS File -->
  <link rel="stylesheet" href="{{ asset('lib/porto/assets/css/bootstrap.min.css') }}">

  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{ asset('lib/porto/assets/css/style.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/porto/assets/vendor/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css?v=1') }}">
</head>

<body id="body">
  <div class="page-wrapper">

    <header class="header">
      <div class="header-bottom fixed-header">
        <div class="container">
          <div class="row row-sm h-70">
            <div class="col-lg-2 header-left">
              <button class="mobile-menu-toggler" type="button">
                <i class="icon-menu"></i>
              </button>

              <a href="{{ url('') }}" class="logo">
                <!--<img src="{{ asset('lib/porto/assets/images/logo.png') }}" alt="Porto Logo">-->
                <h2 class="text-info">Rapley</h2>
              </a>
            </div>
            <div class="col-lg-8 header-center d-lg-flex justify-content-lg-start">
              <nav class="main-nav">
                <ul class="menu">
                  <li>
                    <a class="link-nav @if($nav_active['active'] == 'home')active-site @endif" 
                    href="{{ url('') }}">Home</a>
                  </li>
                  <li>
                    <a class="link-nav @if($nav_active['active'] == 'shop')active-site @endif" href="{{ url('shop') }}">Shop</a>
                    @if ($categories_header ?? 0)
                    <div class="megamenu w-auto">
                      <div class="row row-sm">
                        <div class="col-12">
                          <ul class="submenu">
                            <li>
                              <a class="link-nav font-bold pt-0 mt-0 @if($nav_active['active_shop'] == 'all-categories')active-site @endif" href="{{ url('shop') }}">
                                all Categories
                              </a>
                            </li>
                            @foreach($categories_header as $category) 
                            <li>
                              <a class="link-nav @if($nav_active['active_shop'] == $category->url)active-site @endif" href="{{ url('shop/' . $category->url) }}">
                                {{ $category->title }}
                              </a>
                            </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                    @endif
                  </li>
                  @foreach ($menus ?? [] as $menu)
                  <li>
                    <a class="link-nav @if($nav_active['active'] == $menu->url)active-site @endif" href="{{ url( $menu->url) }}">
                      {{ $menu->link }}
                    </a>
                  </li>
                  @endforeach
                  <li>
                    <a href=""></a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-lg-2 header-right">
              <div class="dropdown d-none d-lg-block">
                <a href="#" class="dropdown-toggle border-0 bg-white user-btn text-rapley" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-display="static">
                <div class="header-user">
                  <span class="fz-15 span-link text-right">
                    {{ Session::get('user_name') }}
                  </span>
                  <i class="icon-user-2"></i>
                </div>
              </a>
              
              @if (Session::has('user_id'))
                <div class="dropdown-menu p-3 w-150 dropdown-menu-right">
                    <div class="header-user d-block m-0 mt-1">
                      <p class="fz-15 text-center text-rapley">
                        {{ Session::get('user_name') }}
                      </p>
                    </div>
                  <hr class="m-0">
                  @if (Session::get('is_admin') || Session::get('is_viewing'))
                  <a href="{{ url('cms/dashboard') }}" class="text-rapley">
                    <div class="header-user d-block m-0 mt-1">
                      <p class="fz-15 text-center">Website system</p>
                    </div>
                  </a>
                  @endif
                  <a href="{{ url('user/logout') }}" class="text-rapley">
                    <div class="header-user d-block m-0 mt-1">
                      <p class="fz-15 text-center">Logout</p>
                    </div>
                  </a>
                </div>
              </div>
              @else
                <div class="dropdown-menu p-3 w-150 dropdown-menu-right">
                  <a href="{{ url('user/signin') }}" class="text-rapley">
                    <div class="header-user d-block m-0 mt-1">
                      <p class="fz-15 text-center text-rapley">Signin</p>
                    </div>
                  </a>
                  <a href="{{ url('user/signup') }}">
                    <div class="header-user d-block m-0 mt-1" class="text-rapley">
                      <p class="fz-15 text-center text-rapley">Signup</p>
                    </div>
                  </a>
                </div>
              </div>
              @endif
          
              <!--
              <div class="header-search">
                <a href="#" class="search-toggle text-rapley" id="icon-search" role="button"><i class="icon-search-3"></i></a>
                <form class="form-search" action="{{ url('search') }}" method="GET">
                  <div class="header-search-wrapper" id="div-form-search">
                    <input type="search" class="form-control search-style" name="search" id="search"
                      placeholder="I'm searching for...">
                    <span id="error-search"></span>
                    <div class="select-custom">
                      <select id="cat" name="cat">
                        <option value="0">All Categories</option>
                        @foreach ($categories_header ?? [] as $category)
                        <option value="{{ $category->title }}">{{ $category->title }}</option>
                        @endforeach
                      </select>
                    </div>
                    <button class="btn" id="btn-form-search" type="submit"><i class="icon-search"></i></button>
                  </div>
                </form>
              </div>
          
              <a href="{{ url('wishlist') }}" class="porto-icon text-rapley">
                <i class="icon icon-wishlist-2"></i>
              </a> -->
          
              <div class="dropdown cart-dropdown">
                <a href="#" class="dropdown-toggle border-0 bg-white" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" data-display="static">
                  <i class="minicart-icon"></i>
                  <span class="cart-count bg-br-site">{{ $cart_count ?? 0 }}</span>
                </a>
          
                <div class="dropdown-menu wm-500">
                  <div class="dropdownmenu-wrapper">
                    @if ($cart_content ?? false)
                    <div class="dropdown-cart-header">
                      <span>{{ $cart_count }} Items</span>
          
                      <span class="ml-auto">View Cart</span>
                    </div><!-- End .dropdown-cart-header -->
                    <div class="dropdown-cart-products h-300 o-y-scoller">
                      @foreach ($cart_content as $product)
                      <div class="product">
                        <div class="product-details">
                          <h4 class="product-title">
                            <a href="{{ url($product['attributes']['url']) }}" class="text-rapley">
                              {{ $product['name'] }}
                            </a>
                          </h4>
          
                          <span class="cart-product-info">
                            <span class="cart-product-qty">{{ $product['quantity'] }}</span>
                            x ${{ $product['price'] }}
                          </span>
                        </div><!-- End .product-details -->
          
                        <figure class="product-image-container">
                          <a href="{{ url($product['attributes']['url']) }}" class="product-image">
                            @if ($product['attributes']['image'] != 'no-image.jpg')
                            <img src="{{ asset('images/products/' . $product['attributes']['image']) }}" alt="product">
                            @else
                            <img src="{{ asset('images/' . $product['attributes']['image']) }}" alt="product">
                            @endif
                          </a>
                          <a href="#" data-pid="{{ $product['id'] }}" class="btn-remove delete-from-cart-btn text-rapley"
                            title="Remove Product"><i class="icon-retweet"></i>
                          </a>
                        </figure>
                      </div><!-- End .product -->
                      @endforeach
                    </div>
          
                    <div class="dropdown-cart-total">
                      <span>Total</span>
          
                      <span class="cart-total-price">${{ $cart_total }}</span>
                    </div>
                    <div class="dropdown-cart-action">
                      <a href="{{ url('shop/cart') }}" class="btn btn-block w-100 bg-br-site">Go To Cart</a>
                    </div>
                    @else
                    <p class="text-center fz-15">There aren't products yet</p>
                    <div class="dropdown-cart-action">
                      <a href="{{ url('shop') }}" class="btn btn-block w-100 bg-br-site">Go To Shop</a>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>       
    </header>

    @yield('main_content')

    <footer class="footer">
      <div class="container">
        <div class="footer-top">
          <div class="row row-sm">
            <div class="col-md-4 col-lg-3">
              <div class="widget">
                <h3 class="widget-title">contact info</h3>
                <div class="widget-content">
                  <ul>
                    <li class="subwidget">
                      <h4 class="subwidget-title">address</h4>
                      <p>75 Street Hii, Cfar Yona, Israel</p>
                    </li>
                  </ul>
                  <ul>
                    <li class="subwidget">
                      <h4 class="subwidget-title">phone</h4>
                      <a href="tel:+972509191073">call +19453486475</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="widget">
                <h3 class="widget-title">More</h3>
                <div class="widget-content row row-sm">
                  <div class="col-lg-6">
                    <ul>
                      @foreach ($menus ?? [] as $menu)
                      <li>
                        <a href="{{ url( $menu->url) }}">
                          {{ $menu->link }}
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="col-lg-6">
                    <ul>
                      <li><a href="{{ url('user/signin') }}">Signin</a></li>
                      <li><a href="{{ url('user/signup') }}">Signup</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>singer rapley. © 2020. All Rights Reserved.</p>
          <img src="{{ asset('lib/porto/assets/images/payments_long.png') }}">
        </div>
      </div>
    </footer>

  </div>

  <div class="mobile-menu-overlay"></div>

  <div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
      <span class="mobile-menu-close"><i class="icon-retweet"></i></span>
      <nav class="mobile-nav">
        <ul class="mobile-menu">
          @if (Session::has('user_id'))
          <li class="text-center p-3">
            <div class="text-name mx-0 px-0">
              {{ Session::get('user_name') }}
            </div>
            @if (Session::get('is_admin') || Session::get('is_viewing'))
            <a href="{{ url('cms/dashboard') }}" class="mx-0 px-0">Website system</a>
            @endif
            <a href="{{ url('user/logout') }}" class="mx-0 px-0">Logout</a>
          </li>
          @endif
          <li>
            <a class="link-nav @if($nav_active['active'] == 'home')active-site @endif" href="{{ url('') }}">Home</a>
          </li>
          <li>
            <a class="link-nav @if($nav_active['active'] == 'shop')active-site @endif" href="{{ url('shop') }}">Shop</a>
            @if ($categories_header ?? 0)
            <ul>
              @foreach ($categories_header as $category)
              <li>
                <a class="link-nav @if($nav_active['active_shop'] == $category->url)active-site @endif" href="{{ url('shop/' . $category->url) }}">
                  {{ $category->title }}
                </a>
              </li>
              @endforeach
            </ul>
            @endif
          </li>
          @foreach ($menus ?? [] as $menu)
          <li>
            <a class="link-nav @if($nav_active['active'] == $menu->url)active-site @endif" href="{{ url( $menu->url) }}">
              {{ $menu->link }}
            </a>
          </li>
          @endforeach
          @if (!Session::has('user_id'))
          <li>
            <a class="link-nav" href="{{ url('user/signin') }}">Signin</a>
          </li>
          <li>
            <a class="link-nav" href="{{ url('user/signup') }}">Signup</a>
          </li>
          @endif
          <li class="w-0 h-0">
          </li>
        </ul>
      </nav><!-- End .mobile-nav -->

    </div><!-- End .mobile-menu-wrapper -->
  </div>

  @if (Session::has('warning'))
  <div class="warning text-center">
    <div class="toast toast-warning m-auto">
      <div class="toast-header">
        {{ Session::get('warning') }}
      </div>
  </div>
  @endif

  <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

  <!-- Plugins JS File -->
  <script src="{{ asset('lib/porto/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/porto/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('lib/porto/assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('lib/porto/assets/js/plugins.min.js') }}"></script>
  <script src="{{ asset('lib/porto/assets/js/plugins/isotope-docs.min.js') }}"></script>


  <!-- Main JS File -->
  <script src="{{ asset('lib/porto/assets/js/main.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>