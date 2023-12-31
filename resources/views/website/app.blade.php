<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


     <!-- Site Metas -->
    <title>@yield   ('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
        <link rel="icon" href="{{ asset('front/images/icon.png') }}" type="image/png" class="icon_alanser">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('front/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('front/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('front/style.css') }}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/versions.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">
    @yield('css')

    <!-- Modernizer for Portfolio -->
    <script src="{{asset('front/js/modernizer.js')}}"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .icon_alanser {
    border-radius: 50%; /* جعل الحواف دائرية */
    width: 50px; /* تعديل حجم الصورة حسب الحاجة */
    height: 50px; /* تعديل حجم الصورة حسب الحاجة */
}

    </style>

</head>
<body class="host_version" >

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">تسجيل الدخول لوحة تحكم الإدارة</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active"  data-toggle="tab">لوحة تحكم الإدارة</a></li>
				</ul>
				<!-- Tab panes -->
                    @include('auth.login_admin')
			</div>
		</div>
	  </div>
	</div>

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->

	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
                    {{-- <img src="{{ asset('front/images/logo.png') }}" alt=""> --}}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto" dir="rtl">
                        <li class="nav-item
                            {{ request()->url()== url('/') ? 'active' : '   ' }}
                        "><a class="nav-link text-right" href="{{ url('/') }}">الرئيسية</a></li>
                        <li class="nav-item
                        {{ request()->url()==  route('website.actives') ? 'active' : '   ' }}
                        "><a class="nav-link text-right" href="{{ route('website.actives') }}">أنشطة المركز</a></li>
                        <li class="nav-item
                        {{ request()->url()== route('website.teachers') ? 'active' : '   ' }}
                        "><a class="nav-link text-right" href="{{ route('website.teachers')}}">المحفظين</a></li>
                        <li class="nav-item
                        {{ request()->url()== url('student/login') ? 'active' : '   ' }}
                        "><a class="nav-link text-right" href="{{ url('student/login') }}">بوابة الطالب</a></li>
                        <li class="nav-item
                        {{ request()->url()== url('teacher/login') ? 'active' : '   ' }}
                        "><a class="nav-link text-right" href="{{ url('teacher/login') }}">بوابة المحفظ</a></li>
                    </ul>
					<ul class="nav navbar-nav navbar-right text-right">
                        <li><a class="hover-btn-new log orange text-right" href="#" data-toggle="modal" data-target="#login"><span>مركز الأنصار</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
    @yield('website')
	<!-- End header -->

    <footer class="footer text-center" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>مركز الأنصار</h3>
                        </div>
                        <p> مركز الأنصار لتعليم القرأن الكريم تأسس عام 2003 يهدف المركز لتعليم القرأن الكريم والسنة النبوية
                            زورونا عبر مواقع التواصل الإجتماعي
                        </p>
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="https://www.facebook.com/alansarquran"><i class="fa fa-facebook"></i></a></li>
								{{-- <li><a href="#"><i class="fa fa-whatsapp"></i></a></li> --}}
								<li><a href="https://www.instagram.com/alansar.quran/"><i class="fa fa-instagram"></i></a></li>
								{{-- <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li> --}}
							</ul><!-- end links -->
						</div>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>الروابط</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li><a href="{{ route('website.teachers')}}">المحفظين</a></li>
                            <li><a href="{{ url('student/login') }}">بوابة الطالب</a></li>
							<li><a href="{{ route('website.actives') }}">أنشطة المركز</a></li>
							<li><a href="{{ url('teacher/login') }}">بوابة المحفظ</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>تواصل معنا عبر </h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:alanser@gmail.com">alanser@gmail.com</a></li>
                            <li><a href="#">www.alanser.com</a></li>
                            <li>مركز الأنصار لتعليم القرأن الكريم والسنة</li>
                            <li>0595973941</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">
                    <p class="footer-company-name">تم التطوير بواسطة المطور <a href="#">ضياء أكرم صيام</a> <span href="https://html.design/">مركز الأنصار</span></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{asset('front/js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('front/js/all.js') }}"></script>
	<script src="{{ asset('front/js/timeline.min.js') }}"></script>
	<script src="{{ asset('front/js/custom.js') }}"></script>


	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
    @yield('js')
</body>
</html>
