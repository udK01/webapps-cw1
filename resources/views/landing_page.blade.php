<!DOCTYPE html>
<html lang="en">
    <head>
        <title>2016405</title>
    </head>

    <body style="display: flex;justify-content: center;align-items: center;min-height: 100vh;background: #9F84BD;overflow-x: hidden;">
        <div style="display:flex;justify-content: center;align-items: center;min-height: 100vh;flex-direction: column;">
            <h2 data-text="Welcome!">Welcome!</h2>
            <section>
                <div class="container">
                    <div class="buttons">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-2" style="color: #F0F4EF">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-2" style="color: #F0F4EF">Login</a>

                        <a href="{{ route('register') }}" class="btn btn-2" style="color: #F0F4EF">Register</a>
                    @endauth
                    </div>
                </div>
            </section>
        </div>
    </body>

    {{-- Button Animation --}}
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

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
        }

        .btn {
            text-decoration: none;
            padding: 20px 50px;
            font-size: 1.25rem;
            position: relative;
            margin: 32px;
        }

        .btn-2 {
            color: black;
        }

        .btn-2::after, .btn-2::before {
            border: 3px solid #F0F4EF;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: transform 0.3s ease;
        }

        .btn-2:hover::after {
            transform: translate(-5px, -5px)
        }

        .btn-2:hover::before {
            transform: translate(5px, 5px)
        }
    </style>

    {{-- Welcome --}}
    <style>
        h2{
            position: relative;
            font-size: 7vw;
            color: #9F84BD;
            -webkit-text-stroke: 0.3vw #F0F4EF;
            text-transform: uppercase;
        }
        h2::before {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: -5px;
            height: 100%;
            color: #F0F4EF;
            -webkit-text-stroke: 0vw #9F84BD;
            border-right: 2px solid #F0F4EF;
            overflow: hidden;
            animation: animate 6s linear infinite;
        }
        @keyframes animate {
            0%, 10%, 100% { width: 0; }
            70%,90% { width: 100%; }
        }
    </style>