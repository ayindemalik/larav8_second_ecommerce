<!-- Category (Women)-->
@foreach($categories as $category)
<section class="container pt-lg-3 mb-4 mb-sm-5">
    <div class="row">
      <!-- Banner with controls-->
      <div class="col-md-5">
        <div class="d-flex flex-column h-100 overflow-hidden rounded-3" style="background-color: #f6f8fb;">
          <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
            <div>
              <h3 class="mb-1">{{$category->category_name_fr}}</h3>
              <a class="fs-md" href="shop-grid-ls.html">Shoper sur les produits 
                {{$category->category_name_fr}}
                <i class="ci-arrow-right fs-xs align-middle ms-1"></i></a>
            </div>
            <div class="tns-carousel-controls" id="for-women{{$category->id}}">
              <button type="button"><i class="ci-arrow-left"></i></button>
              <button type="button"><i class="ci-arrow-right"></i></button>
            </div>
          </div><a class="d-none d-md-block mt-auto" href="shop-grid-ls.html"><img class="d-block w-100" src="{{ asset('frontend/assets2/img/home/categories/cat-lg02.jpg')}}" alt="For Women"></a>
        </div>
      </div>
      <!-- Product grid (carousel)-->

      <div class="col-md-7 pt-4 pt-md-0">
        @php
          $categoryProducts = App\Models\Product::where('category_id',$category->id)->get();
          
        @endphp 
        <div class="tns-carousel">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-women{{$category->id}}&quot;}">
            <!-- Carousel item-->
            <div>
              <div class="row mx-n2">
                @forelse($categoryProducts as $product)
                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                  <div class="card product-card card-static">
                    <button class="btn-wishlist btn-sm bg-success text-white" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                      title="Discute pour ce produit"><i class="ci-whatsapp"></i></button>
                    <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html">
                      <img src="{{ asset($product->product_thambnail)}} " alt="Product"></a>
                    
                      <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">{{$product->category->category_name_fr}}</a>
                      <h3 class="product-title fs-sm">
                        <a href="shop-single-v1.html">{{$product->product_code}}</a></h3>
                      <h3 class="product-title fs-sm">
                        <a href="shop-single-v1.html">{{$product->product_name_fr}}</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price">
                          <span class="text-accent">${{$product->selling_price}}<small>99</small></span>
                        </div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i>
                            <i class="star-rating-icon ci-star-filled active"></i>
                            <i class="star-rating-icon ci-star-filled active"></i>
                            <i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @empty
                <div class="col-lg-4 alert alert-info">
                  No Product available 
                </div>

                @endforelse
              </div>
            </div>
            <!-- Carousel item-->
            <div>
              <div class="row mx-n2">
                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                  <div class="card product-card card-static">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="{{ asset('frontend/assets2/img/shop/catalog/01.jpg')}} " alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Shoes</a>
                      <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Colorblock Sneakers</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">$154.<small>99</small></span></div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                  <div class="card product-card card-static">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="{{ asset('frontend/assets2/img/shop/catalog/02.jpg')}} " alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Blouse</a>
                      <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Cotton Lace Blouse</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">$37.<small>50</small></span></div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                  <div class="card product-card card-static">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="{{ asset('frontend/assets2/img/shop/catalog/03.jpg')}} " alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Shorts</a>
                      <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Mom High Waist Shorts</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">$39.<small>50</small></span></div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                  <div class="card product-card card-static">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="{{ asset('frontend/assets2/img/shop/catalog/04.jpg')}} " alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Sportswear</a>
                      <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Sports Jacket</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">$68.<small>40</small></span></div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">
                  <div class="card product-card card-static">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="{{ asset('frontend/assets2/img/shop/catalog/31.jpg')}} " alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Shorts</a>
                      <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Leather Platform Sandals</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">$67.<small>95</small></span></div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">
                  <div class="card product-card card-static">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="{{ asset('frontend/assets2/img/shop/catalog/07.jpg')}} " alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">T-shirts</a>
                      <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Two-Piece Bikini</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">$18.<small>99</small></span></div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </div>
  </section>
  @endforeach