@extends('admins.layouts.master')
@section('css')
@endsection
@section('title','تعديل الحلقة')

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الحلقات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل الحلقة</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.circle.update',$circle->id) }} " method="POST">
            @csrf
            @method('PUT')

            <div class="container">
                <div class="row mb-3">
                    <div class="col-4">
                        <label>اسم الحلقة</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$circle->name) }}">
                        @error('name')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label>المرحلة</label>
                        <select name="stage_id" class="form-control @error('stage_id') is-invalid @enderror" value="{{ old('stage_id') }}"">
                            {{-- <option selected disabled> --إختار المرحلة الدراسية--</option> --}}
                            @foreach ($stages as $stage )
                            <option @selected($circle->stage_id ==$stage->id) value="{{ $stage->id }}">{{ $stage->name }}</option>
                            @endforeach
                        </select>

                    </div>


            </div>
            <button class="btn-sm btn-primary ">  تعديل الحلقة</button>
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
