<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('th/assets/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('th/assets/img/brand/logo-white.png')}}" class="dark-logo-1" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('th/assets/img/brand/favicon.png')}}" class="logo-2" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('th/assets/img/brand/favicon.png')}}" class="dark-logo-2" alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>

					</div>
					<div class="main-header-right">

						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""> @if (Auth::user()->image)
                                    <img src="{{asset('images/'.Auth::user()->image )}}" alt="user-img" width="36"
                                        class="img-profile rounded-circle">
                                        @else
                                        <img src=" https://ui-avatars.com/api/?background=random&name={{ Auth::user()->email }}" alt="user-img" width="36"
                                        class="img-profile rounded-circle">
                                    @endif</a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"> @if (Auth::user()->image)
                                                <img src="{{asset('images/'.Auth::user()->image )}}" alt="user-img" width="36"
                                                    class="img-profile rounded-circle">
                                                    @else
                                                    <img src=" https://ui-avatars.com/api/?background=random&name={{ Auth::user()->email }}" alt="user-img" width="36"
                                                    class="img-profile rounded-circle">
                                                @endif</div>
											<div class="mr-3 my-auto">
												<h6>{{ Auth::user()->name }}</h6><span>{{ Auth::user()->number }}</span>
											</div>
										</div>
									</div>
                                    <a class="dropdown-item" href="{{ route('teacher.profile_password') }}"><i class="bx bx-key"></i>تغيير كلمة المرور</a>
									<a class="dropdown-item" href="{{ route('teacher.teacher.profile.profile') }}"><i class="bx bx-cog"></i> تحديث الملف الشخصي</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        <i class="bx bx-log-out"></i>    {{ __('تسجيل الخروج') }}
                                        </x-dropdown-link>
                                    </form>
									{{-- <a class="dropdown-item" href="{{ url('/' . $page='page-signin') }}"><i class="bx bx-log-out"></i> Sign Out</a> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
