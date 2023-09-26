@extends('teachers.layouts.master')
@section('css')
@endsection
<title>
    إختبارت
</title>
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الاختبارت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاختبارات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->

@endsection
@section('content')

				<!-- row -->
    <div class="col-xl-12">
        <div class="card mt-5 mb-5 ">
            <form action="{{ route('teacher.exam.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="user_id">اسم الطالب</label>
                                <select name="user_id" class="form-control">
                                    <option value="" selected disabled>اختار...</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exam_name">الإختبار</label>
                                <input type="text" name="exam_name" id="exam_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="score">العلامة</label>
                                <input type="number" name="score" id="score" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="score">راسب/ناجح</label>
                                <select name="status" class="form-control">
                                    <option disabled selected>--إختيار النجاح والرسوب</option>
                                    <option value="ناجح">ناجح</option>
                                    <option value="راسب">راسب</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة اختبار</button>
                </div>
            </form>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>اسم الطالب</th>
                    <th>الاختبار</th>
                    <th>العلامة</th>
                    <th>ناجح/راسب</th>
                    <th>العمليات</th>
                </tr>
                @forelse ( $exams as $index => $exaam )
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $exaam->user->name }}</td>
                    <td>{{ $exaam->exam_name }}</td>
                    <td style="color: {{ $exaam->status == 'راسب' ? 'red' : 'green' }};">
                        %{{ $exaam->score }}
                    </td>
                    <td style="color: {{ $exaam->status == 'راسب' ? 'red' : 'green' }};">
                        {{ $exaam->status }}
                    </td>

                    <td>
                        <form class="d-inline" id="deleteForm" action="{{ route('teacher.exam.destroy', $exaam->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="deletName(event, '{{ $exaam->name }}')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <!-- تضيف المزيد من البيانات حسب احتياجك -->
                </tr>


                @empty
                <tr>
                    <td colspan="5" class="text-center">لاتوجد علامات </td>
                </tr>

                @endforelse($exams as $index => $exaam)

            </table>
            {{ $exams->links() }}


        </div>
    </div>

				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
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
