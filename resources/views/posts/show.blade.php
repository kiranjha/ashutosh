@extends('layouts.app')
@section('content')
            <div class="content">
            <a class="btn btn-default" href="/posts">BACK</a>
                <div class="title m-b-md">
                    {{$data->title}}
                </div>
                <img src="/storage/cover_images/{{$data->cover_image}}" style="width:200px; height:200px;">
                <div style="font-size:40px;">{!!$data->body!!}</div>
                <div style="font-size:40px;">Written On: {{$data->created_at}}</div>
                <div style="font-size:40px;">Created By: {{$data->user->name}}</div>
                <hr>
                <div class="comments">
                    <ul class="list-group">
                    @foreach($data->comments as $comment)
                        <li class="list-group-item">
                            <strong>
                                {{ $comment->created_at->diffForHumans() }}: &nbsp;
                            </strong>
                            {{ $comment->body }}
                        </li>
                    @endforeach
                    </ul>
                </div>
                <hr>
                <div class="panel panel-white">
                <div class="panel-heading">Add Your Comment</div>
                <div class="panel-body">
                    <div class="panel-content">
                        {!! Form::open(['action' => 'CommentsController@store', 'method' => 'POST']) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{Form::label('title','Comment Here')}}
                                {{Form::textarea('body','',['class'=>'form-control', 'placeholder'=>'Enter Your Comment Here'])}}
                            </div>
                            <div class="form-group">
                                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                            </div>
                            {{ Form::hidden('post_id', $data->id) }}
                            {{ Form::hidden('user_id', $data->user->id) }}
                        {!! Form::close() !!}
                    </div>
                </div>
                </div>
                <hr>
                <a href="/posts/{{$data->id}}/edit" class="btn btn-default">EDIT</a>
                {!!Form::open(['action'=>['PostsController@destroy', $data->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
@endsection