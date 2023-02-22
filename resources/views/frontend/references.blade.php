@extends('frontend.main_master')

@section('main_content')
  @section('title')
  AmymGroup - @if(session()->get('language') == 'french') A propos @else About us @endif
  @endsection

    <main>
      <div class="mt-4">
        <div class="container">
          <!-- row -->
          <div class="row ">
            <!-- col -->
            <div class="col-12">
              <!-- breadcrumb -->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#!">Home</a></li>
                  <li class="breadcrumb-item"><a href="#!">Stores</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Store List</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- section -->
      <section class="mt-8 ">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row ">
            <div class="col-12 ">
              <!-- heading -->
              <div class="bg-light rounded-3 d-flex justify-content-between ps-md-10 ps-6">
                <div class="d-flex align-items-center">
                  <h1 class="mb-0 fw-bold">Best References</h1>
                </div>
                <div class="py-6">
                  <!-- img -->
                  <!-- img -->
                  <img src="../assets/images/svg-graphics/store-graphics.svg" alt="" class="img-fluid"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="mt-6 mb-lg-14 mb-8">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-12">
              <div class="mb-4">
                <!-- title -->
                <h6>We have <span class="text-primary">36</span> vendors now</h6>
              </div>
            </div>
          </div>
          <!-- row -->
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 g-lg-4">
            <!-- col -->
    
            <div class="col">
              <!-- card -->
              <div class="card flex-row p-8 card-product ">
                <div>
                  <!-- img -->
                  <img src="{{asset('frontend/assets/images/logo/amymgroupr.png')}}" alt="" class="rounded-circle icon-shape icon-xl"></div>
                  <!-- content -->
                  <div class="ms-6">
                    <h5 class="mb-1"><a href="#!" class="text-inherit">Company name</a></h5>
                    <div class="small text-muted">
                      <span>Country</span> </div>
                    <div class="py-3">
                      <ul class="list-unstyled mb-0 small">
                        <li>Business Field</li>
                      </ul>
                    </div>
                    <div>
                      <!-- badge -->
                      <div class="badge text-bg-light border"><a href="#">company weblink</a></div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col">
              <!-- card -->
              <div class="card flex-row p-8 card-product ">
                <div>
                  <!-- img -->
                  <img src="{{asset('frontend/assets/images/logo/amymgroupr.png')}}" alt="" class="rounded-circle icon-shape icon-xl"></div>
                  <!-- content -->
                  <div class="ms-6">
                    <h5 class="mb-1"><a href="#!" class="text-inherit">Company name</a></h5>
                    <div class="small text-muted">
                      <span>Country</span> </div>
                    <div class="py-3">
                      <ul class="list-unstyled mb-0 small">
                        <li>Business Field</li>
                      </ul>
                    </div>
                    <div>
                      <!-- badge -->
                      <div class="badge text-bg-light border"><a href="#">company weblink</a></div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col">
              <!-- card -->
              <div class="card flex-row p-8 card-product ">
                <div>
                  <!-- img -->
                  <img src="{{asset('frontend/assets/images/logo/amymgroupr.png')}}" alt="" class="rounded-circle icon-shape icon-xl"></div>
                  <!-- content -->
                  <div class="ms-6">
                    <h5 class="mb-1"><a href="#!" class="text-inherit">Company name</a></h5>
                    <div class="small text-muted">
                      <span>Country</span> </div>
                    <div class="py-3">
                      <ul class="list-unstyled mb-0 small">
                        <li>Business Field</li>
                      </ul>
                    </div>
                    <div>
                      <!-- badge -->
                      <div class="badge text-bg-light border"><a href="#">company weblink</a></div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col">
              <!-- card -->
              <div class="card flex-row p-8 card-product ">
                <div>
                  <!-- img -->
                  <img src="{{asset('frontend/assets/images/logo/amymgroupr.png')}}" alt="" class="rounded-circle icon-shape icon-xl"></div>
                  <!-- content -->
                  <div class="ms-6">
                    <h5 class="mb-1"><a href="#!" class="text-inherit">Company name</a></h5>
                    <div class="small text-muted">
                      <span>Country</span> </div>
                    <div class="py-3">
                      <ul class="list-unstyled mb-0 small">
                        <li>Business Field</li>
                      </ul>
                    </div>
                    <div>
                      <!-- badge -->
                      <div class="badge text-bg-light border"><a href="#">company weblink</a></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col">
              <!-- card -->
              <div class="card flex-row p-8 card-product ">
                <div>
                  <!-- img -->
                  <img src="{{asset('frontend/assets/images/logo/amymgroupr.png')}}" alt="" class="rounded-circle icon-shape icon-xl"></div>
                  <!-- content -->
                  <div class="ms-6">
                    <h5 class="mb-1"><a href="#!" class="text-inherit">Company name</a></h5>
                    <div class="small text-muted">
                      <span>Country</span> </div>
                    <div class="py-3">
                      <ul class="list-unstyled mb-0 small">
                        <li>Business Field</li>
                      </ul>
                    </div>
                    <div>
                      <!-- badge -->
                      <div class="badge text-bg-light border"><a href="#">company weblink</a></div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  
    
    
 

@endsection