@extends('admin.admin_master') <!-- Remaning part will be taken from admin_master file -->
@section('admin_main_content') <!-- REplace this code with the section named admin_main_content in admin_master  -->

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">All Categorys</h3>
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
                    <div class="col-8">
                        <div class="box">
                            <div class="box-header with-border">
                            <h3 class="box-title">Division List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Division Name </th> 
								                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($divisions as $item)
                                                <tr>
                                                    <td> {{ $item->division_name }}  </td> 
                                                    <td width="40%">
                                                        <a href="{{ route('division.edit',$item->id) }}" class="btn btn-info" 
                                                            title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                        <a href="{{ route('division.delete',$item->id) }}" class="btn btn-danger" 
                                                            title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <!--   ------------ Add Category Page -------- -->
                    <div class="col-4">
                        <div class="box">
                            <div class="box-header with-border">
                            <h3 class="box-title">Add Division </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <form method="post" action="{{ route('division.store') }}" >
                                        @csrf
                               
                               
                                    <div class="form-group">
                                       <h5>Division Name  <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                    <input type="text"  name="division_name" class="form-control" > 
                                    @error('division_name') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                   </div>
                                   </div>
                               
                               
                               
                                            <div class="text-xs-right">
                                   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
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