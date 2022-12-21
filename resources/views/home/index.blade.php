@extends('layouts.basic')

@section('title', 'Blog Index')

@section('content')
    <p>Posts on the blog:</p>
    <ul>
        @foreach ($posts as $post)  
            <li><a href="{{ route('home.show', ['id' => $post->id]) }}">{{$post->title}}</a></li>
        @endforeach
    </ul>
    <a href="{{ route('home.create') }}">Create Post</a>
@endsection