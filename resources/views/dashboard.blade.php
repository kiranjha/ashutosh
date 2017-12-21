@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
                    
                    <h3>Edit your post</h3>
                    @if(!empty($posts) && count($posts)>0)
                    <table class="table table-hover table-responsive table-bordered table-condensed">
                        <tr>
                            <th>Title</th>
                            <th>IMAGE</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                            <th>SHARE</th>
                        </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td><a href="/posts/{{$post->id}}">{{$post->title}}And {{$post->cover_image}}</a></td>
                            <td>
                                <img src="/storage/cover_images/{{$post->cover_image}}" style="width:200px; height:200px;">
                            </td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                            <td>
                                {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                            <td><a href="{{ route('SendEmail') }}" class="btn btn-primary">Send Mail</a></td>
                        </tr>
                    @endforeach
                    </table>
                    @else <div>Don't have any post</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
