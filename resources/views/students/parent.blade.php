@extends('students.layouts.master')
@section('css')

@section('title')
معلومات ولي أمر الطالب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> معلومات ولي أمر الطالب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">معلومات</a></li>
                <li class="breadcrumb-item active"> ولي أمر الطالب</li>
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
                <div class="col-lg-12 ">

                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">اسم الأب</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $parent->name }}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">رقم الجوال</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $parent->phone }}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">رقم الهوية</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $parent->id_number }}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">المهنة</p>
                          </div>
                          <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $parent->jobs }}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">السكن</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $parent->live }}</p>
                          </div>
                        </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">حالة الأسرة</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $parent->bio }}</p>
                            </div>
                          </div>
                          <a href="{{ route('student.parent.edit',$parent->id) }}" class="btn btn-primary text-light mt-3" >تحديث بيانات ولي الأمر</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
    @if (session('msg'))
    Toast.fire({
       icon: '{{ session("type") }}',
      title: '{{ session("msg") }}'
      })
    @endif
</script>



@endsection

