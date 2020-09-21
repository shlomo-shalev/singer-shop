@extends('site.master')

@section('main_content')

<main class="main mt-70 pt-4">
  <div class="container">
    @foreach ($contents as $content)
    <div class="row">
      <div class="col-12">
        <h3 class="mt-2">{{ $content->cntitle }}</h3>
        <p class="mt-2">{!! $content->cndescription !!}</p>
      </div>
    </div>
    @endforeach
  </div>
</main><!-- End .main -->

@endsection