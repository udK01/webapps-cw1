{{-- I understand this doesn't follow snake case, but I am scared something will break if I edit it. --}}
<div class="box">
    <form id="commentForm" wire:submit.prevent="submit">
        @csrf
        {{-- Comment --}}
        @error('description')<span class="center" style="color:white;">{{$message}}</span>@enderror
        <input type="text" wire:model="description" name="description" class="addComment" placeholder="Comment">
    </form>

    <div class="buttons">
        {{-- Back --}}
        <a href="{{ route('home.index') }}" class="btn btn-2" style="color: #F0F4EF">Back</a>

        {{-- Authorisation Check --}}
        @if ($loggedIn == $post->user->id || Auth::user()->permission >= 1) 
            {{--Edit--}}
            <a href="{{ route('home.edit', ['id' => $post->id]) }}" class="btn btn-2" style="color: #F0F4EF">Edit</a>
            
            {{-- Delete --}}
            <form method="POST" action="{{ route('home.destroy', ['id' => $post->id]) }}" class="btn btn-2" style="color: #F0F4EF;">
                @csrf
                @method('DELETE')
                <a onclick='return confirm("Are you sure?")'><button type="submit">Delete</button></a>
            </form>
        @endif
        
        <button type="submit" form="commentForm" class="btn btn-2" style="color: #F0F4EF;">Submit</button>
    </div>

    {{-- Comments --}}
    @foreach ($post->comments->reverse() as $comment)
    @if ($loggedIn == $comment->user->id || Auth::user()->permission >= 1)
    <div style="display:flex;justify-content:center">
        <a href="{{ route('home.show_comment', ['id' => $comment->id]) }}">
            <div class="commentBox">
                <div class="username">{{$comment->user->name}}</div>
                <div class="handle">{{$comment->created_at}}</div>
                <div>{{$comment->description}}</div>
                <div class="btn btn-3" style="color: #F0F4EF;">Inspect</div>
            </div>
        </a>
    </div>
    @else
        <div class="commentBox">
            <div class="username">
                {{$comment->user->name}}
            </div>
            <div>
                {{$comment->description}}
            </div>
        </div>
    @endif
    @endforeach
</div>