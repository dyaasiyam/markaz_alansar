@extends('students.layouts.master')
@section('css')

@section('title')
بيانات الطالب
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> بيانات الطالب</h4>
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
                <h2 class="">معلومات الطالب-{{ Auth::user()->name }}  </h2>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="card mb-4">
                      <div class="card-body text-center">
                          @if (Auth::user()->image)
                          <img src="{{asset('images/'.Auth::user()->image )}}" class="rounded-circle img-fluid" style="width: 150px;">
                              @else
                              <img src=" https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}" class="rounded-circle img-fluid" style="width: 150px;">
                          @endif
                        {{-- <img src="{{asset('images/'.$students->image)}}" alt="avatar"
                          class="rounded-circle img-fluid" style="width: 150px;"> --}}
                        <h5 class="my-3">{{ $students->name }} </h5>
                        <p class="text-muted mb-1">{{ $students->email }} </p>
                        <a href="{{ route('student.student.edi',  $students->id) }}" class="btn btn-primary">تعديل البيانات</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">اسم الطالب</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">عدد أجزاء الحفظ</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->parts }}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">إختبارات منفردة</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->exam }}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">إختبارت مجتمعة</p>
                          </div>
                          <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ Auth::user()->exams }}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">دورات أحكام</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">
                              @foreach($Courses as $course)
                              <p>{{ $course->name }}</p>
                          @endforeach
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="">معلومات محفظ الطالب-{{ Auth::user()->name }}  </h5>
                      <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                          <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                اسم المحفظ
                                <p class="mb-0">{{ Auth::user()->teacher->name }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                المرحلة
                                <p class="mb-0">{{ Auth::user()->teacher->stage->name }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                حلقة
                                <p class="mb-0">{{ Auth::user()->teacher->circle->name }}</p>
                              </li>
                            <a href="https://wa.me/{{ Auth::user()->teacher->phone }} " style="text-decoration: none">
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fa fa-whatsapp fa-lg" style="color: #55acee;"></i>
                                <p class="mb-0">{{ Auth::user()->teacher->phone }}</p>
                              </li>
                            </a>
                          </ul>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-8">
                      <h5 class="">معلومات ولي أمر الطالب-{{ Auth::user()->name }}  </h5>

                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">اسم الأب</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ Auth::user()->parent->name }}</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">رقم الجوال</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ Auth::user()->parent->phone }}</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">رقم الهوية</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ Auth::user()->parent->id_number }}</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">المهنة</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->parent->jobs }}</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">السكن</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ Auth::user()->parent->live }}</p>
                            </div>
                          </div>
                          <hr>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <p class="mb-0">حالة الأسرة</p>
                              </div>
                              <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->parent->bio }}</p>
                              </div>
                            </div>
                        </div>
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
