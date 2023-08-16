<div>

    <div class="input-group mb-3">
        <div class="">
            <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
        </div>
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" {{ $variables }}
            class="form-control " autocomplete="none" value="{{ old($name) }}">
    </div>

</div>
