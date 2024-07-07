@extends('site.layouts.layout')

@section('content')
   	    <!-- محتوى الصفحة -->
           <div class="container-fluid content">
            <div class="row justify-content-center">
              <main role="main" class="col-12 col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h1 class="h2">تسجيل الدخول</h1>
                </div>
                
                    <!-- محتوى الصفحة -->
                <div class="row main-content justify-content-center ">
                  <div class="col-md-6">
                    <div class="card login-card">
                      <div class="card-body  bg-style">
                        <h3 class="card-title text-center">تسجيل الدخول</h3>
                        <form   action ="{{ url($lang,'login') }}" method="POST"  name="login-form"   id="login-form"
                        enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="email">البريد الالكتروني</label>
                            <input type="text" class="form-control" id="email"  name="email"  placeholder="ادخل البريد الالكتروني ">
                            <div  id="email-error" class="invalid-feedback">هذا الحقل مطلوب</div>
                          </div>
                          <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="ادخل كلمة المرور">
                            <div  id="password-error" class="invalid-feedback">كلمة المرور مطلوبة.</div>
                          </div>
                          <button type="submit" class="btn btn-primary btn-block btn-submit">دخول</button>
                        </form>
                        <div class="sec">
                                    <p>
                                        هل نسيت كلمة المرور؟
                                        <a href="#">استعادة كلمة المرور </a>
                                    </p>
                                    <p>
                                        ليس لديك حساب؟
                                        <a href="{{ url($lang,'register') }}">سجل الأن</a>
                                    </p>
                                    </div>
                      </div>
                    </div>
                  </div>
                </div>
                 
              </main>
            </div>
          </div>
@endsection
@section('js')
<script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
<script src="{{ url('assets/site/js/validate.js') }}"></script>
<script src="{{ url('assets/site/js/login.js') }}"></script>
@endsection
