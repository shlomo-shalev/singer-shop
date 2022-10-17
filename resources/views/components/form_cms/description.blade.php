<div class="col-12">
    <div class="form-label-group">
    <textarea name="{{ $name }}" class="form-control @if($no_wysiwyg ?? true)wysiwyg @endif{{ $input_class ?? '' }}" placeholder="{{ $title }}" id="{{ $input_id ?? $name }}" cols="30" rows="10">{!! old($name->toHtml(), $default_old->toHtml()) !!}</textarea>
    <label for="{{ $name }}">{{ $title }}</label>
        <span class="text-danger">{{ $errors->first($name->toHtml()) }}</span>
    </div>
</div>