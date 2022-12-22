@extends('layouts.basic')

@section('title', 'Post show view')

@section('content')
    <div class="postBox">User: {{$post->user->name}}
        <br>Title: {{$post->title}}
        <br>Description: {{$post->description}}</div>

    <a href="{{ route('home.index') }}"><button class="backButton">Back</button></a>

    <form method="POST" action="{{ route('home.store_comment') }}">
        @csrf
        <input type="submit" value="Submit" class="submitButton">
    <p> <input type="text" name="description" value ="{{ old('description') }}" class="userComment" placeholder="Comment"></p>
    </form>

    @foreach ($post->comments as $comment)
        <div class="commentBox">User: {{$comment->user->name}}
            <br>Comment: {{$comment->description}}
            @if ($loggedIn == $comment->user->id)
                <form method="POST" action="{{ route('home.destroy_comment', ['id' => $comment->id]) }}" class="deleteComment">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif
        </div>
        
    @endforeach

    @if ($loggedIn == $post->user->id) 
        <form method="POST" action="{{ route('home.destroy', ['id' => $post->id]) }}" class="deleteButton">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
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
            margin-top: 302px;
            margin-right: 415px;
            font-size: 225%;
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
            left: 0;
            border: 1px solid;
            border-color: black;
            padding: 10px;
            box-shadow: 5px 10px #808080;
            margin-top: 305px;
            margin-left: 445px;
            font-size: 225%;
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

        .deleteComment {
            position: absolute;
            border: 1px solid;
            right: 0;
            border-color: red;
            padding: 10px;
            box-shadow: 5px 10px #FF0000;
            margin-right: 8px;
            font-size: 125%;
        }
    </style>
@endsection