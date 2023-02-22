@extends('frontend.main_master')

@section('main_content')
	@section('title') 
	@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif 
	@endsection
    
    @php 
    //dd($product); 
    @endphp

	<main>
		<div class="mt-4">
			<div class="container">
			  <!-- row -->
			  <div class="row ">
				<!-- col -->
				<div class="col-12">
				  <!-- breadcrumb -->
				  <nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0">
					  <li class="breadcrumb-item"><a href="{{url('/')}}" class="breadcrumb-item active">
						@if(session()->get('language') == 'french') Acceuil @else Home @endif</a></li>
					  <li class="breadcrumb-item">
						<a href="#" class="breadcrumb-item active" >@if(session()->get('language') == 'french') {{ $product->category->category_name_fr}} 
									@else {{ $product->category->category_name_en  }} @endif</a>
						</li>
					  <li class="breadcrumb-item " aria-current="page">
						@if(session()->get('language') == 'french') {{$product->product_name_fr}}
						@else {{ $product->product_name_en  }}  
						@endif</li>
					</ol>
				  </nav>
				</div>
			  </div>
			</div>
		  </div>

		  {{-- Product Images & Info --}}
		  	<section class="mt-8">
				<div class="container">
			  		<div class="row">
						<div class="col-md-6">
						<!-- img slide -->
						<div class="product" id="product">
							<div class="zoom" onmousemove="zoom(event)"
								style="background-image: url({{ asset($product->product_thambnail) }})">
								<!-- img -->
								<!-- img --><img src="{{ asset($product->product_thambnail) }}" alt="">
							</div>
							{{-- @if(count($multiImag) > 0)  --}}
							{{-- @foreach($multiImag as $img)
								<div>
									<div class="zoom" onmousemove="zoom(event)"
										style="background-image: url({{ asset($img->photo_name ) }}">
										<img src="{{ asset($img->photo_name ) }}" alt="">
									</div>
								</div>
							@endforeach --}}
						</div>
						<!-- product tools -->
						<div class="product-tools">
							<div class="thumbnails row g-3" id="productThumbnails">
								<div class="col-3">
									<div class="thumbnails-img">
									<!-- img -->
									<img src="{{ asset($product->product_thambnail) }}" alt="">
									</div>
								</div>
								@foreach($multiImag as $img)
									<div class="col-3">
										<div class="thumbnails-img">
											<!-- img -->
											<img src="{{ asset($img->photo_name ) }}" alt="">
										</div>
									</div>
									<!-- /.single-product-gallery-item -->
								@endforeach	
								
							</div>
						</div>
					</div>
					<div class="col-md-6">
					<div class="ps-lg-10 mt-6 mt-md-0">
						<!-- content -->
						<a href="#!" class="mb-4 d-block  breadcrumb-item active" ">@if(session()->get('language') == 'french') {{ $product->category->category_name_fr}} 
							@else {{ $product->category->category_name_en  }} @endif</a>
						<!-- heading -->
						<h1 class="mb-1">@if(session()->get('language') == 'french') {{$product->product_name_fr}}
							@else {{ $product->product_name_en }}  @endif</h1>
						<div class="mb-4">
							<!-- rating -->
							<small class="text-warning"> <i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-fill"></i>
								<i class="bi bi-star-half"></i>
							</small>
							<a href="#" class="ms-2"></a>
						</div>
						<div class="fs-4">
							<!-- price -->
							@if ($product->discount_price == NULL)
								<span class="fw-bold text-dark">${{ $product->selling_price }}</span> 
							@else
								<span class="text-decoration-line-through text-muted">${{ $product->discount_price }}</span>
								<span><small class="fs-6 ms-2 text-danger">${{ $product->selling_price }}</small></span>
							@endif
						</div>
							<!-- hr -->
						<hr class="my-6">

						<div class="mb-5">
							@foreach($product_size_en as $size)
								<button type="button" class="btn btn-outline-secondary">{{ ucwords($size) }}</button>
							@endforeach
						</div>
						
						
						
						<div>
							<!-- input -->
							{{-- <div class="input-group input-spinner  ">
								<input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
								<input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input   ">
								<input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
							</div> --}}
						</div>
						<div class="mt-3 row justify-content-start g-2 align-items-center">
						
    						<div class="col-xxl-4 col-lg-6 col-md-5 col-5 d-grid">
    							<!-- button -->
    							<!-- btn --> 
    							<button type="button" class="btn btn-primary btn-primaryn">
    							    <i class="bi bi-bag-check feather-icon me-4" ></i> @if(session()->get('language') == 'french') Passer une commande @else Make An Order @endif</button>
    						</div>
    						<div class="col-md-2 col-4">
    							<!-- btn -->
    							<!--<a class="btn btn-light " href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>-->
    							<!--<a class="btn btn-light " href="shop-wishlist.html" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>-->
    						</div>
						</div>
						<!-- hr -->
						<hr class="my-6">
						<div>
						<!-- table -->
						<table class="table table-borderless">
			
							<tbody>
							<tr>
								<td>Product Code:</td>
								<td>FBB00255</td>
			
							</tr>
							<tr>
								<td>Availability:</td>
								<td>In Stock</td>
			
							</tr>
							<tr>
								<td>Shipping:</td>
								<td><small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small></td>
							</tr>
							</tbody>
						</table>
			
						</div>
						<div class="mt-8">
						<!-- dropdown -->
							{{-- <div class="dropdown">
								<a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Share
								</a>
				
								<ul class="dropdown-menu" >
								<li><a class="dropdown-item" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					</div>
				</div>
				</div>
		  	</section>

			{{-- MORE DETAILS --}}

			<section class="mt-lg-14 mt-8 ">
				<div class="container">
				  <div class="row">
					<div class="col-md-12 desc_section" >
					  <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
						<!-- nav item -->
						<li class="nav-item" role="presentation">
						  <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
							data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane"
							aria-selected="true">Product Description</button>
						</li>
						<!-- nav item -->
						<li class="nav-item" role="presentation">
						  <!-- btn --> <button class="nav-link" id="details-tab" data-bs-toggle="tab"
							data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane"
							aria-selected="false">Details Information</button>
						</li>
						<!-- nav item -->
						<li class="nav-item" role="presentation">
						  <!-- btn --> <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
							data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane"
							aria-selected="false">Place An Order </button>
						</li>
						
					  </ul>
					  <!-- tab content -->
					  <div class="tab-content" id="myTabContent">
						<!-- tab pane -->
						<div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab"
						  tabindex="0">
						  <div class="my-8">
							@if(session()->get('language') == 'french') {!!$product->long_descp_fr!!}
							@else {!! $product->long_descp_en !!}  @endif
						  </div>
						</div>
						<!-- tab pane -->
						<div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
						  <div class="my-8">
							<div class="row">
								@if(session()->get('language') == 'french') {!!$product->details_info_fr!!}
								@else {!! $product->details_info_en !!}  @endif
							</div>
						  </div>
						</div>
						<!-- tab pane -->
						<div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
						  <div class="my-8">
							<!-- row -->
							<div class="row">
							  <h3>Please contact us from <a href="{{ route('contact_us')}}">here</a> about the product</h3>
							</div>
						  </div>
			
			
						</div>
						<!-- tab pane -->
						<div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab"
						  tabindex="0">...</div>
					  </div>
					</div>
				  </div>
				</div>
			  </section>
		
	</main>
@endsection