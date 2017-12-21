@extends('layouts.app')
@section('content')
    <div class="row">
        <a class="btn btn-primary" href="/posts/create">CREATE</a>
        <a class="btn btn-primary" href="/posts">VIEW</a>
        <a class="btn btn-primary" href="#">DELETE</a>
    </div>
    @yield('post_content')

@endsection