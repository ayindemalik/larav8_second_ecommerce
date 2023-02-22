@extends('frontend.main_master')

@section('main_content')
  @section('title')
  Jalla - Nos Services 
  @endsection
  <main>
    <!-- TOP section -->
    <div class="jalla_breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Nos Services</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Accueil</a></li>
            <li>Nos Services</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- ======= Featured Services Section ======= -->
    <section id="jalla-featured-services" class="jalla-featured-services">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
            <div>
              <h4 class="title">Lorem Ipsum</h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
            <div>
              <h4 class="title">Dolor Sitema</h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-ramp-box"></i></div>
            <div>
              <h4 class="title">Sed ut perspiciatis</h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
        </div>
      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="jalla_services" class="jalla_services pt-0">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <span>Nos Services</span>
          <h2>Nos Services</h2>
        </div>

        <div class="row gy-4">

          @forelse($services as $item)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
                <img src="{{ asset($item->service_icon) }}" alt="" class="img-fluid">
              </div>

              <h3><a href="service-details.html" class="stretched-link">{{$item->service_name_fr}}</a></h3>
              <p>{!! $item->service_descp_fr != '' ? $item->service_descp_fr : 'Sort description about the service' !!}</p>

            </div>
          </div>
        @empty
          <div class="col">
              <h4 >Pour obtenir de l'aide concernant les services spéciaux dont vous pourriez avoir besoin, veuillez <a href="route('contact')">nous contacter</a></h4>
          </div>
        @endforelse

        </div>
      </div>
    </section><!-- End Services Section -->

 
  </main>

@endsection