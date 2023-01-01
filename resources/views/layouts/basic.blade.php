<x-app-layout>
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

    <style>
        .center {
            display: grid;
            place-items: center;
        }

        .postBox {
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

        .commentBox {
           border: 1px solid;
           border-color: black;
           padding: 10px;
           box-shadow: 5px 10px #808080;
           height: 125px;
           width: 750px;
           position: relative;
           top: 20px;
           margin-bottom: 20px; 
        }
    </style>

</x-app-layout>