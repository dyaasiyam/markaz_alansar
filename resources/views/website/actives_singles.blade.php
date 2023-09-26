@extends('website.app')
@section('title','تفاصيل النشاط')

@section('website')
<div class="parallax section dbcolor">
    <div class="container ">
            <h2 class="text-center text-light fs-5">معلومات النشاط</h2>

    </div><!-- end container -->
</div>
<div id="overviews" class="section wb" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 blog-post-single">
                <div class="blog-item">
                    <div class="image-blog">
                        <img src="{{ asset('storage/' . $active->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="post-content text-right">
                        <div class="meta-info-blog">
                            <span><i class="fa fa-calendar"></i> <a href="#">{{ $active->created_at->format('d M Y') }}</a> </span>
                        </div>
                        <div class="blog-title">
                            <h2><a href="#" title="">{{ $active->title }}</a></h2>
                        </div>
                        <div class="blog-desc text-right">
                            <blockquote class="default">
                                {{ $active->description }}
                            </blockquote>
                            <div class="image-blog ">
                                @foreach ($active->images as $image)
                                <div class="mb-5">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="" class="img-fluid">

                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->




@endsection
