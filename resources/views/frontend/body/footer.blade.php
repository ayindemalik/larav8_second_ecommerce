  <!-- ======= Footer ======= -->
  <footer id="footer">
    
    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Stay turned to receive news from Jalla International Service</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">@if(session()->get('language') == 'french') Accueil @else Home @endif</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about_page') }}">@if(session()->get('language') == 'french') A propos @else About us @endif</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('services_page') }}">@if(session()->get('language') == 'french') Nos Services @else Services @endif</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li> 
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              @forelse($services as $item)
              <li><i class="bx bx-chevron-right"></i> <a href="service-details.html">{{$item->service_name_en}}</a></li>
              @empty
                <div class="col">
                    <h4 >For assistance related to special services you may need, please Contact us <a href="route('contact')">Contact us</a></h4>
                </div>
              @endforelse
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Istabul Turkey <br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Jalla</h3>
            <p>Small decription.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">&copy; Copyright <strong><span>Jalla International</span></strong>. All Rights Reserved
      </div>
      <div class="credits">Designed by <a href="https://bitonix.com/">Bitonix</a>
      </div>
    </div>
  </footer><!-- End Footer -->
