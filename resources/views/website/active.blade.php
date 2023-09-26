@extends('website.app')

@section('title','أنشطة المركز')
@section('css')
<style>
    .card img {
        width: 100%;
        height: 40vh;
}

</style>
@endsection


@section('website')
<div class="parallax section dbcolor">
    <div class="container ">
            <h2 class="text-center text-light fs-5">أنشطة المركز</h2>

    </div><!-- end container -->
</div>


<div id="overviews" class="section wb" dir="rtl">
    <div class="container">
        <div class="row ">
            @foreach ($actives as $active)
            @if ($active->status === 'مقبول')
            <div class="col-md-4 mb-4">
                <div class="card " >
                    <img src="{{ asset('storage/' . $active->image) }}" alt="" class="img-fluid">
                    <div class="card-body text-right">
                        <div class="meta-info-blog text-right">
                            <span><i class="fa fa-calendar"></i> <a href="#">{{ $active->created_at->format('d M Y') }}</a> </span>
                        </div>
                      <h5 class="card-title mt-3 ">{{ $active->title }}</h5>
                      <div class="blog-button text-center">
                        <a class="hover-btn-new orange" href="{{ route('website.actives_singles',$active->id) }}"><span>قراءة المزيد</span></a>
                    </div>
                  </div>
                  </div>
            </div>

            @endif
        @endforeach

        </div>
        {{ $actives->links() }}
    </div><!-- end container -->
</div>
</div>








@endsection

