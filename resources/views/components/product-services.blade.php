<div>
<div class="row"
    @foreach ($products as $i => $product)
        <div class="form-group col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $product }}</span>
                </div>
                <select id="{{ $product }}" name="{{ $product }}" class="form-control form-control-lg" required>
                    <option selected disabled>{{ $product }}</option>
                    <?php foreach ($products as $key => $value): ?>
                    <option value="<?= $value ?>"><?= $key ?></option>
                    <?php endforeach; ?>
                </select>a
            </div>
        </div>
    @endforeach


    @foreach ($services as $x => $service)
        <div class="form-group col-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">{{ $service->product }}</span>
                </div>
                <select id="{{ $service->product }}" name="{{ $service->product }}" class="form-control form-control-lg"
                    required>
                    <option selected disabled>{{ $service }}</option>
                    <?php foreach ($services as $key => $value): ?>
                    <option value="<?= $value ?>"><?= $key ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    @endforeach
</div>
    <script>
        function showServices() {
            var product = document.getElementById("product").value;

            <?php foreach($products as $product){?>
            if (product == "<?= $product ?>") {

                document.getElementById("<?= strtolower($product) ?>_services_div<?= $num ?>").querySelector("select")
                    .setAttribute(
                        "name", "service");
                document.getElementById("<?= strtolower($product) ?>_services_div<?= $num ?>").style.display = "block";

            } else {
                document.getElementById("<?= strtolower($product) ?>_services_div<?= $num ?>").querySelector("select")
                    .removeAttribute(
                        "name", "service");
                document.getElementById("<?= strtolower($product) ?>_services_div<?= $num ?>").style.display = "none";
            }
            <?php }?>
        }
    </script>

</div>
