<div>

    @foreach ($products as $i => $product)
        @php
            $product_array[$product . $num] = $product;
            ${'service_array' . $i} = [];
        @endphp
        {{ dd($product_array) }}
        @for ($j = 1; $j <= 20; $j++)
            @php $optionName = 'option' . $j; @endphp
            @if (!empty($services[0]->$optionName))
                @php ${"service_array" . $i}[$services[0]->$optionName] = $services[0]->$optionName; @endphp
            @endif
        @endfor
    @endforeach

    @livewire('select-component', ['product', 'Products', $product_array, 'onchange=showServices()'])

    @foreach ($products as $x => $product)
        @livewire('select-component', ['service', $product . ' Services', ${'service_array' . $x}, 'div_variable' => 'id=' . strtolower($product) . '_services_div' . $num . ' style=display:none;'])
    @endforeach

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
