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
                    <h4 class="mb-sm-0">Form BILGILERI</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Forms Elements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <form class="needs-validation" method="POST" action="{{ route('user.store_supplier_update_form') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- FİRMA ÜNVANI -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">FİRMA ÜNVANI</label>
                                    <input type="text" class="form-control" value="{{$formData->company_name}}" id="company_name" name="company_name"
                                        placeholder="FİRMA ÜNVANI" required>
                                </div>
                            </div>
                            <!-- FİRMA FAALİYET ALANI -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">FİRMA FAALİYET ALANI</label>
                                    <input type="text" class="form-control" value="{{$formData->activity_area}}" id="activity_area" name="activity_area"
                                        placeholder="FİRMA FAALİYET ALANI"  required>
                                </div>
                            </div>
                            <!-- VERGİ DAİRESİ  -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">VERGİ DAİRESİ </label>
                                    <input type="text" class="form-control" value="{{$formData->tax_administration}}" id="tax_administration" name="tax_administration"
                                        placeholder="VERGİ DAİRESİ"  required>
                                </div>
                            </div>
                            <!-- VERGİ NO -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">VERGİ NO</label>
                                    <input type="text" class="form-control" value="{{$formData->tax_number}}" id="tax_number" name="tax_number" required>
                                </div>
                            </div>
                            <!-- KURULUŞ TARİHİ  -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">KURULUŞ TARİHİ</label>
                                    <input type="date" class="form-control" value="{{$formData->foundation_year}}" id="foundation_year" name="foundation_year"  required>
                                </div>
                            </div>
                            <!-- ŞİRKET TİPİ - SATICI ÜRETİCİ HİZMET HİZMET -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">ŞİRKET TİPİ</label>
                                    <select class="form-select" id="company_type" name="company_type" required>
                                        <option selected disabled value="">Choose...</option>
                                        @foreach($companyType as $ctype)
                                            <option value="{{$ctype->id}}" {{ $formData->company_type === $ctype->id ? 'selected' : '' }}>{{$ctype->name_tr}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <!-- YILLIK CİRO  -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">YILLIK CİRO</label>
                                    <input type="text" class="form-control" value="{{$formData->annual_turnover}}" id="annual_turnover" name="annual_turnover" required>
                                </div>
                            </div>
                            <!-- ADRES -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">ADRES </label>
                                    <textarea id="address" name="address" class="form-control" cols="30" rows="3">{{$formData->address}}</textarea>
                                </div>
                            </div>
                            <!-- TELEFONU -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">TELEFONU </label>
                                    <input type="text" class="form-control" value="{{$formData->phone}}" id="phone" name="phone" required>
                                </div>
                            </div>
                            <!-- CEP TELEFONU -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">CEP TELEFONU </label>
                                    <input type="text" class="form-control" value="{{$formData->mobile_phone}}" id="mobile_phone" name="mobile_phone" required>
                                </div>
                            </div>
                            <!-- EMAİL -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">FIRMA EMAİL</label>
                                    <input type="email" class="form-control" value="{{$formData->company_email}}" id="company_email" name="company_email" required>
                                </div>
                            </div>
                            <!-- WEB ADRESİ -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">WEB ADRESİ </label>
                                    <input type="text" class="form-control" value="{{$formData->website}}" id="website" name="website" >
                                </div>
                            </div>
                            <!-- İLGİLİ KİŞİ -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">İLGİLİ KİŞİ</label>
                                    <input type="text" class="form-control" value="{{$formData->related_person}}" id="related_person" name="related_person" required>
                                </div>
                            </div>
                            <!-- İLGİLİ KİŞİ TELEFON -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">İLGİLİ KİŞİ TELEFON</label>
                                    <input type="text" class="form-control" value="{{$formData->related_person_phone}}"
                                    id="related_person_phone" name="related_person_phone" required>
                                </div>
                            </div>
                            <!-- İLGİLİ KİŞİ E POSTA -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">İLGİLİ KİŞİ E POSTA </label>
                                    <input type="email" class="form-control" value="{{$formData->related_person_email}}"
                                    id="related_person_email" name="related_person_email" required>
                                </div>
                            </div>
                            <!-- TOPLAM ÇALIŞAN SAYISI  -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">TOPLAM ÇALIŞAN SAYISI</label>
                                    <input type="text" class="form-control" value="{{$formData->total_employee}}" id="total_employee" name="total_employee" required>
                                </div>
                            </div>
                            <!-- ÜRETİM/SATIŞ KAPASİTESİ (YILLIK) -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">ÜRETİM/SATIŞ KAPASİTESİ (YILLIK) </label>
                                    <input type="text" class="form-control" value="{{$formData->annual_production_capacity}}" id="annual_production_capacity" name="annual_production_capacity" required>
                                </div>
                            </div>
                            <!-- REFERANSLAR ( EN AZ ÜÇ ADET ) -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">REFERANSLAR ( EN AZ ÜÇ ADET )</label>
                                    <textarea id="references" name="references" class="form-control" cols="30" rows="5">{{$formData->references}}</textarea>
                                </div>
                            </div>
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
                                    <label for="validationCustom01" class="form-label">ADI SOYADI</label>
                                    <input type="text" class="form-control" value="{{$formData->company_owner_name}}" id="company_owner_name" name="company_owner_name"
                                        placeholder="ADI SOYADI" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">GÖREVİ</label>
                                    <input type="text" class="form-control" value="{{$formData->company_owner_role}}" id="company_owner_role" name="company_owner_role"
                                        placeholder="GÖREVİ" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">CEP TELEFONU</label>
                                    <input type="text" class="form-control" value="{{$formData->company_owner_phone}}" id="company_owner_phone" name="company_owner_phone"
                                        placeholder="CEP TELEFONU" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">EMAİL</label>
                                    <input type="text" class="form-control" value="{{$formData->company_owner_email}}" id="company_owner_email" name="company_owner_email"
                                        placeholder="EMAİL" required>
                                </div>
                            </div>
                        </div>
                        <!-- SATIŞ YETKİLİSİ -->
                        <div class="row">
                            <div>SATIŞ YETKİLİSİ</div><hr>
                            <!-- SATIŞ YETKİLİSİ-->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">ADI SOYADI</label>
                                    <input type="text" class="form-control" value="{{$formData->sales_officer_name}}" id="sales_officer_name" name="sales_officer_name"
                                        placeholder="ADI SOYADI" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">GÖREVİ</label>
                                    <input type="text" class="form-control" value="{{$formData->sales_officer_role}}" id="sales_officer_role" name="sales_officer_role"
                                        placeholder="GÖREVİ" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">CEP TELEFONU</label>
                                    <input type="text" class="form-control" value="{{$formData->sales_officer_phone}}" id="sales_officer_phone" name="sales_officer_phone"
                                        placeholder="CEP TELEFONU" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">EMAİL</label>
                                    <input type="text" class="form-control" value="{{$formData->sales_officer_email}}" id="sales_officer_email" name="sales_officer_email"
                                        placeholder="EMAİL" required>
                                </div>
                            </div>
                        </div>
                        <!-- MUHASEBE YETKİLİSİ  -->
                        <div class="row">		
                            <div>MUHASEBE YETKİLİSİ</div><hr>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">ADI SOYADI</label>
                                    <input type="text" class="form-control" value="{{$formData->accounting_officer_name}}" id="accounting_officer_name" name="accounting_officer_name"
                                        placeholder="ADI SOYADI" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">GÖREVİ</label>
                                    <input type="text" class="form-control" value="{{$formData->accounting_officer_role}}" id="accounting_officer_role" name="accounting_officer_role"
                                        placeholder="GÖREVİ" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">CEP TELEFONU</label>
                                    <input type="text" class="form-control" value="{{$formData->accounting_officer_phone}}" id="accounting_officer_phone" name="accounting_officer_phone"
                                        placeholder="CEP TELEFONU" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">EMAİL</label>
                                    <input type="text" class="form-control" value="{{$formData->accounting_officer_email}}" id="accounting_officer_email" name="accounting_officer_email"
                                        placeholder="EMAİL" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- FİRMA ÖDEME VADESİ  -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">FİRMA ÖDEME VADESİ </label>
                                    <input type="text" class="form-control" value="{{$formData->payment_term}}" id="payment_term" name="payment_term"
                                        placeholder="FİRMA ÖDEME VADESİ" required>
                                </div>
                            </div>
                            <!-- ÇALIŞTIĞINIZ BANKALAR VE İBAN BİLGİLERİ -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">ÇALIŞTIĞINIZ BANKALAR VE İBAN BİLGİLERİ </label>
                                    <input type="text" class="form-control" value="{{$formData->bankers_details}}" id="bankers_details" name="bankers_details"
                                        placeholder="FİRMA ÖDEME VADESİ" required>
                                </div>
                            </div>
                            <!-- ISO 9001 BELGENİZ VAR MI? -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">ISO 9001 BELGENİZ VAR MI? (Varsa pdf dosya olarak yükleyinz)</label>
                                    <input type="file" class="form-control"  id="iso_document" name ="iso_document">
                                    @error('iso_document')<span  class="text-danger"> {{ $message}}</span>@enderror
                                </div>
                            </div>
                            <!-- KALİTE YÖNETİM SİSTEMİNE İLİŞKİN BAŞKA BELGELERİNİZ VAR MI?  -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">KALİTE YÖNETİM SİSTEMİNE İLİŞKİN BAŞKA BELGELERİNİZ VAR MI? (Varsa Hepsi Tek pdf dosya olarak yükleyinz)</label>
                                    <input type="file" class="form-control"  
                                    id="quality_control_documents" name="quality_control_documents">
                                    @error('quality_control_documents')<span  class="text-danger"> {{ $message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
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

