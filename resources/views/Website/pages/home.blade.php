@extends('Website.layouts.website')
@section('title', 'Car Rental')

@section('content')

     @include('Website.includes.rent_car_section')
     @include('Website.includes.howWork_section')
     @include('Website.includes.promo_renting_section')
     
     @include('Website.includes.carlist_section')

     @include('Website.includes.feature_section')
     @include('Website.includes.testimonials_section')

     @include('Website.includes.waiting_section')

   
   
@endsection

 
