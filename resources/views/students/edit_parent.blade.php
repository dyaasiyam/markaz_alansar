@extends('students.layouts.master')
@section('css')

@section('title')
    تحديث بيانات ولي الأمر
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">     تحديث بيانات ولي الأمر            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">تحديث</a></li>
                <li class="breadcrumb-item active"> بيانات ولي الأمر</li>
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
                <form action="{{ route('student.parent.update',$parent->id) }}" method="POST" >
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>اسم الأب</label>
                                <input type="text" name="name" placeholder="اسم الأب" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name',$parent->name) }}"
                                />
                                @error('name')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>رقم الجوال</label>
                                <input type="text" name="phone" placeholder="رقم الجوال" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone',$parent->phone)}}"
                                />
                                @error('phone')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>رقم الهوية</label>
                                <input type="text" name="id_number" placeholder="رقم الهوية" class="form-control @error('id_number') is-invalid @enderror"
                                value="{{ old('id_number',$parent->id_number) }}"
                                />
                                @error('id_number')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>المهنة</label>
                                <input type="text" name="jobs" placeholder="المهنة"  class="form-control @error('jobs') is-invalid @enderror"
                                value="{{ old('jobs',$parent->jobs) }}"
                                />
                                @error('jobs')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>نوع السكن</label>
                                <select name="live" class="form-control">
                                    <option value="" disabled >اختر نوع السكن</option>
                                    <option value="ملك" {{ $parent->live === 'ملك' ? 'selected' : '' }}>ملك</option>
                                    <option value="إيجار" {{ $parent->live === 'إيجار' ? 'selected' : '' }}>إيجار</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>صف حالة الأسرة/مريض إن وجد </label>
                            <textarea name="bio" id="" cols="60" rows="5" class="form-control" placeholder="حال الأسرة"> {{ old('bio',$parent->bio) }}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-success">تحديث بيانات ولي الأمر</button>


                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection



























{{-- @extends('students.master')

@section('title','تعديل بيانات الوالد')

@section('content')
<div class="container text-right">
    <h2 class="mt-5 mb-3">تعديل بيانات الوالد </h2>
    <div class="row">
        <form action="{{ route('student.parent.update',$parent->id) }}" method="POST" >
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>اسم الأب</label>
                        <input type="text" name="name" placeholder="اسم الأب" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name',$parent->name) }}"
                        />
                        @error('name')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>رقم الجوال</label>
                        <input type="text" name="phone" placeholder="رقم الجوال" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone',$parent->phone)}}"
                        />
                        @error('phone')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>رقم الهوية</label>
                        <input type="text" name="id_number" placeholder="رقم الهوية" class="form-control @error('id_number') is-invalid @enderror"
                        value="{{ old('id_number',$parent->id_number) }}"
                        />
                        @error('id_number')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>المهنة</label>
                        <input type="text" name="jobs" placeholder="المهنة"  class="form-control @error('jobs') is-invalid @enderror"
                        value="{{ old('jobs',$parent->jobs) }}"
                        />
                        @error('jobs')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>نوع السكن</label>
                        <select name="live" class="form-control">
                            <option value="" disabled >اختر نوع السكن</option>
                            <option value="ملك" {{ $parent->live === 'ملك' ? 'selected' : '' }}>ملك</option>
                            <option value="إيجار" {{ $parent->live === 'إيجار' ? 'selected' : '' }}>إيجار</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label>صف حالة الأسرة/مريض إن وجد </label>
                    <textarea name="bio" id="" cols="60" rows="5" class="form-control" placeholder="حال الأسرة"> {{ old('bio',$parent->bio) }}</textarea>
                </div>
            </div>

            </div>

            <button class="btn btn-success">تعديل الوالد</button>

        </form>
</div>




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



@endsection --}}
