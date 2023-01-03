@extends('layouts.basic')

@section('title', 'Profile View')

@section('content')

    <form method="POST" id="profileForm" action="{{ route('home.store_profile', $user->id) }}" class="formStyle" enctype="multipart/form-data">
        @csrf
        {{-- User Profile --}}
        <div class="box" style="margin-bottom: 10px;max-width: 50ch">
            <div style="display:flex;justify-content:center">
                @if (!empty($user->image->name))
                    <img src=" {{ asset('images/'.$user->image->name) }}" class="profilePicture" style="width: 150px"/>
                @else
                    <img src=" {{ asset('images/guest_folder/guest.png') }}" class="profilePicture"/>
                @endif
                <div style="display:flex;flex-direction:column;align-items: center;justify-content:center">
                    <input type="text" name="name" style="color:black;width: 90%;border-radius: 25px;
                    background:transparent;border:2px solid black" value ="{{ old('name') }}" placeholder="{{$user->name}}">
                    <div class="handle">{{$user->handle->handle_name}}</div>
                </div>
            </div>
            <div style="display: flex;justify-content:center">
                <input type="file" class="form-control" name="image" value ="{{ old('image') }}"/>
            </div>
            <div style="display:flex;justify-content:space-evenly;padding: 10px">
                {{-- Back --}}
                <a href="{{ route('home.index') }}" class="btn btn-2">Back</a>
                @if (Auth::user()->id == $user->id || Auth::user()->permission >= 2)
                    {{-- Submit --}}
                    <button type="submit" form="profileForm" class="btn btn-2">Submit</button>
                @endif
            </div>
        </div>
    </form>
@endsection


