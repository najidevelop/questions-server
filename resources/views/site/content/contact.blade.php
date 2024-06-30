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
        <h2>{{Str::of( $category['tr_title'])->toHtmlString()}}</h2>
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

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        {{Str::of( $category['tr_content'])->toHtmlString()}}
        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="{{ $category['location'] }}" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6">
            <form action="{{url('sendmail')}}" method="post" role="form" name="email-form" id="email-form" class="php-email-form">
              @csrf
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="{{ $category['form']['contact_name']}}" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="{{ $category['form']['contact_email']}}" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="{{ $category['form']['contact_subject']}}" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="{{ $category['form']['contact_message']}}" required></textarea>
              </div>
              <input type="hidden" value="{{$lang}}" name="lang_code">
              <div class="my-3">
                <div class="loading"></div>
                <div class="error-message">{{ $category['form']['contact_error']}}</div>
                <div class="sent-message">{{ $category['form']['contact_success']}}</div>
              </div>
              <div class="text-center"><button type="submit" form="email-form" id="btn-send">{{ $category['form']['contact_send']}}</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->

@endsection
@section('js')
<script src="{{URL::asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/site/assets/vendor/php-email-form/validate.js')}}"></script>
@endsection

