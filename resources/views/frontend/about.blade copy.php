@extends('frontend.main_master')

@section('main_content')
  @section('title')
  Jalla - @if(session()->get('language') == 'french') A propos @else About us @endif
  @endsection

  <main>
    <!-- section -->
  <section class="mt-lg-14 mt-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="offset-lg-1 col-lg-10 col-12">
            <div class="row align-items-center mb-14">
                <div class="col-md-6">
                    <!-- text -->
                    @if(session()->get('language') == 'french') 
                        <div class="ms-xxl-14 me-xxl-15 mb-8 mb-md-0 text-center text-md-start">
                            <h1 class="mb-6">{{$about->about_title_fr != '' ? $about->about_title_fr : 'Titre de A propos'  }}</h1>
                            
                            {!! $about->about_shortdescp_fr != '' ? $about->about_shortdescp_fr : 'Paragraph d\'une Court Description de AmymGroup' !!}
                        </div>
                    @else
                        <div class="ms-xxl-14 me-xxl-15 mb-8 mb-md-0 text-center text-md-start">
                            <h1 class="mb-6">{{$about->about_title_en != '' ? $about->about_title_en : 'About Title'  }}</h1>
                            
                            {!! $about->about_shortdescp_en != '' ? $about->about_shortdescp_en : 'Paragraph of Short Description about AmymGroup' !!}
                        </div>
                    @endif
                </div>
       
                <!-- col -->
                <div class="col-md-6">
                    <div class=" me-6">
                        <!-- img -->
                        
                        <img src="{{asset($about->main_image) }}" style="width:400px; height:400px;" alt="" class="img-fluid rounded-3">
                    </div>
                </div>
            </div>
            <div class="row md-12">
                <div class="col-12">
                    <div class="mb-8">
                        @if(session()->get('language') == 'french') 
                            {!! $about->about_longdescp_fr != '' ? $about->about_longdescp_fr : 'Description detaillee de AmymGroup' !!}
                        @else
                            {!! $about->about_longdescp_en != '' ? $about->about_longdescp_en : 'Long Description about AmymGroup' !!}
                        @endif
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row mb-12">
                <div class="col-12">
                    <div class="mb-8">
                        <!-- heading -->
                        <h2>@if(session()->get('language') == 'french') Nos meilleur services @else Our best Services @endif</h2>
                    </div>
                </div>
                @forelse($services as $item)
                <div class="col-md-4">
                    <!-- card -->
                    <div class="card bg-light mb-6 border-0">
                        <!-- card body -->
                        <div class="card-body p-8">
                            <div class="mb-4">
                                <!-- img -->
                                <img src="{{ asset($item->service_icon) }}" alt="">
                            </div>
                            @if(session()->get('language') == 'french')
                                <h4> {{$item->service_name_fr}} </h4>
                                {!! $item->service_descp_fr != '' ? $item->service_descp_fr : 'Sort description about the service' !!}
                            @else 
                                <h4>{{$item->service_name_en}} </h4>
                                {!! $item->service_descp_en != '' ? $item->service_descp_en : 'Sort description about the service' !!}
                            @endif 
                            <!-- btn -->
                            <a href="#" class="btn btn-dark mt-2">@if(session()->get('language') == 'french') Plus de details @else More details @endif</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col">
                    @if(session()->get('language') == 'french') 
                    <h4 >Pour obtenir de l'aide concernant les services spéciaux dont vous pourriez avoir besoin, veuillez <a href="route('contact')">nous contacter</a></h4>
                    @else <h4 >For assistance related to special services you may need, please Contact us <a href="route('contact')">Contact us</a></h4>@endif
                </div>
                
                @endforelse

                {{-- <div class="col">
                    @if(session()->get('language') == 'french') 
                    <h4 >Pour obtenir de l'aide concernant les services spéciaux dont vous pourriez avoir besoin, veuillez <a href="route('contact')">nous contacter</a></h4>
                    @else <h4 >For assistance related to special services you may need, please Contact us <a href="route('contact')">Contact us</a></h4>@endif
                </div> --}}
            
            </div>
            </div>
        </div>
    </div>
  </section>
  <!-- section -->
  <section class=" py-14"style="background-color: #016bf8;">

    <div class="container">
      <div class="row">
        <!-- col -->
        <div class="offset-lg-1 col-lg-10">
          <div class="row">
            <!-- col -->
            <div class="col-xl-4 col-md-6">
              <div class="text-white me-8 mb-12">
                <!-- text -->
                <h2 class="text-white mb-4 ">Trusted by retailers. amym loved by customers.</h2>
                <p>We give everyone access to the food they love and more time to enjoy it together.</p>
              </div>

            </div>
            <div class="row row-cols-2 row-cols-md-4">
              <!-- col -->
              <div class="col mb-4 mb-md-0">
                <h3 class="display-5 fw-bold text-white mb-0">500k</h3>
                <span class="fs-6 text-white">Shoppers</span>
              </div>
              <!-- col -->
              <div class="col mb-4 mb-md-0">
                <h3 class="display-5 fw-bold text-white mb-0">4,500+</h3>
                <span class="fs-6 text-white">Cities</span>
              </div>
              <!-- col -->
              <div class="col mb-4 mb-md-0">
                <h3 class="display-5 fw-bold text-white mb-0">40k+</h3>
                <span class="fs-6 text-white">Stores</span>
              </div>
              <!-- col -->
              <div class="col mb-4 mb-md-0">
                <h3 class="display-5 fw-bold text-white mb-0"> 650+
                </h3>
                <span class="fs-6 text-white">Retail Brands</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- section TEAM OR STAFF  TITLE-->
  <section class="mt-14">
    <!-- container -->
    <div class="container">
      <div class="row">
        <!-- col -->
        <div class="offset-md-1 col-md-10">
          <div class="mb-11">
             <!-- heading -->
            <h2>Our Leadership</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- section TEAM OR STAFF -->
  <section class="mb-14">
     <!-- slider -->
    <div class="team-slider">
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded-3">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Chris Rogers</h5>
            <small>Vice President, Retail</small>
          </div>
           <!-- img -->
          <img src="{{asset('frontend/assets/images/about/team-1.png')}}" alt="" class="img-fluid">
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">

        <div class="bg-light rounded-3">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Donna J. Shelton</h5>
            <small>Chief Financial Officer</small>
          </div>
           <!-- img -->
          <img src="{{asset('frontend/assets/images/about/team-2.png')}}" alt="" class="img-fluid">
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded-3">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Daniel Leedom</h5>
            <small>Chief Communications Officer</small>
          </div>
           <!-- img -->
          <img src="{{asset('frontend/assets/images/about/team-3.png')}}" alt="" class="img-fluid">
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded-3">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Martha White</h5>
            <small>Chief Technology Officer</small>
          </div>
           <!-- img -->
          <img src="{{asset('frontend/assets/images/about/team-4.png')}}" alt="" class="img-fluid">
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded-3">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Victor Pugliese</h5>
            <small>Chief Human Resources Officer</small>
          </div>
           <!-- img -->
          <img src="{{asset('frontend/assets/images/about/team-5.png')}}" alt="" class="img-fluid">
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded-3">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Donna J. Shelton</h5>
            <small>Chief Financial Officer</small>
          </div>
           <!-- img -->
          <img src="{{asset('frontend/assets/images/about/team-2.png')}}" alt="" class="img-fluid">
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded-3">
          <div class="p-6">
             <!-- text -->
            <h5 class="h6 mb-0">Daniel Leedom</h5>
            <small>Chief Communications Officer</small>
          </div>
           <!-- img -->
          <img src="{{asset('frontend/assets/images/about/team-3.png')}}" alt="" class="img-fluid">
        </div>
      </div>
       <!-- item -->
      <div class="item mx-2">
        <div class="bg-light rounded-3">
           <!-- text -->
          <div class="p-6">
            <h5 class="h6 mb-0">Martha White</h5>
            <small>Chief Technology Officer</small>
          </div>
           <!-- img -->
          <img src="{{asset('frontend/assets/images/about/team-4.png')}}" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>
  
    
    
  </main>

@endsection