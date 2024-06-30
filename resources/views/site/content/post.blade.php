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


   <!-- ======= Portfolio Section ======= -->
   <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
         
        <h3><span>{{ $postcontent['tr_title'] }}</span></h3>
        <p>{{Str::of( $postcontent['tr_content'])->toHtmlString()}}</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
       
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
@foreach (  $postcontent['mediastore']->where('type','image')  as $media)
        <div class="col-lg-4 col-md-6 portfolio-item ">
          <img src="{{ $media['image_path'] }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{ $postcontent['tr_title'] }}</h4>
            
            <a href="{{ $media['image_path'] }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $postcontent['tr_title'] }}"><i class="bx bx-plus"></i></a>
         
          </div>
        </div>
        @endforeach

      </div>

      <div class="row vid-row"   >
       @foreach (  $postcontent['mediastore']->where('type','video')  as $media)
       <div class="col-lg-4 col-md-6 d-flex align-items-stretch vid-col  "   data-aos="zoom-in" data-aos-delay="100">
        <video controls controlsList="nodownload" oncontextmenu="return false"
        class="img-fluid">
        <source
            src="{{ $media['image_path'] }}"
            type="video/mp4">
    </video>
      </div>
      
      @endforeach
    </div>
      
    </div>
  </section><!-- End Portfolio Section -->

</main><!-- End #main -->
@endsection
@section('js')

@endsection
