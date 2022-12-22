@extends('layouts.basic')

@section('title', 'Blog Index')

@section('content')
    <ul>
        @foreach ($posts as $post)
            <li class="postBox"><a href="{{ route('home.show', ['id' => $post->id]) }}">Title: {{$post->title}}</a>
            <br>Comments: {{$post->comments->count()}}
            </li>
        @endforeach
    </ul>
    <div class="postButton"><a href="{{ route('home.create') }}">Create Post</a></div>
    {{ $posts -> links('pagination::tailwind')}}
@endsection