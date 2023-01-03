<x-app-layout>
    
    <style type="text/css">
        .min-h-screen {
            background-color: #FFF3B0;
          }
    </style>

    <x-slot name="header">
        @livewireStyles
        <h2 style="display:flex;justify-content:center;font-size: 12ch;font-weight:lighter;font-family:fantasy">
            @yield('title')
        </h2>
    </x-slot>

<body>
    @livewireScripts
    @if ($errors->any())
        <div class="center">
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('message'))
        <div style="display: grid;place-items: center;font-size: xx-large;margin-top: 5px;"><b>{{ session('message') }}</b></div>
        
    @endif

    <div class="center" style="background: #FFF3B0;padding: 10px">
        @yield('content')
    </div>
</body>

<style>
    .center {
        display: grid;
        place-items: center;
    }

    .postBox {
        display:flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-wrap:wrap;
    }

    .username {
        font-size: 18px;
        font-weight: bold;
    }
        
    .title {
        font-size: 16px;
        font-weight:lighter;
    }

    .description {
        border: 3px dashed #540B0E;
        border-radius: 25px;
        padding: 10px;
        font-size: 16px;
        inline-size: 50ch;
        overflow-wrap: break-word;
        margin: auto;
    }
    
    .profilePicture {
        max-height: 100px;
        padding:10px;
        border-radius: 25px;
    }

    .handle {
        font-size: 14px;
        font-weight: lighter;
        color: #E09F3E;
    }

    .image {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        border-top: 3px dashed #540B0E;
        border-bottom: 3px dashed #540B0E;
    }

    .tag {
        display:flex;
        border-radius: 5px;
        padding: 5px;
        color:#EDE3E9;
        border: 3px solid #540B0E;
        background: #540B0E;
    }

    .postedAt {
        display:flex;
        flex-direction: column;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
    }

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

    .btn-3 {
        color: black;
    }

    .btn-3::after, .btn-3::before {
        border: 2px dashed #E09F3E;
        border-radius: 25px;
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

    .btn-3:hover::after {
        transform: translate(-5px, -5px)
    }

    .btn-3:hover::before {
        transform: translate(5px, 5px)
    }
</style>

</x-app-layout>