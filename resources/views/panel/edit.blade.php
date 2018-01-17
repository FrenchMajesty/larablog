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
                <form method="post" action="{{$post == 'image' ? route('panel.gallery.update', [$content]) : route('panel.post.update', [$content])}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="comment-form">
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

                                @if($content->has_image)
                                    <img src="{{$content->picture}}">
                                @endif

                                <span><a href="#" class="comment-reply">Description</a></span>
                                <div class="row">
                                    <textarea name="description"  class="comment-textarea" placeholder="Tell us more here about this thing you're about to post..." required maxlength="400" style="height: 11em">{{old('description') ?: $content->content}}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <br>
                                    <div class="laalert alert-danger fade in" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif

                                @if($content->has_video)
                                    <span><a href="#" class="comment-reply">Media</a></span>
                                    <div class="row">
                                        <textarea name="embed" class="comment-textarea" placeholder="Copy and paste here your content's embed tags." style="height: 11em;" required autocomplete="off" maxlength="500">{{old('embed') ?: $content->content}}</textarea>
                                    </div>
                                    @if ($errors->has('embed'))
                                        <br>
                                        <div class="laalert alert-danger fade in" role="alert">
                                            <strong>{{ $errors->first('embed') }}</strong>
                                        </div>
                                    @endif
                                @else
                                    <span><a href="#" class="comment-reply">Content</a></span>
                                    <div class="row">
                                        <textarea name="content" id="html-editor" required maxlength="10000">{!! old('content') ?: $content->content !!}</textarea>
                                    </div>
                                    @if ($errors->has('content'))
                                        <br>
                                        <div class="laalert alert-danger fade in" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>

                        <span><a href="#" class="comment-reply">Category</a></span>
                        <div class="row">
                            <select class="comment-input" name="category" required>
                                <option value="" disabled>-- Please select an option</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$content->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
                            <input value="{{old('tags') ?: $content->tags->pluck('name')->implode(',')}}" name="tags" type="text" class="comment-input" placeholder="Enter tags comma separated" type="text" maxlength="100" autocomplete="off">
                        </div>
                        @if ($errors->has('tags'))
                            <br>
                            <div class="laalert alert-danger fade in" role="alert">
                                <strong>{{ $errors->first('tags') }}</strong>
                            </div>
                        @endif

                        <input type="hidden" name="id" value="{{$content->id}}">
                        <input type="hidden" name="type" value="{{$post}}">

                        @if ($errors->has('id'))
                            <br>
                            <div class="laalert alert-danger fade in" role="alert">
                                <strong>{{ $errors->first('id') }}</strong>
                            </div>
                        @endif

                        @if ($errors->has('type'))
                            <br>
                            <div class="laalert alert-danger fade in" role="alert">
                                <strong>{{ $errors->first('type') }}</strong>
                            </div>
                        @endif
                        <br><button type="submit" class="btn btn-lg btn-golden">Update {{ucfirst($post)}}</button>
                        <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => { pageLoaded['editPost']() })
</script>

@endsection