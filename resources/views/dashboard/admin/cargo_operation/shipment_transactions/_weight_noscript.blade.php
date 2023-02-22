<noscript id="cargo-item-clone">
    <div class="d-table-row align-items-center justify-content-center my-0 py-0 cargo-item">
        <div class="d-table-cell col-3 px-1 py-1 border text-center">
            <textarea name="item_desc[]" id="item_desc"  class="form-control form-control-sm"></textarea>
        </div>
        <div class="d-table-cell col-3 px-2 py-1 border text-center">
            <input type="hidden" name="price[]">
            <input type="hidden" name="total[]">
            <div class="mb-2">
                <select name="cargo_type_id[]" class="form-control form-control-sm form-control-border select2" required>
                    <option value="" disabled='' selected =''>Select type</option>
                    @foreach($wCargoTypes as $row):
                        <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-table-cell col-2 px-2 py-1 border text-center">
            <span class="font-weight-bold curr_val"></span>
            <span class="font-weight-bold price">0.00</span></div>
        <div class="d-table-cell col-1 px-2 py-1 border text-center">
            <input type="number" step="any" name="weight[]" class="form-control form-control-sm
             form-control-border text-center" required></div>
        <div class="d-table-cell col-1 px-2 py-1 border text-center">
            <input type="number" step="0.1" name="wdiscount[]" 
            class="form-control form-control-sm form-control-border text-center" value="">
        </div>
        <div class="d-table-cell col-2 px-2 py-1 border text-center">
            <span class="font-weight-bold curr_val"></span>
            <span class="font-weight-bold total">0.00</span>
        </div>
    </div>
</noscript>