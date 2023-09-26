@extends('admins.master')
@section('title','إضافة طالب')

@section('content')


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">إضافة طالب</h1>
<div class="container">
    <form action="{{ route('admin.student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>اسم الطالب</label>
                    <input type="text" name="name" placeholder="اسم الطالب" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label>رقم الطالب</label>
                    <input type="tel" name="number" placeholder="رقم الطالب" class="form-control @error('number') is-invalid @enderror"
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


            <div class="col-md-6">
                <div class="mb-3">
                    <label>إختبارت مجتمعة</label>
                    <input type="number" name="exams" placeholder="إختبارت مجتمعة" class="form-control @error('exams') is-invalid @enderror"
                    value="{{ old('exams') }}"
                    />
                    @error('exams')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label>إختبارت منفردة</label>
                    <input type="number" name="exam" placeholder="إختبارت منفردة" class="form-control @error('exam') is-invalid @enderror"
                    value="{{ old('exam') }}"
                    />
                    @error('exam')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label>عدد أجزاء الحفظ</label>
                    <input type="number" name="parts" placeholder="عدد أجزاء الحفظ" class="form-control @error('parts') is-invalid @enderror"
                    value="{{ old('parts') }}"
                    />
                    @error('parts')
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
                    <label for="paren_idt">أولياء الأمور:</label>
                    <select class="form-select" name="parent_id" id="parent_id">
                        <option value="" disabled selected>اختر ولي أمر</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="teacher_id">محفظ الطالب:</label>
                    <select class="form-select" name="teacher_id" id="teacher_id">
                        <option value="" disabled selected>اختر معلم</option>
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

        <button class="btn btn-success">اضافة طالب</button>

    </form>
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
<script>
    $(document).ready(function () {
        $('#stage_id, #circle_id').change(function () {
            var stageId = $('#stage_id').val();
            var circleId = $('#circle_id').val();

            $.ajax({
                url: '{{ route('admin.admin.getTeachers') }}',
                method: 'GET',
                data: {
                    stage_id: stageId,
                    circle_id: circleId
                },
                success: function (data) {
                    var teachersSelect = $('#teacher_id');
                    teachersSelect.empty();
                    teachersSelect.append('<option value="" disabled selected>اختر معلم</option>');

                    data.forEach(function (teacher) {
                        teachersSelect.append('<option value="' + teacher.id + '">' + teacher.name + '</option>');
                    });
                }
            });
        });
    });
</script>





@endsection
