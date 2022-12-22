@extends('layouts.basic')

@section('title', 'Create Post')
    
@section('content')
    <form method="POST" action="{{ route('home.store') }}">
        @csrf
        <p><input type="text" name="title"
        
            value ="{{ old('title') }}" class="postBox" placeholder="Title"></p>

        <p><input type="text" name="description" 
            
            value ="{{ old('description') }}" class="postBox" placeholder="Description"></p></p>

        <input type="submit" value="Submit" class="submitButton">
        <div class="backButton"><a href="{{ route('home.index') }}">Cancel</a></div>
    </form>

    <style>
        
        .submitButton {
            position: fixed;
            right: 0;
            border: 1px solid;
            border-color: green;
            padding: 10px;
            box-shadow: 5px 10px #00FF00;
            margin-top: 50px;
            margin-right: 400px;
            font-size: 350%;
        }

        .backButton {
            position: absolute;
            left: 0;
            border: 1px solid;
            border-color: black;
            padding: 10px;
            box-shadow: 5px 10px #808080;
            margin-top: 50px;
            margin-left: 410px;
            font-size: 350%;
        }
    </style>
@endsection
