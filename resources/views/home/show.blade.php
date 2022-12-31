@extends('layouts.basic')

@section('title', 'Post show view')

@section('content')
    {{-- Post --}}
    {{-- <div style="display:flex">
        <div class="postBox">User: <a href="{{ route('home.profile', ['id' => $post->user->id]) }}">{{$post->user->name}}</a>
            <br>Title: {{$post->title}}
            <br>Description: {{$post->description}}
            <img src=" {{ asset('images/'.$post->image) }}"/>
        </div>
    </div> --}}

    <div class="container-1">
        <div class="box-1">
            <h3>User: <a href="{{ route('home.profile', ['id' => $post->user->id]) }}">{{$post->user->name}}</a></h3>
        </div>
        <div class="box-1">
            <h2>Title: {{$post->title}}</h2>
        </div>
        <div class="box-1">
            <p>Description: {{$post->description}}</p>
        </div>
        @if (!empty($post->image))
            <div class="box-1">
                <img src=" {{ asset('images/'.$post->image->name) }}"/>
            </div>
        @endif
    </div>

    @livewire('post-comment',['post' => $post->id])

    <style>
        .container {
            border: 1px solid;
            border-color: orange;
            padding: 10px;
            box-shadow: 5px 10px #ff9933;
            height: 125px;
            width: 1100px;
            position: relative;
            top: 20px;
            margin-bottom: 20px; 
        }

        .box-1 {
            background: #ADD8E6;
        }

    </style>
@endsection