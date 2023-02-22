@extends('frontend.main_master')

@section('main_content')
  @section('title')
  Jalla International
  @endsection

  <!-- Hero banner slider-->
  @include('frontend.body.hero')

  <main>
      
    <!-- CATEGORY PRODUCTS-->
    @include('frontend.body.home_main_features')

    <!-- CATEGORY PRODUCTS-->
    @include('frontend.body.home_about')

    <!-- CATEGORY PRODUCTS-->
    @include('frontend.body.home_services')
    
  </main>

@endsection