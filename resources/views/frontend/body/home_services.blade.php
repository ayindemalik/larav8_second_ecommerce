<!-- ======= Services Section ======= -->
<section id="jalla_services" class="jalla_services pt-0">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <span>Our Services</span>
        <h2>Our Services</h2>
      </div>

      <div class="row gy-4">
        @forelse($services as $item)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
                <img src="{{ asset($item->service_icon) }}" alt="" class="img-fluid">
              </div>
              
              @if(session()->get('language') == 'french')
                <h3><a href="service-details.html" class="stretched-link">{{$item->service_name_fr}}</a></h3>
                <p>{!! $item->service_descp_fr != '' ? $item->service_descp_fr : 'Sort description about the service' !!}</p>
              @else 
                <h3><a href="service-details.html" class="stretched-link">{{$item->service_name_en}}</a></h3>
                <p>{!! $item->service_descp_en != '' ? $item->service_descp_en : 'Sort description about the service' !!}</p>
              @endif 

            </div>
          </div>
        @empty
          <div class="col">
              @if(session()->get('language') == 'french') 
              <h4 >Pour obtenir de l'aide concernant les services spéciaux dont vous pourriez avoir besoin, veuillez <a href="route('contact')">nous contacter</a></h4>
              @else <h4 >For assistance related to special services you may need, please Contact us <a href="route('contact')">Contact us</a></h4>@endif
          </div>
        @endforelse
      </div>

    </div>
  </section>
  <!-- End Services Section -->