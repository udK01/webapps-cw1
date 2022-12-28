@extends('layouts.basic')

@section('title', 'Create Post')
    
@section('content')
    {{-- Comment Creation Post Including Title and Description --}}
    <form method="POST" action="{{ route('home.store') }}" enctype="multipart/form-data">
        @csrf
        <p><input type="text" name="title"
        
            value ="{{ old('title') }}" class="postBox" placeholder="Title"></p>

        <p><input type="text" name="description" 
            
            value ="{{ old('description') }}" class="postBox" placeholder="Description"></p>

        <div class="postBox" style="position:relative;top:15px;display:flex;align-items:center;justify-content:center;">Add Image:
            <input type="file" class="form-control" name="image" value ="{{ old('image') }}"/>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{$message}}</strong>
            </div>            
            <img src="{{ asset('images/'.Session::get('image')) }}"/>
        @endif

        {{-- Submit Button --}}
        <input type="submit" value="Submit" style="position: fixed;right: 0;border: 1px solid;border-color: green;
        padding: 10px;box-shadow: 5px 10px #00FF00;margin-top: 50px;margin-right: 400px;font-size: 350%;">

        {{-- Cancel Button --}}
        <a href="{{ route('home.index') }}"><div style="position: absolute;left: 0;border: 1px solid;border-color: black;
        padding: 10px;box-shadow: 5px 10px #808080;margin-top: 50px;margin-left: 410px;font-size: 350%;">Cancel</div></a>
    </form>
@endsection
