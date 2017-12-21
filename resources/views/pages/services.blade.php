{{--  Currently Not in use  --}}
@extends('layouts.app')
@section('content')
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
            <a href="/">{{$title1}}</a>
            <a href="/about">{{$title2}}</a>
            <a href="/services">{{$title3}}</a>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    This is Services Page
                </div>
                {{--  <h1>{{$title4}}</h1>  --}}
                {{--  @if(count($friends)>0)
                <table>
                <tr>
                    @foreach($friends as $result)
                        <th>{{$result}}</th>
                    @endforeach
                </tr>
                </table>
                @endif  --}}

                @if(count($title4)>0)
                    <h3>Worked</h3>
        {{--  @foreach($title4 as $value)  --}}
        {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST']) !!}
            {{Form::label('type', 'Select Document')}}
            {{Form::select('Select Document',$title4,null,['class'=>'form-control', 'Placeholder'=>'Select Document Type'])}}
        {!! Form::close() !!}
        {{--  @endforeach  --}}
                @else <h3>Error</h3>
                @endif

            </div>
        </div>
@endsection