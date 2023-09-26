@extends('admins.master')
@section('title','جميع الطلاب')

@section('content')


<!-- Page Heading -->

<div class="container">
<h1 class="h3 mb-4 text-gray-800">جميع الطلاب</h1>
<hr>
<table class="table ">

    <form action="{{ route('admin.student.index') }}" method="GET">
        <div class="form-group">
            <label for="stage_id">اختر المرحلة:</label>
            <select name="stage_id" class="form-control">
                <option value="">الكل</option>
                @foreach ($stages as $stage)
                    <option value="{{ $stage->id }}" {{ request('stage_id') == $stage->id ? 'selected' : '' }}>{{ $stage->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">تطبيق الفلتر</button>
    </form>

    <tr>
        <th>#</th>
        <th>اسم الطالب</th>
        <th>رقم الطالب</th>
        <th>صورة الطالب</th>
        <th>عرض التفاصيل</th>
        <th>العمليات</th></th>
    </tr>
    @forelse ($students as $student )
    <tr>
        <td>{{ $loop->iteration    }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->number}}</td>
        <td>
            @if ($student)
                    @if ($student->image)
                        <img src="{{ asset('images/' . $student->image) }}" alt="user-img" width="136"
                            class="img-profile rounded-circle">
                    @else
                       <img src="https://ui-avatars.com/api/?background=random&name={{ $student->number }}" alt="user-img" width="136"
                          class="img-profile rounded-circle">
                   @endif
            @endif
          </td>
        <td>
            <a href="{{ route('admin.student.show',$student->id) }}">عرض التفاصيل</a>
        </td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.student.edit',$student->id) }}"> <i class="fas fa-edit"></i></a>
            <form class="d-inline" id="deleteForm" action="{{ route('admin.student.destroy', $student->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="deletName(event, '{{ $student->name }}')"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>

    @empty


    @endforelse

</table>
{{ $students->links() }}


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
