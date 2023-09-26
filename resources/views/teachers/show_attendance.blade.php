@extends('teachers.layouts.master')

<title>
    عرض الحضور والغياب
</title>
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">للطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض الحضور والغياب</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table " style="font-size: 20px" id="example">
											<tr>
												<th class="">#</th>
												<th class=" ">اسم الطالب</th>
												<th class=" ">عرض الحضور والغياب</th>
											</tr>
										<tbody>
                                            @foreach($students as $index => $student)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>
                                                    <a href="{{ route('teacher.showStudentAttendanceDetails', ['student_id' => $student->id]) }}" class="btn btn-info">عرض الحضور  والغياب </a>

                                                </td>
                                                <!-- تضيف المزيد من البيانات حسب احتياجك -->
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
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
