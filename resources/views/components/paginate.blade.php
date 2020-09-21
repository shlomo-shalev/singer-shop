@if ($paginate['paginate_last_page'] != 1)
<nav class="toolbox toolbox-pagination col-12 d-flex justify-content-center justify-content-sm-start px-0">
  <div class="toolbox-item toolbox-show">
    @if ($paginate['is_details'] ?? true)
    @component('components.items_data_paginate', ['paginate' => $paginate])
    @endcomponent
    @endif
  </div>

  <ul class="pagination">
    @if(1 == $paginate['current_page'])
    <li class="page-item disabled">
      <a class="page-link page-link-btn" href="#">
        <i class="fa fa-chevron-left"></i>
      </a>
    </li>
    @else
    <li class="page-item">
      <a class="page-link page-link-btn"
        href="{{ url($paginate['redirect'] ?? 'shop') . ($paginate['name_category'] ?? '') . '?page=' . ($paginate['current_page'] - 1) }}@if($paginate['order_by'] ?? false){{'&orderBy=' . $paginate['order_by']}}@endif">
        <i class="fa fa-chevron-left"></i>
        </a>
    </li>
    @endif

    @for($page = 1; $page <= $paginate['paginate_last_page']; $page++) 
    <li class="page-item @if($page == $paginate['current_page'])active @endif">
      <a class="page-link" href="{{ url($paginate['redirect'] ?? 'shop') . ($paginate['name_category'] ?? '') . '?page=' . $page }}@if($paginate['order_by'] ?? false){{'&orderBy=' . $paginate['order_by']}}@endif">
        {{ $page }}
      </a>
      </li>
    @endfor

      @if($paginate['paginate_last_page'] <= $paginate['current_page']) 
        <li class="page-item disabled">
        <a class="page-link page-link-btn" href="#">
          <i class="fa fa-chevron-right"></i> 
        </a>
        </li>
        @else
        <li class="page-item">
          <a class="page-link page-link-btn"
            href="{{ url($paginate['redirect'] ?? 'shop') . ($paginate['name_category'] ?? '') . '?page=' . ($paginate['current_page'] + 1) }}@if($paginate['order_by'] ?? false){{'&orderBy=' . $paginate['order_by']}}@endif">
            <i class="fa fa-chevron-right"></i>
          </a>
        </li>
        @endif
  </ul>
</nav>
@endif