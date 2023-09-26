@extends('admins.master')
@section('title','تعديل محفظ')

@section('content')


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">تعديل محفظ</h1>

<div class="container">
    <form action="{{ route('admin.teacher.update',$teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>اسم المحفظ</label>
                    <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name',$teacher->name ) }}"
                    />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label>رقم المحغظ</label>
                    <input type="number" disabled name="number" placeholder="رقم المحغظ" class="form-control @error('number') is-invalid @enderror"
                    value="{{ old('number',$teacher->number) }}"
                    />
                    @error('number')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="mb-3">
                    <label>رقم الجوال</label>
                    <input type="text" name="phone" placeholder="رقم الجوال" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone',$teacher->phone)}}"
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
                    value="{{ old('id_number',$teacher->id_number) }}"
                    />
                    @error('id_number')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="mb-3">
                    <label>المرحلة</label>
                    <select name="stage_id" id="stage_id" required class="form-select">
                        <option value="" disabled selected>اختر المرحلة</option>
                        @foreach($stages as $stage)
                            <option value="{{ $stage->id }}" {{ old('stage_id', $teacher->stage_id) == $stage->id ? 'selected' : '' }}>{{ $stage->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="circle_id">الحلقة:</label>
                    <select name="circle_id" id="circle_id" required class="form-select">
                        <option value="" disabled selected>اختر الحلقة</option>
                        @foreach($circles as $circle)
                            <option value="{{ $circle->id }}" {{ old('circle_id', $teacher->circle_id) == $circle->id ? 'selected' : '' }}>{{ $circle->name }}</option>
                        @endforeach
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

        <button class="btn btn-success">تعديل المحفظ</button>

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



@endsection
