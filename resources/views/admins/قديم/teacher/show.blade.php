@extends('admins.master')
@section('title','معلومات '.$teacher->name)



@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
     <h2 class="">تفاصيل المحفظ-{{ $teacher->name }}  </h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              {{-- <img src="{{ asset('images/'.$teacher->image) }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;"> --}}
                @if ($teacher)
                @if ($teacher->image)
                    <img src="{{ asset('images/' . $teacher->image) }}" alt="user-img" width="136"
                        class="img-profile rounded-circle">
                @else
                    <img src="https://ui-avatars.com/api/?background=random&name={{ $teacher->name }}" alt="user-img" width="150"
                        class="img-profile rounded-circle">
                @endif
            @endif
              <h5 class="my-3">{{ $teacher->name }}</h5>
              <p class="text-muted mb-1">{{ $teacher->email }}</p>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <a href="https://wa.me/{{ $teacher->phone }}" style="text-decoration: none">
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-whatsapp fa-lg" style="color: #55acee;"></i>
                    <p class="mb-0">{{ $teacher->phone }}</p>
                  </li>
                </a>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">اسم المحفظ</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $teacher->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">رقم المحفظ</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $teacher->number }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">رقم الهوية</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $teacher->id_number }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">المرحلة</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                 @if($stage)
                    <p class="text-muted mb-0">{{ $stage->name }}</p>
                @else
                    <p class="text-muted mb-0">لا يوجد مرحلة مرتبطة</p>
                @endif
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
                    @if($teacher->circle)
                    <p>{{ $teacher->circle->name}}</p>
                @else
                    <p>لا يوجد حلقة مرتبطة</p>
                @endif
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
                    @foreach($courses as $course)
                    <p>{{ $course->name }}</p>
                @endforeach
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-body">
              <table class="table text-center ">
                <tr>
                    <th>#</th>
                    <th>اسم الطالب</th>
                    <th>الإختبارات المجتمعة</th>
                    <th>الإختبارات المنفردة</th>
                    <th>عدد أجزاء الحفظ</th>
                    <th>الصورة</th></th>
                </tr>
                @forelse ($students as $student )
                <tr>
                    <td>{{ $loop->iteration    }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->exams }}</td>
                    <td>{{ $student->exam}}</td>
                    <td>{{ $student->parts}}</td>
                    <td>
                      <img src="{{ asset('images/'.$student->image) }}" alt="{{ $student->name }}" width="90">

                    </td>
                @empty
                <tr>
                <td colspan="7">لايوجد طلاب لهذا المحفظ</td>
                  </tr>

                @endforelse
            </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
