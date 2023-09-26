@extends('admins.layouts.master')
@section('css')
@endsection
@section('title', $activity->teacher->name )

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">نشاط المحفظ</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $activity->teacher->name }}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="h3 mb-4 text-gray-800">معلومات النشاط</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 ">
                    <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" width="1000" >
                </div>
            </div>
        <div>
            <p>تاريخ النشر : <span class="text-sm">{{ $activity->created_at->diffForHumans() }}</span></p>
            <h3>{{  $activity->title }}</h3>
            <p>{{ $activity->description }}</p>
        </div>

        <div class="">
            @foreach ($activity->images as $image)
            <div class="col mb-4">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="صورة متعلقة" width="800">
            </div>
        @endforeach
        </div>
        </div>
            </div>
  </div>
@endsection
