@extends ('layout')
@section('pageTitle', 'Blog Feed')

@php($blogger = \App\User::first())
@section ('metatags')
    <meta name="keywords" content="blog, fashion, designer, louisiana, fashion design, clothing">
    <meta name="description" content="This is {{$blogger->name}} and welcome to my blog. Get an exclusive insight into the mind of a creative fashion designer. This is my array of multiple talents. If they are to your liking stupendous! If not well.. fiddlesticks.">
@endsection


@php($themeColor = \Cookie::get('theme-choice') == 'black' ? 'black' : 'white')
@section('content')
<div class="container">
	<div class="head-text">
		<h1>{{$user->firstname}}'s Blog</h1>
		<p class="lead-text">Fashion Designer.</p>
	</div>
</div>

<div class="col-md-offset-2 col-md-8 large-image-v1">
	@if(count($blogs) > 0)
	@foreach($blogs as $blog)
	<div class="container-fluid" data-blog-id="{{$blog->id}}" style="margin-bottom: 6em">
		<div class="container-medium">
			<div class="row post-items">
				<div class="post-item-banner">
					<img src="{{$blog->picture}}" alt="">
					@if($blog->has_video)
						<div style="height: 100%; width: 100%">
							{!! $blog->embed !!}
						</div>
					@endif								
				</div>
					<div class="col-md-12">
						<div class="post-item">
							<div class="post-item-paragraph">
									<h2><a href="{{route('post', [$blog->slug])}}" class="quick-read"><i class="fa fa-eye"></i></a><a href="{{route('post', [$blog->slug])}}" target="_blank">{{$blog->title}}</a></h2>
									<p class="ellipsis-fade-six">{{$blog->description}} <a href="{{route('post', [$blog->slug])}}" class="more"></a></p>
								</div>
							<div class="post-item-info clearfix">
								<div class="pull-left">
									<span>{{$blog->created_at->format('M d')}}</span>&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;
									By <a href="{{route('about')}}" target="_blank">{{$user->name}}</a>
								</div>
								<div class="pull-right post-item-social">
									<a href="{{route('post', [$blog->slug])}}" class="quick-read qr-not-phone"><i class="fa fa-eye"></i></a>
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@else
			@include('partials.no-content')
		@endif
	</div>

	@if(count($blogs) > 0)
	<div class="row default-post-nav">
		<div class="container">
			<div class="col-md-10 col-md-offset-2">
				@if($blogs->previousPageUrl())
				<a href="{{$blogs->previousPageUrl()}}" class="post-nav post-newer">← NEWER</a>
				@endif

				@if($blogs->hasMorePages())
					<a href="{{$blogs->nextPageUrl()}}" class="post-nav post-older">OLDER →</a>
				@endif
			</div>
		</div>
	</div>
	@endif

	@include('partials.footer')
</div>

@if(count($blogs) > 0)
<div id="quick-read" class="qr-{{$themeColor}}-theme" data-quick-reader>
	<div class="quick-read-head">
		<div class="container">
			<a href="#" class="qr-logo"></a>
			<div class="qr-tops">
				<a href="#" class="qr-change"><i class="fa fa-adjust"></i></a>
				<a href="#" class="qr-close"><i class="fa fa-times"></i></a>
			</div>
		</div>
	</div>

	@foreach($blogs as $blog)
		<section class="blog-container">
			<div class="quick-dialog" data-blog-id="{{$blog->id}}">
				<div class="quick-body">
					<div class="container">
						<div class="col-md-8 col-md-offset-2">
						
							<div class="qr-content post-item-paragraph">
								
								<article>
									<h2>{{$blog->title}}</h2>

									@if($blog->has_picture)
										<p><center>
											<a href="{{$blog->picture}}" data-fluidbox-qr><img src="{{$blog->picture}}" alt="" style="width: 100%"></a>
											<!--span class="img-caption">Walk through the Forest</span-->
										</center></p>
									@elseif($blog->has_video)
										<div style="margin-top: 2em; margin-bottom: 2em; width: 100%">
											{!! $blog->embed !!}
										</div>
									@endif

									<p>{{$blog->description}}</p>

									{!! $blog->content !!}

								</article>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="quick-read-bottom hide">
				<p class="qr-info">By <a href="{{route('about')}}" target="_blank">{{$user->name}}</a>   •   {{$blog->updated_at->format('F jS')}}</p>
				<!--div class="qr-nav">
					<a href="#" class="qr-prev">← PREV POST</a>
					<a href="#" class="qr-share" tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>"><i class="fa fa-share-alt"></i></a>
					<a href="#" class="qr-comment"><i class="fa fa-comment"></i></a>
					<a href="#" class="qr-like"><i class="fa fa-heart"></i> 34</a>
					<a href="#" class="qr-next">NEXT POST →</a>
				</div-->
			</div>
			<div class="quick-read-bottom qr-bottom-2">
				<div class="qr-nav">
					@if(null)
						<!--a href="{{route('post',[$previous->slug])}}" class="qr-prev" title="{{$previous->title}}">← PREV POST</a-->
					@endif
					<p class="qr-info">By <a href="{{route('about')}}" target="_blank">{{$user->name}}</a>   •   {{$blog->updated_at->format('F jS')}}</p>
					@if(null)
						<!--a href="{{route('post',[$next->slug])}}" class="qr-next" title="{{$next->title}}">NEXT POST →</a-->
					@elseif(null && !$next && \Agent::isMobile())
						<!--a href="#" class="qr-next">← PREV POST</a-->
					@endif
					<div class="qr-sharebox">
						<span>Share on</span>
						<a href="http://www.facebook.com/sharer.php?u={{route('post',[$blog->slug])}}" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/share?url={{route('post',[$blog->slug])}}&text=Check this out&hashtags=FashionDesign,Dragonfly" target="_blank"><i class="fa fa-twitter"></i></a>
					</div>
				</div>
			</div>
		</section>
	@endforeach
</div>
@endif
@endsection