@extends('layouts.basic')

@section('title', 'Post show view')

@section('content')
    <div class="postBox">User: {{$post->user->name}}
        <br>Title: {{$post->title}}
        <br>Description: {{$post->description}}</div>

    

    <form method="POST" action="{{ route('home.store_comment') }}">
        @csrf
        <input type="submit" value="Submit" class="submitButton">
    <p> <input type="text" name="description" value ="{{ old('description') }}" class="userComment" placeholder="Comment"></p>
    </form>

    {{-- <a href="{{ route('home.show', ['id' => $post->id]) }}"> --}}

    @foreach ($post->comments->reverse() as $comment)
    @if ($loggedIn == $comment->user->id)
        <a href="{{ route('home.show_comment', ['id' => $comment->id]) }}">
            <div class="commentBox" style="margin-bottom: 40px;">User: {{$comment->user->name}}
                <br>Comment: {{$comment->description}}
            </div>
            <button class="inspectComment">Inspect</button></a>
    @else
        <div class="commentBox">User: {{$comment->user->name}}
            <br>Comment: {{$comment->description}}
        </div>
    @endif
    @endforeach
    
    <a href="{{ route('home.index') }}"><button class="backButton">Back</button></a>

    @if ($loggedIn == $post->user->id) 
        <form method="POST" action="{{ route('home.destroy', ['id' => $post->id]) }}" class="deleteButton">
            @csrf
            @method('DELETE')
            <a onclick='return confirm("Are you sure?")'><button type="submit">Delete</button></a>
        </form>
    @endif

    <style>
        .deleteButton {
            position: absolute;
            top: 0;
            right: 0;
            border: 1px solid;
            border-color: red;
            padding: 10px;
            box-shadow: 5px 10px #FF0000;
            margin-top: 448px;
            margin-right: 680px;
            font-size: 125%;
        }

        .submitButton {
            position: absolute;
            border: 1px solid;
            border-color: green;
            padding: 10px;
            box-shadow: 5px 10px #00FF00;
            margin-top: 165px;
            margin-left: 665px; 
            font-size: 125%;
        }

        .backButton {
            position: absolute;
            top: 0;
            border: 1px solid;
            border-color: black;
            padding: 10px;
            box-shadow: 5px 10px #808080;
            margin-inline: -375px;
            margin-block: 448px;
            font-size: 125%;
        }

        .userComment {
            border: 1px solid;
            border-color: black;
            padding: 10px;
            box-shadow: 5px 10px #808080;
            height: 125px;
            width: 750px;
            position: relative;
            top: 20px;
            margin-bottom: 90px; 
        }

        .inspectComment {
            position: absolute;
            border: 1px solid;
            right: 0;
            border-color: blue;
            padding: 10px;
            box-shadow: 5px 10px #0000FF;
            margin-inline: 480px;
            margin-block: -115px;
            font-size: 125%;
        }

    </style>
@endsection