@extends('layouts.basic')

@section('title', 'Blog Index')

@section('content')
    <ul>
        @foreach ($posts as $post)
            <li class="postBox"><a href="{{ route('home.show', ['id' => $post->id]) }}">{{$post->title}}</a></li>
        @endforeach
    </ul>
    <div class="pButton"><a href="{{ route('home.create') }}">Create Post</a></div>
@endsection