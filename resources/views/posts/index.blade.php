@extends('layouts.posts')
@section('post_content')
<h1 id="test">Posts</h1>
    @if(count($data)>0)
        @foreach($data as $post)
            <div class="row">
                <div class="col-sm-5">
                    <img src="/storage/cover_images/{{$post->cover_image}}" style="width:200px; height:200px;">
                </div>
                <div class="col-sm-7">
                    <h3><a href='{{ url("/posts/{$post->id}") }}'>{{$post->title}}</a></h3>
                    <small>Written On: {{$post->created_at}}</small><br>
                    <small>Written By: {{$post->created_at}}</small>

<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url("/posts/{$post->id}")) }}"
    target="_blank" class="btn btn-info social-share">
    Facebook
</a>

<a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}"
    target="_blank" class="btn btn-info social-share">
    Twitter
</a>
<a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}"
    target="_blank" class="btn btn-info social-share">
    Google
</a>
                    
                    {{--  <p><div class="addthis_inline_share_toolbox"></div></p>  --}}
                </div>
                
            </div>
        @endforeach
        {{$data->links()}}
    @else
        <p>No Posts Found</p>
    @endif
@endsection
