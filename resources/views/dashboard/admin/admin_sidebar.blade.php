<!-- ========== Left Sidebar Start ========== -->
@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!-- User details -->
    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            
            <li class="menu-title">Menu</li>
            
            <li>
                <a href="{{url('admin/dashboard')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/')}}" target="_blanc" class=" waves-effect">
                    <i class="ri-earth-fill"></i><span>jallaservice.com</span>
                </a>
            </li>
            <!-- CARGO -->
            <li>
                <a href="{{route('add-new-shipment', 0)}}" target="_blanc" class=" waves-effect">
                    <i class="ri-earth-fill"></i><span>Add New Shipment</span>
                </a>
            </li>
            <!-- Profile -->
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Cargo Operations</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('admin-view-shipment-list')}}">Manage Shipments</a></li>
                    <li><a href="{{route('admin-manage-cargo-types')}}">Manage Cargo Types</a></li>
                </ul>
            </li>
            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Gestion du Profile</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('admin.profile')}}">View Profile</a></li>
                    <li><a href="{{route('admin.edit_profile')}}">Edit Profile</a></li>
                    <li><a href="{{route('admin.change_password')}}">Change Password</a></li>
                </ul>
            </li> --}}

            
            <!-- BRAND -->
            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Manage Brands</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view_all_brand')}}">View Brands</a></li>
                </ul>
            </li> --}}
            <!-- BRAND -->
            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Manage Categories</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view_all_category')}}">View Categories</a></li>
                    <li><a href="{{ route ('view_all_subcategory')}}">Sub Categories</a></li>
                    <li><a href="{{ route ('view_all_subsubcategory')}}">Sub Sub Categories</a></li>
                </ul>
            </li> --}}
            <!-- PRODUCT -->
            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Gestion Des Produits</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('manage_product')}}">Voir les produits
                    </a></li>
                    <li><a href="{{ route('add_product')}}">Ajouter un produit</a></li>
                    
                </ul>
            </li>
            <hr> --}}
            <li class="menu-title">Manage Website Content</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>About</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view_about')}}">View & manage</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Home Page sliders</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('manage-slider') }}">View & Manage</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Services</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view_all_service')}}">View & Manage</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Contact</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('view_contact') }}">View & Manage</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>
<!-- Left Sidebar End -->