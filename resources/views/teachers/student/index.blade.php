@extends('teachers.layouts.master   ')
<title>@yield('title', 'جميع الطلاب')</title>

@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جميع الطلاب</span>
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
												<th class="">رقم تواصل</th>
												<th class="">عدد أجزاء الحفظ</th>
												<th class="">اختبارات مجتمعة</th>
												<th class="">اختبارات منفردة</th>
											</tr>
										<tbody>
                                            @foreach($students as $index => $student)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->parent->phone }}</td>
                                                <td>{{ $student->parts }}</td>
                                                <td>{{ $student->exams }}</td>
                                                <td>{{ $student->exam }}</td>
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
@section('js')
@endsection
