@extends('teachers.layouts.master')

<title>
    الخطة
</title>

@section('css')
<style>
    tr.success {
    background: #bcffb3;
}

tr.danger {
    background: #ffc2c2;
}
tr.blow {
    background: #c2d7ff;
}

</style>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الخطة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الخطة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-xl-12">
                        <div class="card mt-5 mb-5 ">
                            <form action="{{ route('teacher.plans.store') }}" method="POST">
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
                                                <label for="exam_name">خطة عن شهر</label>
                                                <select name="month" class="form-control w-25" >
                                                    <option selected disabled>--إختار الشهر--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr class="w-100">

                                     <div class="col-lg-12">
                                        <br>
                                        <h3>خطة الحفظ </h3>
                                     </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="to">من صفحة</label>
                                                <input type="number" name="to" id="to" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="for">إلى صفحة</label>
                                                <input type="number" name="for" id="for" class="form-control">
                                            </div>
                                        </div>
                                        <hr class="w-100">
                                        <div class="col-lg-12">
                                            <br>
                                            <h3>خطة المراجعة </h3>
                                         </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="to_r">من صفحة</label>
                                                    <input type="number" name="to_r" id="to_r" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="for_r">إلى صفحة</label>
                                                    <input type="number" name="for_r" id="for_r" class="form-control">
                                                </div>
                                            </div>
                                            <hr class="w-100">

                                        <div class="container">
                                            <label for="">الدورات:</label>

                                            <div class="row">

                                                @foreach($courses as $course)
                                                <label for="course_{{ $course->id }}"></label>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="course_ids[]" id="course_{{ $course->id }}" value="{{ $course->id }}">
                                                            <label class="form-check-label" for="course_{{ $course->id }}">
                                                                {{ $course->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($loop->iteration % 4 == 0)
                                                </div>
                                                <div class="row">
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary">إضافة خطة</button>
                                </div>
                            </form>
                            <table class="table">
                                    <th>#</th>
                                    <th>اسم الطالب</th>
                                    <th>خطة شهر</th>
                                    <th>تفاصيل الخطة</th>
                                    <th>العمليات</th>
                                @forelse ( $plans as $index => $plan )
                                <tr class="{{ $plan->status == 1 ? 'success' : ($plan->status == 2 ? 'danger' : ($plan->status == 3 ? 'blow' : '')) }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $plan->user->name }}

                                        {{-- @if ($plan->student)
                                            {{ $plan->student->name }}
                                        @else
                                            غير متوفر
                                        @endif --}}
                                    </td>
                                     <td>{{ $plan->month }}</td>
                                     <td>
                                        <a href="{{ route('teacher.plans.edit', $plan->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> عرض الخطة
                                        </a>
                                     </td>

                                    <td>
                                        <a href="{{ route('teacher.plan_status', [$plan->id, 1]) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="{{ route('teacher.plan_status', [$plan->id, 2]) }}" class="btn btn-sm btn-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                        <a href="{{ route('teacher.plan_status', [$plan->id, 3]) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-question"></i>
                                        </a>
                                    </td>
                                    <!-- تضيف المزيد من البيانات حسب احتياجك -->
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">لاتوجد خطط </td>
                                </tr>
                                @endforelse($exams as $index => $plan)
                            </table>


                        </div>
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





@endsection
