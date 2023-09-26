@extends('admins.master')
@section('title','معلومات '.$student->name)



@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
     <h2 class="">تفاصيل الطالب-{{ $student->name }}  </h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                @if ($student)
                         @if ($student->image)
                         <img src="{{ asset('images/' . $student->image) }}" alt="user-img" width="136"
                         class="img-profile rounded-circle">
                         @else
                             <img src="https://ui-avatars.com/api/?background=random&name={{ $student->name }}" alt="user-img" width="150"
                                class="img-profile rounded-circle">
                         @endif
              @endif
              <h5 class="my-3">{{ $student->name }}</h5>
              <p class="text-muted mb-1">{{ $student->email }}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-body">
                <h3 class="text-center mb-4">بيانات الطالب</h3>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">اسم المحفظ</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $student->teacher->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">رقم الطالب</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $student->number }}</p>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">المرحلة</p>
                </div>
                <div class="col-sm-9">
                    {{ $student->stage->name }}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">حلقة</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    {{ $student->circle->name }}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">تاريخ الميلاد</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    {{ $student->date }}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">اختبارات مجتمعة</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    {{ $student->exams }}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">اختبارات منفردة</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    {{ $student->exam }}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">عدد أجزاء الحفظ</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    {{ $student->parts }}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">دورات أحكام</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    @foreach($student->courses as $course)
                    <p>{{ $course->name }}</p>
                @endforeach
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                <h3 class="text-center mb-4">بيانات ولي أمر الطالب</h3>

                  <div class="col-sm-3">
                    <p class="mb-0">اسم الأب</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $student->parent->name }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">رقم الجوال</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $student->parent->phone }}</p>
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">المهنة</p>
                  </div>
                  <div class="col-sm-9">
                      {{ $student->parent->jobs }}
                    </p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">السكن</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">
                      {{ $student->parent->live }}
                    </p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">حالة الأسرة</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">
                        {{ $student->parent->bio }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>


      </div>
    </div>
  </section>

@endsection
