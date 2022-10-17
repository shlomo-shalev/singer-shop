<div class="col-12">
    <a href="{{ url($redirect) }}" class="btn btn-outline-light mr-1 mb-1 waves-effect waves-light">
        Cansel
    </a>
    @if (Session::get('is_viewing'))
    <button type="submit" class="btn btn-danger mr-1 mb-1 waves-effect waves-light add-item" disabled="disabled">
        You cannot save
    </button>
    @else
    <button type="submit" class="btn @if($delete ?? false)btn-danger @else btn-primary site-bg-color @endif mr-1 mb-1 waves-effect waves-light add-item">
        {{ $title_submit }}
    </button>
    @endif
</div>