@section('pageTitle','Add a Publication')
@extends ('panel')

@section('content')
<style type="text/css">
    .comment-input {
        width: 100% !important;
    }
</style>
<div class="container">
            <div class="head-text text-highlight">
                <h1>Post a New Blog Publication</h1>
            </div>
        </div>
<div class="post-fluid">
    <div class="container-fluid">
        <div class="container">
            <div class="row post-items">
                <div class="col-md-10 col-md-offset-1">
                    <div class="comment-box">
                        <div class="comment-block" style="width: 100%">
                            <div class="comment-item">
                                <div class="comment-body">
                                    <form id="add" method="post" action="">
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

                                            <span><a href="#" class="comment-reply">Type of the Publication</a></span>
                                            <div class="row">
                                                <label class="radio-inline"><input type="radio" name="type" value="text" {{old('type') == 'text' ? 'selected' : ''}} required />Text Only</label>

                                                <label class="radio-inline"><input type="radio" name="type" value="picture" {{old('type') == 'picture' ? 'selected' : ''}} />With Picture</label>

                                                <label class="radio-inline"><input type="radio" name="type" value="media" {{old('type') == 'media' ? 'selected' : ''}} />Embedded Media</label>
                                            </div>
                                             @if ($errors->has('type'))
                                                <br>
                                                <div class="laalert alert-danger fade in" role="alert">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </div>
                                            @endif

                                            <div id="new-row" class="row">
                                                @if(old('image'))
                                                    <div class="row">
                                                        <div class="col-md-12">
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
                                                @elseif(old('embed'))
                                                    <textarea name="embed" class="comment-textarea" placeholder="Copy & Paste the <iframe> link of your content here" style="height: 11em; display: none;" required>{{old('embed')}}</textarea>
                                                        <p>Please make sure that your embed link's <b>width</b> is set to 100% and <b>height</b> to 450px.</p>
                                                @endif
                                            </div>
                                             @if ($errors->has('embed'))
                                                <br>
                                                <div class="laalert alert-danger fade in" role="alert">
                                                    <strong>{{ $errors->first('embed') }}</strong>
                                                </div>
                                            @endif

                                             @if ($errors->has('image'))
                                                <br>
                                                <div class="laalert alert-danger fade in" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </div>
                                            @endif

                                            <span><a href="#" class="comment-reply">Description</a></span>
                                            <div class="row">
                                                <textarea name="description" class="comment-input" rows="6" placeholder="Write a short description of what your publication is about" style="width: 100%;" required maxlength="400">{{old('description')}}</textarea>
                                            </div>
                                             @if ($errors->has('description'))
                                                <br>
                                                <div class="laalert alert-danger fade in" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </div>
                                            @endif

                                            <span><a href="#" class="comment-reply">Content</a></span>
                                            <div class="row">
                                                <textarea id="editor" name="content" class="comment-input" rows="6" placeholder="Write about your publication here.." style="width: 100%;" required maxlength="20000">{{old('content') ?: ' '}}</textarea>
                                            </div>
                                             @if ($errors->has('content'))
                                                <br>
                                                <div class="laalert alert-danger fade in" role="alert">
                                                    <strong>{{ $errors->first('content') }}</strong>
                                                </div>
                                            @endif

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

                                            <br><button type="submit" class="btn btn-lg btn-golden">Create Publication</button>
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
    document.addEventListener('DOMContentLoaded', () => {

        setTimeout(() => {
            $('#editor').froalaEditor({ height: 150 })
            .on('froalaEditor.image.beforeUpload',() => { return false })
        }, 5)

        $('input[name="type"]').on('change', (e) => {
            const buttonName = e.target.value
            let newInput = ''

            if(buttonName == 'picture') {
                newInput = $(`
                    <div style="display: none">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span><a href="#" class="comment-reply">Media</a></span>
                                <center>
                                    <img id="img" src="" style="width: 50%">
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <input type="hidden" name="image">
                        <a href="#" id="uploader" class="btn btn-grey">Upload Picture</a>
                    </div>
                    </div>
                `)
                setTimeout(initCloudinary, 5)

            } else if(buttonName == 'media') {
                newInput = $(`<textarea name="embed" class="comment-textarea" placeholder="Copy & Paste the <embed> link of your content here" style="height: 11em; display: none;" required></textarea>
                    <p>Please make sure that your embed link's <b>width</b> is set to 100% and <b>height</b> to 450px.</p>`)
            }else {
                newInput = $('<i></i>')
            }

            // Animate and show new input
            $('#new-row').html(newInput)
            newInput.slideDown(700)
        })
    })

function initCloudinary() {
  document.getElementById("uploader").addEventListener("click", function() {
    cloudinary.openUploadWidget(
    { 
        cropping: 'server',
        sources: ['local','url','facebook'],
        theme: 'minimal',
        multiple: false,
        cropping_aspect_ratio: 1,
        folder: 'kaleb_blog',
        tags: ['posts'],
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
}
</script>
@endsection