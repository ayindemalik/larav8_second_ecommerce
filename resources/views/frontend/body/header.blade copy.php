<header>
  <div class="bg-light py-1">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-12 text-center text-md-start"><span> </span>
              </div>
              {{-- language --}}
              <!--<div class="col-6 text-end d-none d-md-block">-->
              <!--    <div class="dropdown">-->
              <!--        <a class="text-decoration-none  text-muted" href="{{ route('english.language')}}" role="button"-->
              <!--            data-bs-toggle="dropdown" aria-expanded="false">-->
              <!--            <span class="me-1 ">-->
              <!--                <img src="{{ asset('frontend/assets/images/flags/us.jpg')}}" alt="user-image" class="me-1" height="16">-->
              <!--            </span> English <i class="bi bi-chevron-down"></i>-->
              <!--        </a>-->

              <!--        <ul class="dropdown-menu">-->
              <!--            <li>-->
              <!--                <a class="dropdown-item " href="{{route('french.language')}}"><span class="me-2">-->
              <!--                    <img src="{{ asset('frontend/assets/images/flags/french.jpg')}}" alt="user-image" class="me-1" height="16">-->
              <!--                    </span> Français-->
              <!--                </a>-->
              <!--            </li>-->
              <!--        </ul>-->
                      
              <!--    </div>-->
              </div>
          </div>
      </div>
  </div>
  <div class="navbar navbar-light py-lg-4 pt-3 px-0 pb-0">
      <div class="container">
          <div class="row w-100 align-items-center g-lg-2 g-0">
              <div class="col-xxl-2 col-lg-3">
                  <a class="navbar-brand d-none d-lg-block" href="{{url('/')}}">
                      <img src="{{ asset('frontend/assets/images/logo/amymgrouprsv.svg')}}" alt="Amymgroup Logo">
                  </a>
                  <div class="d-flex justify-content-between w-100 d-lg-none">
                      <a class="navbar-brand" href="{{url('/')}}">
                          <img src="{{ asset('frontend/assets/images/logo/amymgrouprsv.svg')}}" alt="Amymgroup Logo">
                      </a>
                      <div class="d-flex align-items-center lh-1">
                          <div class="list-inline me-2">
                              <div class="list-inline-item">

                                  <a href="#!" class="text-muted" data-bs-toggle="modal"
                                      data-bs-target="#userModal">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"
                                          class="feather feather-user">
                                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                          <circle cx="12" cy="7" r="4"></circle>
                                      </svg>
                                  </a>
                              </div>
                              <div class="list-inline-item">

                                  <a class="text-muted position-relative " data-bs-toggle="offcanvas"
                                      data-bs-target="#offcanvasRight" href="#offcanvasExample" role="button"
                                      aria-controls="offcanvasRight">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"
                                          class="feather feather-shopping-bag">
                                          <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                          <line x1="3" y1="6" x2="21" y2="6"></line>
                                          <path d="M16 10a4 4 0 0 1-8 0"></path>
                                      </svg>
                                      {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                          1
                                          <span class="visually-hidden">unread messages</span>
                                      </span> --}}
                                  </a>
                              </div>

                          </div>
                          <!-- Button -->
                          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                              data-bs-target="#navbar-default" aria-controls="navbar-default"
                              aria-expanded="false" aria-label="Toggle navigation">
                              <span class="icon-bar top-bar mt-0"></span>
                              <span class="icon-bar middle-bar"></span>
                              <span class="icon-bar bottom-bar"></span>
                          </button>
                      </div>
                  </div>
              </div>

              <div class="col-xxl-6 col-lg-5 d-none d-lg-block">
                    <form action="#">
                        <div class="input-group ">
                            <input class="form-control rounded-3" type="search" value="Search for products"
                                id="searchInput">
                            <span class="input-group-append">
                                <button class="btn bg-white border border-start-0 ms-n10" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
              </div>

    
              <div class="col-md-2 col-xxl-1 text-end d-none d-lg-block">
                  <div class="list-inline">
                        <div class="list-inline-item">
                            <a href="./pages/shop-wishlist.html" class="text-muted position-relative btn-md">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>
                         </div>
                        <div class="list-inline-item">
                              <a href="{{ route('admin.login')}}" class="text-muted btn-md" >
                                  <i class=" .btn-primaryn bi bi-box-arrow-in-right text-30"></i>
                              </a>
                          </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>
{{-- HEADER NAV --}}

