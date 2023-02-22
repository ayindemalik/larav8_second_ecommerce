@extends('dashboard.dashboard_master')

@section('dash_main_content')
@include('dashboard.useraccount.user_sidebar')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-8">
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
                <div class="col-8">
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
                                        <th>Araçlar</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @forelse ($documents as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{$item->Category}}</td>
                                        <td>@if($item->document_path != '') <a target="_blank"  href="{{ asset($item->document_path) }}">
                                            {{ $item->document_name}}</a>@endif <br></td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <a href="" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                        <p>Hiç bir doküman bulunmamaktadsır</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
                {{-- EKLEME --}}
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Yeni dokümanlar Ekele</h4>
                            <form class="needs-validation" method="POST" action="{{ route('user.store_new_document') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- FİRMA ÜNVANI -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label  class="form-label">Kategory</label>
                                            <input type="text" class="form-control" id="category" name="category"
                                                placeholder="Klozet, Musluk" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Dokünmanlar</label>
                                            <input type="file" name="multi_files[]" id="multi_files" class="form-control" 
                                                multiple="" required>
                                            @error('multi_file')<span  class="text-danger"> {{ $message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary" type="submit" id="submitForm">Submit form</button>
                                </div>
                            </form>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div>
            </div>

            
        </div>
    </div>
<!-- End Page-content -->

@include('dashboard.body_layout.footer')


</div>

@endsection

