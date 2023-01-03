@extends('layouts.basic')

@section('title', 'Create Post')
    
@section('content')
    {{-- Comment Creation Post Including Title and Description --}}
    <form method="POST" action="{{ route('home.store') }}" class="formStyle" enctype="multipart/form-data">
        @csrf
        {{-- Post --}}
        <div class="postBox">
            <div class="box">
                {{-- Input Area --}}
                <div class="inputContainer">
                    {{-- It just doesn't work with class... --}}
                    <input type="text" name="title" class="inputArea" style="color:black;width: 90%;border-radius: 25px;
                    background:transparent;border:2px solid black" value ="{{ old('title') }}" placeholder="Title">
                    <input type="text" name="description" style="color:black;width: 90%;border-radius: 25px;
                    background:transparent;border:2px solid black;" value ="{{ old('description') }}" placeholder="Description">
                    
                    <input type="file" class="form-control" name="image" value ="{{ old('image') }}"/>
                </div>
                <div class="buttons">
                {{-- Back --}}
                <a href="{{ route('home.index') }}" class="btn btn-2">Back</a>
                {{-- Submit --}}
                <button type="submit" class="btn btn-2">Submit</button>
                </div>
            </div>
        </div>              
    </form>
@endsection

<style>
    .formStyle {
        display:flex;
        flex-direction:column;
        align-items:center;
        margin: 10px;
        gap:10px;
    }

    .inputContainer {
        display: flex;
        flex-direction:column;
        gap: 10px;
        align-items:center;
        margin: 10px
    }
</style>