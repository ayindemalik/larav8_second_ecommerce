@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.header')
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')
<!-- <h1>Welcome to Dashboard</h1> -->

<div class="main-content">
    <!-- Main content -->
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Data Tables</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Data Tables</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">New Applications</h4>
                            <table id="key-datatable" class="table dt-responsive  w-100">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Code</th>
                                        <th>Product Name Eng</th>
                                        <th>Product Name Fr</th>
                                        <th>Product Price </th>
                                        <th>Quantity </th>
                                        <th>Discount </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $item)
                                        <tr>
                                            <td> <img src="{{ asset($item->product_thambnail) }}" alt="" style="width:70px; height: 50px;"></td>
                                            <td> {{ $item->product_code }} </td>
                                            <td> {{ $item->product_name_en }} </td>
                                            <td> {{ $item->product_name_fr }} </td>
                                            <td>{{ $item->selling_price }} $</td>
                                            <td>{{ $item->product_qty }} Pic</td>
                                            <td> 
                                                @if($item->discount_price == NULL)
                                                    <span class="badge badge-pill text-danger">No Discount</span>
                                                @else
                                                @php
                                                    $amount = (double) $item->selling_price - (double) $item->discount_price;
                                                    $discount = ($amount / (double) $item->selling_price) * 100;
                                                @endphp
                                                    <span class="badge badge-pill text-danger">{{ round($discount)  }} %</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-pill text-success"> Active </span>
                                                @else
                                                    <span class="badge badge-pill text-danger"> InActive </span>
                                                @endif
                                            </td>
                                            <td width="30%">
                                                <a href="{{ route('product.copy',$item->id) }}" class="btn btn-primary" title="Copiyer Le meme produit"><i class="fa fa-solid fa-copy"></i></a>
                                                <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Editer Le Produit"><i class="fa fa-edit"></i> </a>
                                                <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Suprimer le produit" id="delete">
                                                <i class="fa fa-trash"></i></a>
                                                @if($item->status == 1)
                                                    <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger" title="Inactiver Maintenant"><i class="fa fa-arrow-down"></i> </a>
                                                @else
                                                    <a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="Activer Maintenant"><i class="fa fa-arrow-up"></i> </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                    <p>No Products</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div>
    </div>
</div>
		<!-- /.content -->
@endsection