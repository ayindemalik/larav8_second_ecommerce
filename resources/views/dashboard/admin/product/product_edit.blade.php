@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.header')
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <h1>Welcome to Dashboard</h1> -->
    <style type="text/css">
        .bootstrap-tagsinput .tag{
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        } 
    </style>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Product Data</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Update The Product</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post" action="{{ route('store.product_update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Brand -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Product Brand <span class="text-danger">*</span></label>
                                            <select class="form-select" name="brand_id" id="brand_id" required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}" {{ $brand->id === $product->brand_id ? 'selected' : '' }} >
                                                        {{$brand->brand_name_en}}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                    <!-- Category -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Main Categorie <span class="text-danger">*</span></label>
                                            <select class="form-select" name="category_id" id="category_id" required>
                                                <option selected disabled value="">Choisir...</option>
                                                @foreach($categories as $cat)
                                                <option value="{{$cat->id}}" {{ $cat->id === $product->category_id ? 'selected' : '' }}>
                                                    {{$cat->category_name_en}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                    <!-- Sub Category -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">First Sub-Categorie <span class="text-danger">*</span></label>
                                            <select class="form-select" name="subcategory_id" id="subcategory_id" >
                                                @foreach($subcategories as $subcat)
                                                    <option value="{{$subcat->id}}" {{ $subcat->id === $product->subcategory_id ? 'selected' : '' }}>{{$subcat->subcategory_name_en}}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                    <!-- Sub sub Category -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Second Sub-Category(Optional)</label>
                                            <select class="form-select" name="subsubcategory_id" id="subsubcategory_id">
                                                @foreach($subsubcategories as $subsubcat)
                                                    <option value="{{$subsubcat->id}}" {{ $subsubcat->id === $product->subsubcategory_id ? 'selected' : '' }}>{{$subsubcat->subsubcategory_name_en}}</option>
                                                @endforeach
                                            </select>
                                            @error('subsubcategory_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                    <!-- FİRMA REFERENCE -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product name (Francais) <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_name_fr" name="product_name_fr"
                                                value = "{{ $product->product_name_fr}}">
                                                @error('product_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Prod Name End -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product name (English)<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_name_en" name="product_name_en"
                                                value = "{{ $product->product_name_en}}">
                                                @error('product_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Prod Code -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product Code<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_code" name="product_code"
                                                value = "{{ $product->product_code}}">
                                                @error('product_code')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Product Quantity -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product Quantity<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_qty" name="product_qty"
                                                value = "{{ $product->product_qty}}">
                                                @error('product_qty')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PROD Tags Fr -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product Tags Fr<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_tags_fr" name="product_tags_fr" 
                                                value = "{{ $product->product_tags_en}}" data-role="tagsinput">
                                                @error('product_tags_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PROD Tags Eng -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product Tags En<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_tags_en" name="product_tags_en" class="form-control" 
                                                value = "{{ $product->product_tags_fr}}" data-role="tagsinput">
                                                @error('product_tags_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PROD Size Fr -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product Size Fr<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_size_fr" name="product_size_fr" 
                                                value = "{{ $product->product_size_fr}}" data-role="tagsinput">
                                                @error('product_size_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PROD Size Eng  -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product Size En<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_size_en" name="product_size_en"  
                                                value = "{{ $product->product_size_en}}" data-role="tagsinput">
                                                @error('product_size_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PROD Color Fr -->
                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product Color Fr<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_color_fr" name="product_color_fr" 
                                                value = "{{ $product->product_color_fr}}"  data-role="tagsinput">
                                                @error('product_color_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- PROD Color Eng  -->
                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Product Color En<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="product_color_en" name="product_color_en" 
                                                value = "{{ $product->product_color_en}}" data-role="tagsinput">
                                                @error('product_color_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- Bying Price  -->
                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Bying Price<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="bying_price" name="bying_price" 
                                                value = "{{ $product->bying_price}}" />
                                                @error('bying_price')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- Selling Price  -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Selling Price<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="selling_price" name="selling_price" 
                                                value = "{{ $product->selling_price}}" />
                                                @error('selling_price')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Discount Price  -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Discount Price<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="discount_price" name="discount_price"
                                                value="{{ $product->discount_price }}">
                                                @error('discount_price')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Image Principale  -->

                                    <!-- Multiple Image -->

                                    <!-- PROD Long Desc fr -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Product Description (En Francais) </label>
                                            <div class="col-sm-12">
                                                <textarea name="long_descp_fr" id="elm1" class="form-control" row="5">{{ $product->long_descp_fr}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- PROD Long Desc en-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Product Description (In English)  </label>
                                            <div class="col-sm-12">
                                                <textarea  name="long_descp_en" id="elm2" class="form-control" row="5">{{ $product->long_descp_en}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PROD Short Desc fr -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Details Information(En Français)</label>
                                            <div class="col-sm-12">
                                                <textarea name="details_info_fr" id="elm3" class="form-control" row="5">{{ $product->details_info_fr}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PROD Short Desc En-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="col-sm-12 col-form-label">Details Information(In English)</label>
                                            <div class="col-sm-12">
                                                <textarea  name="details_info_en" id="elm4" class="form-control" row="5">{{ $product->details_info_en}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                   
                                    

                                    {{-- <div class="col-md-6 d-flex">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="1" name="hot_deals" >
                                            <label class="form-check-label" for="hot_deals">Hot deals</label>
                                        </div>
                                        <div class="form-check mr-10">
                                            <input class="form-check-input" type="checkbox" name="gender" id="Featured">
                                            <label class="form-check-label" for="genderFemale">Featured</label>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6 d-flex">
                                        {{-- <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="special_offer" >
                                            <label class="form-check-label" for="special_offer">Offre Special </label>
                                        </div> --}}
                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="special_deals">
                                            <label class="form-check-label" for="genderFemale">special Deal</label>
                                        </div> --}}
                                    </div>

                                    <div>
                                        <button class="btn btn-primary" type="submit">Save Product</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Product Principale Image  </h4>
                                <form method="post" action="{{ route('update.product_thambnailImage') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="old_img" value="{{ $product->product_thambnail }}">
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <div class="card ">
                                                <img src="{{ asset($product->product_thambnail) }}" class="card-img-top" 
                                                style="height: 200px; width: 100%;">
                                                <div class="card-body"></div>
                                            </div> 	
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Changer l'image <span class="tx-danger">*</span></label>
                                                <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)"  required>
                                                <img src="" id="mainThmb">
                                            </div> 
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Related Images</h4>
                                <div class="row">
                                    {{-- <div class="col-md-12"> --}}
                                    @if(count($multiImgs) > 0)
                                    <form method="post" action="{{ route('update.product_multi_images') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            @foreach($multiImgs as $img)
                                                <div class="col-md-4">
                                                    <div class="card ">
                                                        <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 150px; width: 100%;">
                                                        <div class="card-body">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label"> <a href="{{ route('product.multiimg.delete',$img->id) }}" 
                                                                        class="btn btn-sm btn-danger" id="delete" title="Delete Data">
                                                                        <i class="fa fa-trash"></i> 
                                                                    </a> | Changer l'image</label>
                                                                    <input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>	
                                            @endforeach
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Images">
                                            </div>
                                        </div> 
                                    </form>
                                    @else

                                    <form method="post" action="{{ route('update.store.product_multi_images') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="prod_id" class="form-control"  id="prod_id" 
                                        value="{{$product->id}}">
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <input type="file" name="upMulti_img[]" class="form-control" multiple="" id="upMulti_img">
                                                    @error('preview_img')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                    <div class="row" id = "preview_img"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Images">
                                        </div>
                                    </form>
                                    @endif
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                console.log('category_id ' + category_id)
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                console.log('sub category_id ' + subcategory_id)
                if(subcategory_id) {
                    $.ajax({
                        // url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        url: "{{  url('/category/sub/subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });  

            $('#upMulti_img').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                            .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
        // Show selected single Image
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