@if(session()->get('language') == 'french') 
  @include('frontend.services.services_fr')
@else 
  @include('frontend.services.services_en')
@endif