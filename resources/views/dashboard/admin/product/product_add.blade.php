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
                                <li class="breadcrumb-item active">Add A Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('store.new_product') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Brand -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Product Brand <span class="text-danger">*</span></label>
                                        <select class="form-select" name="brand_id" id="brand_id" required>
                                            <option selected disabled value="">Choose...</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" >{{$brand->brand_name_fr}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                    </div>
                                </div>
                                <!-- Category -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Main Categorie <span class="text-danger">*</span></label>
                                        <select class="form-select" name="category_id" id="category_id" required>
                                            <option selected disabled value="">Choisir...</option>
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category_name_fr}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                    </div>
                                </div>
                                <!-- Sub Category -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">First Sub-Categorie <span class="text-danger">*</span></label>
                                        <select class="form-select" name="subcategory_id" id="subcategory_id" >
                                            <option selected disabled value="">Choisir...</option>
                                        </select>
                                        @error('subcategory_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                    </div>
                                </div>
                                <!-- Sub sub Category -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Second Sub-Category(Optional) </label>
                                        <select class="form-select" name="subsubcategory_id" id="subsubcategory_id" >
                                            <option selected disabled value="">Choisir...</option>
                                        </select>
                                        @error('subsubcategory_id')<span  class="text-danger"> {{ $message}}</span>@enderror
                                    </div>
                                </div>
                                <!-- FİRMA REFERENCE -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product name (Francais) <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_name_fr" name="product_name_fr">
                                            @error('product_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Prod Name End -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product name (English)<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_name_en" name="product_name_en">
                                            @error('product_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Prod Code -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Code<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_code" name="product_code">
                                            @error('product_code')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Quantity -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Quantity<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_qty" name="product_qty">
                                            @error('product_qty')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- PROD Tags Fr -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Tags Fr<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_tags_fr" name="product_tags_fr" data-role="tagsinput">
                                            @error('product_tags_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- PROD Tags Eng -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Tags En<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_tags_en" name="product_tags_en" class="form-control" data-role="tagsinput">
                                            @error('product_tags_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- PROD Size Fr -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Size Fr<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_size_fr" name="product_size_fr"  data-role="tagsinput">
                                            @error('product_size_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- PROD Size Eng  -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Size En<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_size_en" name="product_size_en"  data-role="tagsinput">
                                            @error('product_size_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- PROD Color Fr -->
                                {{-- <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Color Fr<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_color_fr" name="product_color_fr"  data-role="tagsinput">
                                            @error('product_color_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- PROD Color Eng  -->
                                {{-- <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Color En<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="product_color_en" name="product_color_en"  data-role="tagsinput">
                                            @error('product_color_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Bying Price  -->
                                {{-- <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Bying Price<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="bying_price" name="bying_price"/>
                                            @error('bying_price')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Selling Price  -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Selling Price<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="selling_price" name="selling_price" />
                                            @error('selling_price')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Discount Price  -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Discount Price<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  id="discount_price" name="discount_price">
                                            @error('discount_price')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Principale  -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Product Principale Image <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="file" id="product_thambnail" name="product_thambnail" 
                                            class="form-control" onchange = "mainThamUrl(this)"/>
                                            @error('discount_price')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            <img src="" id="mainThmb" alt="">
                                        </div>
                                    </div>
                                </div>

                                <!-- Multiple Image -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Other Related Images<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                            @error('preview_img')<span  class="text-danger"> {{ $message}}</span>@enderror
                                            <div class="row" id = "preview_img"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- PROD Long Desc fr -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">Product Description (En Francais) </label>
                                        <div class="col-sm-12">
                                            <textarea name="long_descp_fr" id="elm1" class="form-control" row="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- PROD Long Desc en-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">Product Description (In English)  </label>
                                        <div class="col-sm-12">
                                            <textarea  name="long_descp_en" id="elm2" class="form-control" row="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- PROD Short Desc fr -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">Details Information(En Français)</label>
                                        <div class="col-sm-12">
                                            <textarea name="details_info_fr" id="elm3" class="form-control" row="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- PROD Short Desc En-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="col-sm-12 col-form-label">Details Information(In English)</label>
                                        <div class="col-sm-12">
                                            <textarea  name="details_info_en" id="elm4" class="form-control" row="5"></textarea>
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
                    url: "{{ url('/admin/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option selected value="">Choisir</option>');
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_fr + '</option>');
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
                    url: "{{  url('/admin/sub/subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_fr + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        /// SHow multiple Image
        $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>')
                                .addClass('thumb')
                                .attr('src', e.target.result)
                                .width(120)
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
                $('#mainThmb').attr('src', e.target.result).width(120).height(120);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection