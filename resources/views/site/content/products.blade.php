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

                <!-- ======= Projects Section ======= -->
                <section id="team" class="team">

                    <div class="container" data-aos="fade-up">

                        <header class="section-header">
                            {{ Str::of($category['tr_content'])->toHtmlString() }}
                        </header>

                        <div class="row gy-4 vid-row">
                            @foreach ($category['posts'] as $post)
                                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <div class="member">
                                        <div class="member-img pro-img-div">
                                         
                                            <a href="{{url('lang/'.$lang.'/page'.'/'.$category['slug'].'/'.$post['slug'])}}">
                                                <img src="@if ($post['mediastore']->where('type', 'image')->first()) {{ $post['mediastore']->where('type', 'image')->first()['image_path'] }}@else assets/img/team/team-2.jpg @endif"
                                                    class="img-fluid pro-img" alt=""></a>
                                             

                                        </div>
                                        <div class="member-info">
                                            <h4><a href="{{url('lang/'.$lang.'/page'.'/'.$category['slug'].'/'.$post['slug'])}}">{{ Str::of($post['tr_title'])->toHtmlString() }}</a></h4>
                                            @if ($post['tr_content'] == '')
                                                <span></span>
                                                <p></p>                                            
                                            @else
                                            <p style="text-align: justify;"> {{ Str::of($post['tr_content'])->toHtmlString() }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </section><!-- End Team Section -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection
