@extends('teachers.layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
<title>
    تحديث الملف الشخصي
</title>

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الإعدادت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل الملف الشخصي</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<!-- Col -->
					<div class="col-lg-5">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
                                            <div class="mt-2" id="image-preview">
                                                @if (Auth::user()->image)
                                                <img   src="{{asset('images/'.Auth::user()->image)}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>

                                                    @else
                                                    <img   src=" https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                                @endif

                                            </div>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{ Auth::user()->name }}</h5>
												<p class="main-profile-name-text">{{ Auth::user()->number }}</p>
											</div>
										</div><!-- main-profile-bio -->
										<div class="row">
											<div class="col-md-4 col mb20">
                                                <h6 class="text-small text-muted mb-0">عدد الطلاب</h6>
                                                <h5>{{ Auth::user()->students()->count() }}</h5>
											</div>
											<div class="col-md-4 col mb20">
                                                <h6 class="text-small text-muted mb-0">المرحلة</h6>
												<h5>{{ Auth::user()->stage->name}}</h5>
											</div>
											<div class="col-md-4 col mb20">
                                                <h6 class="text-small text-muted mb-0">الحلقة</h6>
												<h5>{{ Auth::user()->circle->name }}</h5>
											</div>
										</div>

										<!--skill bar-->
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label tx-13 mg-b-25">
									معلومات الهوية والهاتف
								</div>
								<div class="main-profile-contact-list">
									<div class="media">
										<div class="media-icon bg-primary-transparent text-primary">
											<i class="icon ion-md-phone-portrait"></i>
										</div>
										<div class="media-body">
											<span>رقم الجوال</span>
											<div>
												{{ Auth::user()->phone }}
											</div>
										</div>
									</div>
									<div class="media">
										<div class="media-icon bg-success-transparent text-success">
											<i class="icon ion-logo-slack"></i>
										</div>
										<div class="media-body">
											<span>رقم الهوية</span>
											<div>
                                                {{ Auth::user()->id_number }}
 											</div>
										</div>
									</div>
								</div><!-- main-profile-contact-list -->
							</div>
						</div>
					</div>

					<!-- Col -->
					<div class="col-lg-7">
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">تعديل البيانات</div>
								<form class="form-horizontal" action="{{ route('teacher.teacher.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">البريد الإلكتروني</label>
											</div>
											<div class="col-md-9">
                                                <input type="number" disabled class="form-control" value="{{ Auth::user()->number }}">
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">الإسم</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">رقم الجوال</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">رقم الهوية</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control" name="id_number" value="{{ Auth::user()->id_number }}">
											</div>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">الصورة الشخصية</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" class="form-control" name="image" id="profile-image" onchange="previewImage(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-left">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">حفظ التعديلات</button>
                                    </div>
								</form>
							</div>

						</div>
					</div>
					<!-- /Col -->
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
    function previewImage(event) {
        const imagePreview = document.getElementById('image-preview');
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.innerHTML = `<img src="${e.target.result}" class="img-fluid" alt="صورة المعاينة">`;
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            imagePreview.innerHTML = '';
        }
    }
</script>

<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('th/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('th/assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('th/assets/js/select2.js')}}"></script>
@endsection
