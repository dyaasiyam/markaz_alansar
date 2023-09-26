@extends('website.app')

@section('title','مركز الأنصار لتعليم القرأن الكريم')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.min.css">


@endsection
@section('website')
<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" dir="rtl">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div id="home" class="first-section" style="background-image:url('{{ asset('front/images/alanser1.jpg') }}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <h2><strong>مركز الأنصار  </strong> لتعليم القرأن الكريم</h2>
                                    <p class="lead">يهدف مركز الأنصار إلى إنشاء جيل قرأني . </p>
                                        <a href="{{ url('/') }}" class="hover-btn-new text-light" ><span>الرئيسية</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ url('student/login') }}" class="hover-btn-new text-light"><span>بوابة الطالب</span></a>
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <div class="carousel-item">
            <div id="home" class="first-section" style="background-image:url('{{ asset('front/images/alanser.jpg') }}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <h2 data-animation="animated zoomInRight"> السنة النبوية<strong>مركز الأنصار</strong></h2>
                                    <p class="lead" data-animation="animated fadeInLeft">يهدف مركز الأنصار لتعليم الطلاب سنة النبي محمد. </p>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <div class="carousel-item">
            <div id="home" class="first-section" style="background-image:url('{{ asset('front/images/alanser3.jpg') }}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <h2 data-animation="animated zoomInRight"><strong>مركز الأنصار</strong> دورات أحكام</h2>
                                    <p class="lead" data-animation="animated fadeInLeft">يهدف المركز لتعليم الطلاب لدورات أحكام لقرأن كريم</p>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <!-- Left Control -->
        <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="section cl">
    <div class="container">
        <div class="row text-center stat-wrap">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-study"></i></span>
                <p class="stat_count">{{ $st }}</p>
                <h3>عدد الطلاب</h3>
            </div><!-- end col -->

            <div class="col-md-4 col-sm-4 col-xs-12">
                <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
                <p class="stat_count">{{ $th }}</p>
                <h3>عدد المحفظين</h3>
            </div><!-- end col -->

            <div class="col-md-4 col-sm-4 col-xs-12">
                <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
                <p class="stat_count">{{ $sum }}</p>
                <h3>عدد الإختبارت</h3>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js"></script>

<script>
    // استهداف عنصر العرض
    const statElement = document.querySelector('.stat_count');

    // تهيئة Odometer.js وتطبيق العداد
    const odometer = new Odometer({
      el: statElement,
      value: parseInt(statElement.innerText) // القيمة الابتدائية
    });

    // تحديث العداد ليصل إلى القيمة الفعلية
    function updateOdometer() {
      odometer.update(parseInt(statElement.innerText));
    }

    // تحديث العداد كل 10 ثوانٍ (10000 مللي ثانية)  </script>



@endsection
