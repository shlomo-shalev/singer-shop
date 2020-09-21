@php

use App\Http\Controllers\Site\ErrorsController;

$data = new ErrorsController();
$data = $data->error500Data();
foreach ($data as $key => $value) {
  $$key = $value;
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
            <h1 class="dispalay-3">errors 500</h1>
            <p class="pt-3">We have an internal link. We will be happy for you to update us. If you need to contact us, you can call or send an email.</p>
            <div class="d-flex">
              <a href="mailto:info@rapley.com" class="go-to-cart bg-br-site text-white mr-3 ">Contact email</a>
              <a href="tel:+19453486475" class="go-to-cart bg-br-site text-white">Contact phone</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @endsection