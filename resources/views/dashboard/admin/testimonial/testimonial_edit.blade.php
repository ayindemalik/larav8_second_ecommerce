@extends('admin.admin_master') <!-- Remaning part will be taken from admin_master file -->
@section('admin_main_content') <!-- REplace this code with the section named admin_main_content in admin_master  -->

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Admin</li>
								<li class="breadcrumb-item active" aria-current="page">Services</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		    <div class="row">
                
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Edit Service</h4>
                            <!-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('store.testimonial_update', $testim->id)}}"  enctype="multipart/form-data">
                                        @csrf   
                                        <div class="row">
                                            <input type="hidden" name="id"  class="form-control" value="{{ $testim->id }}" >
                                            <input type="hidden" name="oldImage"  class="form-control" value="{{ $testim->user_img }}" > 
                                           
                                            <!-- Name FR -->
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>User name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="user_name" id="user_name"  class="form-control" value="{{ $testim->user_name }}" required > 
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Name fr -->
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>Profession<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="profession" id="profession" class="form-control" value="{{ $testim->professtion }}" required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Name en -->
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>Message<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="message" id="message" class="form-control" required>{{ $testim->message }}</textarea>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                  
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>member Picture<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="user_img" name="user_img" 
                                                            class="form-control" onchange = "mainThamUrl(this)">
                                                            <img src="{{ asset($testim->user_img)}}" width="150" height="150" id="mainThmb" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">						
                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-info ">Save</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div><!-- /.col -->

                <!-- <div class="col-6">
                    <div class="box">
                        <div class="box-body">
                                         
                        </div>
                    </div>     
                </div> -->
		    </div><!-- /.row -->
		</section>
		<!-- /.content -->
        <script>
            function mainThamUrl(input) {
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#mainThmb').attr('src', e.target.result).width(150).height(150);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>  

@endsection