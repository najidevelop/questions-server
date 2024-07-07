@extends('site.layouts.layout')
@section('content')
<div class="container-fluid content">
  <div class="row justify-content-center">
    <main role="main" class="col-12 col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">حساب جديد</h1>
      </div>
      
      <!-- محتوى الصفحة -->
      <div class="row main-content justify-content-center ">
        <div class="col-md-12">
          <div class="card login-card">
            <div class="card-body  bg-style">
              <h3 class="card-title text-center">انشاء حساب جديد</h3>
              <form   action ="{{ url($lang,'register') }}" method="POST"  name="register-form"   id="register-form"
              enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="name">اسم المستخدم</label>
                  <input type="text" class="form-control"   id="name" name="name"  placeholder="ادخل اسم المستخدم">
                  <div id="name-error" class="invalid-feedback">اسم المستخدم مطلوب.</div>
                </div>
           <div class="form-group">
                  <label for="email">البريد الالكتروني</label>
                  <input type="text" class="form-control" id="email"  name="email"  placeholder="ادخل اسم المستخدم">
                  <div  id="email-error" class="invalid-feedback">هذا الحقل مطلوب</div>
                </div>
                <div class="form-group">
                  <label for="password">كلمة المرور</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="ادخل كلمة المرور">
                  <div  id="password-error" class="invalid-feedback">كلمة المرور مطلوبة.</div>
                </div>
          <div class="form-group">
                  <label for="confirm_password">تأكيد كلمة المرور</label>
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="ادخل كلمة المرور">
                  <div id="confirm_password-error"  class="invalid-feedback">هذا الحقل مطلوب</div>
                </div>
            <div class="form-group">
                  <label for="image">الصورة الشخصية</label>
                  <input type="file" class="form-control" name="image" id="image" placeholder="الصورة الشخصية">
                  <div  id="name-image" class="invalid-feedback">يجب ان يكون الملف صورة</div>
                </div>
        <div class="row">
                              <div class="col-12 mt-2 mb-2">
                                  <label for="" class="policy-form">
                                      <span class="policy">
                                          بالتسجيل في الموقع,انت توافق على
                                          <a href="#" style="text-decoration:none;">الخصوصية</a>
                                          و
                                          <a href="#" style="text-decoration:none;">الشروط و الأحكام</a>
                                      </span>
                                  </label>
                              </div>
                          </div>
                <button type="submit" class="btn btn-primary btn-block btn-submit">دخول</button>
              </form>
    <div class="sec">
                              <p>
                                  هل بالفعل لديك حساب
                                  <a href="toPageLogin" style="text-decoration:none;">دخول</a>
                              </p>
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
<script src="{{ url('assets/site/js/register.js') }}"></script>
@endsection
