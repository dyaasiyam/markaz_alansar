@extends('admins.layouts.master')
@section('css')
@endsection
@section('title','الدورات')

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الدورات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الدورات</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.course.store') }} " method="POST">
            @csrf
            <div class="container">
                <div class="row mb-3">
                    <div class="col-4">
                        <label >اسم الدورة</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                          @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                    </div>
                </div>
                <button class="btn-sm btn-danger "> إضافة دورة</button>
            </div>
            </form>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الدورة</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration    }}</td>
                        <td>{{ $course->name }}</td>
                        <td>
                            <form class="d-inline" id="deleteForm" action="{{ route('admin.course.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" onclick="deletName(event, '{{ $course->name }}')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan='5' class="text-center"> لاتوجد بيانات</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
            {{ $courses->links() }}
                </div>
  </div>
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

