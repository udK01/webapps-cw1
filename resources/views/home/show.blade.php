@extends('layouts.basic')

@section('title', 'Post show view')

@section('content')
    <ul class="postBox">
        <li>User: {{$user->name}}</li>
        <li>Title: {{$post->title}}</li>
        <li>Description: {{$post->description}}</li>
    </ul>

    @foreach ($post->comments as $comment)
        <ul class="commentBox">
            <li>User: {{$comment->user->name}}</li>
            <li>Comment: {{$comment->description}}</li>
        </ul>
    @endforeach

    <form method="POST" action="{{ route('home.destroy', ['id' => $post->id]) }}" class="dButton">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <p class="bButton"><a href="{{ route('home.index') }}">Back</a></p>

    <style>
        .dButton {
            position: absolute;
            top: 0;
            right: 0;
            border: 1px solid;
            border-color: red;
            padding: 10px;
            box-shadow: 5px 10px #FF0000;
            margin-top: 302px;
            margin-right: 415px;
            font-size: 225%;
        }

        .bButton {
            position: absolute;
            top: 0;
            left: 0;
            border: 1px solid;
            border-color: black;
            padding: 10px;
            box-shadow: 5px 10px #808080;
            margin-top: 302px;
            margin-left: 435px;
            font-size: 225%;
        }
    </style>
@endsection