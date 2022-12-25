@extends('layouts.basic')

@section('title', 'Post show view')

@section('content')
    {{-- Post --}}
    <div class="postBox">User: <a href="{{ route('home.profile', ['id' => $post->user->id]) }}">{{$post->user->name}}</a>
        <br>Title: {{$post->title}}
        <br>Description: {{$post->description}}
    </div>

    {{-- Comment Submit
    <form method="POST" action="{{ route('home.store_comment') }}">
        @csrf
        <input type="submit" value="Submit" 
        style="position: absolute; border: 1px solid;border-color: green;padding: 10px;
        box-shadow: 5px 10px #00FF00;margin-top: 165px; margin-left: 665px;font-size: 125%;">
    <p> <input type="text" name="description" value ="{{ old('description') }}" 
    style="border: 1px solid;border-color: black;padding: 10px;box-shadow: 5px 10px #808080;
        height: 125px;width: 750px;position: relative;top: 20px;" placeholder="Comment"></p>
    </form> --}}

    {{-- Ajax Comment Submit --}}
    <form method="POST" action="{{ route('home.store_comment') }}">
        @csrf
        <input type="submit" value="Submit" 
        style="position: absolute; border: 1px solid;border-color: green;padding: 10px;
        box-shadow: 5px 10px #00FF00;margin-top: 165px; margin-left: 665px;font-size: 125%;">
    <p> <input type="text" name="description" value ="{{ old('description') }}" 
    style="border: 1px solid;border-color: black;padding: 10px;box-shadow: 5px 10px #808080;
        height: 125px;width: 750px;position: relative;top: 20px;" placeholder="Comment"></p>
    </form>

    {{-- Back --}}
    <a href="{{ route('home.index') }}"><button 
    style="position: relative;border: 1px solid;bottom: -40px;right: 340px;border-color: black;
    padding: 10px;box-shadow: 5px 10px #808080;font-size: 125%;">Back</button></a>

    {{-- Authorisation Check --}}
    @if ($loggedIn == $post->user->id) 
        {{--Edit--}}
        <a href="{{ route('home.edit', ['id' => $post->id]) }}"><button 
            style="position: relative;border: 1px solid;bottom: 12px;right: 265px;border-color: purple;
            padding: 10px;box-shadow: 5px 10px #A020F0;font-size: 125%;">Edit</button></a>
        
        {{-- Delete --}}
        <form method="POST" action="{{ route('home.destroy', ['id' => $post->id]) }}" 
        style="position: relative;border: 1px solid;bottom: 64px;left: 235px;border-color: red;padding: 10px;box-shadow: 5px 10px #FF0000;font-size: 125%;">
            @csrf
            @method('DELETE')
            <a onclick='return confirm("Are you sure?")'><button type="submit">Delete</button></a>
        </form>
    @endif

    {{-- Comments --}}
    @foreach ($post->comments->reverse() as $comment)
    @if ($loggedIn == $comment->user->id)
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