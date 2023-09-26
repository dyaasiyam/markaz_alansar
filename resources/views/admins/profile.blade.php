@extends('admins.master')
@section('title','الاعدادات الشخصية')
@section('content')
<h1 class="h3 mb-4 text-gray-800">المعلومات الشخصية</h1>
<form action="{{ route('admin.admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>الاسم</label>
                <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror"
                value="{{ Auth::user()->name }}"
                />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label>رقم الإداري</label>
                <input type="number" disabled name="number" placeholder="number" class="form-control @error('number') is-invalid @enderror"
                value="{{ Auth::user()->number }}"
                />
                @error('number')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="">صورة:</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                <!-- يتم تعديل هذا العنصر لعرض الصورة المُحدثة -->
                <img id="previewImage" width="250" src="{{ asset('images/'.Auth::user()->image) }}" alt="">
                @error('image')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <a style="margin-top: 30px" class="btn btn-danger text-white" href="{{ route('admin.profile_password') }}">تغيير كلمة المرور</a>
        </div>

    </div>

    <button class="btn btn-success">حفظ البيانات</button>

</form>
@endsection
@section('js')
    <!-- يتم تعديل الجزء الخاص بالجافا سكريبت لعرض الصورة المحدثة -->
    <!-- يتم تعديل الجزء الخاص بالجافا سكريبت لعرض الصورة المحدثة -->
    <script>
        const imageInput = document.getElementById('image');
        const previewImage = document.getElementById('previewImage');

        imageInput.addEventListener('change', function() {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function() {
                    previewImage.src = reader.result;
                }

                reader.readAsDataURL(file);
            } else {
                // إذا تم تحديد ملف الصورة كفارغ، يمكنك عرض صورة افتراضية هنا
                // بمجرد أن يُختار ملف صورة جديد، سيتم عرض الصورة المحدثة بدلاً من هذه الصورة الافتراضية
                previewImage.src = "{{ asset('images/'.Auth::user()->image) }}";
            }
        });
    </script>
@endsection
