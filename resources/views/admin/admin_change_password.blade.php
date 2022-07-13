@extends('admin.admin_master') <!-- Remaning part will be taken from admin_master file -->
@section('admin_main_content') <!-- REplace this code with the section named admin_main_content in admin_master  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Form Validation</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Forms</li>
								<li class="breadcrumb-item active" aria-current="page">Form Validation</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Form Validation</h4>
			  <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('admin.store_password_update') }}" enctype="multipart/form-data">
                            @csrf   
					  <div class="row">
						<div class="col-7">						
							<div class="form-group">
								<h5>Current  Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="old_password" id="old_password" class="form-control" required="" > 
								</div>
							</div>
						</div>
						<div class="col-7">						
							<div class="form-group">
								<h5>New Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="password" id="password"  class="form-control" required="" > 
								</div>
							</div>
						</div>
						<div class="col-7">						
							<div class="form-group">
								<h5>Confirm Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="password_confirmation" id="password_confirmation"  class="form-control" required=""> 
								</div>
							</div>
						</div>
						

						<div class="col-7">						
							<div class="text-xs-right">
								<button type="submit" class="btn btn-rounded btn-info">Submit</button>
							</div>
						</div>


					  </div>
						
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#profile_photo_path').change(function(ev){
            var reader = new FileReader();
            reader.onload = function(ev){
                $('#showImage').attr('src', ev.target.result);
            }
            reader.readAsDataURL(ev.target.files['0']);
        });
    });
  </script>
@endsection