<noscript id="freight_crg_item_clone">
    <div class="d-table-row align-items-center justify-content-center my-0 py-0 freight-cargo-item">
        <div class="d-table-cell col-3 px-1 py-1 border text-center">
            <textarea name="item_desc[]" id="item_desc"  class="form-control form-control-sm"></textarea>
        </div>
        <div class="d-table-cell col-2 px-1 py-1 border text-center">
            <input type="hidden" name="fprice[]">
            <input type="hidden" name="ftotal[]">
            <div class="mb-3">
                <select name="f_cargo_type_id[]" class="form-control form-control-sm form-control-border select2" required>
                    <option value="" disabled='' selected =''>Select type</option>
                    @foreach($fCargoTypes as $row):
                        <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- cbm Price Autom --}}
        <div class="d-table-cell col-1 px-1 py-1 border text-right">
            <span class="font-weight-bold curr_val"></span>
            <span class="font-weight-bold fprice">0.00</span></div>
         
        {{-- cbm Price --}} 
        <div class="d-table-cell col-1 px-1 py-1 border text-center">
            <input type="number" step="any" min="1" name="fQuantity[]" value="1" class="form-control form-control-sm
             form-control-border text-right" required></div>
        
        {{-- cbm fLength --}}
        <div class="d-table-cell col-1 px-1 py-1 border text-center">
            <input type="number" step="any" min="0" name="fLength[]" value="1" class="form-control form-control-sm
             form-control-border text-right" required></div>
        {{-- cbm fWidth --}}
        <div class="d-table-cell col-1 px-1 py-1 border text-center">
            <input type="number" step="any" min="0" name="fWidth[]" value="1" class="form-control form-control-sm
             form-control-border text-right" required></div>
        {{-- cbm fHeight --}}
        <div class="d-table-cell col-1 px-1 py-1 border text-center">
            <input type="number" step="any" min="0" name="fHeight[]" value="1" class="form-control form-control-sm
             form-control-border text-right" required></div>
        {{-- discount  --}}
        <div class="d-table-cell col-1 px-2 py-1 border text-center"><input type="number" step="0.1" name="fdiscount[]" 
            class="form-control form-control-sm form-control-border text-center" value=""></div>
        
        {{-- Line Total  --}}
        <div class="d-table-cell col-1 px-2 py-1 border text-right">
            <span class="font-weight-bold curr_val"></span>
            <span class="font-weight-bold ftotal">0.00</span></div>
    </div>
</noscript>