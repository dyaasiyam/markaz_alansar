@extends('students.layouts.master')
@section('css')

@section('title')
    عرض الحضور والغياب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض الحضور والغياب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">عرض</a></li>
                <li class="breadcrumb-item active">الحضور والغياب</li>
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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اليوم</th>
                                <th>تاريخ</th>
                                <th>حاضر/غائب/مأذون</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendanceData as $index => $attendance)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{$attendance->created_at->translatedFormat('l', 'ar') }}</td>
                                    <td>{{ $attendance->date }}</td>
                                    <td>
                                        @if($attendance->status === 'حضور')
                                            <span style="color: rgb(32, 188, 32);">حاضر</span>
                                        @elseif($attendance->status === 'غياب')
                                            <span style="color: rgb(255, 0, 0);">غائب</span>
                                        @elseif($attendance->status === 'مأذون')
                                            <span style="color: rgb(61, 40, 222);">مأذون</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
























