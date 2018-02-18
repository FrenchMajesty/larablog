@section('pageTitle', 'Gallery')
@extends ('layout')
@section ('metatags')
    <meta name="keywords" content="blog, fashion, designer, louisiana, fashion design, clothing, portfolio, design">
    <meta name="description" content="My work is displayed here as an inner reflection of my thoughts, check out some of my latest works and creative designs and fall in love.">
@endsection

@php($themeColor = \Cookie::get('theme-choice') == 'black' ? 'black' : 'white')
@section('content')
<div class="container">
	<div class="head-gallery">
		<h1 class="gallery-h1">Gallery</h1>

		@if(count($tags) > 0 && count($images) > 0)
		<p id="filters" class="tags">
			@foreach($tags as $tag)
				@if($tag->images->count() > 0)
					<a data-filter=".{{str_replace(' ', '-',$tag->name)}}" href="#">{{$tag->name}}</a>
				@endif
			@endforeach
			<a data-filter="*" href="#" class="unfilter hide">all</a>
		</p>
		@endif
	</div>
</div>

@if(count($images) > 0)
<div class="post-fluid">
	<div class="container">
		@if($images->previousPageUrl())
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<a href="{{$images->previousPageUrl()}}" class="more-down"><i class="fa fa-long-arrow-up"></i></a>
				</div>
			</div>
		</div>
		@endif
			
		<div class="row masonry masonry-gallery isotopeContainer">
			
			@foreach($images as $image)
				@php($image->tags->transform(function($item) {
						$item->name = str_replace(' ', '-', $item->name);
						return $item;
					}))
				<div class="masonry-row col-md-4 col-sm-6 mg-item {{$image->tags->implode('name',' ')}}">
					<div>
						<span class="mg-banner">
							<a href="{{$image->url}}" data-gallery-item="list-1"><img src="{{$image->url}}" alt=""></a>
						</span>
						<div class="mg-content">
							<span class="mg-top">{{$image->category->name}}</span>
							<h6><a href="#" data-gallery-item="list-1">{{$image->title}}</a></h6>
						</div>
					</div>
				</div>
			@endforeach
			
		</div>
	</div>
</div>

	@if($images->hasMorePages())
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a href="{{$images->nextPageUrl()}}" class="more-down"><i class="fa fa-long-arrow-down"></i></a>
			</div>
		</div>
	</div>
	@endif
@else
	@include('partials.no-content')
@endif

@if(count($images) > 0)
<div id="list-1" class="" style="display:none">
	@foreach($images as $image)
			<a href="{{$image->url}}" title="{{$image->name}}" data-gallery="">
				<img src="" alt="{{$image->name}}">
			</a>
	@endforeach
		</div>
<div id="blueimp-list-1" class="blueimp-gallery-controls blueimp-gallery blueimp-gallery-playing gallery-template-{{$themeColor}}">
			<div class="slides"></div>
			<div class="gallery-detail-info">
				<h3 class="title"></h3>
				<div class="gallery-share">
					<span class="date">By yours truly</span>
					<!--a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a-->
					<a href="#" class="set-fullscreen"><i class="fa fa-expand"></i></a>
				</div>
			</div>
			<a class="prev"><i class="fa fa-angle-left"></i></a>
			<a class="next"><i class="fa fa-angle-right"></i></a>
			<a class="close">×</a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
		</div>
@endif
@include('partials.footer')
@endsection