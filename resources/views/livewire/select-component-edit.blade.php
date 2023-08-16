<div>
    <div class="form-group col-12" {{ $div_variable }}>
        <div class="input-group mb-3">
            <div class="">
                <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
            </div>
            <select id="{{ $name }}" name="{{ $name }}" {{ $variables }}
                class="form-control " style="color: #000">
<option selected disabled></option>

                <?php foreach ($options as $key => $value): ?>
                <option <?php if ($data->$name == $key) {
                    echo 'selected';
                } ?> value="<?= $value ?>"><?= $key ?></option>
                <?php endforeach; ?>

            </select>
        </div>
    </div>
</div>
