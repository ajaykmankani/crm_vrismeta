 @php

     $service_all = $services;


 @endphp
<div class="row">
 <div class=" col-1">
     <div class="input-group mb-3">
         <div class="    ">
             <span style="color:black" class="input-group-text" id="basic-addon3">{{ $for }}</span>
         </div>

     </div>
 </div>

 <div class=" col-3">
     <div class="input-group mb-3">
         <div class="    ">
             <span style="color:black" class="input-group-text" id="basic-addon3">Product</span>
         </div>
         <select id="product" name="product[{{ $categoryId }}]" class="form-control" required
             onchange="getProductName{{ $for }}(this.value)"  style="color:#000">
             <option selected disabled>Select Product</option>

             @foreach ($products as $value)
                 @if ($categoryId == $value->category)
                     <option value="{{ $value->name }}">{{ $value->name }} </option>
                 @endif
             @endforeach
         </select>
     </div>
 </div>




 @for ($x = 0; $x < count($services); $x++)
     <div class="col-3" id="service-container-{{ $service_all[$x]->product }}-{{ $for }}"
         style="display:none">
         <div class="input-group mb-3">
             <div class="">
                 <span style="color: black" class="input-group-text" id="basic-addon3">{{ $service_all[$x]->product }}
                     Service</span>
             </div>
             <select id="services" class="form-control" required  style="color:#000">
                 <option selected disabled>Select Product</option>
                 @foreach (explode(', ', $service_all[$x]->options) as $key => $value)
                     @if ($value != null)
                         <option value="{{ $value }}">{{ $value }}</option>
                     @endif
                 @endforeach

             </select>
         </div>
     </div>

 @endfor
</div>
 <script>
     function getProductName<?= $for ?>(product) {
         <?php
for($x=0; $x< count($services); $x++){ ?>
         if (product == '<?= $service_all[$x]->product ?>') {
             document.getElementById('service-container-<?= $service_all[$x]->product ?>-<?= $for ?>').style.display =
                 'block';
             document.getElementById('service-container-<?= $service_all[$x]->product ?>-<?= $for ?>').querySelector(
                 'select').setAttribute('name', 'service[<?= $categoryId ?>]');
             <?php for($y=0; $y< count($services); $y++){
            if($y != $x ){ ?>
             document.getElementById('service-container-<?= $service_all[$y]->product ?>-<?= $for ?>').style.display =
                 'none';
             document.getElementById('service-container-<?= $service_all[$y]->product ?>[-<?= $for ?>]').querySelector(
                 'select').removeAttribute('name', 'service[<?= $categoryId ?>]');
             <?php } } ?>
         }
         <?php  } ?>
     }
 </script>
