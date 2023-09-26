@extends('admins.layouts.master')
@section('css')
@endsection
@section('title','تعديل المرحلة')

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المراحل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل المراحل</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.stage.update',$stage->id) }} " method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="stage_id" id="{{ $stage->id }}">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-4">
                        <label >اسم المرحلة</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$stage->name) }}">
                          @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                    </div>
                    <div class="col-4">
                        <label >أمير المرحلة</label>
                        <input type="text" name="name_teacher" class="form-control @error('name_teacher') is-invalid @enderror" value="{{ old('name_teacher',$stage->name_teacher) }}">
                        @error('name_teacher')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button class="btn-sm btn-primary ">  تعديل المرحلة</button>
            </div>
            </form>

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















