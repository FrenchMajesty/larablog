@yield('pageTitle', 'Get in Touch')
@extends ('layout')

@section('content')
<div class="canvas">
	<section class="post-fluid">
		<div class="container-fluid">
			<div class="row laread-contact">
				<div class="contact-box">
					<span class="icon-contact"><i class="fa fa-paper-plane"></i></span>
				</div>
				<div class="contact-info">
					<h2>Contact</h2>
					<p class="text-contact"><i class="fa fa-map-marker"></i>  216 King Street, Toronto, Canada</p>
					<a href="mailto:noset@example.com" class="text-contact"><i class="fa fa-envelope"></i>  hello@laread.com</a>
					<div class="contact-form">
						<form onSubmit="return false;">
							<input class="contact-input" placeholder="Name" type="text" />
							<input class="contact-input" placeholder="Surname" type="text" />
							<input class="contact-input" placeholder="Subject" type="text" />
							<input class="contact-input" placeholder="Email" type="text" />
							<textarea class="contact-textarea" placeholder="Message"></textarea>
							<div class="clearfix">
								<div class="progress-button">
									<p>
										<button class="btn btn-grey btn-outline"><span>SEND (success)</span></button>
										<svg class="progress-circle" width="70" height="70">
											<path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/>
										</svg>
										<svg class="checkmark" width="70" height="70">
											<path d="m31.5,46.5l15.3,-23.2"/><path d="m31.5,46.5l-8.5,-7.1"/>
										</svg>
										<svg class="cross" width="70" height="70">
											<path d="m35,35l-9.3,-9.3"/><path d="m35,35l9.3,9.3"/><path d="m35,35l-9.3,9.3"/><path d="m35,35l9.3,-9.3"/>
										</svg>
									</p>
								</div>
								<div class="progress-button">
									<p>
										<button class="btn btn-grey btn-outline"><span>SEND (error)</span></button>
										<svg class="progress-circle" width="70" height="70">
											<path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/>
										</svg>
										<svg class="checkmark" width="70" height="70">
											<path d="m31.5,46.5l15.3,-23.2"/><path d="m31.5,46.5l-8.5,-7.1"/>
										</svg>
										<svg class="cross" width="70" height="70">
											<path d="m35,35l-9.3,-9.3"/><path d="m35,35l9.3,9.3"/><path d="m35,35l-9.3,9.3"/><path d="m35,35l9.3,-9.3"/>
										</svg>
									</p>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="embed-responsive embed-responsive-16by9 contact-map">
					<div id="map"></div>
				</div>
				<div class="laread-contact-touch">
					<h4>Get In Touch</h4>
					<p>If you dig the site, subscribe by RSS or email. Comments and emails are always appreciated. You can also contact me through one of my social media.</p>

					<div class="newsletter-box clearfix">
						<!--
							Join our mailing list
							Enter your email address
						-->
						<input type="text" class="" placeholder="Join our mailing list">
						<button class="btn btn-golden" type="button">SEND</button>
					</div>

					<ul class="about-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection