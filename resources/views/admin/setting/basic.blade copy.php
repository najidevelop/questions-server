@extends('admin.layouts.layout')
@section('page-title')
    {{ __('general.settings', [], 'en') }}
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('general.settings', [], 'en') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Site info</h3>
                </div>
                <!-- Title start -->
                <div class="card-body  row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" name="title_form" method="POST" action="{{url('admin/setting/updatetitle')}}" 
                            enctype="multipart/form-data" id="title_form">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Site Title" value="{{ $title }}">

                                    <span id="title-error" class="error invalid-feedback"></span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="desc" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " name="desc" id="desc"
                                        placeholder="Site Description" value="{{ $desc }}">
                                    <span id="desc-error" class="error invalid-feedback"></span>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta" class="col-sm-2 col-form-label">Meta</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " name="meta" id="meta"
                                        placeholder="Site meta keywords" value="{{ $meta}}">
                                    <span id="meta-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" type="submit" name="btn_update_title" id="btn_update_title"
                                        class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
             
            </div>
            <!-- email start -->
            <div class="card card-info">
               
                <!-- email start -->
                <div class="card-body  row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" name="email_form" method="POST" action="{{url('admin/setting/updatecontactemail')}}" 
                            enctype="multipart/form-data" id="email_form">
                            @csrf
                            <div class="form-group row">
                                <label for="contact_email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contact_email" id="contact_email"
                                        placeholder="Contact Email" value="{{$contact_email}}">

                                    <span id="contact_email-error" class="error invalid-feedback"></span>

                                </div>
                            </div>  
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password" value="">

                                    <span id="password-error" class="error invalid-feedback"></span>

                                </div>
                            </div>                       
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" type="submit" name="btn_update_contact_email" id="btn_update_contact_email"
                                        class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
            <div class="card card-info">
               
                <!-- whatsapp start -->
                <div class="card-body  row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" name="whatsapp_form" method="POST" action="{{url('admin/setting/updatewhats')}}" 
                            enctype="multipart/form-data" id="whatsapp_form">
                            @csrf
                            <div class="form-group row">
                                <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                        placeholder="+905011291958" value="{{$whats}}">

                                    <span id="whatsapp-error" class="error invalid-feedback"></span>

                                </div>
                            </div>                        
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" type="submit" name="btn_update_whatsapp" id="btn_update_whatsapp"
                                        class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
            <div class="card card-info">
                     <!-- Location link start -->
                     <div class="card-body  row">
                        <div class="col-lg-12">
                            <form class="form-horizontal" name="location_form" method="POST" action="{{url('admin/setting/updatelocation')}}" 
                                enctype="multipart/form-data" id="location_form">
                                @csrf
                                <div class="form-group row">
                                    <label for="location" class="col-sm-2 col-form-label">Location URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="location" id="location"
                                            placeholder=" " value="{{$location}}">
    
                                        <span id="location-error" class="error invalid-feedback"></span>
    
                                    </div>
                                </div>                        
                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" type="submit" name="btn_update_location" id="btn_update_location"
                                            class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
    
                        </div>
    
                    </div>
                        <!-- Location link end -->
             
            </div>
            <!-- Head icon -->
            <div class="card card-info"> 
                <!-- Head icon -->
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form class="form-horizontal" name="favicon_form" method="POST" action="{{url('admin/setting/updatefav')}}" 
                            enctype="multipart/form-data" id="favicon_form">
                            @csrf
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->
                                <div class="form-group row">
                                    <label for="favicon" class="col-sm-2 col-form-label">Favicon</label>
                                    <div class="col-sm-10">

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="favicon" id="favicon">
                                            <label class="custom-file-label" id="favicon_label" for="favicon">Choose
                                                file</label>

                                            <span id="favicon-error" class="error invalid-feedback"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" type="submit" name="btn_update_favicon" id="btn_update_favicon"
                                        class="btn btn-primary">Save</button>

                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-4  sm-3 ">
                        <img alt="" id="faviconshow"
                            class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0"
                            src="{{ $logo }}">
                    </div>
                </div>
               
            </div>

             <!--Logo-->

             <div class="card card-info"> 
              
                <div class="card-body  row">
                    <div class="col-lg-8">
                        <form class="form-horizontal" name="logo_form" method="POST" action="{{url('admin/setting/updatelogo')}}" 
                            enctype="multipart/form-data" id="logo_form">
                            @csrf
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->
                                <div class="form-group row">
                                    <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-10">

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="logo" id="logo">
                                            <label class="custom-file-label" id="logo_label" for="logo">Choose
                                                file</label>

                                            <span id="logo-error" class="error invalid-feedback"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" type="submit" name="btn_update_logo" id="btn_update_logo"
                                        class="btn btn-primary">Save</button>

                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-4  sm-3 ">
                        <img alt="" id="logoshow"
                            class="rounded img-thumbnail wd-100p float-sm-right  mg-t-10 mg-sm-t-0"
                            src="{{ $logo }}">
                    </div>
                </div>
               
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer -->

    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.card -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/admin/js/custom/validate.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/custom/setting.js') }}"></script>
    <script>
        var emptyimg = "{{ URL::asset('assets/admin/img/default/1.jpg') }}";
    </script>
@endsection
@section('css')
@endsection
