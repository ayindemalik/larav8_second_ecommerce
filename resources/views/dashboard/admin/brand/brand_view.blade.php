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
                            <h4 class="mb-sm-0">Les Marques</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Brands</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des Marques</h4>
                                <table id="key-datatable" class="table dt-responsive  w-100">
                                    <thead>
                                        <tr>
                                            <th>Brand Name Eng</th>
                                            <th>Brand Name Fr</th>
                                            <th>Image</th>
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($brands as $item)
                                            <tr>
                                                <td> {{ $item->brand_name_en }} </td>
                                                <td> {{ $item->brand_name_fr }} </td>
                                                <td> <img src="{{ asset($item->brand_image) }}" alt="" style="width:70px; height: 50px;"></td>
                                                <td> 
                                                    <a href="{{ route('brand.edit', $item->id )}}" class="btn btn-info">Edit</a>
                                                    <a href="{{ route('brand.delete', $item->id )}}" class="btn btn-danger" id="deleteBrand">Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>No Products</p>
                                        @endforelse
                                    <tfoot>
                                        <tr>
                                            <th>Brand Name Eng</th>
                                            <th>Brand Name Fr</th>
                                            <th>Image</th>
                                            <th>Tool</th>
                                    </tfoot>
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ajouter Une Marque</h4>
                                <form method="post" action="{{ route('store.new_brand')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Brand Name English<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="brand_name_en" id="brand_name_en">
                                                    @error('brand_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Brand Name English<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="brand_name_fr" id="brand_name_fr">
                                                    @error('brand_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Brand Name English<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control"  name="brand_image" id="brand_image">
                                                    @error('brand_image')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Sauvegardez Votre Blog">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- /.content -->
    {{-- @endsection --}}

		
		
@endsection