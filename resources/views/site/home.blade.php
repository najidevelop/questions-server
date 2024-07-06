@extends('site.layouts.layout')
@section('content') 
<div class="container-fluid content">
    <div class="row justify-content-center">
      <main role="main" class="col-12 col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">الرئيسية</h1>
        </div>
        <!-- محتوى الصفحة -->
        <div class="row main-content">
          <!-- تصنيفات -->
          <div class="col-6 col-sm-4 col-md-3 col-lg-6 mb-4 p-1">
            <a href="#" class="category-link">
              <div class="category-card">
                <img src="1.jpg" alt="تصنيف 1">
                <div class="category-overlay">
                  <h6>تصنيف 1</h6>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-6 mb-4 p-1">
            <a href="#" class="category-link">
              <div class="category-card">
                <img src="1.jpg" alt="تصنيف 2">
                <div class="category-overlay">
                  <h6>تصنيف 2</h6>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-6 mb-4 p-1">
            <a href="#" class="category-link">
              <div class="category-card">
                <img src="1.jpg" alt="تصنيف 3">
                <div class="category-overlay">
                  <h6>تصنيف 3</h6>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-6 mb-4 p-1">
            <a href="#" class="category-link">
              <div class="category-card">
                <img src="1.jpg" alt="تصنيف 4">
                <div class="category-overlay">
                  <h6>تصنيف 4</h6>
                </div>
              </div>
            </a>
          </div>
       
		       <!-- قسم 2 -->
        <div class="row ques-row">
          <div class="col-12 text-center mb-4">
           <p>اختر قسم وابدأ الاختبار</p>
          </div>
        
        </div>
		
        </div>
      </main>
    </div>
  </div>
    @endsection
