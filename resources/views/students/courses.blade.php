@extends('students.layouts.master')
@section('css')

@section('title')
    الدورات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الدورات</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">الدورات</a></li>
                <li class="breadcrumb-item active">قائمة الدورات</li>
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
                <table class="table table-light table-hover" border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الدورة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $numberOfCourses as $course )
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $course->name }}
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="2">لا توجد دورات متاحة حاليًا.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection











