@extends('site.layouts.layout')
@section('content')

<section class="section">
    <div class="container">
        <div class="box-main-foo">
            <div class="sign-in">
                <div class="part-above">

                    <h4>أنشئ حساب جديد</h4>

                    <div class="line">

                    </div>
                    @if ($errors->any())
                    <ul>                  
                      @foreach ($errors->all() as $error)
                      <li class="text-danger">{{ $error }}</li>
                      @endforeach                     
                  </ul>
                  @endif
                    <form action="{{ url('u/register') }}" method="POST"  name="register-form" class="form-sign"
                        autocomplete="off" enctype="multipart/form-data">
                        @csrf
                         <div class="row mt-5 mb-4">
                            <div class=" col-12 col-sm-6 mb-2 ">
                                <label for="" class="mb-2">الاسم</label>
                                <input type="text" class="form-control" name="name" placeholder="الاسم "
                                    aria-label="name">
                            </div>


                            <div class="col-12 col-sm-6 mb-2">
                                <label for="" class="mb-2">البريد الإلكتروني</label>
                                <input type="email" autocomplete="off" class="form-control" name="email"
                                    placeholder="البريد الإلكتروني" aria-label="email">
                            </div>



                            <div class="col-12 col-sm-6 mb-2">
                                <label for="" class="mb-2">كلمة السر</label>
                                <input type="password" class="form-control" name="password" placeholder="كلمة السر"
                                    aria-label="password">
                            </div>
                            <div class="col-12 col-sm-6 mb-2">
                                <label for="" class="mb-2">تأكيد كلمة السر</label>
                                <input type="password" name="confirm_password" class="form-control"
                                    placeholder="تأكيد كلمة السر" aria-label="confirm_password">
                            </div>
                            <div class=" col-12 col-sm-6 mb-2 ">
                              <label for="image" class="mb-2">الصورة الشخصية</label>
                         
                              <input type="file" class="form-control" name="image"  id="image"  >
                          </div>
                            <div class="row">
                                <div class="col-12 mt-2 mb-2">
                                    <label for="" class="policy-form">
                                        <span class="policy">
                                            بالتسجيل في الموقع,انت توافق على
                                            <a href="#"  style="color:#F2AF2F;text-decoration:none;">الخصوصية</a>
                                            و
                                            <a href="#"  style="color:#F2AF2F;text-decoration:none;">الشروط و الأحكام</a>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" name="btn-register" class="theme-btn primary-btn btn-sign w-100">تسجيل</button>
                            <a href="{{ route('socialite.auth') }}" class="btn btn-blue-outline login-div" style="margin-top:10px;">
                                <span  class="fa fa-facebook"  style="color:#F2AF2F; font-size:20px;"></span>&nbsp; تسجيل الدخول عن طريق الفيسبوك
                                </a>
                            <div class="sec">
                                <p>
                                    هل بالفعل لديك حساب
                                    <a href="toPageLogin"  style="color:#F2AF2F;text-decoration:none;">دخول</a>
                                </p>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <div class="left-form">
                <img src="{{asset('/assets/site/assets/images/login.svg')}}"  alt="">
            </div>
        </div>
    </div>
</section>

@endsection
