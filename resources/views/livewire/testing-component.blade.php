<div>
   <div>

    <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">Company Name</span>
                </div>
                <input type="text" wire:model="companyName"
                    class="form-control form-control-lg" >
            </div>
        </div>

        <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">Company URL</span>
                </div>
                <input type="text" wire:model="companyURL"
                    class="form-control form-control-lg" >
            </div>
        </div>


        <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">Company Phone</span>
                </div>
                <input type="phone" wire:model="contactNumber"
                    class="form-control form-control-lg" >
            </div>
        </div>

        <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">Company Description</span>
                </div>
                <textarea wire:model="companyDescription"
                    class="form-control form-control-lg" ></textarea>
            </div>
        </div>

        <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">Company Phone</span>
                </div>
                <input type="text" wire:model="companyKeywords"
                    class="form-control form-control-lg" >
            </div>
        </div>

        <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span style="color:black" class="input-group-text" id="basic-addon3">Company Phone</span>
                </div>
                <input type="email" wire:model="companyEmail"
                    class="form-control form-control-lg" >
            </div>
        </div>



    <button wire:click="updateCompanyDetails" class="bg-primary rounded text-white border-0 p-2">Update Company Details</button>
    @if($message)
    <span wire:poll="resetMessage">{{ $message }}</span>
    @endif

</div>
</div>
