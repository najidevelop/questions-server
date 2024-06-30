@extends('site.layouts.layout')

@section('content')
    <main id="main" data-aos="fade-up">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ Str::of($category['tr_title'])->toHtmlString() }}</h2>
                    <ol>
                        @foreach ($current_path as $pathitem)
                            @if ($pathitem['is_link'])
                                <li><a href="{{ $pathitem['urlpath'] }}">{{ $pathitem['tr_title'] }}</a></li>
                            @else
                                <li>{{ $pathitem['tr_title'] }}</li>
                            @endif
                        @endforeach
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page inner-page-sec">
            <div class="container">

           
               <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          {{ Str::of($category['tr_content'])->toHtmlString() }}
      </header>
        <div class="row">

          @foreach ($category['posts'] as $post)
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 service-col mb-5-service">
            <div class="icon-box service-box" data-aos="fade-up" data-aos-delay="100">              
              <h4 class="title service-title">{{ Str::of($post['tr_title'])->toHtmlString() }}</h4>
              {{ Str::of($post['tr_content'])->toHtmlString() }} 
            </div>
          </div>
@endforeach
       

        </div>

      </div>
    </section><!-- End Featured Services Section -->




            </div>
        </section>

    </main><!-- End #main -->
@endsection
