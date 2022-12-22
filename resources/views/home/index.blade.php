@extends('layouts.basic')

@section('title', 'Blog Index')

@section('content')
    {{-- <ul>
        @foreach ($posts as $post)
            <a href="{{ route('home.show', ['id' => $post->id]) }}"><li class="postBox">Title: {{$post->title}}</a>
            <br>Comments: {{$post->comments->count()}}
            </li>
        @endforeach
    </ul> --}}

    @foreach ($posts as $post)
            <a href="{{ route('home.show', ['id' => $post->id]) }}">
            <div class="postBox">
                    Poster: {{$post->user->name}}
                <br>Title: {{$post->title}}
                <br>Comments: {{$post->comments->count()}}</div></a>
            
    @endforeach

    <a href="{{ route('home.create') }}"><div class="postButton">Create Post</div></a>
    {{ $posts -> links('pagination::tailwind')}}
@endsection