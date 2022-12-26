@extends('layouts.basic')

@section('title', 'Post show view')

@section('content')

    {{-- Comment Submit --}}
    <form method="POST" action="{{ route('home.store_post') }}">
        @csrf
        {{-- Post --}}
        <div class="postBox">User: <a href="{{ route('home.profile', ['id' => $post->user->id]) }}">{{$post->user->name}}</a>
            <p><input type="text" name="title"
        
                value ="{{ old('title') }}" placeholder='{{$post->title}}' size="100"></p>
    
            <p><input type="text" name="description" 
                
                value ="{{ old('description') }}" placeholder='{{$post->description}}' size="100"></p>
        </div>
        <input type="submit" value="Submit" 
        style="position: relative; border: 1px solid;top: 24px;left: 840px;border-color: green;
        padding: 10px;box-shadow: 5px 10px #00FF00;font-size: 125%;">
    </form>

    {{-- Back --}}
    <a href="{{ route('home.show', ['id' => $post->id]) }}"><button 
    style="position: relative;border: 1px solid;bottom: 28px;right: 340px;border-color: black;
    padding: 10px;box-shadow: 5px 10px #808080;font-size: 125%;">Back</button></a>

    {{-- Delete --}}
    <form method="POST" action="{{ route('home.destroy', ['id' => $post->id]) }}" 
    style="position: relative;border: 1px solid;bottom: 80px;left: 235px;border-color: red;padding: 10px;box-shadow: 5px 10px #FF0000;font-size: 125%;">
        @csrf
        @method('DELETE')
        <a onclick='return confirm("Are you sure?")'><button type="submit">Delete</button></a>
    </form>
@endsection