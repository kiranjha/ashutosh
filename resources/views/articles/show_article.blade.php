@extends('layouts.app')
@section('content')
            <div class="content">
            <a class="btn btn-default" href="/articles">BACK</a>
                <div class="title m-b-md">
                    {{$data->title}}
                </div>
                
                <div style="font-size:40px;">{!!$data->body!!}</div>
                <div style="font-size:40px;">Written On: {{$data->created_at}}</div>
                
                <hr>
                <a href="/articles/{{$data->id}}/edit" class="btn btn-default">EDIT</a>
                {!!Form::open(['action'=>['ArticlesController@destroy', $data->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
@endsection