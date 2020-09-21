@php

use App\Http\Controllers\Site\ErrorsController;

if(!($page_title ?? false)){

  $data = ErrorsController::error404Data();
  foreach ($data as $key => $value) {
    $$key = $value;
  }

}

@endphp

  @extends('site.master')
  @section('main_content')
  <main class="main mt-70">
    <br>
    <br>
    <br>
    <section class="container pt-4">
      <div class="row row-sm justify-content-center pt-4">
        <div class="col-lg-6">
          <div class="service-widget">
            <h1 class="dispalay-3">errors 404</h1>
            <p class="pt-3">We were unable to locate the page, you may move to the shopping page, more fun there!</p>
            <a href="{{ url('shop') }}" class="go-to-cart bg-br-site text-white">go to shop</a>
          </div>
        </div>
      </div>
    </section>
  </main>
  @endsection