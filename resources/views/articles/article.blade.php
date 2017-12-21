@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($data)>0)
        @foreach($data as $post)
            <div class="row">
                
                <div class="col-sm-7">
                    <h3><a href="/articles/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>Written On: {{$post->created_at}}</small>
                </div>
                
            </div>
        @endforeach
        {{--  {{$data->links()}}  --}}
    @else
        <p>No Posts Found</p>
    @endif
@endsection