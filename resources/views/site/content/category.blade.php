@extends('site.layouts.layout')

@section('content')
     <!-- المحتوى الرئيسي -->
     <div class="container-fluid content">
      <div class="row justify-content-center">
        <main role="main" class="col-12 col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2"><span>الاختبارات</span>/<span>{{ $catquis['tr_title'] }}</span></h2>   
          </div>
          <!-- محتوى الصفحة -->
          <div class="row main-content">
            <!-- تصنيفات -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 p-1">
              <a href="#" class="category-link">
                <div class="category-card category-card-full">
                  <img src="{{ $catquis['image_path'] }}" alt="{{ $catquis['image_alt'] }}">
                  <div class="category-overlay">
                    <h6>{{ $catquis['tr_title'] }}</h6>
                  </div>          
                </div>         
              </a>
         <div class="category-details">
                    <p>{{Str::of($catquis['tr_content'])->toHtmlString()}}</p>
                  </div>
            </div>      
             <!-- قسم الأسئلة -->
          <div class="row ques-row">
            <div class="col-12 text-center mb-4">
              <button id="start-button" class="btn btn-primary start-btn">ابدأ</button>
            </div>
            <div class="col-12 " id="ques-div">
              <div id="question-section" class="d-none  question-sec">
                <h3 id="question-text" class="mb-4">ما هو السؤال؟</h3>
                <ul id="answers-list" class="list-group ques-group">
                 <li class="list-group-item d-flex align-items-center list-group-item-default" id="1">
                    <span class="answer-indicator"></span>
                    <span class="answer-text">إجابة 1</span>
                  </li>
                  <li class="list-group-item d-flex align-items-center list-group-item-default" id="2">
                    <span class="answer-indicator"></span>
                    <span class="answer-text">إجابة 2</span>
                  </li>
                  <li class="list-group-item d-flex align-items-center list-group-item-default"id="3">
                    <span class="answer-indicator"></span>
                    <span class="answer-text">إجابة 3</span>
                  </li>
                  <li class="list-group-item d-flex align-items-center list-group-item-default" id="4">
                    <span class="answer-indicator"></span>
                    <span class="answer-text">إجابة 4</span>
                  </li>
                  <li class="list-group-item d-flex align-items-center list-group-item-default" id="5">
                    <span class="answer-indicator"></span>
                    <span class="answer-text">إجابة 5</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      
          </div>
        </main>
      </div>
    </div>

@endsection
