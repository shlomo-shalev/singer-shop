<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/rapley-icon2.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/vendors/css/charts/apexcharts.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/app-assets/css/pages/card-analytics.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/vuexy/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cms-main.css') }}">
    <!-- END: Custom CSS-->

    <script>

        var BASIC_URL = '{{ url('') }}/';

    </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static 
@if (Session::get('close') == 'yes')menu-collapsed @endif" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                    <i class="ficon feather icon-menu site-color-to-icon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-block">
                            <a class="nav-link" target="_blank" title="fronted site" href="{{ url('') }}">
                                <i class="ficon feather icon-layout site-color-to-icon"></i>
                            </a>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-flex">
                                <span class="user-name text-bold-600 pt-4p mb-res">{{ Session::get('user_name') }}</span>
                                </div>
                                <span>
                                    <img class="round of-c" src="{{ asset('images/user.png') }}" alt="user image" height="40" width="40">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                          <!--  <a class="dropdown-item click-bg-color" href="{{ url('user/profile') }}">
                                    <i class="feather icon-user"></i> Edit Profile
                                </a>
                                <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item click-bg-color" href="{{ url('user/logout') }}">
                                    <i class="feather icon-power"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a href="{{ url('cms/dashboard') }}" class="logo navbar-brand mt-0">
                        <!--<img src="{{ asset('lib/porto/assets/images/logo.png') }}" alt="Porto Logo">-->
                        <div class="site-color font-weight-bold ml-8p mt-1">R</div>
                        <h2 class="brand-text site-color font-weight-bold p-0 m-0 pt-17p">apley</h2>
                      </a>
                </li>
            <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse" data-cms-toggle="{{ Session::get('close') ? 'no' : 'yes' }}">
                        <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon site-color"></i>
                        <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary site-color" data-ticon="icon-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                <a href="{{ url('cms/dashboard') }}" class="click-color @if($nav_active['active'] == 'dashboard')active-site @endif">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
                </li>
                <li class="navigation-header"><span>Apps</span>
                </li>
                <li class="nav-item">
                <a href="{{ url('cms/menu') }}" class="click-color @if($nav_active['active'] == 'menu')active-site @endif">
                    <i class="feather icon-list"></i>
                    <span class="menu-title">Menu</span>
                </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('cms/contents') }}" class="click-color @if($nav_active['active'] == 'contents')active-site @endif">
                        <i class="feather icon-file-text"></i>
                        <span class="menu-title">Contents</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('cms/categories') }}" class="click-color @if($nav_active['active'] == 'categories')active-site @endif">
                        <i class="feather icon-grid"></i>
                        <span class="menu-title">Categories</span>
                    </a>
                </li>    
                <li class="nav-item">
                    <a href="{{ url('cms/products') }}" class="click-color @if($nav_active['active'] == 'products')active-site @endif">
                        <i class="feather icon-box"></i>
                        <span class="menu-title">Products</span>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="{{ url('cms/orders') }}" class="click-color @if($nav_active['active'] == 'orders')active-site @endif">
                        <i class="feather icon-package"></i>
                        <span class="menu-title">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('cms/users') }}" class="click-color @if($nav_active['active'] == 'users')active-site @endif">
                        <i class="feather icon-users"></i>
                        <span class="menu-title">Users</span>
                    </a>
                </li>    
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <main>
        @yield('main_content')
    </main>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light mb-1">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">
                singer rapley. &copy; 2020. All Rights Reserved.
            </span>
        </p>
    </footer>
    <!-- END: Footer-->

    @if (Session::get('warning'))
    <div class="warning text-center">
      <div class="toast toast-warning m-auto d-block">
        <div class="toast-header site-bg-color border-0 text-white">
          {{ Session::get('warning') }}
        </div>
    </div>
    @endif

    @if (Session::get('error'))
    <div class="warning text-center">
      <div class="toast toast-warning m-auto d-block bg-danger mw-400">
        <div class="toast-header bg-danger border-0 text-white">
          {{ Session::get('error') }}
        </div>
    </div>
    @endif

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('lib/vuexy/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->
    <script src="{{ asset('lib/vuexy/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
    <script src="{{ asset('lib/vuexy/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('lib/vuexy/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('lib/vuexy/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('lib/vuexy/app-assets/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('lib/vuexy/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('lib/vuexy/app-assets/js/scripts/pages/app-user.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/cms-script.js') }}"></script>

</body>
<!-- END: Body-->

</html>