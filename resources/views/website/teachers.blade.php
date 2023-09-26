@extends('website.app')

@section('title','المحفظين')


@section('website')
<div class="all-title-box">
    <div class="container text-center">
        <h1>المحفظين<span class="m_1">محفظين مركز الأنصار لتعليم القرأن الكريم.</span></h1>
    </div>
</div>

<div id="teachers" class="section wb" dir="rtl">
    <div class="container">
        <div class="row">
            @foreach ($teachers as $teacher)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="our-team">
                    <div class="team-img">
                        @if ($teacher)
                        @if ($teacher->image)
                            <img src="{{ asset('images/' . $teacher->image) }}">
                        @else
                           <img src="https://ui-avatars.com/api/?background=random&name={{ $teacher->email }}">
                       @endif
                @endif
                        {{-- <img src="{{ asset('images/'.$teacher->image) }}"> --}}
                        <div class="social">
                            <ul>
                                <li><a href="https://wa.me/{{ $teacher->phone }}" class="fa fa-whatsapp"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="title">{{ $teacher->name }}</h3>
                        <span class="post">{{ $teacher->stage->name }}</span>
                        <span class="post">{{ $teacher->circle->name }}</span>
                    </div>
                </div>
            </div>

            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
<!-- end section -->


<!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>




@endsection
