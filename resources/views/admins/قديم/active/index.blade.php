@extends('admins.master')
@section('title','أنشطة المحفظين')
@section('content')
<h1 class="h3 mb-4 text-gray-800">أنشطة المحفظين</h1>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>#</th>

            <th>اسم المحفظ</th>
            <th>عنوان النشاط</th>
            <th>صورة النشاط</th>
            <th>عرض النشاط</th>
            <th>حالة النشاط</th>
            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>{{ $activity->teacher->name }}</td>
            <td>{{ $activity->title }}</td>
            <td>
                    <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" width="100">
                </td>

            <td>
                <a href="{{ route('admin.active.show', $activity->id) }}">
                    عرض النشاط
                </a>
            </td>
            <td>
                <p style="background-color: {{ $activity->status === 'مرفوض' ? 'red' : ($activity->status === 'مقبول' ? 'green' : 'transparent') }}; display: inline-block; color: white;">
                    {{ $activity->status }}
                </p>


            </td>
            <td>
                <a href="{{ route('admin.activity.accept', $activity->id) }}" class="btn btn-sm btn-success">
                    <i class="fas fa-check"></i>
                </a>
                <a href="{{ route('admin.activity.reject', $activity->id) }}" class="btn btn-sm btn-danger">
                    <i class="fas fa-times"></i>
                </a>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
{{ $activities->links() }}






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
