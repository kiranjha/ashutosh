@extends('layouts.app')

@section('content')

<h1 class="center" style="margin-top:10px">Update Article</h1>
{!! Form::open(['action' => ['ArticlesController@update', $data->id], 'method'=> 'POST']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$data->title,[ 'class'=>'form-control', 'placeholder'=>'Type the title of the post'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','Body')}}
        {{Form::textarea('body',$data->body,[ 'id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Enter Your Text Here'])}}
    </div

    <div class="form-group">
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
{!! Form::close() !!}
    
@endsection