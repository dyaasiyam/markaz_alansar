@extends('students.layouts.master')
@section('css')

@section('title')
    تعديل الملف الشخصي
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الملف الشخصي</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">تحديث</a></li>
                <li class="breadcrumb-item active">الملف الشخصي</li>
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
                <form action="{{ route('student.student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put') <!-- تحديد الطريقة PUT -->
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label>اسم الطالب</label>
                                    <input type="text" name="name" placeholder="اسم الأب" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name',$student->name) }}"
                                    />
                                    @error('name')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label>صورة الطالب</label>
                                    <input type="file" name="image"  class="form-control"/>
                                </div>
                            </div>

                        <button class="btn btn-success">تعديل البيانات</button>

                    </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
