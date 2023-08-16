<div>
    <div class="form-group col-6">
        <div class="input-group mb-3">
            <div class="">
                <span style="color:black" class="input-group-text" id="basic-addon3">{{ $title }}</span>
            </div>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control ">
                <option selected disabled>{{ $title }}</option>
                <?php foreach ($options as $key => $value): ?>
                <option value="<?= $value ?>"><?= $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
