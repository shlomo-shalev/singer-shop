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
      <div class="col-md-6 m-auto">
        <div class="heading">
          <h1 class="title fz-30">Signin</h1>
          <p>Here you can login with your account.</p>
        </div><!-- End .heading -->

        <form action="" method="POST" autocomplete="off" novalidate="novalidate">
          @csrf
          <label for="name">* email</label>
          <input type="email" name="email" value="{{ old('email', $restoration['email'] ?? '') }}" class="form-control"
            required>
          <div class="text-danger my-3">{{ $errors->first('email') }}</div>
          <label for="name">* password</label>
          <input type="password" name="password" class="form-control" required>
          <div class="text-danger my-3">{{ $errors->first('password') }}</div>

          <div class="form-footer">
            <button type="submit" class="btn btn-primary bg-br-site">Signin</button>
            <div class="text-danger my-3">{{ $verify_error ?? '' }}</div>
          </div><!-- End .form-footer -->
        </form>
      </div><!-- End .col-md-6 -->
    </div><!-- End .row -->
  </div><!-- End .container -->

</main><!-- End .main -->
@endsection