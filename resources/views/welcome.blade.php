<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>2016405</title>

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                font-weight: 400;
            }

            .container {
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .buttons {
                display:flex;
                flex-direction: column;
            }

            .btn {
                text-decoration: none;
                padding: 20px 50px;
                font-size: 1.25rem;
                position: relative;
                margin: 32px;
            }

            .btn-1 {
                color: #000000;
            }

            .btn-1::after, .btn-1::before {
                border: 3px solid #000000;
                content: "";
                position: absolute;
                width: calc(100%-6px);
                height: calc(100%-6px);
                left: 0;
                bottom: 0;
                z-index: -1;
                transition: transform 0.3s ease;
            }

        </style>
    </head>

    <body class="antialiased">
        @if (Route::has('login'))
            <div class="container">
                <div class="buttons">
                @auth
                    <button class="btn btn-1"><a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></button>
                @else
                    <button class="btn btn-1"><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></button>

                    @if (Route::has('register'))
                        <button class="btn btn-1"><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></button>
                    @endif
                @endauth
                </div>
            </div>
        @endif
    </body>
</html>
