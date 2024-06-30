<body>
  <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
          <a href="{{ url('/') }}"><img src="{{ $mainarr['logo']}}" width="50px" height="50px" alt=""></a>
          {{-- <h2><a class="navbar-brand" href="{{ url('/') }}"><span style="color:#F2AF2F;">جمرايا </span>دليل
                  الجامعات</a></h2> --}}
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="width:100% ">
              <div class="navbar-nav" style="width:auto;">
                  <a class="nav-link active" aria-current="page" href="{{ url('/') }}">الرئيسية</a>
                  @foreach ($mainmenuarr as $menuitem)
                  <a class="nav-link active" aria-current="page"  style="width:auto;text-wrap: nowrap;" href="{{ $menuitem['urlpath'] }}" >{{Str::of( $menuitem['tr_title'])->toHtmlString()}}</a>
                  @endforeach
                  {{-- <a class="nav-link menu-search" aria-current="page" href="{{ route('page.search') }}">بحث</a> --}}
                  {{-- <a class="nav-link active" aria-current="page" href="{{ url('/') }}">التأسيس</a> --}}
                  {{-- @isset($pineed)<a class="nav-link" href="{{route('viewpinned', $pineed->href)}}">عن الموقع</a>@endisset --}}
               
                 
                  {{-- <a class="nav-link" href="{{ url('quesans/') }}">سؤال و جواب</a> --}}
                  {{-- <a class="nav-link" href="{{ url('/') }}">الاخبار</a> --}}
                  
              </div>
              <!-- Example single danger button -->
              <div class="btn-group btn-group-change" style="width: 100%;text-align: left;">
                  <div class="left-nav" style="width: 100%;">
 
                      @if (Auth::guard('client')->check())
                      <a href="{{ route('client.account')  }}" class="link-two text-decoration-none link-mid">
                        <span> حسابي</span>
                    </a>
                    <a href="{{ route('mymessages') }}" class="link-two text-decoration-none link-mid">
                        <span>رسائلي</span>
                    </a>
                 
                    
                    <form method="POST" action="{{ route('logout.client') }}" class="btn btn-default btn-flat float-right">
                        @csrf
                    <a href="{{ route('logout.client') }}" class="link-two text-decoration-none link-mid" onclick="event.preventDefault();  this.closest('form').submit();">
                        <span>خروج <i class="fa-solid fa-right-from-bracket" style="margin-left:.5rem;  "></i>
                        </span>
                    </a>
                </form> 
                              <div class="div-profile d-inline-flex">
                                 
                                  <a class="btn btn-secondary dropdown-toggle link-one text-decoration-none link-mid profile-login" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                      <img src="{{Auth::guard('client')->user()->image_path}}" alt="{{Auth::guard('client')->user()->name }}">
                                  </a>
                                  
                                
                              </div>

                      @else
                
                      @endif
                  
                  </div>
              </div>
          </div>
      </div>
  </nav>
