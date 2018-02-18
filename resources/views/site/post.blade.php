@extends ('layout')
@section('pageTitle', $post->title)
@section ('metatags')
    <meta name="keywords" content="{{$post->tags->pluck('name')->implode(',')}}">
    <meta name="description" content="{{$post->description}}">
@endsection

@section('navbar')
<br>
@overwrite

@php($themeColor = \Cookie::get('theme-choice') == 'black' ? 'black' : 'white')
@section('content')
<div id="quick-read" class="qr-{{$themeColor}}-theme" style="display: block">
	<div class="quick-read-head">
		<div class="container">
			<a href="{{route('index')}}" class="qr-logo"></a>
			<div class="qr-tops">
				<a href="#" class="qr-change"><i class="fa fa-adjust"></i></a>
				<a href="{{route('index')}}" class="qr"><i class="fa fa-times"></i></a>
			</div>
		</div>
	</div>

		<div class="quick-dialog" data-blog-id="{{$post->id}}">
			<div class="quick-body">
				<div class="container">
					<div class="col-md-8 col-md-offset-2">
					
						<div class="qr-content post-item-paragraph">
							
							<article>
								<h2>{{$post->title}}</h2>

								@if($post->has_picture)
									<p><center>
										<a href="{{$post->picture}}" data-fluidbox-qr><img src="{{$post->picture}}" alt=""></a>
										<!--span class="img-caption">Walk through the Forest</span-->
									</center></p>
								@elseif($post->has_video)
									<div style="margin-top: 2em; margin-bottom: 2em">
										{!! $post->embed !!}
									</div>
								@endif

								<p>{{$post->description}}</p>

								{!! $post->content !!}
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--div class="quick-read-bottom hide">
			<p class="qr-info">By <a href="{{route('about')}}" target="_blank">{{$blogger->name}}</a>   •   {{$post->updated_at->format('F jS')}}</p>
			<div class="qr-nav">
				@if($previous)
					<a href="{{route('post',[$previous->slug])}}" class="qr-prev" title="{{$previous->title}}">←  PREV POST</a>
				@endif
				<a href="#" class="qr-share" tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="click" data-content="<a href='http://www.facebook.com/sharer.php?u={{route('post',[$post->slug])}}' class='outer' target='_blank'><i class='fa fa-facebook'></i></a>
					<a class='outer' href='https://twitter.com/share?url={{route('post',[$post->slug])}}' target='_blank'><i class='fa fa-twitter'></i></a>"><i class="fa fa-share-alt"></i></a>
				@if($next)
					<a href="{{route('post',[$next->slug])}}" class="qr-next" title="{{$next->title}}">NEXT POST →</a>
				@elseif(!$next && \Agent::isMobile())
					<a href="#" class="qr-next">← PREV POST</a>
				@endif
			</div>
		</div-->
		<div class="quick-read-bottom qr-bottom-2">
			<div class="qr-nav">
				@if($previous)
					<a href="{{route('post',[$previous->slug])}}" class="qr-prev" title="{{$previous->title}}">← PREV POST</a>
				@endif
				<p class="qr-info">By <a href="#">{{env('BLOGGER_FULL_NAME')}}</a>   •   {{$post->updated_at->format('F jS')}}</p>
				@if($next)
					<a href="{{route('post',[$next->slug])}}" class="qr-next" title="{{$next->title}}">NEXT POST →</a>
				@elseif(!$next && \Agent::isMobile())
					<a href="#" class="qr-next">← PREV POST</a>
				@endif
				<div class="qr-sharebox">
					<span>Share on</span>
					<a href="http://www.facebook.com/sharer.php?u={{route('post',[$post->slug])}}" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/share?url={{route('post',[$post->slug])}}&text=Check this out&hashtags=FashionDesign,Dragonfly" target="_blank"><i class="fa fa-twitter"></i></a>
				</div>
			</div>
		</div>
</div>
@endsection