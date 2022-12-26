{{-- I understand this doesn't follow snake case, but I am scared something will break if I edit it. --}}
<div>
    <form wire:submit.prevent="submit">
        @csrf
        {{-- Comment --}}
        <h1>""</h1>
        @error('description')<span class="center" style="color:red;">{{$message}}</span>@enderror
        <input type="text" wire:model="description" name="description"
        style="border: 1px solid;border-color: black;padding: 10px;box-shadow: 5px 10px #808080;
        height: 125px;width: 750px;position: relative;top: 20px;" placeholder="Comment">
        {{-- Submit Button --}}
        <input type="submit" value="Submit" 
        style="position: absolute; border: 1px solid;border-color: green;padding: 10px;
        box-shadow: 5px 10px #00FF00;margin-top: 165px; right: 580px;font-size: 125%;">
    </form>

    {{-- Back --}}
    <a href="{{ route('home.index') }}"><button 
    style="position: relative;border: 1px solid;bottom: -40px;right: 0px;border-color: black;
    padding: 10px;box-shadow: 5px 10px #808080;font-size: 125%;">Back</button></a>

    {{-- Authorisation Check --}}
    @if ($loggedIn == $post->user->id || Auth::user()->permission >= 1) 
        {{--Edit--}}
        <a href="{{ route('home.edit', ['id' => $post->id, 'loggedIn' => $loggedIn]) }}"><button 
            style="position: relative;border: 1px solid;top: 40px;right: -5px;border-color: purple;
            padding: 10px;box-shadow: 5px 10px #A020F0;font-size: 125%;">Edit</button></a>
        
        {{-- Delete --}}
        <form method="POST" action="{{ route('home.destroy', ['id' => $post->id]) }}" 
        style="position: relative;width: 11%;border: 1px solid;bottom: 12px;left: 565px;border-color: red;padding: 10px;box-shadow: 5px 10px #FF0000;font-size: 125%;">
            @csrf
            @method('DELETE')
            <a onclick='return confirm("Are you sure?")'><button type="submit">Delete</button></a>
        </form>
    @endif

    {{-- Comments --}}
    <h1 style="padding:20px;"></h1>
    @foreach ($post->comments->reverse() as $comment)
    @if ($loggedIn == $comment->user->id || Auth::user()->permission >= 1)
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
</div>