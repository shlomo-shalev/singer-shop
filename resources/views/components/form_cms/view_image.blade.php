<div class="col-12 mb-2 block-img-front" @if($create ?? false)style="display: none" @endif>
    <div class="from-group">
    <img width="150" src="@if(isset($src)){{asset('images/' . ($src != 'no-image.jpg' ? ($src_folder ?? 'categories') . '/' . $src : 'no-image.jpg'))}}@endif" 
    alt="image front" class="img-front">
    </div>
</div>