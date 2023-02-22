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
                            <h4 class="mb-sm-0">Les Sous Categories</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Sous Categories</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des categories et sous categories </h4>
                                <table id="key-datatable" class="table dt-responsive  w-100">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub Category Name Eng</th>
                                            <th>Sub Category Name Fr</th>
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subcategories as $item)
                                            <tr>
                                                <td> {{ $item['category']['category_name_en'] }}</td>
                                                <td> {{ $item->subcategory_name_en }} </td>
                                                <td> {{ $item->subcategory_name_fr }} </td>
                                                <td> 
                                                    <a href="{{ route('subcategory.edit', $item->id )}}" class="btn btn-info"> <i class="fa fa-edit" title="Edit"></i> </a>
                                                    <a href="{{ route('subcategory.delete', $item->id )}}" class="btn btn-danger" id="delete"> <i class="fa fa-trash" title="Delete"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>No Category</p>
                                        @endforelse
                                    </tbody>				  
                                    <tfoot>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub Category Name Eng</th>
                                            <th>Sub Category Name Fr</th>
                                            <th>Tool</th>
                                    </tfoot>
                                </table> 
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ajouter Une Categorie</h4>
                                <form method="post" action="{{ route('store.new_subcategory')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Categorie<span class="text-danger">*</span></label>
                                                <select class="form-select" name="category_id" id="category_id" required>
                                                    <option selected disabled value="">Choisir...</option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->category_name_en}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Sub Category Name French<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="subcategory_name_fr" id="subcategory_name_fr">
                                                    @error('subcategory_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Sub Category Name English<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="subcategory_name_en" id="subcategory_name_en">
                                                    @error('subcategory_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Sauvegardez la Sous Categorie">
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

@endsection