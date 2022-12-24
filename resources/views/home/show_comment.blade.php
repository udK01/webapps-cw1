@extends('layouts.basic')

@section('title', 'Comment View')

@section('content')

    {{-- Comment Displayed --}}
    <div class="commentBox" style="margin-bottom: 40px;">User: {{$comment->user->name}}
        <br>Comment: {{$comment->description}}
    </div>

    {{-- Back Button --}}
    <a href="{{ route('home.show', ['id' => $comment->post->id]) }}"><button 
    style="position: absolute;left: 0;border: 1px solid;border-color: black;padding: 10px;
    box-shadow: 5px 10px #808080;margin-inline: 585px;margin-block: 10px;font-size: 225%;">Back</button></a>

    {{-- Delete Button --}}
    <form method="POST" action="{{ route('home.destroy_comment', ['id' => $comment->id]) }}" 
    style="position: absolute;border: 1px solid;border-color: red;padding: 10px;
    box-shadow: 5px 10px #FF0000;margin-top: 260px;margin-right: -625px;font-size: 225%;">
        @csrf
        @method('DELETE')
        <a onclick='return confirm("Are you sure?")'><button type="submit">Delete</button></a>
    </form>
@endsection