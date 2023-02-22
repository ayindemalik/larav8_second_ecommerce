<section class="mb-lg-14 mb-8">
    <div class="container ">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="mb-6 d-xl-flex justify-content-between align-items-center">
                    <!-- heading -->
                    <div class="mb-5 mb-xl-0">
                        <h3 class=" mb-0">Best Products</h3>
                        {{-- <p class="mb-0">New products with updated stocks</p> --}}
                    </div>
                    <div>
                        <!-- Categories nav -->
                        <nav>
                            <ul class="nav nav-pills nav-scroll border-bottom-0 gap-1 " id="nav-tab" role="tablist">
                                <li class="nav-item ">
                                    <!-- nav link -->
                                    <a href="#all" class="nav-link active " id="#all" data-bs-toggle="tab" 
                                    data-bs-target="#all" role="tab" aria-controls="all-tab" 
                                    aria-selected="true">@if(session()->get('language') == 'french') Tout @else All @endif
                                    </a>
                                </li>
                                @foreach($categories as $key => $category)
                                    <!-- nav item -->
                                    <li class="nav-item ">
                                        <!-- nav link -->
                                        <a href="#category{{ $category->id }}" class="nav-link " id="nav-category{{ $category->id }}-tab" data-bs-toggle="tab" 
                                        data-bs-target="#nav-category{{ $category->id }}" role="tab" aria-controls="nav-category{{ $category->id }}" 
                                        aria-selected="true">
                                        @if(session()->get('language') == 'french') {{ $category->category_name_fr }} @else {{ $category->category_name_en }} @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <!-- tab -->
                <div class="tab-content" id="nav-tabContent">

                    {{-- FOR ALL PRODUCTS --}}
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                        <!-- row -->
                        
                        <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">
                            @foreach($products as $product)
                            <div class="col ">
                                <!-- card -->
                                <div class="card  card-product-v2 h-100">
                                    <div class="card-body position-relative">
                                        @if(session()->get('language') == 'french') 
                                            @php $product_slug_fr = strtolower(str_replace('/', '_', $product->product_slug_fr)) @endphp
                                            <div class="text-center position-relative ">
                                                <!--<div class=" position-absolute top-0 start-0">-->
                                                <!--    <span class="badge bg-danger">Sale</span>-->
                                                <!--</div>-->

                                                <!-- img -->
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product_slug_fr ) }}"> 
                                                    <img src="{{ asset($product->product_thambnail) }}" alt="" class="mb-3 img-fluid" style="width:260px; height:220px;" ></a>
                                                
                                                <!-- action btn -->
                                                <div class="product-action-btn">
                                                    <a href="{{ url('product/details/'.$product->id.'/'.$product_slug_fr ) }}" title="Details du produits"
                                                        class="btn-action mb-1" ><i class="bi bi-eye"></i></a>
                                                    <a href="#!" class="btn-action mb-1" data-bs-toggle="tooltip" data-bs-html="true" title="Discutez du produit sur whatsapp"><i class="bi bi-whatsapp"></i></a>
                                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Discutez du produit sur facebook"><i class="bi bi-facebook"></i></a>
                                                </div>
                                            </div>
                                            {{-- Product Name --}}
                                            <h2 class="fs-6"><a href="{{ url('product/details/'.$product->id.'/'.$product_slug_fr ) }}" class="text-inherit text-decoration-none prod_name">
                                                {{$product->product_name_fr}}</a></h2>
                                            <div><!-- rating --></div>

                                            <!-- price -->
                                            @if($product->discount_price == NULL)
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-danger">${{$product->selling_price}}</span></div>
                                                    <div><span class="text-uppercase small text-primary">En Stock</span></div>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-danger">${{$product->discount_price}}</span> 
                                                        <span class="text-decoration-line-through text-muted">${{$product->selling_price}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="text-uppercase small text-primary">En Stock</span>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- btn -->
                                            <div class="product-fade-block">
                                                <div class="d-grid mt-4">
                                                    <a href="{{ route('contact_us')}}" class="btn btn-primaryn rounded-pill">Passer une commande</a>
                                                </div>
                                            </div>
                                        @else 
                                            @php $product_slug_en = strtolower(str_replace('/', '_', $product->product_slug_en)) @endphp
                                            <div class="text-center position-relative ">
                                                <!--<div class=" position-absolute top-0 start-0">-->
                                                <!--    <span class="badge bg-danger">Sale</span>-->
                                                <!--</div>-->

                                                <!-- img -->
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product_slug_en ) }}"> 
                                                    <img src="{{ asset($product->product_thambnail) }}" style="width:260px; height:220px;" alt="" class="mb-3 img-fluid"></a>
                                                
                                                <!-- action btn -->
                                                <div class="product-action-btn">
                                                    <a href="{{ url('product/details/'.$product->id.'/'.$product_slug_en ) }}" title="Product details"
                                                        class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                                                    <a href="#!" class="btn-action mb-1" data-bs-toggle="tooltip" data-bs-html="true" title="Chat about the product on whatsapp"><i class="bi bi-whatsapp"></i></a>
                                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Chat about the product on facebook"><i class="bi bi-facebook"></i></a>
                                                </div>
                                            </div>
                                            
                                            <h2 class="fs-6"><a href="{{ url('product/details/'.$product->id.'/'.$product_slug_en ) }}" class="text-inherit text-decoration-none prod_name">
                                                {{$product->product_name_en}}</a></h2>

                                            <div><!-- rating --></div>

                                            <!-- price -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                            @if($product->discount_price == NULL)
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-danger">${{$product->selling_price}}</span></div>
                                                    <div><span class="text-uppercase small text-primary"> In Stock</span></div>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-danger">${{$product->discount_price}}</span> 
                                                        <span class="text-decoration-line-through text-muted">${{$product->selling_price}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="text-uppercase small text-primary">In Stock</span>
                                                    </div>
                                                </div>
                                            @endif
                                            </div>
                                            
                                            <!-- btn -->
                                            <div class="product-fade-block">
                                                <div class="d-grid mt-4">
                                                    <a href="{{ route('contact_us')}}" 
                                                    class="btn btn-primaryn rounded-pill">Make An Order</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- hidden class for hover -->
                                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>

                    @foreach($categories as $category)
                    <div class="tab-pane fade" id="nav-category{{ $category->id}}" role="tabpanel" aria-labelledby="nav-category{{ $category->id }}-tab" tabindex="0">
                        <!-- row -->
                        <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">
                            @php
                                $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get(); 
                            @endphp

                            @forelse($catwiseProduct as $product)
                                <div class="col ">
                                    <!-- card -->
                                    <div class="card  card-product-v2 h-100">
                                        <div class="card-body position-relative">
                                            @if(session()->get('language') == 'french') 
                                                @php $product_slug_fr = strtolower(str_replace('/', '_', $product->product_slug_fr)) @endphp
                                                <div class="text-center position-relative ">
                                                    <!--<div class=" position-absolute top-0 start-0">-->
                                                    <!--    <span class="badge bg-danger">Sale</span>-->
                                                    <!--</div>-->
    
                                                    <!-- img -->
                                                    <a href="{{ url('product/details/'.$product->id.'/'.$product_slug_fr ) }}"> 
                                                        <img src="{{ asset($product->product_thambnail) }}" alt="" class="mb-3 img-fluid" style="width:260px; height:220px;" ></a>
                                                    
                                                    <!-- action btn -->
                                                    <div class="product-action-btn">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product_slug_fr ) }}" title="Details du produits"
                                                            class="btn-action mb-1" ><i class="bi bi-eye"></i></a>
                                                        <a href="#!" class="btn-action mb-1" data-bs-toggle="tooltip" data-bs-html="true" title="Discutez du produit sur whatsapp"><i class="bi bi-whatsapp"></i></a>
                                                        <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Discutez du produit sur facebook"><i class="bi bi-facebook"></i></a>
                                                    </div>
                                                </div>
                                                <!-- title -->
                                                <h2 class="fs-6"><a href="{{ url('product/details/'.$product->id.'/'.$product_slug_fr ) }}" class="text-inherit text-decoration-none prod_name">
                                                    {{$product->product_name_fr}}</a></h2>
                                                
                                                <!-- rating -->
                                                <div>
                                                    
                                                </div>
    
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    @if($product->discount_price == NULL)
                                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                                            <div><span class="text-danger">${{$product->selling_price}}</span></div>
                                                            <div><span class="text-uppercase small text-primary">En Stock</span></div>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                                            <div>
                                                                <span class="text-danger">${{$product->discount_price}}</span> 
                                                                <span class="text-decoration-line-through text-muted">${{$product->selling_price}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="text-uppercase small text-primary">En Stock</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
    
                                                <!-- btn -->
                                                <div class="product-fade-block">
                                                    <div class="d-grid mt-4">
                                                        <a href="{{ route('contact_us')}}" 
                                                        class="btn btn-primaryn rounded-pill">Passer une commande</a>
                                                    </div>
                                                </div>
                                            @else 
                                                @php $product_slug_en = strtolower(str_replace('/', '_', $product->product_slug_en)) @endphp
                                                <div class="text-center position-relative ">
                                                    <!--<div class=" position-absolute top-0 start-0">-->
                                                    <!--    <span class="badge bg-danger">Sale</span>-->
                                                    <!--</div>-->
    
                                                    <!-- img -->
                                                    <a href="{{ url('product/details/'.$product->id.'/'.$product_slug_en ) }}"> 
                                                        <img src="{{ asset($product->product_thambnail) }}" style="width:260px; height:220px;" alt="" class="mb-3 img-fluid"></a>
                                                    
                                                    
                                                    <!-- action btn -->
                                                    <div class="product-action-btn">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product_slug_en ) }}" title="Product details"
                                                            class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                                                        <a href="#!" class="btn-action mb-1" data-bs-toggle="tooltip" data-bs-html="true" title="Chat about the product on whatsapp"><i class="bi bi-whatsapp"></i></a>
                                                        <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Chat about the product on facebook"><i class="bi bi-facebook"></i></a>
                                                    </div>
                                                </div>
                                                
                                                <h2 class="fs-6"><a href="{{ url('product/details/'.$product->id.'/'.$product_slug_en ) }}" class="text-inherit text-decoration-none prod_name">
                                                    {{$product->product_name_en}}</a></h2>
                                                
                                                <!-- rating -->
                                                <div>
                                                   
                                                </div>
    
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    @if($product->discount_price == NULL)
                                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                                            <div><span class="text-danger">${{$product->selling_price}}</span></div>
                                                            <div><span class="text-uppercase small text-primary"> In Stock</span></div>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                                            <div>
                                                                <span class="text-danger">${{$product->discount_price}}</span> 
                                                                <span class="text-decoration-line-through text-muted">${{$product->selling_price}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="text-uppercase small text-primary">In Stock</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
    
                                                <!-- btn -->
                                                <div class="product-fade-block">
                                                    <div class="d-grid mt-4">
                                                        <a href="{{ route('contact_us')}}" 
                                                        class="btn btn-primaryn rounded-pill">Make An Order</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- hidden class for hover -->
                                        <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                                    </div>
                                </div>
                            @empty
                                <h5 class="text-danger">No Product Found</h5>
                            @endforelse
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
