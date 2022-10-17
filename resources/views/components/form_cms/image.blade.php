<div class="col-12">
    <fieldset class="form-group">
        <div class="custom-file">
            <input name="image" id="image" type="file" class="custom-file-input img-front-to-save">
            <label class="custom-file-label" for="image">Upload image...</label>
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>
    </fieldset>
</div>