@extends('admins.layouts.master')
@section('css')
@endsection
@section('title','إضافة محفظ')

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المحفظين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة محفظ</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <form action="{{ route('admin.teacher.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>اسم المحفظ</label>
                            <input type="text" name="name" placeholder="اسم المحفظ" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            />
                            @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>رقم المحفظ </label>
                            <input type="tel" name="number" placeholder="رقم المحفظ " class="form-control @error('number') is-invalid @enderror"
                            value="{{ old('number') }}"
                            />
                            @error('number')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>كلمة المرور</label>
                            <input type="password" name="password" placeholder="كلمة المرور" class="form-control @error('password') is-invalid @enderror"
                            value="{{ old('password')}}"
                            />
                            @error('password')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label>رقم الجوال</label>
                            <input type="text" name="phone" placeholder="رقم الجوال" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone')}}"
                            />
                            @error('phone')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>البريد الإلكتروني</label>
                            <input type="email" name="email" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            />
                            @error('email')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>المرحلة</label>
                            <select name="stage_id" id="stage_id" required class="form-select">
                                <option value="" disabled selected>اختر المرحلة</option>
                                @foreach($stages as $stage)
                                    <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="circle_id">الحلقة:</label>
                            <select name="circle_id" id="circle_id" required class="form-select">
                                <option value="" disabled selected>اختر الحلقة</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="course_ids">الدورات:</label>
                            @foreach($courses as $course)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="course_ids[]" id="course_{{ $course->id }}" value="{{ $course->id }}">
                                <label class="form-check-label" for="course_{{ $course->id }}">
                                    {{ $course->name }}
                                </label>
                            </div>
                        @endforeach
                        </div>

                    </div>


                </div>

                <button class="btn btn-success">اضافة محفظ</button>

            </form>
        </div>
    </div>
  </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#stage_id').change(function () {
            var stageId = $(this).val();
            $.ajax({
                url: "{{ route('admin.get.circles') }}",
                method: "GET",
                data: {stage_id: stageId},
                success: function (response) {
                    var options = '<option value="" disabled selected>اختر الحلقة</option>';
                    $.each(response, function (index, circle) {
                        options += '<option value="' + circle.id + '">' + circle.name + '</option>';
                    });
                    $('#circle_id').html(options);
                }
            });
        });
    });
</script>



@endsection
