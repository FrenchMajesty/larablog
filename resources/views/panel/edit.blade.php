@php($post = isset($content->url) ? 'image' : 'post')
@section('pageTitle','Edit My '. ucfirst($post))
@extends ('panel')

@section('content')
<div class="comment-box">

    <h2 class="title">Edit your Publication</h2>
    <div class="comment-block">

        <div class="comment-item">
            <div class="comment-body">
                <p class="comment-text">You can correct all your typos and re-arrange the structure and formatting of your entire publication here.</p>
                 @if(session('status'))
                    <br>
                    <div class="laalert alert-success fade in" role="alert">
                        <strong>{{session('status')}}</strong>
                    </div>
                @endif
                <form id="edit" method="post" action="{{$post == 'image' ? route('panel.gallery.update', [$content]) : route('panel.post.update', [$content])}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="comment-form">

                        <input type="hidden" name="id" value="{{$content->id}}">
                        @if ($errors->has('id'))
                            <br>
                            <div class="laalert alert-danger fade in" role="alert">
                                <strong>{{ $errors->first('id') }}</strong>
                            </div>
                        @endif

                        <span><a href="#" class="comment-reply">Title</a></span>
                        <div class="row"><input value="{{old('title') ?: $content->title}}" name="title" type="text" class="comment-input" placeholder="Title" type="text" autocomplete="off" maxlength="120" required></div>
                        @if ($errors->has('title'))
                            <br>
                            <div class="laalert alert-danger fade in" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                        @endif
                        <div class="row">
                            @if($post == 'image')
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <span><a href="#" class="comment-reply">Media</a></span>
                                        <img src="{{$content->url}}">
                                    </div>
                                </div>
                            @elseif($post == 'post')
                                <?php
                                    if($content->has_picture){
                                        $postType = 'picture';
                                    }elseif($content->has_video){
                                        $postType = 'media';
                                    }else {
                                        $postType = 'text';
                                    }
                                ?>
                                <input type="hidden" name="type" value="{{$postType}}">
                                @if($content->has_picture)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span><a href="#" class="comment-reply">Image</a></span>
                                                <center>
                                                    <img id="img" src="{{old('image') ?: $content->picture}}" style="width: 50%">
                                                </center>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <input type="hidden" name="image" value="{{old('image') ?: $content->picture}}">
                                        <a href="#" id="uploader" class="btn btn-grey">Upload Picture</a>
                                    </div>
                                    @if ($errors->has('image'))
                                        <br>
                                        <div class="laalert alert-danger fade in" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </div>
                                    @endif
                                @elseif($content->has_video)
                                    <span><a href="#" class="comment-reply">Media</a></span>
                                    <div class="row">
                                        <textarea name="embed" class="comment-textarea" placeholder="Copy and paste here your content's embed tags." style="height: 11em;" required autocomplete="off" maxlength="500">{{old('embed') ?: $content->embed}}</textarea>
                                    </div>
                                    @if ($errors->has('embed'))
                                        <br>
                                        <div class="laalert alert-danger fade in" role="alert">
                                            <strong>{{ $errors->first('embed') }}</strong>
                                        </div>
                                    @endif
                                @endif

                                <span><a href="#" class="comment-reply">Description</a></span>
                                <div class="row">
                                    <textarea name="description"  class="comment-textarea" placeholder="Tell us more here about this thing you're about to post..." required maxlength="400" style="height: 11em">{{old('description') ?: $content->description}}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <br>
                                    <div class="laalert alert-danger fade in" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif


                                <span><a href="#" class="comment-reply">Content</a></span>
                                <div class="row">
                                    <textarea name="content" id="editor" required maxlength="20000">{!! old('content') ?: $content->content !!}</textarea>
                                </div>
                                @if ($errors->has('content'))
                                    <br>
                                    <div class="laalert alert-danger fade in" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </div>
                                @endif
                            @endif
                        </div>

                        <span><a href="#" class="comment-reply">Category</a></span>
                        <div class="row">
                            <select class="comment-input" name="category" required>
                                <option value="" disabled>-- Please select an option</option>
                                @php($chosenCategory = old('category') ?: $content->category_id)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$chosenCategory == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
                            <input value="{{old('tags') ?: $content->tags->pluck('name')->implode(',')}}" name="tags" type="text" class="comment-input" placeholder="Enter tags comma separated" type="text" maxlength="100" autocomplete="off" required>
                        </div>
                        @if ($errors->has('tags'))
                            <br>
                            <div class="laalert alert-danger fade in" role="alert">
                                <strong>{{ $errors->first('tags') }}</strong>
                            </div>
                        @endif

                        @if ($errors->has('type'))
                            <br>
                            <div class="laalert alert-danger fade in" role="alert">
                                <strong>{{ $errors->first('type') }}</strong>
                            </div>
                        @endif
                        <br><button type="submit" class="btn btn-lg btn-golden">Update {{ucfirst($post)}}</button>
                        <a href="#" id="delete" class="btn btn-lg btn-danger">Delete</a>
                    </div>
                </form>
                <form id="delete-form" method="post" action="{{$post == 'image' ? route('panel.gallery.delete', [$content]) : route('panel.post.delete', [$content])}}">
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => { 
        $('#delete').on('click', () => $('#delete-form').submit())

        setTimeout(() => {
            $('#editor').froalaEditor({ height: 150 })
            .on('froalaEditor.image.beforeUpload',() => { return false })
        }, 5)

        document.getElementById("uploader").addEventListener("click", () => {
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
            form: '#edit',
            thumbnails: false,
            button_class: 'btn btn-grey uploader',
            button_caption: 'Upload your image',
            cloud_name: '{{env('CLOUDINARY_NAME')}}',
            upload_preset: '{{env('CLOUDINARY_PRESET')}}',
        }, (error, result) => { 
            if(result && result.length > 0) {
                let imgUrl = result[0].secure_url
                imgUrl = imgUrl.replace('/upload/',`/upload/c_crop,g_custom/w_500,h_500/`)
                $('#img').attr('src', imgUrl)
                $('input[name="image"]').val(imgUrl)
            }
            console.log(error, result) 
          });
      }, false);
    })
</script>

@endsection