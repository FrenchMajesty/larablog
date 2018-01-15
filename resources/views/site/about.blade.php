@section('pageTitle','About Me')
@extends ('layout')

@section('content')
<div class="container">

			<div class="head-about">
				<h1 class="about-h1">Hi, I'm {{$user->firstname}}</h1>
				<p class="lead about-lead">Welcome to my blog, take your time give it a read and browse around.</p>
			</div>

		</div>

		<div class="post-fluid">
			<div class="container-fluid">
				<div class="container">
					<div class="row laread-about">

						<div class="about-picture">
							<img src="{{$user->picture ?: asset('public/img/img-47.png')}}" alt="" />
						</div>

						<p class="basic-info">{{$user->title}} <span><i class="fa fa-map-marker"></i> {{$user->location}}</span></p>

						<p>Hey,  My name is {{$user->name}}.</p>

						<h4>About Me</h4>
						<p>{{$user->biography}}</p>

						<div class="about-info">
							<span class="info-title">life for me:</span>
							<div class="about-item">
								<span>
									<i class="fa fa-edit"></i><span class="label-golden">drawing</span>
									<i class="fa fa-coffee"></i><span class="label-golden">photoshop</span>
									<i class="fa fa-music"></i><span class="label-golden">jazz</span>
								</span>
							</div>
						</div>

						<h4>Get In Touch</h4>

						<p>If you dig the site, emails are always appreciated. You can also contact me through one of my social media.</p>

						<ul class="about-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
							<li><a href="#"><i class="fa fa-envelope"></i></a></li>
						</ul>

					</div>
				</div>
			</div>
		</div>

		@include('partials.footer')
@endsection