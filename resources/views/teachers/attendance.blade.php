@extends('teachers.layouts.master')
<title>
    أخذ الحضور والغياب
</title>

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
                            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">أخذ الحضور والغياب - {{ now()->toDateString() }} ({{ now()->translatedFormat('l', 'ar') }})</h2>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection

@section('content')
<div class="row">
    @if(session('alert'))
<div class="alert alert-warning">
    {{ session('alert') }}
</div>
@endif

    <div class="col-xl-12">
        <div class="card mt-5 mb-5 ">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('teacher.record-attendance') }}" method="post">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>اسم الطالب</th>
                                    <th>الحضور</th>
                                    <th>الغياب</th>
                                    <th>مأذون</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>
                                            <input type="radio" name="status[{{ $student->id }}]" value="حضور">
                                        </td>
                                        <td>
                                            <input type="radio" name="status[{{ $student->id }}]" value="غياب">
                                        </td>
                                        <td>
                                            <input type="radio" name="status[{{ $student->id }}]" value="مأذون">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">أخذ الحضور والغياب</button>
                    </form>
                </div>
            </div>
        </div>
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


@endsection
