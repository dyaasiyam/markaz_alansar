@extends('admins.master')
@section('title','المراحل')
@section('content')
<h1 class="h3 mb-4 text-gray-800">إضافة مرحلة جديدة</h1>
<hr>
<form action="{{ route('admin.stage.store') }} " method="POST">
@csrf
<div class="container">
    <div class="row mb-3">
        <div class="col-4">
            <label >اسم المرحلة</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
              @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
        </div>
        <div class="col-4">
            <label >أمير المرحلة</label>
            <input type="text" name="name_teacher" class="form-control @error('name_teacher') is-invalid @enderror" value="{{ old('name_teacher') }}">
            @error('name_teacher')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <button class="btn-sm btn-primary "> إضافة مرحلة</button>
</div>
</form>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم المرحلة</th>
            <th>أمير المرحلة</th>
            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($stages as $stage)
        <tr>
            <td>{{ $loop->iteration    }}</td>
            <td>{{ $stage->name }}</td>
            <td>{{ $stage->name_teacher}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.stage.edit',$stage->id) }}"> <i class="fas fa-edit"></i></a>
                <form class="d-inline" id="deleteForm" action="{{ route('admin.stage.destroy', $stage->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="deletName(event, '{{ $stage->name }}')"><i class="fas fa-trash"></i></button>
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td colspan='5' class="text-center" > لاتوجد بيانات</td>
        </tr>

        @endforelse
    </tbody>
</table>
{{ $stages->links() }}



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
<script>
    function deletName(e, Name) {
        e.preventDefault(); // منع تقديم النموذج تلقائيًا

        Swal.fire({
            title: 'هل أنت متأكد?',
            text: 'هل أنت متأكد من حذف "' + Name + '".',
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
