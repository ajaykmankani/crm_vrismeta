<div>
    <div class="form-group col-12">

            <textarea id="{{ $name }}" name="{{ $name }}" class="form-control "
                {{ $variables }}>{{ old($name, $data->$name) }}</textarea>
        </div>

</div>
