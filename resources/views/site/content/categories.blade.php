@extends('site.layouts.layout')

@section('content')
     <!-- المحتوى الرئيسي -->
  <div class="container-fluid content">
    <div class="row justify-content-center">
      <main role="main" class="col-12 col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">الرئيسية</h1>
        </div>
        <!-- محتوى الصفحة -->
        <div class="row main-content">
          <!-- تصنيفات -->
          @forelse ($categories as $category)
          <div class="col-6 col-sm-4 col-md-3 col-lg-6 mb-4 p-1">
            <a href="#" class="category-link">
              <div class="category-card">
                <img src="{{ $category['image_path'] }}" alt="{{ $category['tr_title']}}">
                <div class="category-overlay">
                  <h6>{{ $category['tr_title'] }}</h6>
                </div>
              </div>
            </a>
          </div>
          @empty
          <div class="row ques-row">
            <div class="col-12 text-center mb-4">
             <p>لايوجد اقسام</p>
            </div>
          
          </div>
          @endforelse      
		       <!-- قسم 2 -->
               @if ($categories->first())
               @if (Auth::guard('client')->check())
               <div class="row ques-row">
                   <div class="col-12 text-center mb-4">
                    <p>اختر قسم وابدأ الاختبار</p>
                   </div>
                 
                 </div>
                 @else
                 <div class="row ques-row">
                   <div class="col-12 text-center mb-4">
                    <p>سجل دخول لتستطيع المشاركة بالاختبار</p>
                   </div>
                 
                 </div>
               @endif 
               @endif
   
       
		
        </div>
      </main>
    </div>
  </div>

@endsection
