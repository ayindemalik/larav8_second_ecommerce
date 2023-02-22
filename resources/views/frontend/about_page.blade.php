@if(session()->get('language') == 'french') 
  @include('frontend.about.about_fr')
@else 
  @include('frontend.about.about_en')
@endif