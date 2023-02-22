@extends('dashboard.dashboard_master')

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')
<!-- <h1>Welcome to Dashboard</h1> -->

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
         <!-- TITLE -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">FORM BILGILERI</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Forms Elements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <form class="needs-validation" method="POST" action="{{ route('store_new_application') }}">
            @csrf
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Form Bilgileri</h4>
                        <a href="{{ route('admin.edit_supplierForm')}}" class="btn btn-info"></a>
                            
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <!-- FİRMA ÜNVANI / FİRMA FAALİYET ALANI -->
                                    <tr>
                                        <th>FİRMA ÜNVANI</th> <td>{{ $formData->company_name }} </td>
                                        <th>FİRMA FAALİYET ALANI</th> <td>{{ $formData->activity_area }} </td>
                                    </tr>
                                    <!-- VERGİ DAİRESİ  /  VERGİ NO -->
                                    <tr>
                                        <th>VERGİ DAİRESİ</th> <td>{{ $formData->tax_administration }} </td>
                                        <th>VERGİ NO</th> <td>{{ $formData->tax_number }} </td>
                                    </tr>
                                    <!-- KURULUŞ TARİHİ / ŞİRKET TİPİ-->
                                    <tr>
                                        <th>KURULUŞ TARİHİ</th> <td>{{ $formData->foundation_year }} </td>
                                        <th>ŞİRKET TİPİ</th> <td>{{ $formData->company_type }} </td>
                                    </tr>
                                    <!-- YILLIK CİRO /  -->
                                    <tr>
                                        <th><strong>YILLIK CİRO</strong></th> <td>{{ $formData->annual_turnover }} </td>
                                    </tr>
                                    <tr>
                                        <th><strong>ADRES</strong></th> <td colspan="3">{{ $formData->address }} </td>
                                    </tr>
                                    <!-- TELEFONU / CEP TELEFONU   -->
                                    <tr>
                                        <th>TELEFONU</th> <td>{{ $formData->phone }} </td>
                                        <th>CEP TELEFONU </th> <td>{{ $formData->mobile_phone }} </td>
                                    </tr>
                                    <!-- EMAİL / WEB ADRESİ-->
                                    <tr>
                                        <th>EMAİL</th> <td>{{ $formData->company_email }} </td>
                                        <th>WEB ADRESİ</th> <td>{{ $formData->website }} </td>
                                    </tr>
                                    <!-- İLGİLİ KİŞİ / İLGİLİ KİŞİ TELEFON -->
                                    <tr>
                                        <th>İLGİLİ KİŞİ</th> <td>{{ $formData->related_person }} </td>
                                        <th>İLGİLİ KİŞİ TELEFON</th> <td>{{ $formData->related_person_phone }} </td>
                                    </tr>

                                    <!-- İLGİLİ KİŞİ E POSTA/ TOPLAM ÇALIŞAN SAYISI -->
                                    <tr>
                                        <th>İLGİLİ KİŞİ E POSTA</th> <td>{{ $formData->related_person_email }} </td>
                                        <th>TOPLAM ÇALIŞAN SAYISI</th> <td>{{ $formData->total_employee }} </td>
                                    </tr>

                                    <!-- ÜRETİM/SATIŞ KAPASİTESİ (YILLIK) / REFERANSLAR ( EN AZ ÜÇ ADET ) -->
                                    <tr>
                                        <th colspan="2">ÜRETİM/SATIŞ KAPASİTESİ (YILLIK)</th> <td colspan="2">{{ $formData->annual_production_capacity }} </td>
                                        
                                    </tr>
                                    <tr>
                                        <th>REFERANSLAR</th> <td colspan="3">{{ $formData->references }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div><h4 class="card-title">FİRMA YETKİLİLERİ</h4></div>
                        <!-- FİRMA SAHİBİ -->
                        <div class="row">		
                            <div>FİRMA SAHİBİ</div><hr>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">ADI SOYADI</label>
                                    <br> {{ $formData->company_owner_name }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">GÖREVİ</label>
                                    <br> {{ $formData->company_owner_role }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label  class="form-label">CEP TELEFONU</label>
                                    <br> {{ $formData->company_owner_phone }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">EMAİL</label>
                                    <br> {{ $formData->company_owner_email }}
                                </div>
                            </div>
                        </div>
                        <!-- SATIŞ YETKİLİSİ -->
                        <div class="row">
                            <div>SATIŞ YETKİLİSİ</div><hr>
                            <!-- SATIŞ YETKİLİSİ-->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label  class="form-label">ADI SOYADI</label><br>{{ $formData->sales_officer_name }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label  class="form-label">GÖREVİ</label><br>{{ $formData->sales_officer_role }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">CEP TELEFONU</label><br>{{ $formData->sales_officer_phone }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">EMAİL</label><br>{{ $formData->sales_officer_email }}
                                </div>
                            </div>
                        </div>
                        <!-- MUHASEBE YETKİLİSİ  -->
                        <div class="row">		
                            <div>MUHASEBE YETKİLİSİ</div><hr>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label  class="form-label">ADI SOYADI</label><br>{{ $formData->accounting_officer_name }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label  class="form-label">GÖREVİ</label><br>{{ $formData->accounting_officer_role }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label  class="form-label">CEP TELEFONU</label><br>{{ $formData->accounting_officer_phone }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label  class="form-label">EMAİL</label><br>{{ $formData->accounting_officer_email }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- FİRMA ÖDEME VADESİ  -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label  class="form-label">FİRMA ÖDEME VADESİ </label><br>{{ $formData->accounting_officer_email }}
                                </div>
                            </div>
                            <!-- ÇALIŞTIĞINIZ BANKALAR VE İBAN BİLGİLERİ -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label  class="form-label">ÇALIŞTIĞINIZ BANKALAR VE İBAN BİLGİLERİ </label>
                                    <br>{{ $formData->bankers_details }}
                                </div>
                            </div>
                            <!-- ISO 9001 BELGENİZ VAR MI? -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label  class="form-label">ISO 9001 BELGENİZ VAR MI? (Varsa pdf dosya olarak yükleyinz)</label>
                                    <br>If file eexit link to view
                                </div>
                            </div>
                            <!-- KALİTE YÖNETİM SİSTEMİNE İLİŞKİN BAŞKA BELGELERİNİZ VAR MI?  -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label  class="form-label">KALİTE YÖNETİM SİSTEMİNE İLİŞKİN BAŞKA BELGELERİNİZ VAR MI? (Varsa Hepsi Tek pdf dosya olarak yükleyinz)</label>
                                    <br>If file eexit link to view
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div> -->
                    </div>
                </div>
                <!-- end card -->
            </div>
        </form>
        
    </div>
</div>
<!-- End Page-content -->

@include('dashboard.body_layout.footer')


</div>

@endsection

