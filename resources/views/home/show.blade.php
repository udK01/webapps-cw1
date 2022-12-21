@extends('layouts.basic')

@section('title', 'Post show view')

@section('content')
    <ul>
        <li>User: {{$user->name}}</li>
        <li>Title: {{$post->title}}</li>
        <li>Description: {{$post->description}}</li>
    </ul>

    <form method="POST"

        action="{{ route('home.destroy', ['id' => $post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>

    </form>

    <p><a href="{{ route('home.index') }}">Back</a></p>

    <ul>
        @foreach ($post->comments as $comment)
            </ul>
                <li>User: {{$comment->user->name}}</li>
                <li>Comment: {{$comment->description}}</li>
        @endforeach
    </ul>



@endsection