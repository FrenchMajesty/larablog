@section('pageTitle','Edit Your Account Details')
@extends ('panel')

@section('content')
<div class="container">
			<div class="head-text text-highlight">
				<h1>Edit My Account</h1>
			</div>
		</div>
<div class="post-fluid">
			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="col-md-2">
							<div class="post-item-short">
                                <span class="small-text">Today is:</span>
								<span class="big-text">{{date('d')}}</span>
								<span class="small-text">{{date('M, Y')}}</span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="comment-box">
								<div class="comment-block">
									<div class="comment-item">
										<div class="comment-body">
                                            @if(session('status'))
                                                <br>
                                                <div class="laalert alert-success fade in" role="alert">
                                                    <strong>{{session('status')}}</strong>
                                                </div>
                                            @endif
                                            @if(session('password-status'))
                                                <br>
                                                <div class="laalert alert-success fade in" role="alert">
                                                    <strong>{{session('password-status')}}</strong>
                                                </div>
                                            @endif
                                            <form id="profile" method="post" action="{{route('panel.account')}}" enctype="multipart/form-data">
                                            	{{csrf_field()}}
                                                <h6 class="comment-heading">Picture</h6><br>
                                                <div class="comment-form">
                                                	<div class="row laread-about">
                                                		<center class="about-picture">
                                                			<img id="img" style="width: 50%" src="{{old('image') ?: $user->picture}}">
                                                		</center>
                                                	</div><br><br>
                                                    <div class="row">
                                                		<a href="#" id="uploader" class="btn btn-golden btn-lg" style="width: 40%">Upload Picture</a>
                                                    </div>
                                                    <input type="hidden" name="image" value="{{old('image') ?: $user->picture}}">
                                                    @if ($errors->has('image'))
                                                        <br>
                                                        <div class="laalert alert-danger fade in" role="alert">
                                                            <strong>{{ $errors->first('image') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>

                                                <h6 class="comment-heading">Email</h6><br>
                                                <div class="comment-form">
                                                    <div class="row">
                                                    <input value="{{old('email') ?: $user->email}}" class="comment-input" placeholder="Email" type="email" name="email" required>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <br>
                                                        <div class="laalert alert-danger fade in" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>


                                                <h6 class="comment-heading">Name</h6><br>
                                                <div class="comment-form">
                                                    <div class="row">
                                                    <input value="{{old('firstname') ?: $user->firstname}}" class="comment-input" placeholder="First name" type="text" name="firstname" required>
                                                    <input value="{{old('lastname') ?: $user->lastname}}" class="comment-input" placeholder="Last name" type="text" name="lastname" required>
                                                    </div>
                                                    @if ($errors->has('name'))
                                                        <br>
                                                        <div class="laalert alert-danger fade in" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>

                                                <h6 class="comment-heading">Location</h6><br>
                                                <div class="comment-form">
                                                    <div class="row">
                                                    <input value="{{old('location') ?: $user->location}}" class="comment-input" placeholder="eg: Barcelona, Spain" type="text" name="location" maxlength="80" required>
                                                    </div>
                                                    @if ($errors->has('location'))
                                                        <br>
                                                        <div class="laalert alert-danger fade in" role="alert">
                                                            <strong>{{ $errors->first('location') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>

                                                <h6 class="comment-heading">Biography</h6><br>
                                                <div class="comment-form">
                                                    <div class="row">
                                                    <textarea name="biography" class="comment-input" rows="6" placeholder="Tell us the story of who you are." style="width: 100%;" required>{{old('biography') ?: $user->biography}}</textarea>
                                                    </div>
                                                    @if ($errors->has('biography'))
                                                        <br>
                                                        <div class="laalert alert-danger fade in" role="alert">
                                                            <strong>{{ $errors->first('biography') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <button class="btn btn-grey btn-lg" style="width: 40%">Update</button>
                                            </form>

                                            <form method="post" action="{{route('password.update')}}" style="margin-top: 6em;">
                                                {{csrf_field()}}
                                                <h6 class="comment-heading">New password</h6><br>
                                                <div class="comment-form">
                                                    @if ($errors->has('email'))
                                                        <br>
                                                        <div class="laalert alert-danger fade in" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                    <input class="comment-input" placeholder="Enter your new password" type="password" name="password" required>
                                                    <input class="comment-input" placeholder="Repeat your new password" type="password" name="password_confirmation" required>
                                                    </div>
                                                    @if ($errors->has('password'))
                                                        <br>
                                                        <div class="laalert alert-danger fade in" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                                <button class="btn btn-warning" style="width: 40%">Update Password</button><br>
                                            </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<script type="text/javascript">  
  document.getElementById("uploader").addEventListener("click", function() {
    cloudinary.openUploadWidget(
    { 
		cropping: 'server',
		sources: ['local','url','facebook'],
		theme: 'minimal',
		multiple: false,
		cropping_aspect_ratio: 1,
		folder: 'kaleb_blog',
		tags: ['profile'],
		resource_type: 'image',
		form: '#profile',
		thumbnails: false,
		button_class: 'btn btn-golden uploader',
		button_caption: 'Upload your image',
    	cloud_name: '{{env('CLOUDINARY_NAME')}}',
    	upload_preset: '{{env('CLOUDINARY_PRESET')}}',
    }, 
      function(error, result) { 
      	if(result && result.length > 0) {
      		let imgUrl = result[0].secure_url
      		imgUrl = imgUrl.replace('/upload/',`/upload/c_crop,g_custom/w_500,h_500/`)
      		$('#img').attr('src', imgUrl)
      		$('input[name="image"]').val(imgUrl)
      	}
      	console.log(error, result) 
      });
  }, false);
</script>
@endsection