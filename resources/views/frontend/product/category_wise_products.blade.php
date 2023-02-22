@extends('frontend.main_master')

@section('main_content')
	@section('title') 
	Amymgroup.com | @if(session()->get('language') == 'french') {{$categoryInfo->category_name_fr}} @else
                            {{$categoryInfo->category_name_en}} @endif
	@endsection

	<main>

        <!-- section-->
        <div class="mt-4">
            <div class="container">
            <!-- row -->
            <div class="row ">
                <!-- col -->
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item">
                              <a href="{{url('/')}}}"> @if(session()->get('language') == 'french') Accueil @else Home @endif</a></li>
                          <li class="breadcrumb-item">
                              @if(session()->get('language') == 'french') Produits de la sous catégorie @else Sub Category's Products @endif</li>
                          <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'french') {{$categoryInfo->category_name_en}} @else
                              {{$categoryInfo->category_name_en}} @endif</li>
                        </ol>
                    </nav>
                </div>
            </div>
            </div>
        </div>
        <!-- section -->
        <div class=" mt-8 mb-lg-14 mb-8">
            <!-- container -->
            <div class="container">
            <!-- row -->
            <div class="row gx-10">
                <!-- col -->
                <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
                    <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50 " tabindex="-1" id="offcanvasCategory" 
                        aria-labelledby="offcanvasCategoryLabel">
                
                        <div class="offcanvas-header d-lg-none">
                            <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ps-lg-2 pt-lg-0">
                            <div class="mb-8">
                                <!-- title -->
                                <h5 class="mb-3">Categories</h5>
                                <!-- nav -->
                                <ul class="nav nav-category" id="categoryCollapseMenu">
                                    @foreach($categories as $key => $category)
                                    <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#category{{ $category->id }}" aria-expanded="false" 
                                            aria-controls="category{{ $category->id }}"><a href="#"
                                            class="nav-link">@if(session()->get('language') == 'french') 
                                                {{ $category->category_name_fr }} 
                                                @else {{ $category->category_name_en }} @endif<i class="feather-icon icon-chevron-right"></i></a>
                                        <!-- accordion collapse -->
                                        <div id="category{{ $category->id }}" class="accordion-collapse collapse"  data-bs-parent="#categoryCollapseMenu">
                                            <div>
                                                <!-- nav -->
                                                <ul class="nav flex-column ms-3">
                                                    <!-- nav item -->
                                                    @php  $subcategories = App\Models\SubCategory::where('category_id',$category->id)->get();@endphp
                                                    @foreach ($subcategories as $subcategory)
                                                        @if(session()->get('language') == 'french') 
                                                            <a class="dropdown-item" href="./pages/shop-grid.html">{{$subcategory->subcategory_name_fr}}</a>
                                                        @else <a class="dropdown-item" href="./pages/shop-grid.html">{{$subcategory->subcategory_name_en}}</a>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
                <section class="col-lg-9 col-md-12">
                    <!-- card -->
                    <div class="card mb-4 bg-light border-0">
                        <!-- card body -->
                        <div class=" card-body p-9">
                        <h2 class="mb-0 fs-1">
                            @if(session()->get('language') == 'french') {{$categoryInfo->category_name_fr}} @else
                            {{$categoryInfo->category_name_en}} @endif </h2>
                        </div>
                    </div>
                    <!-- list icon -->
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-lg-0">
                            @php $total = count($products) @endphp
                                @if(session()->get('language') == 'french')
                                  <p class="mb-0"> <span class="text-dark">{{$total}} </span> Produits </p> 
                                @else <p class="mb-0"> <span class="text-dark">{{$total}} </span> Products </p>
                            @endif
                        </div>
                    
                        <!-- Filter icon -->
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="">
                                <a href="shop-list.html" class="text-muted me-3"><i class="bi bi-list-ul"></i></a>
                                <a href="shop-grid.html" class=" me-3 active"><i class="bi bi-grid"></i></a>
                                <a href="shop-grid-3-column.html" class="me-3 text-muted"><i class="bi bi-grid-3x3-gap"></i></a>
                                </div>
                                <div class="ms-2 d-lg-none">
                                    <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas" href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-filter me-2">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg> Filters</a>
                                </div>
                            </div>
                         </div>
                    </div>
                <!-- row -->
                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                    <!-- col -->
                    @php
                        $catwiseProduct = App\Models\Product::where('category_id',$categoryInfo->id)->orderBy('id','DESC')->get(); 
                    @endphp
                    @forelse($catwiseProduct as $product)
                    <div class="col">
                        <!-- card -->
                        <div class="card card-product">
                            <div class="card-body">
                            <!-- badge -->
                            <div class="text-center position-relative ">
                                <!--<div class=" position-absolute top-0 start-0"> <span class="badge bg-danger">Sale</span></div>-->
                                <a href="#!">
                                    <!-- img -->
                                    <img src="{{ asset($product->product_thambnail) }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                                <!-- action btn -->
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                        class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="shop-wishlist.html" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                        title="Wishlist"><i class="bi bi-heart"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                        class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <!-- heading -->
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted">
                                <small>Category Name</small></a></div>
                                @if(session()->get('language') == 'french') 
                                    <h2 class="fs-6"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_fr ) }}" class="text-inherit text-decoration-none prod_name">
                                     {{$product->product_name_fr}}</a></h2>
                                @else 
                                    <h2 class="fs-6"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}" class="text-inherit text-decoration-none prod_name">
                                        {{$product->product_name_en}}</a></h2>
                                @endif
                            <div>
                                <!-- rating -->
                                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                            </div>
                            <!-- price -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    @if($product->discount_price == NULL)
                                        <span class="text-dark">${{$product->selling_price}}</span> 
                                      @else
                                        <span class="text-dark">${{$product->discount_price}}</span> 
                                        <span class="text-decoration-line-through text-muted">${{$product->selling_price}}</span>
                                      @endif
                                </div>
                                <!-- btn -->
                                <div>
                                    <a href="{{ route('contact_us')}}" class="btn btn-primary btn-primaryn btn-sm">
                                    <i class="bi bi-bag-check"></i> @if(session()->get('language') == 'french') Passer une commande @else Make An Order @endif</a>
                                    
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h5 class="text-danger">No Product Found for this category</h5>
                    @endforelse
                    <!-- col -->
                   
                    
                </div>
                <div class="row mt-8">
                    <div class="col">
                        <!-- nav -->
                        <!--<nav>-->
                        <!--    <ul class="pagination">-->
                        <!--    <li class="page-item disabled">-->
                        <!--        <a class="page-link  mx-1 rounded-3 " href="#" aria-label="Previous">-->
                        <!--            <i class="feather-icon icon-chevron-left"></i>-->
                        <!--        </a>-->
                        <!--    </li>-->
                        <!--    <li class="page-item "><a class="page-link  mx-1 rounded-3 active" href="#">1</a></li>-->
                        <!--    <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">2</a></li>-->

                        <!--    <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">...</a></li>-->
                        <!--    <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">12</a></li>-->
                        <!--    <li class="page-item">-->
                        <!--        <a class="page-link mx-1 rounded-3 text-body" href="#" aria-label="Next">-->
                        <!--        <i class="feather-icon icon-chevron-right"></i>-->
                        <!--        </a>-->
                        <!--    </li>-->
                        <!--    </ul>-->
                        <!--</nav>-->
                    </div>
                </div>
                </section>
            </div>
            </div>
        </div>
	
    </main>
@endsection