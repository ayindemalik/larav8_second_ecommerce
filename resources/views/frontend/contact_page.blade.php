@if(session()->get('language') == 'french') 
  @include('frontend.contact.contact_fr')
@else 
  @include('frontend.contact.contact_en')
@endif