@extends ('layout')
@section('pageTitle', 'Blog Feed')

@section('content')

<div class="container">
	<div class="head-text">
		<h1>{{env('BLOGGER_NAME')}}'s Blog</h1>
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
				</div>
					<div class="col-md-12">
						<div class="post-item">
							<div class="post-item-paragraph">
									<h2><a href="#" class="quick-read"><i class="fa fa-eye"></i></a><a href="#">{{$blog->title}}</a></h2>
									<p class="ellipsis-fade-six">{{$blog->description}} <a href="#" class="more"></a></p>
								</div>
							<div class="post-item-info clearfix">
								<div class="pull-left">
									<span>{{$blog->created_at->format('M d')}}</span>&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;
									By <a href="{{route('index')}}">{{env('BLOGGER_NAME')}}</a>
								</div>
								<div class="pull-right post-item-social">
									<a href="#" class="quick-read qr-not-phone"><i class="fa fa-eye"></i></a>
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
<div id="quick-read" class="qr-white-theme">
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
		<div class="quick-dialog" data-blog-id="{{$blog->id}}">
			<div class="quick-body">
				<div class="container">
					<div class="col-md-8 col-md-offset-2">
					
						<div class="qr-content post-item-paragraph">
							
							<article>
								<h2>A Nice Street Cafe in London {{$blog->title}}</h2>

								<p>Consectetur adipiscing elit. Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Nunc sed dolor enim, vitae sodales diam. Mauris fermentum fringilla lorem, in rutrum massa sodales et. Praesent mollis sodales est, eget fringilla libero sagittis eget. Nunc gravida varius risus ac luctus. Mauris ornare eros sed libero euismod ornare. Nulla id sem a mauris egestas pulvinar vitae non dui. Cras odio tortor, feugiat nec sagittis sed, laoreet ut mauris. In hac habitasse platea dictumst.</p>

								<p>What if instead your website used machine learning to build itself, and then rebuilt as necessary, based on data it was gathering about how it was being used? That's what The Grid is aiming to do. After you add content such as pictures, text, the stuff everyone enjoys interacting with your obligation to design...</p>

								<h4>The Truth about Teens and Privacy</h4>

								<p>Social media has introduced a new dimension to the well-worn fights over private space and personal expression. Teens do not want their parents to view their online profiles or look over their shoulder when they’re chatting with friends. Parents are no longer simply worried about what their children wear out of the house but what they photograph themselves wearing in their bedroom to post online. Interactions that were previously invisible to adults suddenly have traces, prompting parents to fret over.</p>

								<h4>Here are some of the ways you may be already being hacked:</h4>

								<ul class="in-list">
									<li>Everyone makes mistakes</li>
									<li>You can control only your behavior</li>
									<li>Good habits create discipline</li>
									<li>Remember the <u>big picture</u></li>
									<li>Everyone learns differently</li>
									<li>Focus on the Benefits, Not the Difficulties</li>
									<li>Traditions are bonding opportunities</li>
								</ul>

								<p>This is not a comprehensive list. Rather, it is a snapshot in time of real-life events that are happening right now. In the future, we will likely read this list and laugh at all the things I failed to envision.</p>
								<p class="with-img">
									<a href="{{asset('public/img/banner-85-1.jpg')}}" data-fluidbox-qr><img src="{{asset('public/img/banner-85.jpg')}}" alt=""></a>
									<span class="img-caption">Walk through the Forest</span>
								</p>
								<p>Elit try-hard consectetur, dolore voluptate minim distillery. Bespoke Cosby sweater pug street art et keytar. Nihil fish whatever trust fund, dreamcatcher in fingerstache squid seitan accusamus. Organic Wes Anderson High Life setruhe authentic iPhone, aute art party hashtag fixie church-key art veniam Tumblr polaroid. DIY polaroid vinyl, sustainable hella scenester accusamus fanny pack. Ut Neutra enim pariatur cornhole actually Banksy, tote bag fugiat ad accusamus. Incididunt fixie normcore fingerstache. Freegan proident literally brunch before they sold out.
								</p>

								<p>Readymade fugiat narwhal, typewriter VHS aute stumptown hoodie irure put a bird on it. Fashion axe raw denim brunch put a bird on it voluptate Truffaut. Bitters PBR&amp;B nulla Odd Future swag leggings. Banh mi Wes Anderson butcher letterpress skateboard quis. Chambray hella retro viral Cosby sweater photo booth. Schlitz elit Cosby sweater, Blue Bottle non chambray chia. Single-origin coffee pickled.</p>

								<h5>Blockquote</h5>

								<p>Do officia aliqua, pop-up ut et occupy sriracha. YOLO meggings PBR sartorial mollit, Schlitz assumenda vero kitsch plaid post-ironic PBR&amp;B keffiyeh. Cosby sweater wolf YOLO Austin bespoke, American Apparel crucifix paleo flexitarian. Aliquip bitters food truck, incididunt tofu accusamus magna nesciunt typewriter drinking vinegar Shoreditch try-hard you probably haven’t heard of them labore. </p>

								<blockquote>
									<p><i>“The Muppets Take Manhattan”</i><br />
										This movie was a disappointment. The Muppets do not take Manhattan at all. They merely visit it.<br />
										<span>— No stars.</span></p>
									</blockquote>

									<p>Do officia aliqua, pop-up ut et occupy sriracha. YOLO meggings PBR sartorial mollit, Schlitz assumenda vero kitsch plaid post-ironic PBR&amp;B keffiyeh. Cosby sweater wolf YOLO Austin bespoke, American Apparel crucifix paleo flexitarian. Aliquip bitters food truck, incididunt tofu accusamus.</p>
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="quick-read-bottom">
			<p class="qr-info">By <a href="#">{{env('BLOGGER_FULL_NAME')}}</a>   •   {{$blog->updated_at->format('F jS')}}</p>
			<!--div class="qr-nav">
				<a href="#" class="qr-prev">← PREV POST</a>
				<a href="#" class="qr-share" tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>"><i class="fa fa-share-alt"></i></a>
				<a href="#" class="qr-comment"><i class="fa fa-comment"></i></a>
				<a href="#" class="qr-like"><i class="fa fa-heart"></i> 34</a>
				<a href="#" class="qr-next">NEXT POST →</a>
			</div-->
		</div>
		<div class="quick-read-bottom qr-bottom-2 hide">
			<div class="qr-nav">
				<!--a href="#" class="qr-prev">← PREV POST</a-->
				<p class="qr-info">By <a href="#">{{env('BLOGGER_FULL_NAME')}}</a>   •   {{$blog->updated_at->format('F jS')}}</p>
				<!--a href="#" class="qr-next">NEXT POST →</a>
				<a href="#" class="qr-like"><i class="fa fa-heart"></i> 34</a>
				<div class="qr-sharebox">
					<span>Share on</span>
					<a href='#'><i class='fa fa-facebook'></i></a>
					<a href='#'><i class='fa fa-twitter'></i></a>
				</div-->
			</div>
		</div>
	@endforeach
</div>
@endif
@endsection