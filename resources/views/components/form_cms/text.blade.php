<div class="col-12">
    <div class="form-label-group">
        <input name="{{$name}}" type="{{$type ?? 'text'}}" id="{{$input_id ?? $name}}" class="form-control @if($is_title ?? false)get-text @elseif($is_url ?? false)set-text @endif {{$input_class ?? ''}}" 
        value="@if($is_old ?? true){{ old($name->toHtml(), $default_old->toHtml()) }}@endif" placeholder="{{$title_placehol ?? $title}}">
        <label for="title">{{$title}}</label>
        <span class="text-danger">{{ $errors->first($name->toHtml()) }}</span>
    </div>
</div>