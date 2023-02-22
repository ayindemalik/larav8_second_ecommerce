@extends('dashboard.dashboard_master')

@section('dash_main_content')
    @include('dashboard.useraccount.user_sidebar')
<!-- <h1>Welcome to Dashboard</h1> -->

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
         <!-- TITLE -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">EDIT MY PROFILE FORM</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Forms Elements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <form class="needs-validation" method="POST" action="{{ route('user.store_member_profile', $user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" class="form-control" value="{{$user->id}}" name="user_id">
                            {{-- <input type="hidden" class="form-control" value="{{$formData->quality_control_documents}}" name="old_quality_control_documents"> --}}
                            
                            <!-- FİRMA REFERENCE -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Fistname</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="first_name" name="first_name"
                                        value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Midlename</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="midle_name" name="midle_name"
                                        value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Lastname</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="last_name" name="last_name"
                                        value="" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Passport No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="tc_no" name="tc_no"
                                        value="" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">TC No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="passport_no" name="passport_no"
                                        value="" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Birthdate</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="birthday" name="birthday"
                                        value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale" checked="">
                                    <label class="form-check-label" for="genderMale">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale">
                                    <label class="form-check-label" for="genderFemale">
                                        Female
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="email" name="email"
                                        value="" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Turkey Phone No*</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="tc_phone" name="tc_phone"
                                        value="" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Togo Phone No(in emergency)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="tg_phone" name="tg_phone"
                                        value="" >
                                    </div>
                                </div>
                            </div>

                            <!-- ADRES -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Address in Turkey </label>
                                    <textarea id="tc_address" name="tc_address" class="form-control" cols="30" rows="2"></textarea>
                                </div>
                            </div>

                            <!-- ADRES -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Address in Togo* </label>
                                    <textarea id="tg_address" name="tg_address" class="form-control" cols="30" rows="2"></textarea>
                                </div>
                            </div>

                            <!-- STATE -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">State/Ville</label>
                                    <select class="form-select" id="state" name="state" required>
                                        <option selected disabled value="">Choose...</option>
                                        {{-- @foreach($companyType as $ctype)
                                            <option value="{{$ctype->id}}" {{ $formData->company_type === $ctype->id ? 'selected' : '' }}>{{$ctype->name_tr}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            
                            {{-- University/Universite * --}}
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">University/Universite *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="university" name="university"
                                        value="" >
                                    </div>
                                </div>
                            </div>
                            {{-- Faculty/Faculte --}}
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Faculty/Faculte</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="faculty" name="faculty"
                                        value="" >
                                    </div>
                                </div>
                            </div>
                            {{-- Department --}}
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Department</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  id="department" name="department"
                                        value="" >
                                    </div>
                                </div>
                            </div>
                            {{-- Level/Niveau * --}}
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Level/Niveau *</label>
                                    <select class="form-select" id="level" name="level" required>
                                        <option selected disabled value="">Choose...</option>
                                        {{-- @foreach($companyType as $ctype)
                                            <option value="{{$ctype->id}}" {{ $formData->company_type === $ctype->id ? 'selected' : '' }}>{{$ctype->name_tr}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            {{-- Status  --}}
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Status </label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option selected disabled value="">Choose...</option>
                                        {{-- @foreach($companyType as $ctype)
                                            <option value="{{$ctype->id}}" {{ $formData->company_type === $ctype->id ? 'selected' : '' }}>{{$ctype->name_tr}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Start Date</label>
                                    <input type="text" class="form-control" value="" id="start_date" name="start_date" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">End Date</label>
                                    <input type="text" class="form-control" value="" id="end_date" name="end_date" required>
                                </div>
                            </div>
                            
                            
                            <!-- ADRES -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">ADRES </label>
                                    <textarea id="address" name="address" class="form-control" cols="30" rows="3"></textarea>
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
                        <div><h4 class="card-title">Professional Information</h4></div>
                        <!-- FİRMA SAHİBİ -->
                        <div class="row">		
                            <div>Professional Information</div><hr>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Add your Skills / vos competences*</label>
                                    <textarea id="profile_resume" name="profile_resume" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Work Experience / Experience de travail</label>
                                    <textarea id="skills" name="skills" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Additional note / autre note additionelle</label>
                                    <textarea id="references" name="references" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        
                       
                        <hr>
                        <div class="row">
                           
                            <!-- KALİTE YÖNETİM SİSTEMİNE İLİŞKİN BAŞKA BELGELERİNİZ VAR MI?  -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">KALİTE YÖNETİM SİSTEMİNE İLİŞKİN BAŞKA BELGELERİNİZ VAR MI? (Varsa Hepsi Tek pdf dosya olarak yükleyinz)</label>
                                    <input type="file" class="form-control"  id="cv_file" name="cv_file">
                                    <br>
                                    {{-- @if($formData->quality_control_documents != '') 
                                    <a target="_blank" href="{{ asset($formData->quality_control_documents) }}">View Quality Control Document</a>
                                    @endif --}}
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

