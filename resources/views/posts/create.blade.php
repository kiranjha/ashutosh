@extends('layouts.posts')

@section('post_content')

<h1 class="center" style="margin-top:10px" id="test">Create Posts</h1>
{!! Form::open(['action' => 'PostsController@store', 'method'=> 'POST', 'enctype' =>'multipart/form-data']) !!}
    
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',[ 'class'=>'form-control', 'placeholder'=>'Type the title of the post'])}}
    </div>
    
    <div class="form-group">
        {{Form::label('category','Select Category')}}
        {{Form::text('category','',[ 'id'=>'search', 'class'=>'form-control', 'placeholder'=>'Select Category'])}}
    </div>
    
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',[ 'id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Enter Your Text Here'])}}
    </div>
    
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    
    <div class="form-group">
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    
{!! Form::close() !!}
    
@endsection
