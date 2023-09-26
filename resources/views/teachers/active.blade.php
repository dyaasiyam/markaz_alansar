@extends('teachers.layouts.master')
@section('css')
@endsection
<title>إضافة نشاط</title>
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الأنشطة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة نشاط</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">

                    <div class="col-xl-12">
                        <div class="card mt-5 mb-5 ">
                            <div class="card-body">
                                <form action="{{ route('teacher.active.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                 <div class="row">
                                    <div class="col-md-6">
                                        <label for="title">عنوان النشاط</label>
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="description">وصف النشاط</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="image">صورة النشاط</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                        <img id="imagePreview" src="#" alt="Preview Image" style="display: none; max-width: 300px; margin-top: 10px;">
                                    </div>


                                    <div class="col-md-6">
                                        <label for="images">صور إضافية</label>
                                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                                        <div id="imagesPreview" style="display: flex; flex-wrap: wrap;"></div>
                                    </div>

                                 </div>

                                    <button type="submit" class="btn btn-primary">إضافة النشاط</button>
                                </form>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>عنوان النشاط</th>
                                            <th>وصف النشاط</th>
                                            <th>صورة النشاط</th>
                                            <th>صور إضافية</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($actives as $active)
                                        <tr>
                                            <td>{{ $active->title }}</td>
                                            <td>{{ $active->description }}</td>
                                            <td>
                                                <a href="{{ route('admin.active.show', $active->id) }}">
                                                    <img src="{{ asset('storage/' . $active->image) }}" alt="{{ $active->title }}" width="100">
                                                </a>
                                            </td>

                                            <td>
                                                @foreach ($active->images as $image)
                                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $active->title }}" width="50">
                                                @endforeach
                                            </td>
                                            <td>
                                                {{-- <a class="btn btn-sm btn-primary" href="{{ route('admin.active.edit',$active->id) }}"> <i class="fas fa-edit"></i></a> --}}
                                                <form class="d-inline" id="deleteForm" action="{{ route('admin.active.destroy', $active->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" onclick="deletName(event, '{{ $active->name }}')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                        <!-- اعرض تفاصيل النشاط هنا -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script>
    document.getElementById('images').addEventListener('change', function (event) {
        const images = event.target.files;

        const imagesPreview = document.getElementById('imagesPreview');
        imagesPreview.innerHTML = ''; // حذف أي معاينة سابقة

        for (const image of images) {
            const imgPreview = document.createElement('img');
            imgPreview.src = URL.createObjectURL(image);
            imgPreview.alt = 'Preview Image';
            imgPreview.style.maxWidth = '150px';
            imgPreview.style.marginRight = '10px';
            imgPreview.style.marginBottom = '10px';
            imagesPreview.appendChild(imgPreview);
        }
    });
</script>
<script>
    document.getElementById('image').addEventListener('change', function (event) {
    const image = event.target.files[0];

    if (image) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.style.display = 'block';

        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(image);
    } else {
        document.getElementById('imagePreview').style.display = 'none';
    }
});

</script>

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
<script>
    function deletName(e, Name) {
        e.preventDefault(); // منع تقديم النموذج تلقائيًا

        Swal.fire({
            title: 'هل أنت متأكد?',
            text: 'هل أنت متأكد من حذف النشاط',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit(); // قم بتقديم النموذج يدويًا بعد التأكيد
            }
        });
    }
</script>
@endsection
