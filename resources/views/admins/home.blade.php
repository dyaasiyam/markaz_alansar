@extends('admins.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('th/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('th/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بك ! {{ Auth::user()->name }}</h2>
						  <p class="mg-b-0"> الرقم الإداري {{ Auth::user()->number }}</p>
						</div>
					</div>
					{{-- <div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">عدد طلاب المركز</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div> --}}
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')

				<div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">عدد طلاب المركز</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">{{ $stu }}<span class="text-success tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">طلاب مركز الأنصار</p>
									</div>
									<div class="card-chart bg-primary-transparent brround mr-auto mt-0">
										<i class="typcn typcn-group-outline text-primary tx-24"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-primary wd-{{ $stu }}" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">نسبة الطلاب<span class="float-left text-muted">{{ $stu }}%</span></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3"> إجمالي محفظين المركز</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">{{ $th }}<span class="text-danger tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">عدد محفظين المركز</p>
									</div>
									<div class="card-chart bg-pink-transparent brround mr-auto mt-0">
										<i class="typcn typcn-group-outline text-danger tx-24"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-pink wd-{{ $th }}" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">إجمالي محفظين المركز<span class="float-left text-muted">{{ $th }}%</span></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">إجمالي مراحل التحفيظ</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1   font-weight-bold">{{ $st }}<span class="text-success tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">إجمالي مراحل التحفيظ</p>
									</div>
									<div class="card-chart bg-teal-transparent brround mr-auto mt-0">
										<i class="typcn typcn-chart-bar-outline text-teal tx-20"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-teal wd-{{ $st }}" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">إجمالي مراكز التحفيظ<span class="float-left text-muted">{{ $st }}%</span></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">حلقات التحفيظ</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">{{ $ci }}<span class="text-success tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">إجمالي عدد حلقات التحفيظ</p>
									</div>
									<div class="card-chart bg-purple-transparent brround mr-auto mt-0">
										<i class="typcn typcn-time  text-purple tx-24"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-purple wd-{{ $ci }}" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">نسبة حلقات التحفيظ<span class="float-left text-muted">{{ $ci }}%</span></small>
							</div>
						</div>
					</div>
				</div>
                <div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">أنشطة المحفظين</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">{{ $ac }}<span class="text-success tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">نسبة إجمالي أنشطة المحفظين</p>
									</div>
									<div class="card-chart bg-primary-transparent brround mr-auto mt-0">
                                        <i class="typcn typcn-chart-line-outline text-primary tx-24"></i>

									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-primary wd-{{ $ac }}" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">إجمالي أنشطة المحفظين<span class="float-left text-muted">{{ $ac }}%</span></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">قسم الدورات</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">{{ $co }}<span class="text-danger tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">عدد دورات قسم السنة والقراءات</p>
									</div>
									<div class="card-chart bg-pink-transparent brround mr-auto mt-0">
										<i class="typcn typcn-chart-line-outline text-pink tx-24"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-pink wd-{{ $co }}" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">نسبة الدورات والسنة<span class="float-left text-muted">{{ $co }}%</span></small>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">أولياء الأمور</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">{{ $pa }}<span class="text-success tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">أولياء الأمور</p>
									</div>
									<div class="card-chart bg-purple-transparent brround mr-auto mt-0">
										<i class="typcn typcn-time  text-purple tx-24"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-purple wd-{{ $pa }}" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">نسبة أولياء الأمور<span class="float-left text-muted">{{ $pa }}%</span></small>
							</div>
						</div>
					</div>
				</div>
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('th/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('th/assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('th/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('th/assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('th/assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('th/assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('th/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('th/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('th/assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('th/assets/js/index.js')}}"></script>
<script src="{{URL::asset('th/assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
