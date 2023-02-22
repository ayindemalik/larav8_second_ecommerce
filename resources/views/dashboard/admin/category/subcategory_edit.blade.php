@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.header')
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')
    <div class="main-content">
        <!-- Main content -->
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Les Categories</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Editer La Sub Categori</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Editer La categorie</h4>
                                <form method="post" action="{{ route('store.subcategory_update')}}" >
                                    @csrf
                                    <input type="hidden" name="id"  class="form-control" value="{{ $subcategory->id }}" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Categorie<span class="text-danger">*</span></label>
                                                <select class="form-select" name="category_id" id="category_id" required>
                                                    <option selected disabled value="">Choisir...</option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}" {{$cat->id === $subcategory->category_id ? 'selected' : '' }}>
                                                            {{$cat->category_name_en}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Sub Category Name French<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="subcategory_name_fr" id="subcategory_name_fr"
                                                    value= "{{ $subcategory->subcategory_name_fr}}">
                                                    @error('subcategory_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Sub Category Name English<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="subcategory_name_en" id="subcategory_name_en"
                                                    value= "{{ $subcategory->subcategory_name_en}}">
                                                    @error('subcategory_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Sauvegardez les Changements">
                                        </div>

                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                            <h4 class="box-title">Edit Sub Category</h4>
                            <!-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('store.subcategory_update', $subcategory->id)}}">
                                        @csrf   
                                        <div class="row">
                                            <input type="hidden" name="id"  class="form-control" value="{{ $subcategory->id }}" >
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" id="category_id" class="form-control">
                                                            <option value="" selected="" disabled ="">Select Category</option>
                                                            @foreach($categories as $cat)
                                                            <option value="{{$cat->id}}" {{$cat->id === $subcategory->category_id ? 'selected' : '' }}>
                                                                {{$cat->category_name_en}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span  class="text-danger"> {{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>Sub Category Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="subcategory_name_en" id="subcategory_name_en" class="form-control"  
                                                        value= "{{ $subcategory->subcategory_name_en}}"> 
                                                        @error('subcategory_name_fr')
                                                            <span  class="text-danger"> {{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">						
                                                <div class="form-group">
                                                    <h5>Sub Category Name French <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="subcategory_name_fr" id="subcategory_name_fr"  class="form-control"  
                                                        value= "{{ $subcategory->subcategory_name_fr}}"> 
                                                        @error('subcategory_name_fr')
                                                            <span  class="text-danger"> {{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">						
                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-info">Save Update</button>
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
	  

@endsection