@extends('Website.layouts.website')
@section('title', 'Testimonials List')
@section('content')
 
<div class="hero inner-page" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
        
  <div class="container">
    <div class="row align-items-end ">
      <div class="col-lg-5">

        <div class="intro">
          <h1><strong>Testimonials</strong></h1>
          <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span> <strong>Testimonials</strong></div>
        </div>

      </div>
    </div>
  </div>
</div>



<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="section-heading"><strong>Testimonials</strong></h2>
        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
      </div>
    </div>
    <div class="row">
      @foreach($testimonials as $testimonial)  
      <div class="col-lg-4 mb-4">
        <div class="testimonial-2">
          <blockquote class="mb-4">
            <p>{{  $testimonial->content }}</p>
          </blockquote>
          <div class="d-flex v-card align-items-center">
            <img src="{{asset('assets/dashboard/images/'.$testimonial->image)}}" alt="Image" class="img-fluid mr-3">
            <div class="author-name">
              <span class="d-block">{{$testimonial->name }}</span>
              <span>{{ $testimonial->position }}</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach 
    </div>
  </div>
</div>
  
    @include('Website.includes.waiting_section')
    
   


@endsection
