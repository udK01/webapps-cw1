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
                <div class="username">
                    {{$comment->user->name}}
                </div>
                <div class="handle">
                    {{$comment->created_at}}
                </div>
                <div>
                    Inspect
                </div>
                <div>
                    {{$comment->description}}
                </div>
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

<style>
    .box {
        inline-size: 75ch;
        overflow-wrap: break-word;
        hyphens: manual;
        border-radius: 25px;
        background:#9E2A2B;
        outline:3px solid #9E2A2B;
        color:#EDE3E9;
        border: 3px dashed #540B0E;
    }

    .commentBox {
        inline-size: 65ch;
        overflow-wrap: break-word;
        hyphens: manual;
        border-radius: 25px;
        margin: 7px;
        padding: 7px;
        background:#9E2A2B;
        color:white;
        border: 3px dashed #ADCDD7;
    }

    .addComment {
        color:black;
        width: 100%;
        border-radius: 25px;
        background:transparent;
        border:2px solid black
    }

    .buttons {
        display: flex;
        justify-content: space-evenly;
        margin: 10px;
    }

    .btn {
        text-decoration: none;
        padding: 15px 20px;
        font-size: 1rem;
        position: relative;
    }

    .btn-2 {
        color: black;
    }

    .btn-2::after, .btn-2::before {
        border: 2px dashed #E09F3E;
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        bottom: 0;
        z-index: 10;
        pointer-events: none;
        transition: transform 0.3s ease;
    }

    .btn-2:hover::after {
        transform: translate(-5px, -5px)
    }

    .btn-2:hover::before {
        transform: translate(5px, 5px)
    }

</style>