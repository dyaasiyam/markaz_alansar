
 @extends('website.app')

@section('title')
تسجيل الدخول - لوحة تحكم المحفظ
@stop


@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('front/images/icon.png')}}" rel="stylesheet">
@endsection
@section('website')
		<div class="container-fluid" dir="rtl">
			<div class="row no-gutter">
				<!-- The image half -->
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex mt-4"> <a href="{{ url('/' . $page='Home') }}"></a><h3 class="main-logo1 ml-1 mr-0 my-auto tx-28">تسجيل دخول المحفظ</h3></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2 class="font-weight-semibold mb-4 text-center"> تسجيل دخول المحفظ</h2>
                                                <form method="POST" action="{{ route('login.action') }}">
                                                 @csrf
                                                 <input type="hidden" name="guard" value="teacher">
													<div class="form-group text-right">
													<label>رقم المحفظ</label>
                                                    <input id="number" type="tel" placeholder="رقم المحفظ" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>
                                                     @error('number')
                                                     <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                                                     @enderror
													</div>

												 <div class="form-group text-right">
											 	 <label>كلمة المرور</label>

                                                  <input id="password" placeholder="كلمة المرور" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                  @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
												  @enderror
												  </div>
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                    {{ __('تسجيل الدخول') }}
                                                    </button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->

                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('th/assets/img/teacher.jpg')}}" class="my-auto w-100" alt="logo">
						</div>
					</div>
				</div>

			</div>
		</div>
@endsection
@section('js')
@endsection
