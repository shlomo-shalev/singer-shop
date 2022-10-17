@extends('site.master')

@section('main_content')
<main class="main mt-70">
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
      @component('components.mini_nav', ['mini_nav' => $mini_nav ?? []])
      @endcomponent
    </div><!-- End .container -->
  </nav>

  <div class="container mb-4">
    <div class="row">
      @if ( $categories[0]->image ?? 0 )
      <div class="col-12">
        <nav class="toolbox mb-4">
          <div class="toolbox-item toolbox-show">
            @component('components.items_data_paginate', ['paginate' => $paginate_data])
            @endcomponent
          </div><!-- End .toolbox-item -->
        </nav>

        <div class="row row-sm">
          @foreach ($categories as $category)
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="product-default inner-quickview inner-icon">
              <figure>
                <a href="{{ url('shop/' . $category->url) }}">
                  @if ($category->image != 'no-image.jpg')
                  <img width="100" class="category-image" src="{{ asset('images/categories/' . $category->image) }}" alt="category-image">
                  @else
                  <img width="100" class="category-image" src="{{ asset('images/' . $category->image) }}" alt="category-image">
                  @endif
                </a>
                <button class="btn-quickview p-0">
                  <a class="py-4 w-100 text-white bg-br-site" href="{{ url('shop/' . $category->url) }}">Quick
                    View</a>
                </button>
              </figure>
              <div class="product-details">
                <div class="category-wrap">
                  <div class="category-list">
                    <span href="#body" class="product-category">category</span>
                  </div>
                </div>
                <h2 class="product-title">
                  <a href="{{ url('shop/'. $category->url) }}">{{ $category->title }}</a>
                </h2>
                <div class="ratings-container">
                  <div class="category-description">
                    <p>{!! $category->description !!}</p>
                  </div>
                </div><!-- End .product-container -->
              </div>
            </div>
          </div>
          @endforeach
          @else
          <p class="text-center display-4 w-100 px-3">No categories available...</p>
        </div>
        @endif

        @component('components.paginate', ['paginate' => $paginate_data])
        @endcomponent

      </div><!-- End .col-lg-9 -->

    </div><!-- End .row -->
  </div><!-- End .container -->
</main><!-- End .main -->
@endsection