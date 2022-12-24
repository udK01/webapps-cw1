@extends('layouts.basic')

@section('title', 'Blog Index')

@section('content')

    {{-- Posts Displayed On Main Page --}}
    @foreach ($posts as $post)
            <a href="{{ route('home.show', ['id' => $post->id]) }}">
            <div class="postBox">
                    Poster: {{$post->user->name}}
                <br>Title: {{$post->title}}
                <br>Comments: {{$post->comments->count()}}</div></a>
            
    @endforeach

    {{-- Post Button --}}
    <a href="{{ route('home.create') }}"><div class="postButton">Create Post</div></a>
    {{ $posts -> links('pagination::tailwind')}}
@endsection