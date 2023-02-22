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
                    <a href="{{url('dashboard')}}" class="waves-effect">
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
                    <a href="{{route('user-add-new-shipment', 0)}}" target="_blanc" class=" waves-effect">
                        <i class="ri-earth-fill"></i><span>Add New Shipment</span>
                    </a>
                </li>
                <!-- Profile -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Shipment Operations</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('user-view-shipment-list')}}">Manage Shipments</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Prices Operations</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('user-manage-cargo-types')}}">Manage Prices Types</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Incomes & Expences</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('user-manage-income-expences')}}">Manage</a></li>
                    </ul>
                </li>
                <!-- SUPPLIERS -->
                
                {{-- DOCUMENTS --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Dokümanlar</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('user.manage_documents')}}">Teknik Dokümanlar Yönet</a></li>
                        <li><a href="{{route('user.view_documents')}}">Teknik Dokümanlar Göster</a></li>
                        
                    </ul>
                </li> --}}
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->