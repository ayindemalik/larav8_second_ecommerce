@extends('dashboard.dashboard_master')

@section('dash_main_content')
@include('dashboard.useraccount.user_sidebar')

<div class="main-content">

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
            <!-- end page title -->

            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">New Applications</h4>
                            <table id="key-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Tipi</th>
                                        <th>Kategoi</th>
                                        <th>Doküman adı</th>
                                        <th>Yükleme Tarih</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @forelse ($documents as $item)
                                    <tr>
                                        <td><span><i class="fa fa-file-{{ $item->document_type }}-o"></i></span> 
                                            @if($item->document_type == "pdf")
                                                <span><i class="fa fa-file-pdf-o"></i></span>
                                            @elseif($item->document_type == "doc")
                                                <i class="fa fa-file-word-o"></i>
                                            @elseif($item->document_type == ".xls")
                                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td>{{$item->category}}</td>
                                        <td>@if($item->document_path != '') <a target="_blank"  href="{{ asset($item->document_path) }}">
                                            {{ $item->document_name}}</a>@endif
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                    </tr>
                                    @empty
                                        <p>Hiç bir doküman bulunmamaktadsır</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
                
            </div>

            
        </div>
    </div>
<!-- End Page-content -->

@include('dashboard.body_layout.footer')


</div>

@endsection

