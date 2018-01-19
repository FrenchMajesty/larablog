@section('pageTitle','Manage the Gallery')
@extends ('panel')

@section('content')
<div class="container">
    <div class="head-gallery">
        <h1 class="gallery-h1">Manage Gallery</h1>
        @if(session('status'))
            <br>
            <div class="laalert alert-success fade in" role="alert">
                <strong>{{session('status')}}</strong>
            </div>
        @endif
    </div>
</div>
<div class="post-fluid">
            <div class="container">
                @if($gallery->count() > 0)
                    <div class="row gallery-twice">
                        @foreach($gallery as $image)
                        <div class="col-md-6 lifestyle" data-item="{{$image->id}}">
                            <div class="gallery-line clearfix">
                                <div class="col-md-6">
                                    <a data-gallery-item="list-1" href="{{route('panel.gallery.edit',[$image])}}" class="banner-link">
                                        <img src="{{$image->url}}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-6 gi-item">
                                    <div class="gi-top clearfix">
                                        @if($image->category)
                                            <a href="#">{{ucfirst($image->category->name)}}</a>
                                        @endif
                                    </div>
                                    <div class="gi-content">
                                        <h4><a href="{{route('panel.gallery.edit',[$image])}}">{{strtoupper($image->title)}}</a></h4>
                                    </div>
                                    <div class="gi-bottom">
                                        <a href="{{route('panel.gallery.edit',[$image])}}"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="#" class="delete" data-image-id="{{$image->id}}">
                                            <i class="fa fa-trash-o delete" data-image-id="{{$image->id}}"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="delete-form{{$image->id}}" method="post" action="{{route('panel.gallery.delete', [$image])}}">
                            {{csrf_field()}}
                        </form>
                        @endforeach
                    </div>

                        @if($gallery->count() > 0)
                        <div class="row default-post-nav">
                            <div class="container">
                                <div class="col-md-10 col-md-offset-2">
                                    @if($gallery->previousPageUrl())
                                    <a href="{{$gallery->previousPageUrl()}}" class="post-nav post-newer">← NEWER</a>
                                    @endif

                                    @if($gallery->hasMorePages())
                                        <a href="{{$gallery->nextPageUrl()}}" class="post-nav post-older">OLDER →</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="post-mediums">
                        <div class="row post-medium nopacity visible animated fadeInUp">
                            <div class="col-md-12">
                                <div class="post-item" style="height: 275px;">
                                    <div class="medium-post-box clearfix">
                                        <div class="pm-top-info clearfix">
                                            <div class="pull-left">
                                                <a href="#">WARNING</a>
                                            </div>
                                            <div class="post-item-social">
                                                <a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="post-item-paragraph">
                                            <h2><a href="#">Oops! Sorry, but....</a></h2>
                                            <p class="ellipsis-readmore" style="word-wrap: break-word;">There aren't any picture in your gallery yet for you to manage. However, once you start posting pictures of your work you will be able to edit, and delete them here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
<script>
    document.addEventListener('DOMContentLoaded', () => { 
        $('.delete').on('click', (e) => {
            const id = $(e.target).attr('data-image-id')
            $(`#delete-form${id}`).submit()
        })
    })
</script>

@endsection