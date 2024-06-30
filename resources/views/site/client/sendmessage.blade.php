@extends('site.layouts.layout')
@section('content')
<section class="section">
    <div class="container">
        <div class="box-main-foo">
    <section class="section-about mb-4 mt-3">
        
       
        <div class="box-about-unviersity p-2">
            <div class="container main-about-box">
  <!-- Section atRight -->
  <div  >
                     
  

</div>
                <!-- End Section atRight -->
                <!-- Section atLeft -->
                <div class="background-about mm">
                   
                    <div class="about-detials mb-3 socaill">
                      
                                 <h4 class="mb-4  " style="margin-bottom: 0px"  >ارسل<hr style="margin-bottom: 0px"></h4>
                                   <div class="col-md-offset-2 col-md-2" style="margin-bottom: 50px" >
                       </div>

 <div class="descrip w-100  text-center"    >   
    <p id="result"></p>
   
    <form action="{{ url('u/sendmessage') }}" method="POST"  name="send-form" id="send-form" class="form-sign"
    autocomplete="off" enctype="multipart/form-data">
    @csrf
    <p>اجعل رسالتك بناءة :)</p>
     
                                    <textarea class="message-box" style="width: 100%" name="content" id="content"></textarea> 
                                 <input type="hidden" name="slug" value="{{ $client->user_name }}">
                                    <p style="font-weight: bold; color: #c61717">رفع فيديو أو صورة أو مقطع صوتي مع الرسالة حيث يتم حذف المرفق تلقائيا بعد 24 ساعة</p>
                              
                                    <div  style="display: none" class="progress mt-3" style="height: 25px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                                    </div>

                                    <div  style="margin-bottom: 10px;">
                                    <input type="file" class="form-control" name="upfile" id="upfile" >
                                    <label id="file_label"> </label>
                                </div>
                                    <div class="clearfix"></div>
                                    <button type="submit" name="btn-send"  id="btn-send" class="theme-btn primary-btn btn-sign w-100">أرسل</button>
         
                                            </form>
                                        </div>
                                     </div>
                </div>
                
                <!-- End Section atLeft -->
            </div>
        </div>         
    </section>
</div></div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="{{ url('assets/site/assets/css/custom.css') }}" />
@endsection
@section('js')  
<script>  
    var csrtoken="{{ csrf_token() }}";
  </script>
<script src="{{URL::asset('assets/site/assets/js/resumable.min.js')}}"></script>
<script src="{{URL::asset('assets/site/assets/js/sendmsg.js')}}"></script>



@endsection
