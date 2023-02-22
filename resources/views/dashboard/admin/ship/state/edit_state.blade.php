@extends('admin.admin_master') <!-- Remaning part will be taken from admin_master file -->
@section('admin_main_content') <!-- REplace this code with the section named admin_main_content in admin_master  -->

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Shipping Area</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Admin</li>
								<li class="breadcrumb-item active" aria-current="page">Categories</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    
                    <!--   ------------ Edit Coupon Page -------- -->
                    <div class="col-6">
                        <div class="box">
                            <div class="box-header with-border">
                            <h3 class="box-title">Edit State </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <form method="post" action="{{ route('state.store') }}" >
                                        @csrf
                               
                                        <div class="form-group">
                                            <h5>Division Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Division</option>
                                                @foreach($division as $div)
                                                <option value="{{ $div->id }}" {{ $div->id == $state->division_id ? 'selected': '' }}>{{ $div->division_name }}</option>	
                                                @endforeach
                                            </select>
                                            @error('division_id') <span class="text-danger">{{ $message }}</span> @enderror 
                                            </div>
                                        </div>
                               
                                        <div class="form-group">
                                            <h5>District Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="district_id" class="form-control"  >
                                                    <option value="" selected="" disabled="">Select District</option>
                                                    @foreach($district as $dis)
                                                    <option value="{{ $dis->id }}" {{ $dis->id == $state->district_id ? 'selected': '' }}>{{ $dis->district_name }}</option>	
                                                    @endforeach
                                                </select>
                                                @error('district_id') <span class="text-danger">{{ $message }}</span> @enderror 
                                            </div>
                                        </div>
                               
                                        <div class="form-group">
                                            <h5>State Name  <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text"  name="state_name" class="form-control" value="{{ $state->state_name }}"> 
                                                @error('state_name	') 
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror 
                                            </div>
                                        </div>
                               
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    <!-- /.box --> 
                    </div>
                </div><!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
@endsection