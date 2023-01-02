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
    </style>

</x-app-layout>