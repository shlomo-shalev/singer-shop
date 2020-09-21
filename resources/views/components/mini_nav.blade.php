<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ url('') }}">
      <i class="icon-home"></i>
    </a>
  </li>
  @foreach ($mini_nav as $item_name => $item_url)
  <li class="breadcrumb-item active" aria-current="page">
    @if ($item_url)
    <a href="{{ url($item_url) }}">
      {{ $item_name }}
    </a>
    @else
    {{ $item_name }}
    @endif
  </li>
  @endforeach

</ol>