<div class="border-bottom pb-lg-4 pb-3">
  <nav class="navbar navbar-expand-lg navbar-light navbar-default pt-0 pb-0">
      <div class="container px-0 px-md-3">
        <div class="dropdown me-3 d-none d-lg-block">
            <button class="btn btn-primary btn-primaryn px-6 " type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                </span> Main Brands
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#brand_products">Brand 1</a></li>
                <li><a class="dropdown-item" href="#brand_products">Brand 2</a></li>
                <li><a class="dropdown-item" href="#brand_products">Brand 3</a></li>
                <li><a class="dropdown-item" href="#brand_products">Brand 4</a></li>
                <li><a class="dropdown-item" href="#brand_products">Brand 5</a></li>
            </ul>
        </div>



            <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">
                <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
                    <a href="{{url('/')}}"><img src="assets/images/logo/freshcart-logo.svg"
                            alt="eCommerce HTML Template"></a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="d-block d-lg-none mb-2 pt-2">
                    <a class="btn btn-primary w-100 d-flex justify-content-center align-items-center"
                    data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                    </span> Main Brands
                    </a>
                    <div class="collapse mt-2" id="collapseExample">
                        <div class="card card-body">
                            <ul class="mb-0 list-unstyled">
                                <li><a class="dropdown-item" href="#brand_products">Brand 1</a></li>
                                <li><a class="dropdown-item" href="#brand_products">Brand 2</a></li>
                                <li><a class="dropdown-item" href="#brand_products">Brand 3</a></li>
                                <li><a class="dropdown-item" href="#brand_products">Brand 4</a></li>
                                <li><a class="dropdown-item" href="#brand_products">Brand 5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

              {{-- <div class="d-lg-none d-block mb-3">
                  <button type="button" class="btn  btn-outline-gray-400 text-muted w-100 " data-bs-toggle="modal"
                      data-bs-target="#locationModal">
                      <i class="feather-icon icon-map-pin me-2"></i>Pick Location
                  </button>
              </div> --}}
              <div class="d-none d-lg-block">
                  <ul class="navbar-nav ">
                      <li class="nav-item ">
                          <a class="nav-link" href="{{url('/')}}">
                            @if(session()->get('language') == 'french') Accueil @else Home @endif
                          </a>
                      </li>

                      <li class="nav-item dropdown dropdown-fullwidth">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"> @if(session()->get('language') == 'french') 
                                Produits @else Products @endif <i class="bi bi-chevron-down"></i>
                        </a>
                        <div class=" dropdown-menu pb-0">
                            <div class="row p-2 p-lg-4">
                                @php
                                    $categories = App\Models\Category::orderBy('id','ASC')->get(); 
                                @endphp
                                @foreach ($categories as $category)
                                    <div class="col-lg-3 col-6 mb-4 mb-lg-0 p-2 mr-3">
                                        @if(session()->get('language') == 'french')
                                            @php $name_slug_fr = strtolower( str_replace('/','_', strtolower(str_replace(' ', '-', $category->category_name_fr)))) @endphp
                                            <a class="cat" href="{{ route('catbasedproducts', ['cat_id'=>$category->id, 'slug'=>$name_slug_fr]) }}">
                                                <h5 class="text-primary ps-3">{{$category->category_name_fr}}</h5></a>
                                        @else 
                                            @php $name_slug_en = strtolower( str_replace('/','_', strtolower(str_replace(' ', '-', $category->category_name_en)))) @endphp
                                            <a href="{{ route('catbasedproducts', ['cat_id'=>$category->id, 'slug'=>$name_slug_en]) }}">
                                                <h5 class="text-primary ps-3">{{$category->category_name_en}}</h5></a>
                                        @endif
                                        
                                        {{-- GET SUB CATEGORIES --}}
                                        @php  $subcategories = App\Models\SubCategory::where('category_id',$category->id)->get();@endphp
                                        @foreach ($subcategories as $subcategory)
                                            @if(session()->get('language') == 'french')
                                                @php $subname_slug_fr = strtolower( str_replace('/','_', strtolower(str_replace(' ', '-', $subcategory->subcategory_name_fr)))) @endphp
                                                <a class="dropdown-item" href="{{ route('subcatbasedproducts', ['subcat_id'=>$subcategory->id, 'slug'=>$subname_slug_fr]) }}">
                                                    {{$subcategory->subcategory_name_fr}}
                                                </a>
                                            @else 
                                                @php $subname_slug_en = strtolower( str_replace('/','_', strtolower(str_replace(' ', '-', $subcategory->subcategory_name_en)))) @endphp
                                                <a class="dropdown-item" href="{{ route('subcatbasedproducts', ['subcat_id'=>$subcategory->id, 'slug'=>$subname_slug_en]) }}">
                                                    {{$subcategory->subcategory_name_en}}
                                                </a>
                                            @endif


                                           
                                        @endforeach
                                    </div>
                                @endforeach
                                <!-- <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                                    <div class="card border-0">
                                        <img src="./assets/images/banner/menu-banner.jpg"
                                            alt="eCommerce HTML Template" class="img-fluid rounded-3">
                                        <div class="position-absolute ps-6 mt-8">
                                            <h5 class=" mb-0 ">Dont miss this <br>offer today.</h5>
                                            <a href="#" class="btn btn-primary btn-sm mt-3">Shop Now</a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('about_page') }}">
                            @if(session()->get('language') == 'french') A propos @else About us @endif
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('references')}}">
                            @if(session()->get('language') == 'french') References @else References @endif 
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('contact_us')}}">
                            @if(session()->get('language') == 'french') Contactez-nous @else Contact us @endif
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        @if(session()->get('language') == 'french')
                             <a href="{{ route('english.language') }}" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('backend/dashb_assets/images/flags/french.jpg ') }}" alt="user-image" class="me-1" height="9"> 
                                <span class="align-middle">Francais</span> <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('english.language')}}">
                                    <img src="{{ asset('backend/dashb_assets/images/flags/us.jpg ') }}" alt="user-image" class="me-1" height="9"> <span class="">English</span>
                                    </a>
                                </li>
                            </ul>
                        @else 
                            <a href="{{ route('english.language') }}" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('backend/dashb_assets/images/flags/us.jpg ') }}" alt="user-image" class="me-1" height="9"> 
                                    <span class="align-middle">English</span> <i class="bi bi-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('french.language')}}">
                                            <img src="{{ asset('backend/dashb_assets/images/flags/french.jpg ') }}" alt="user-image" class="me-1" height="9"> <span class="">French</span>
                                        </a>
                                    </li>
                                </ul>
                        @endif 
                    </li>

                      <!-- <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              Shop
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="./pages/shop-grid.html">Shop Grid - Filter</a>
                              </li>
                              <li><a class="dropdown-item" href="./pages/shop-grid-3-column.html">Shop Grid - 3
                                      column</a>
                              </li>
                              <li><a class="dropdown-item" href="./pages/shop-list.html">Shop List - Filter</a>
                              </li>
                              <li><a class="dropdown-item" href="./pages/shop-filter.html">Shop - Filter</a></li>
                              <li><a class="dropdown-item" href="./pages/shop-fullwidth.html">Shop Wide</a></li>
                              <li><a class="dropdown-item" href="./pages/shop-single.html">Shop Single</a></li>
                              <li><a class="dropdown-item" href="./pages/shop-wishlist.html">Shop Wishlist</a>
                              </li>
                              <li><a class="dropdown-item" href="./pages/shop-cart.html">Shop Cart</a></li>
                              <li><a class="dropdown-item" href="./pages/shop-checkout.html">Shop Checkout</a>
                              </li>
                          </ul>
                      </li> -->
                      <!-- <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              Stores
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="./pages/store-list.html">Store List</a></li>
                              <li><a class="dropdown-item" href="./pages/store-grid.html">Store Grid</a></li>
                              <li><a class="dropdown-item" href="./pages/store-single.html">Store Single</a></li>

                          </ul>
                      </li> -->

                      <!-- <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              Pages
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="./pages/blog.html">Blog</a></li>
                              <li><a class="dropdown-item" href="./pages/blog-single.html">Blog Single</a></li>
                              <li><a class="dropdown-item" href="./pages/blog-category.html">Blog Category</a>
                              </li>
                              <li><a class="dropdown-item" href="./pages/about.html">About us</a></li>
                              <li><a class="dropdown-item" href="./pages/404error.html">404 Error</a></li>
                              <li><a class="dropdown-item" href="./pages/contact.html">Contact</a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              Account
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="./pages/signin.html">Sign in</a></li>
                              <li><a class="dropdown-item" href="./pages/signup.html">Signup</a></li>
                              <li><a class="dropdown-item" href="./pages/forgot-password.html">Forgot Password</a>
                              </li>
                              <li class="dropdown-submenu dropend">
                                  <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                      My Account
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="./pages/account-orders.html">Orders</a>
                                      </li>
                                      <li><a class="dropdown-item"
                                              href="./pages/account-settings.html">Settings</a></li>
                                      <li><a class="dropdown-item" href="./pages/account-address.html">Address</a>
                                      </li>
                                      <li><a class="dropdown-item"
                                              href="./pages/account-payment-method.html">Payment Method</a>
                                      </li>
                                      <li><a class="dropdown-item"
                                              href="./pages/account-notification.html">Notification</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </li> -->
                  </ul>
              </div>

              <div class="d-block d-lg-none">
                <ul class="navbar-nav ">
                  <li class="nav-item ">
                    <a class="nav-link" href="{{url('/')}}"> @if(session()->get('language') == 'french') Accueil @else Home @endif
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if(session()->get('language') == 'french') Produits @else Products @endif
                    </a>
                    <ul class="dropdown-menu">
                        @php 
                            $categories = App\Models\Category::orderBy('id','ASC')->get(); 
                        @endphp
                        @foreach ($categories as $category)
                        <li class="dropdown-submenu ">
                            @if(session()->get('language') == 'french')
                                @php $name_slug_fr = strtolower(str_replace(' ', '-', $category->category_name_fr)) @endphp
                                <a class="dropdown-item dropdown-list-group-item dropdown-toggle" 
                                    href="{{ route('catbasedproducts', ['cat_id'=>$category->id, 'slug'=>$name_slug_fr]) }}">
                                     {{$category->category_name_fr}}
                                </a>
                            @else 
                                @php $name_slug_en = strtolower(str_replace(' ', '-', $category->category_name_en)) @endphp
                                <a class="dropdown-item dropdown-list-group-item dropdown-toggle" 
                                    href="{{ route('catbasedproducts', ['cat_id'=>$category->id, 'slug'=>$name_slug_en]) }}">
                                    {{$category->category_name_en}}
                                </a>
                            @endif
                            
                            {{-- GET SUB CATEGORIES --}}
                            @php  $subcategories = App\Models\Subcategory::where('category_id',$category->id)->get();@endphp
                            <ul class="dropdown-menu">
                                @foreach ($subcategories as $subcategory)
                                    @if(session()->get('language') == 'french')
                                        @php $subname_slug_fr = strtolower(str_replace(' ', '-', $subcategory->subcategory_name_fr)) @endphp
                                        <a class="dropdown-item" href="{{ route('subcatbasedproducts', ['subcat_id'=>$subcategory->id, 'slug'=>$subname_slug_fr]) }}">
                                            {{$subcategory->subcategory_name_fr}}
                                        </a>
                                    @else 
                                        @php $subname_slug_en = strtolower(str_replace(' ', '-', $subcategory->subcategory_name_en)) @endphp
                                        <a class="dropdown-item" href="{{ route('subcatbasedproducts', ['subcat_id'=>$subcategory->id, 'slug'=>$subname_slug_en]) }}">
                                            {{$subcategory->subcategory_name_en}}
                                        </a>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('about_page')}}">
                        @if(session()->get('language') == 'french') A propos @else About us @endif
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('references')}}">
                        @if(session()->get('language') == 'french') References @else References @endif 
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('contact_us')}}">
                        @if(session()->get('language') == 'french') Contactez-nous @else Contact us @endif
                    </a>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">@if(session()->get('language') == 'french') Langue @else Language @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('english.language')}}">English</a></li>
                        <li><a class="dropdown-item" href="{{ route('french.language')}}">French</a></li>
                    </ul>
                  </li>
                </ul>
            </div>
          </div>
      </div>
  </nav>
</div>