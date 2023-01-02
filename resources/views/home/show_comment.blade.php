@extends('layouts.basic')

@section('title', 'Comment View')

@section('content')

    {{-- Comment Displayed --}}
    <div class="commentBox" style="display: flex;flex-direction:column;align-items:center;">
        <a href="{{ route('home.profile', ['id' => $comment->user->id]) }}">
            <div class="username">{{$comment->user->name}}</div>
        </a>
        <div>{{$comment->description}}</div>
    </div>

    <div class="box" style="inline-size: 65ch">
        <div class="buttons" style="align-items: center">
            {{-- Back --}}
            <a href="{{ route('home.show', ['id' => $comment->post->id]) }}" class="btn btn-2">Back</a>
                
            {{-- Delete --}}
            <form method="POST" action="{{ route('home.destroy_comment', ['id' => $comment->id]) }}" class="btn btn-2">
                @csrf
                @method('DELETE')
                <a onclick='return confirm("Are you sure?")'><button type="submit">Delete</button></a>
            </form>
        </div>
    </div>
@endsection