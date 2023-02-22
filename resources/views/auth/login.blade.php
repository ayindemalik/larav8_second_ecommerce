@extends('dashboard.dashboard_master')

@section('dash_main_content')

<body class="" >
  <div class="bg-overlay"></div>
  <div class="wrapper-page">
      <div class="container-fluid p-0">
          <div class="card">
              <div class="card-body">

                  <div class="text-center mt-4">
                      <div class="mb-3">
                        <a href="" class="auth-logo">
                            <img src="{{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png') }}" height="50" class="logo-dark mx-auto" alt="">
                            <img src="{{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png') }}" height="50" class="logo-light mx-auto" alt="">
                        </a>
                      </div>
                  </div>

                  <h2 class="text-muted text-center font-size-18"><b>Management System</b></h2>
                  <h4 class="text-muted text-center font-size-18"><b>Login</b></h4>

                  <div class="p-3">
                      <form class="form-horizontal mt-3" method="post" 
                        action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                        @csrf
                          <div class="form-group mb-3 row">
                              <div class="col-12">
                                <input type="email" class="form-control unicase-form-control text-input"  id="email"  name="email" required
                                placeholder="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong>
                                    </span>
                                @enderror
                              </div>
                          </div>

                          <div class="form-group mb-3 row">
                              <div class="col-12">
                                <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                              </div>
                          </div>

                          <div class="form-group mb-3 text-center row mt-3 pt-1">
                              <div class="col-12">
                                  <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Login</button>
                              </div>
                          </div>

                          <div class="form-group mb-0 row mt-2">
                              <div class="col-sm-6 mt-3">
                                  <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password ?</a>
                              </div>
                              
                          </div>
                      </form>
                  </div>
                  <!-- end -->
              </div>
              <!-- end cardbody -->
          </div>
          <!-- end card -->
      </div>
      <!-- end container -->
  </div>
  <!-- end -->
</body>


@endsection

