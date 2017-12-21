@extends('layouts.app')

@section('content')

<h1 class="center" style="margin-top:10px">Create Articles</h1>
{!! Form::open(['action' => 'ArticlesController@store', 'method'=> 'POST']) !!}
    <div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',[ 'class'=>'form-control', 'placeholder'=>'Type the title of the post'])}}
    </div>
    <div class="form-group">
    {{Form::label('title','Body')}}
    {{Form::textarea('body','',[ 'id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Enter Your Text Here'])}}
    </div>
    
    <div class="form-group">
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    
{!! Form::close() !!}
    
@endsection