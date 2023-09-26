@extends('admins.master')
@section('title','جميع المحفظين')

@section('content')


<!-- Page Heading -->

<div class="container">
<h1 class="h3 mb-4 text-gray-800">جميع المحفظين</h1>
<hr>
<table class="table ">
    <tr>
        <th>#</th>
        <th>اسم المحفظ</th>
        <th>رقم المحفظ</th>
        <th>صورة</th>
        <th>عرض التفاصيل</th>
        <th>العمليات</th></th>
    </tr>
    @forelse ($teachers as $teacher )
    <tr>
        <td>{{ $loop->iteration    }}</td>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->number}}</td>
        <td>
            @if ($teacher)
            @if ($teacher->image)
                <img src="{{ asset('images/' . $teacher->image) }}" alt="user-img" width="136"
                    class="img-profile rounded-circle">
            @else
                <img src="https://ui-avatars.com/api/?background=random&name={{ $teacher->name }}" alt="user-img" width="136"
                    class="img-profile rounded-circle">
            @endif
        @endif

        </td>
        <td>
            <a href="{{ route('admin.teacher.show',$teacher->id) }}">عرض التفاصيل</a>
        </td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.teacher.edit',$teacher->id) }}"> <i class="fas fa-edit"></i></a>
            <form class="d-inline" id="deleteForm" action="{{ route('admin.teacher.destroy', $teacher->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="deletName(event, '{{ $teacher->name }}')"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>

    @empty

    @endforelse
</table>

</div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    function deletName(e, Name) {
        e.preventDefault(); // منع تقديم النموذج تلقائيًا

        Swal.fire({
            title: 'هل أنت متأكد من حذف?',
            text: 'تأكيد حذف المحفظ "' + Name + '".',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit(); // قم بتقديم النموذج يدويًا بعد التأكيد
            }
        });
    }
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


@endsection
