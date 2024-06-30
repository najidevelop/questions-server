@extends('site.layouts.layout')
@section('content')
    <section class="section">
        <div class="container">
            <div class="box-main-foo">
                <section class="section-about mb-4 mt-3">


                    <div class="box-about-unviersity p-2">
                        <div class="container main-about-box">
                            <!-- Section atRight -->
                            <div class="box-serach-about-university p-3 m">


                                <div class="mapp">
                                    <div class="mapouter">

                                        <div class="gmap_canvas">
                                            <h4>{{ Auth::guard('client')->user()->name }}</h4>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="info-more">
                                    <p><a href="{{ $client_url['link_client'] }}">{{ $client_url['href_client'] }}</a></p>
                                    <h5>لكي تستقبل الرسائل</h5>
                                    <div class="box-right d-flex align-items-flex-start flex-column">



                                        <div class="locationn d-flex">
                                            <i class="fa fa-facebook-f"></i>
                                            <p> شارك حسابك على
                                                <span> فايسبوك </span>
                                            </p>
                                        </div>




                                    </div>
                                </div>
                            </div>
                            <!-- End Section atRight -->
                            <!-- Section atLeft -->
                            <div class="background-about mm">

                                <div class="about-detials mb-3 socaill">

                                    <h4 class="mb-4  " style="margin-bottom: 0px">رسائلي
                                        <hr style="margin-bottom: 0px">
                                    </h4>
                                    <div class="col-md-offset-2 col-md-2" style="margin-bottom: 50px">
                                    </div>

                                    
                                    <!-- start message  -->

                                    @foreach ($messages as $mymsg)
                                        <div class="descrip w-100 message-box">
                                            <a href="#" data-id="{{ $mymsg->id }}" class="del-msg"
                                                style="
                                            display: flex;                                           
                                            justify-content: flex-end;   text-decoration: none;">
 
                                                <i class='fas fa-times' style='font-size:16px;color:red'></i>
                                            </a>
                                            <p>{{ $mymsg->content }}</p>
                                            @if ($mymsg->file_type == 'image')
                                                <div>
                                                    <img src="{{ $mymsg->file_path }}"  
                                                        alt="{{ $mymsg->file }}" width="200">
                                                </div>
                                            @elseif ($mymsg->file_type == 'sound')
                                                <div class="col-sm-6">
                                                    <audio controls alt="{{ $mymsg->file }}">
                                                        <source src="{{ $mymsg->file_path }}" type="audio/ogg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </div>
                                            @elseif ($mymsg->file_type == 'video')
                                                <div class="col-sm-6">
                                                    <video controls id="vidshow-edit"
                                                        class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0"
                                                        alt="{{ $mymsg->file }}">
                                                        <source src="{{ $mymsg->file_path }}">
                                                    </video>


                                                </div>
                                            @endif

                                            <small class="text-muted"
                                                style="margin-top:10px;">{{ $mymsg->created_at }}</small>

                                            <div class="clearfix"></div>
                                            <div class="pull-left" style="margin-top:10px;">
                                                <a href="javascript:;" data-add-reply="" data-id="35512634"
                                                    style="font-weight: bold; color: red;" title="إضافة رد">
                                                    <span style="font-size: x-large" class="icon icon-reply"></span>
                                                </a>
                                                &nbsp;
                                                <a id="ctl00_body_RpMessages_ctl00_lbShare" data-source="facebook"
                                                    title="مشاركة على الفيسبوك" data-id="35512634" style=" text-decoration: none;"
                                                    href="javascript:__doPostBack('ctl00$body$RpMessages$ctl00$lbShare','')"><i class="fa fa-facebook-f" style="font-size:24px" ></i></a>
                                                &nbsp;
                                                <a id="ctl00_body_RpMessages_ctl00_lbShare2" data-source="twitter"
                                                    title="مشاركة على تويتر" data-id="35512634"
                                                    href="javascript:__doPostBack('ctl00$body$RpMessages$ctl00$lbShare2','')">
                                                    <i class="fa fa-twitter"  style="font-size:24px"></i></a>
                                            </div>

                                            <div class="pull-right"
                                                style="margin-top:10px; color: #f00 !important;   position: relative; right: 20px;">
                                                <span class="checkbox" data-id="35512634"><input
                                                        id="ctl00_body_RpMessages_ctl00_cbPublic" type="checkbox"
                                                        name="ctl00$body$RpMessages$ctl00$cbPublic"
                                                        onclick="javascript:setTimeout('__doPostBack(\'ctl00$body$RpMessages$ctl00$cbPublic\',\'\')', 0)"><label
                                                        for="ctl00_body_RpMessages_ctl00_cbPublic">إظهار
                                                        للعامة</label></span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- end message  -->

                                </div>
                            </div>

                            <!-- End Section atLeft -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <form method="POST" action="{{ route('message.delete', 'delitemid') }}"
        id="del-msg-form"class="btn btn-default btn-flat float-right">
        @csrf
        @method('DELETE')
        </span>
        </a>
    </form>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('assets/site/assets/css/custom.css') }}" />
@endsection
@section('js')
    <script src="{{ URL::asset('assets/site/assets/js/account.js') }}"></script>
    var dataId ="";
    <script>
        var dataId = "";
        var delurl = "{{ URL::asset('assets/admin/img/default/1.jpg') }}";
        $(function() {
            var formActin = $("#del-msg-form").attr("action");
            $('.del-msg').on('click', function(e) {
                e.preventDefault();
                dataId = $(this).attr("data-id");
                var newformActin = formActin.replace("delitemid", dataId);
                $("#del-msg-form").attr('action', newformActin).submit();
            });
        });
    </script>
@endsection
