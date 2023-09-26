@extends('students.layouts.master')
@section('css')

@section('title')
    خطة شهر {{ $plan->month }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الخطة الشهرية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">خطة شهر</a></li>
                <li class="breadcrumb-item active">{{ $plan->month }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <h3> تفاصيل خطة الطالب:  {{ $plan->user->name }}</h3>
                    <strong>  شهر : <span>{{ $plan->month }}</span> /{{ now()->year }} </strong>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <h3 class="text-center">خطة الحفظ</h3>
                    </div>
                    <div class="col-md-2 text-center">
                        <label  for="">من صفحة </label>
                        <input type="text" disabled class="form-control text-center" value="{{ $plan->to }}">
                    </div>
                    <div class="col-md-2 text-center">
                        <label  for="">إلى صفحة </label>
                        <input type="text" disabled name="for" class="form-control text-center" value="{{ $plan->for }}">
                    </div>
                    <div class="col-md-2 text-center">
                        <label  for="">عدد صفحات الخطة </label>
                        <input type="text" disabled name="numberOfPages" class="form-control text-center" value="{{ $numberOfPages }}">
                    </div>
                    <div class="col-md-2 text-center">
                        <label  for="">عدد الصفحات المنجزة </label>
                        <input type="text" disabled name="count"  class="form-control text-center" value="{{ $plan->count }}">
                    </div>
                    <div class="col-md-2 text-center">
                        <label for="">نسبة الإنجاز</label>
                        <input type="text" disabled class="form-control text-center" value="%{{ $plan->completionPercentage }}">
                    </div>

                    <hr class=" mt-4 mb-4 w-100">
                    <div class="col-md-12">
                        <h3 class="text-center">خطة المراجعة</h3>
                </div>
                <div class="col-md-2 text-center">
                    <label  for="">من صفحة </label>
                    <input type="text" disabled class="form-control text-center" value="{{ $plan->to_r }}">
                </div>
                <div class="col-md-2 text-center">
                    <label  for="">إلى صفحة </label>
                    <input type="text" disabled name="for" class="form-control text-center" value="{{ $plan->for_r }}">
                </div>
                <div class="col-md-2 text-center">
                    <label  for="">عدد صفحات الخطة </label>
                    <input type="text" disabled name="numberOfPages" class="form-control text-center" value="{{ $numberOfPages_r }}">
                </div>
                <div class="col-md-2 text-center">
                    <label  for="">عدد الصفحات المنجزة </label>
                    <input type="text" name="count_r" disabled  class="form-control text-center" value="{{ $plan->count_r }}">
                </div>
                <div class="col-md-2 text-center">
                    <label for="">نسبة الإنجاز</label>
                    <input type="text" disabled class="form-control text-center" value="%{{ $plan->completionPercentage_r }}">
                </div>
                <hr class=" mt-4 mb-4 w-100">
                <div class="col-md-4 ">
                    <label for="">الدورات</label>
                    <ul>
                        @foreach ($plan->courses as $course)
                            <p>{{ $course->name }}</p>
                        @endforeach
                    </ul>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
