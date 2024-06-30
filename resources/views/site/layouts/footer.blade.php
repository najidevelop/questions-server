<div class="visit_and_sites text-center d-flex flex-wrap justify-content-center" style="color:#272727;margin-bottom: -2rem;">
 
</div>
<footer>
<div class="container ff">
  <ul class="ul">
    @foreach ($footermenuarr as $footeritem)
    <a href="{{ $footeritem['urlpath'] }}">
      <li>{{Str::of( $footeritem['tr_title'])->toHtmlString()}}</li>
  </a>
    
    @endforeach
   
 
      <a href="https://www.gmraya.com/page/about-us">
        <li>إنضم للمجموعة</li>
    </a>
       
    <a href="https://www.gmraya.com/page/about-us">
      <li>  تابعنا على Facebook</li>
  </a>
     

 
 

 
  </ul>
  <div class="text-descr">
      <p> </p>
  </div>
</div>
<!--<div class="container text-start text-white" style="font-size:12px;">designed by: <a href="mailto:khaledamiramin@gmail.com" style="color:#F2AF2F;">Khaled Amir Amin</a></div>-->
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{url("assets/site/ckeditor/ckeditor.js")}}"></script>
@if (session('success'))
<script>
  swal("{{ session('success') }}");
</script>
@endif
@if(session('pass'))
<script>
  swal("تمت العملية بنجاح", "بامكانك الدخول الى حسابك", "success");
</script>
@endif
@yield('script')
@yield('js')
@foreach ( $mainarr['footerlist'] as $headrow )
{{ Str::of($headrow['value1'])->toHtmlString()}}    
@endforeach
</body> 