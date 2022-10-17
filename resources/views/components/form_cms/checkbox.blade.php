<div class="col-12 form-group d-flex">
    <fieldset class="checkbox mr-3">
        <div class="vs-checkbox-con vs-checkbox-primary">
        <input name="{{ $name }}" type="checkbox" id="{{ $input_id ?? $name }}" class="{{ $input_class ?? '' }}" 
            @if ($is_checked ?? false)
            @if (Session::has('_old_input'))
            @if (old($name))
            checked
            @endif
            @elseif($default_checked ?? false)
            checked
            @endif 
            @else
            @if (old($name))
            checked
            @endif
            @endif>
            <span class="vs-checkbox">
                <span class="vs-checkbox--check">
                    <i class="vs-icon feather icon-check"></i>
                </span>
            </span>
            <span class="">{{ $title }}</span>
        </div>
    </fieldset>
    @if ($is_option_two ?? false)
    <fieldset class="checkbox">
        <div class="vs-checkbox-con vs-checkbox-primary">
        <input name="{{ $name_two }}" type="checkbox" id="{{ $input_id ?? $name_two }}"  
        @if ($is_checked_two ?? false)
        @if (Session::has('_old_input'))
        @if (old($name_two))
        checked
        @endif
        @elseif($default_checked_two ?? false)
        checked
        @endif 
        @else
        @if (old($name_two))
        checked
        @endif
        @endif>
            <span class="vs-checkbox">
                <span class="vs-checkbox--check">
                    <i class="vs-icon feather icon-check"></i>
                </span>
            </span>
        <span class="">{{ $title_two }}</span>
        </div>
    </fieldset>
    @endif
</div>