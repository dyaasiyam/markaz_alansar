@extends('students.layouts.master')
@section('css')

@section('title')
    كشف درجات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> كشف درجات الطالب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">كشف</a></li>
                <li class="breadcrumb-item active">درجات الطالب</li>
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
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>الاختبار</th>
                        <th>العلامة</th>
                        <th>ناجح/راسب</th>
                    </tr>
                    @forelse ( $exams as $index => $exaam )
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $exaam->exam_name }}</td>
                        <td style="color: {{ $exaam->status == 'راسب' ? 'red' : 'green' }};">
                            %{{ $exaam->score }}
                        </td>
                        <td style="color: {{ $exaam->status == 'راسب' ? 'red' : 'green' }};">
                            {{ $exaam->status }}
                        </td>
                        <!-- تضيف المزيد من البيانات حسب احتياجك -->
                    </tr>


                    @empty
                    <tr>
                        <td colspan="5" class="text-center">لاتوجد علامات </td>
                    </tr>

                    @endforelse($exams as $index => $exaam)

                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection





{{-- @extends('students.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 mt-5">
            <h2 class="text-right">إختبارات الطالب</h2>
            <div class="card">
                <div class="card-body text-right">
                        <table class="table">
                                <tr>
                                    <th>اسم الاختبار</th>
                                    <th>تاريخ الإختبار</th>
                                    <th>علامة الاختبار</th>
                                </tr>
                                @forelse ( $exams as  $exam )
                                <tr>
                                    <td>{{ $exam->exam_name }}</td>
                                    <td>{{ $exam->created_at->format('Y-m-d') }}</td>
                                    <td style="color: {{ $exam->score < 50 ? 'red' : 'green' }};">
                                        %{{ $exam->score }}
                                    </td>
                                    <!-- تضيف المزيد من البيانات حسب احتياجك -->
                                </tr>


                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">لاتوجد علامات </td>
                                </tr>

                                @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 --}}



