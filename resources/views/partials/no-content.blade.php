<div class="container-fluid">
	<div class="row laread-404">
		<div class="icon-box">
			<span class="icon-404"><i class="fa fa-question"></i></span>
		</div>
		<div class="info-404">
			<h2>Ooopps!</h2>
			<p class="text-404">The author of this blog has not posted any content yet... Keep up with {{env('BLOGGER_NAME')}} on social media to stay up to date!</p>
			<a href="{{route('about')}}" class="btn btn-golden" style="text-transform: uppercase;">Connect With {{env('BLOGGER_NAME')}}</a>
			<button id="previous" type="button" class="btn btn-grey btn-outline">PREVIOUS PAGE</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	document.getElementById('previous').addEventListener('click',() => window.history.back())
</script>