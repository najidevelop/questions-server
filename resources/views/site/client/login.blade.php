@extends('site.layouts.layout')

@section('content')
    <section class="section">
        <div class="container">
            <div class="box-main-foo">
                <div class="sign-in">
                    <div class="part-above">


                        <h4>مرحبا بك مجددا</h4>


                        @if ($errors->any())
                        <ul>                  
                          @foreach ($errors->all() as $error)
                          <li class="text-danger">{{ $error }}</li>
                          @endforeach                     
                      </ul>
                      @endif
                        <form method="POST" action="{{ url('u/login') }}" class="fomr-sign" id="login-form">
                            @csrf
                              <div class="col mb-4">
                                <label class="mb-2" for="typeEmailX-2">ايميل</label>
                                <input type="email" value="" id="typeEmailX-2 " name="email"
                                    class="form-control ">

                            </div>

                            <div class="col mb-4">
                                <label class="mb-2" for="typePasswordX-2">كلمة السر</label>
                                <input type="password" name="password" id="typePasswordX-2" class="form-control  ">

                            </div>

                            <!-- Checkbox -->


                            <button class="theme-btn primary-btn btn-sign w-100 mt-4" type="submit">سجل</button>

                        </form>

                        <div class="sec">
                            <p>
                                هل نسيت كلمة المرور؟
                                <a href="#">استعادة كلمة المرور </a>
                            </p>
                            <p>
                                ليس لديك حساب؟
                                <a href="{{ url('/u/register') }}">سجل الأن</a>
                            </p>
                            <a href="{{ route('socialite.auth') }}" class="btn btn-blue-outline login-div">
                                <span   class="fa fa-facebook"  style="color:#F2AF2F; font-size:20px;"></span>&nbsp; الدخول عن طريق الفيسبوك
                                </a>

    


                        </div>
                    </div>

                </div>
                <div class="left-form-login">
                    <img src="{{asset('/assets/site/assets/images/login.svg')}}"  alt="">
                </div>
            </div>
        </div>

    </section>
@endsection
