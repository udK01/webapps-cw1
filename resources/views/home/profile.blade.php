@extends('layouts.basic')

@section('title', 'Profile View')

@section('content')
    {{-- Posts --}}
    <h1 style="font-size:3vw">{{$user->name}}'s: Posts</h1>
    @foreach ($user->posts as $post)
        <a href="{{ route('home.show', ['id' => $post->id]) }}">
        <div class="postBox">
                Poster: {{$post->user->name}}
            <br>Title: {{$post->title}}
            <br>Comments: {{$post->comments->count()}}</div></a>
    @endforeach

    {{-- Comments --}}
    <h1 style="padding-top: 20px;font-size:3vw">{{$user->name}}'s: Comments</h1>
    @foreach ($user->comments->reverse() as $comment)
    @if ($loggedIn == $user->id || Auth::user()->permission >= 1)
        <a href="{{ route('home.show_comment', ['id' => $comment->id]) }}">
            <div class="commentBox" style="margin-bottom: 40px;">User: {{$comment->user->name}}
                <br>Comment: {{$comment->description}}
            </div>
            <button style="position: absolute;border: 1px solid;right: 0;border-color: blue;padding: 10px;
            box-shadow: 5px 10px #0000FF;margin-inline: 480px;margin-block: -115px;font-size: 125%;">Inspect</button></a>
    @else
        <div class="commentBox">User: {{$comment->user->name}}
            <br>Comment: {{$comment->description}}
        </div>
    @endif
    @endforeach
@endsection