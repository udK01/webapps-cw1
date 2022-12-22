@extends('layouts.basic')

@section('title', 'Create Post')
    
@section('content')
    <form method="POST" action="{{ route('home.store') }}">
        @csrf
        <p class="padding">Title: <input type="text" name="title"
        
            value ="{{ old('title') }}" class="postBox"></p>

        <p>Description: <input type="text" name="description" 
            
            value ="{{ old('description') }}" class="postBox"></p></p>

        <input type="submit" value="Submit" class="sButton">
        <div class="bButton"><a href="{{ route('home.index') }}">Cancel</a></div>
    </form>

    <style>
        
        .sButton {
            position: fixed;
            right: 0;
            border: 1px solid;
            border-color: green;
            padding: 10px;
            box-shadow: 5px 10px #00FF00;
            margin-top: 50px;
            margin-right: 360px;
            font-size: 350%;
        }

        .bButton {
            position: absolute;
            left: 0;
            border: 1px solid;
            border-color: black;
            padding: 10px;
            box-shadow: 5px 10px #808080;
            margin-top: 50px;
            margin-left: 450px;
            font-size: 350%;
        }

        .padding {
            margin-left: 46px;
        }
    </style>
@endsection
