<section class="mt-8">
  <div class="container">
    <div class="hero-slider ">
      @foreach($sliders as $slider)
        <div style="background: url({{asset($slider->slider_img)}})no-repeat; 
          background-size: cover; border-radius: .5rem; background-position: center;">
          <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
            <span class="badge text-bg-warning"></span>
            @if(session()->get('language') == 'french')
              <h2 class="text-dark display-5 fw-bold mt-4">{{$slider->title_fr}} </h2>
              <p class="lead">{{$slider->description_fr}}</p>
              <a href="#!" class="btn btn-dark mt-3">Voir plus <i class="feather-icon bi bi-arrow-right-square ms-1"></i></a>
            @else
              <h2 class="text-dark display-5 fw-bold mt-4">{{$slider->title_en}} </h2>
              <p class="lead">{{$slider->description_en}}</p>
              <a href="#!" class="btn btn-dark mt-3">View more<i class="feather-icon bi bi-arrow-right-square ms-1"></i></a>
            @endif
            
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>