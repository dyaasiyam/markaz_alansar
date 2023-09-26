@extends('admins.master')
@section('title','لوحة تحكم الإدارة')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">لوحة تحكم الإدارة</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card text-bg-primary mb-3" style="">
            <h5 class="card-title text-center mt-4"> الطلاب</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $stu }}</h3>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-secondary mb-3" style="">
            <h5 class="card-title text-center mt-4"> المحفظين</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $th }}</h3>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-success mb-3" style="">
            <h5 class="card-title text-center mt-4"> المراحل</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $st }}</h3>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-danger mb-3" style="">
            <h5 class="card-title text-center mt-4"> الحلقات</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $ci}}</h3>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-warning mb-3" style="">
            <h5 class="card-title text-center mt-4"> الأنشطة</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $ac}}</h3>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-info mb-3" style="">
            <h5 class="card-title text-center mt-4"> الدورات</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $co}}</h3>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-dark mb-3" style="">
            <h5 class="card-title text-center mt-4"> الاختبارات المنفردة</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $exam}}</h3>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-info mb-3" style="">
            <h5 class="card-title text-center mt-4"> الاختبارات المجتمعة</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $exams}}</h3>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-secondary mb-3" style="">
            <h5 class="card-title text-center mt-4"> أولياء الأمور</h5>
            <div class=" text-center mb-4">
              <h3 class="card-text">{{ $pa}}</h3>
            </div>
          </div>
    </div>

</div>
@endsection
