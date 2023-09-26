@extends('admins.layouts.master')
@section('title','قائمة المحفظين')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('th/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('th/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('th/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('th/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('th/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('th/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المحفظين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المحفظين</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">اسم المحفظ</th>
                                    <th class="wd-15p border-bottom-0">رقم المحفظ</th>
                                    <th class="wd-15p border-bottom-0">المرحلة</th>
                                    <th class="wd-15p border-bottom-0">الحلقة</th>
                                    <th class="wd-15p border-bottom-0">عرض التفاصيل</th>
                                    <th class="wd-15p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teachers as $teacher )
                                <tr>
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->number }}</td>
                                    <td>{{ $teacher->stage->name }}</td>
                                    <td>{{ $teacher->circle->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.teacher.show',$teacher->id) }}">عرض التفاصيل</a>
                                    </td>                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.teacher.edit', $teacher->id) }}"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{ route('admin.teacher.destroy', $teacher->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                        </table>
                    </div>
                    </div>
                  </div>
				<!-- row closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('th/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('th/assets/js/table-data.js')}}"></script>
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
