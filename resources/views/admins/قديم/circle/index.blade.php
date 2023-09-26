@extends('admins.master')
@section('title','الحلقات')
@section('content')
<h1 class="h3 mb-4 text-gray-800">إضافة حلقة جديدة</h1>
<hr>
<form action="{{ route('admin.circle.store') }} " method="POST">
@csrf
<div class="container">
    <div class="row mb-3">
        <div class="col-4">
            <label>اسم الحلقة</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-4">
            <label>المرحلة</label>
            <select name="stage_id" class="form-control @error('stage_id') is-invalid @enderror" value="{{ old('stage_id') }}"">
                <option selected disabled> --إختار المرحلة الدراسية--</option>
                @foreach ($stages as $stage )
                <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                @endforeach
            </select>

        </div>


</div>
<button class="btn-sm btn-danger "> إضافة حلقة</button>
</div>
</form>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم الحلقة</th>
            <th>المرحلة </th>
            <th>أمير المرحلة</th>
            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($circles as $circle)
        <tr>
            <td>{{ $loop->iteration    }}</td>
            <td>{{ $circle->name }}</td>
            <td>{{ $circle->stage->name}}</td>
            <td>{{ $circle->stage->name_teacher}}</td>

            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.circle.edit',$circle->id) }}"> <i class="fas fa-edit"></i></a>
                <form class="d-inline" id="deleteForm" action="{{ route('admin.circle.destroy', $circle->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="deletName(event, '{{ $circle->name }}')"><i class="fas fa-trash"></i></button>
                </form>
            </td>

        </tr>
        @empty
     <tr>
        <td colspan="5" class="text-center">لاتوجد بيانات</td>
     </tr>

        @endforelse
    </tbody>
</table>
{{ $circles->links() }}


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
