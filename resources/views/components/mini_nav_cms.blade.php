<div class="col-12">
  <h1 class="content-header-title float-left mb-0">{{ $title }}</h1>
  <div class="breadcrumb-wrapper col-12">
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="{{ url('cms/dashboard') }}" class="site-color">Dashboard</a>
          </li>
          @foreach ($items as $index => $item)
            @if ($item)
              <li class="breadcrumb-item">
                <a href="{{ url('cms/' . $item) }}" class="site-color">{{ $index }}</a>
              </li>
            @else
              <li class="breadcrumb-item active">
                {{ $index }}
              </li>
            @endif
          @endforeach
      </ol>
  </div>
</div>