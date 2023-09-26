@extends('teachers.layouts.master')
@section('css')
@endsection
<title>
    خطة الطالب
</title>
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">عرض</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ خطة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="col-xl-12">
    <div class="card mt-5 mb-5 ">
        <form action="{{ route('teacher.plans.update',$plan->id) }}" method="POST">
            @csrf
            @method('put')

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
                        <input type="text" name="count"  class="form-control text-center" value="{{ $plan->count }}">
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
                    <input type="text" name="count_r"  class="form-control text-center" value="{{ $plan->count_r }}">
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


                <BR></BR>

                <button type="submit" class="btn btn-dark">نسبة إنجاز الخطة </button>

            </div>
        </form>
    </div>
</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
