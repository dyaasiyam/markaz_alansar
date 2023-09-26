@extends('teachers.layouts.master')
<title>
    تفاصيل حضور وغياب الطالب: {{ $student->name }}

</title>

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">عرض حضور وغياب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الطالب-/{{ $student->name }}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
                        

                        <h2>تفاصيل حضور وغياب الطالب: {{ $student->name }}</h2>
						<div class="card">

							<div class="card-body">

								<div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اليوم</th>
                                                <th>تاريخ</th>
                                                <th>الحالة</th>
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
                                    {{ $attendanceData->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
