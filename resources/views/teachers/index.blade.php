@extends('teachers.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('th/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('th/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
<title>
    @yield('title','لوحة تحكم المحفظ')
</title>
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بعودتك محفظ: {{ Auth::user()->name }} </h2>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
						<div class="card bg-primary-gradient text-white ">
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="icon1 mt-2 text-center">
											<i class="fe fe-users tx-40"></i>
										</div>
									</div>
									<div class="col-6">
										<div class="mt-0 text-center">
											<span class="text-white">عدد الطلاب</span>
											<h2 class="text-white mb-0">{{ Auth::user()->students()->count() }}</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
						<div class="card bg-danger-gradient text-white">
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="icon1 mt-2 text-center">
											<i class="fe fe-bar-chart tx-40"></i>
										</div>
									</div>
									<div class="col-6">
										<div class="mt-0 text-center">
											<span class="text-white"> الإختبارت المنفردة </span>
											<h2 class="text-white mb-0">{{ $totalGroupExams }}</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
						<div class="card bg-success-gradient text-white">
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="icon1 mt-2 text-center">
											<i class="fe fe-bar-chart-2 tx-40"></i>
										</div>
									</div>
									<div class="col-6">
										<div class="mt-0 text-center">
											<span class="text-white">الإختبارت المجتمعة</span>
											<h2 class="text-white mb-0">{{ $totalIndividualExams }}</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

				<!-- /row -->
			</div>
		</div>
		<!-- Container closed -->
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
