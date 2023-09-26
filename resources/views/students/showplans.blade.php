@extends('students.layouts.master')
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

@section('title')
    خطة الطالب
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الخطة الشهريه للطالب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">الخطة</a></li>
                <li class="breadcrumb-item active">عرض الخطة الشهرية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <p> <strong class="text-danger">ملاحظة:</strong>الخطة الشهرية للطالب اذا لون <span class="text-success">اخضر</span> تم انجاز الخطة لون <span class="text-danger">أحمر</span> لم يتم انجاز الخطة </p>
                <table class="table text-center">
                   <div class="container">
                    <th>خطة شهر</th>
                    <th>عرض الخطة</th>
                @forelse ( $plans as $index => $plan )
                <tr class="{{ $plan->status == 1 ? 'success' : ($plan->status == 2 ? 'danger' : ($plan->status == 3 ? 'blow' : '')) }}">
                    <td>{{ $plan->month }}</td>
                    <td>
                        <a href="{{ route('student.student.plan.show', ['id' => $plan->id]) }}" class="btn btn-sm btn-info">
                            <i class="fa fa-eye"></i> عرض الخطة
                        </a>
                    </td>

                    <!-- تضيف المزيد من البيانات حسب احتياجك -->
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">لاتوجد خطط </td>
                </tr>
                @endforelse($exams as $index => $plan)
                   </div>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
