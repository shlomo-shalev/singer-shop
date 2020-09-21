<div class="col-12">
    <div class="form-label-group">
        <select class="form-control {{ $input_class ?? '' }}" name="{{ $name }}" id="{{ $id_select ?? $name }}">
            @if ( isset($no_edit) && $no_edit->toHtml() )
            <option value="">{{ $option_default ?? 'Select an menu link...' }}</option>   
            @endif
            @foreach ($items as $key => $item)
                <option 
                @if (old($name->toHtml(), $item_id->toHtml()) == ($item->id ?? $item))
                selected="selected"
                @endif
                value="{{ $item->id ?? $item }}">{{ $item->link ?? $item->title ?? $key }}
                </option>
            @endforeach
        </select>
    <label for="menu_link">{{ $label }}</label>
        <span class="text-danger">{{ $errors->first($name->toHtml()) }}</span>
    </div>
</div>