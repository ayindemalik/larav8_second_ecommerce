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
                                    <li class="breadcrumb-item active">Categories</li>
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
                                            <th>Icon</th>
                                            <th>Category Name Eng</th>
                                            <th>Category Name Fr</th>
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->category_image) }}" alt="" style="width:70px; height: 50px;"></td>
                                                <td> {{ $item->category_name_en }} </td>
                                                <td> {{ $item->category_name_fr }} </td>
                                                <td> 
                                                    <a href="{{ route('category.edit', $item->id )}}" class="btn btn-info"> <i class="fa fa-edit" title="Edit"></i> </a>
                                                    <a href="{{ route('category.delete', $item->id )}}" class="btn btn-danger" id="deleteCategory"> <i class="fa fa-trash" title="Delete"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <p>No Category</p>
                                        @endforelse
                                    </tbody>				  
                                    <tfoot>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Category Name Eng</th>
                                            <th>Category Name Fr</th>
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
                                <form method="post" action="{{ route('store.new_category')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Category Name French<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="category_name_fr" id="category_name_fr">
                                                    @error('category_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Category Name English<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="category_name_en" id="category_name_en">
                                                    @error('category_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Icone de la categorie<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="category_image" id="category_image" onchange = "mainThamUrl(this)">
                                                    @error('category_image')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                                <img src="" id="mainThmb" alt="">
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Sauvegardez Votre Blog">
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

@section('page-script')

// <script>
// function mainThamUrl(input) {
//         if(input.files && input.files[0]){
//             var reader = new FileReader();
//             reader.onload = function(e){
//                 $('#mainThmb').attr('src', e.target.result).width(120).height(120);
//             };
//             reader.readAsDataURL(input.files[0]);
//         }
//     }
// </script>
@endsection