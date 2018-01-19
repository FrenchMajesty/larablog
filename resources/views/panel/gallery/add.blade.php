@section('pageTitle','Upload an Image')
@extends ('panel')

@section('content')
<style type="text/css">
    .comment-input {
        width: 100% !important;
    }
</style>
<div class="container">
            <div class="head-text text-highlight">
                <h1>Add a New Image</h1>
            </div>
        </div>
<div class="post-fluid">
    <div class="container-fluid">
        <div class="container">
            <div class="row post-items">
                <div class="col-md-8 col-md-offset-2">
                    <div class="comment-box">
                        <div class="comment-block">
                            <div class="comment-item">
                                <div class="comment-body">
                                    <p class="comment-text">You can upload images to your gallery portfolio here.</p>
                                    <form id="add" method="post" action="{{route('panel.gallery.add')}}">
                                        {{csrf_field()}}

                                        <div class="comment-form">
                                            <span><a href="#" class="comment-reply">Title</a></span>
                                            <div class="row"><input value="{{old('title')}}" name="title" type="text" class="comment-input" placeholder="Title" type="text" autocomplete="off" maxlength="120" required></div>
                                            @if ($errors->has('title'))
                                                <br>
                                                <div class="laalert alert-danger fade in" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <span><a href="#" class="comment-reply">Media</a></span>
                                                        <center>
                                                            <img id="img" src="{{old('image')}}" style="width: 50%">
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <input type="hidden" name="image" value="{{old('image')}}">
                                                <a href="#" id="uploader" class="btn btn-grey">Upload Picture</a>
                                            </div>

                                            <span><a href="#" class="comment-reply">Category</a></span>
                                            <div class="row">
                                                <select class="comment-input" name="category" required>
                                                    <option value="" {{ old('category') ? '' : 'selected'}} disabled>-- Please select an option</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected': ''}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('category'))
                                                <br>
                                                <div class="laalert alert-danger fade in" role="alert">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                </div>
                                            @endif

                                            <span><a href="#" class="comment-reply">Tags</a></span>
                                            <div class="row">
                                                <input value="{{old('tags')}}" name="tags" type="text" class="comment-input" placeholder="Enter tags comma separated" type="text" maxlength="100" autocomplete="off">
                                            </div>
                                            @if ($errors->has('tags'))
                                                <br>
                                                <div class="laalert alert-danger fade in" role="alert">
                                                    <strong>{{ $errors->first('tags') }}</strong>
                                                </div>
                                            @endif

                                            <br><button type="submit" class="btn btn-lg btn-golden">Add to Gallery</button>
                                        </div>
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
        tags: ['portfolio'],
        resource_type: 'image',
        form: '#add',
        thumbnails: false,
        button_class: 'btn btn-grey uploader',
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