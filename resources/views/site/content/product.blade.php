@extends('site.layouts.layout')
{{-- @section('mainslide')
   <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1><span> {{ $slidedata['title'] }}</span></h1>
        <h2> {{ $slidedata['desc'] }}</h2> 
        <div class="d-flex">

          <a href="#about" class="btn-get-started scrollto">Get Started</a>
           </div>
      </div>
    </section><!-- End Hero -->
    @endsection --}}
@section('content')

<main id="main" data-aos="fade-up">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>{{Str::of( $postcontent['tr_title'])->toHtmlString()}}</h2>
        <ol>
          <li><a href="{{ $current_path[0]['urlpath'] }}">{{$current_path[0]['tr_title'] }}</a></li>
          <li><a href="{{url('lang/'.$lang.'/page'.'/'.$category['slug'])}}">{{ $category['tr_title'] }}</a></li>
          <li>{{ $postcontent['tr_title'] }}</li>
            
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
   <!-- ======= Portfolio Details Section ======= -->
   <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @foreach (  $postcontent['mediastore']->where('type','image')  as $media)
              <div class="swiper-slide slide-image" >
                <img src="{{ $media['image_path'] }}" alt="">
              </div>
              @endforeach
            

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>{{ $postcontent['tr_title'] }}</h3>
            <p>{{Str::of( $postcontent['tr_content'])->toHtmlString()}}</p>
          </div>
          <div class="portfolio-description">
           
           
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection
@section('js')

@endsection
