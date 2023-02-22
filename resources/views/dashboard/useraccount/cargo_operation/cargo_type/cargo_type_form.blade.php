<?php

?>
<div class="container-fluid">
	{{-- <form action="{{route('store_new_cargo_type')}}" id="type-form"  method="POST"> --}}
	<form action="{{url('/admin/cargo/cargotype/store-or-update')}}"  method="POST">
		@csrf
		{{-- <input type="hidden" name="_token" id="_token" value="{{ @csrf_token() }}"> --}}
		<input type="text" name ="form_id" id ="form_id" value="{{ isset($data->id) ? $data->id : 0}}" >
		<div class="mb-3">
			<label for="name" class="control-label">Name</label>
			<input type="text" name="name" id="name" class="form-control form-control-md rounded-0" 
			value="{{ isset($data->name)? $data->name: '' }}"  required/>
		</div>

		<div class="mb-3">
			<label for="description" class="control-label">Description</label>
			<textarea type="text" name="description" id="description"
				class="form-control form-control-md rounded-0" required>{{ isset($data->description)? $data->description :'' }}</textarea>
		</div>

		<div class="mb-3">
			<label for="city_price" class="control-label">City to City Price per kg.</label>
			<input type="number" name="city_price" id="city_price" 
				class="form-control form-control-md rounded-0" value="{{ isset($data->city_price) ? $data->city_price :''}}"  required/>
		</div>

		<div class="mb-3">
			<label for="state_price" class="control-label">State to State Price per kg.</label>
			<input type="number" name="state_price" id="state_price" 
				class="form-control form-control-md rounded-0" value="{{ isset($data->state_price) ? $data->state_price:'' }}"  required/>
		</div>

		<div class="mb-3">
			<label for="country_price" class="form-label">Country to Country Price per kg.</label>
			<input type="number" name="country_price" id="country_price" 
				value="{{isset($data->country_price) ? $data->country_price : ''}}" class="form-control form-control-md" required="">
		</div>
		<div class="mb-3">
			<label for="status" class="control-label">Status</label>
			<select class="form-select form-control-md form-control" name="_status" id="_status" required>
				<option selected="" disabled="" value="">Choose...</option>
				<option value="1" {{(isset($data->status) && $data->status == 1) ? 'selected' : ''}}>Active</option>
				<option value="0" {{(isset($data->status) && $data->status == 0) ? 'selected' : ''}}>Inactive</option>
			</select>
		</div>

		<div class="mt-2 text-center mx-auto">
			<button class="btn btn-primary" type="submit" >Save</button>
			{{-- <button class="btn btn-primary" type="button" id="submit_cargo_type_form" onclick="$('#uni_modal form').submit()">Save</button> --}}
			{{-- <button class="btn btn-primary" type="button" id="submit_cargo_type_form">Save</button> --}}
		</div>

	</form>
</div>
{{-- @section('page-script')
    <script type="text/javascript">
	$(document).ready(function(){
		$('#type-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_cargo_type",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})
	})
	</script> 
@endsection--}}