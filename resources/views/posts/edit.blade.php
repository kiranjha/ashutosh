@extends('layouts.posts')

@section('post_content')

<h1 class="center" style="margin-top:10px">Update Posts</h1>
{!! Form::open(['action' => ['PostsController@update', $data->id], 'method'=> 'POST', 'enctype' =>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$data->title,[ 'class'=>'form-control', 'placeholder'=>'Type the title of the post'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','Body')}}
        {{Form::textarea('body',$data->body,[ 'id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Enter Your Text Here'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>

    <div class="form-group">
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
{!! Form::close() !!}
    
@endsection