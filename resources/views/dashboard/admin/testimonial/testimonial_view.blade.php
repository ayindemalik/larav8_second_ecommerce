@extends('admin.admin_master') <!-- Remaning part will be taken from admin_master file -->
@section('admin_main_content') <!-- REplace this code with the section named admin_main_content in admin_master  -->

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">All Testimonial</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Admin</li>
								<li class="breadcrumb-item active" aria-current="page">Testimonials</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		    <div class="row">
                <div class="col-8">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th>Pic</th>
                                            <th>Name</th>
                                            <th>Profession</th>
                                            <th width="50">Message</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($testims as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->user_img) }}" alt="" style="width:60px; height: 60px;"></td>
                                                <td> {{ $item->user_name }} </td>
                                                <td> {{ $item->professtion }} </td>
                                                <td> {{ $item->message }} </td>
                                                <td>
                                                @if($item->status == 1) <span class="badge badge-pill badge-success"> Active </span>
                                                @else <span class="badge badge-pill badge-danger"> InActive </span>
                                                @endif
                                                </td>
                                                <td> 
                                                    <a href="{{ route('testimonial.edit', $item->id )}}" class="btn btn-info"> <i class="fa fa-pencil" title="Edit"></i> </a>
                                                    <a href="{{ route('testimonial.delete', $item->id )}}" class="btn btn-danger" id="delete"> <i class="fa fa-trash" title="Delete"></i></a>
                                                    @if($item->status == 1)
                                                        <a href="{{ route('testimonial.inactive',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                                    @else
                                                        <a href="{{ route('testimonial.active',$item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>	
                                </table>
                            </div>              
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->          
                </div>
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add New Testimonial</h4>
                            <!-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('store.new_testimonial')}}" enctype="multipart/form-data">
                                        @csrf   
                                        <div class="row">
                                            <!-- Name FR -->
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>User name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="user_name" id="user_name"  class="form-control" required > 
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Name fr -->
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>Profession<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="profession" id="profession"  class="form-control" required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Name en -->
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>Message<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="message" id="message" class="form-control" required></textarea>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                  
                                            
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>member Picture<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="user_img" name="user_img" required
                                                            class="form-control" onchange = "mainThamUrl(this)">
                                                            <img src="" id="mainThmb" alt="">
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
		    </div><!-- /.row -->
		</section>
		<!-- /.content -->
	  
        <script>
            function mainThamUrl(input) {
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

@endsection