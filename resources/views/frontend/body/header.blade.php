<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@jalla_service.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <h1><a href="{{url('/')}}"><img src="assets/img/logo/jalla_logo.jpeg" alt="" alt="" width="60" height="60" class="img-fluid"></a></h1>
        
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="{{url('/')}}">
              @if(session()->get('language') == 'french') Accueil @else Home @endif</a></li>
          <li><a  href="{{ route('about_page') }}">
              @if(session()->get('language') == 'french') A propos @else About us @endif
          <li><a  href="{{ route('services_page') }}">
              @if(session()->get('language') == 'french') Nos Services @else Services @endif
          <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
          <li><a href="team.html">Team</a></li>
          <!-- <li><a href="pricing.html">Pricing</a></li> -->
          <li><a href="blog.html">Blog</a></li>
          <li><a href="{{ route('contact_us')}}">
              @if(session()->get('language') == 'french') Contactez-nous @else Contact us @endif</a></li>
          <li class="dropdown">
              @if(session()->get('language') == 'french')
                  <a href="{{ route('french.language') }}">
                      <img src="{{ asset('backend/dashb_assets/images/flags/french.jpg ') }}" alt="user-image" class="me-1" height="9"> 
                      {{-- <span>Francais</span>  --}}
                      <i class="bi bi-chevron-down"></i></a>
                  <ul>
                      <li><a href="{{ route('english.language')}}">
                          <img src="{{ asset('backend/dashb_assets/images/flags/us.jpg ') }}" alt="user-image" class="me-1" height="9"> 
                          {{-- <span class="">English</span> --}}
                          </a>
                      </li>
                  </ul>
              @else
                  <a href="{{ route('english.language') }}">
                      <img src="{{ asset('backend/dashb_assets/images/flags/us.jpg') }}" alt="user-image" class="me-1" height="9"> 
                      {{-- <span>English</span>  --}}
                      <i class="bi bi-chevron-down"></i></a>
                  <ul>
                  <li><a href="{{ route('french.language')}}">
                      <img src="{{ asset('backend/dashb_assets/images/flags/french.jpg ') }}" alt="user-image" class="me-1" height="9"> 
                      {{-- <span class="">French</span> --}}
                  </a></li>
                  </ul>
              @endif 
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
