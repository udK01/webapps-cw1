<x-app-layout>
    <x-slot name="header">
        @livewireStyles
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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

    <div class="center">
        @yield('content')
    </div>

    <style>
        .center {
            display: grid;
            place-items: center;
        }

        .postButton {
            position: fixed;
            bottom: 45px;
            left: 45px;
            font-size: 350%;
            border: 1px solid;
            border-color: red;
            padding: 10px;
            box-shadow: 5px 10px #FF0000;
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