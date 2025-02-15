<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    @vite(['resources/js/app.js'])
    @vite(['resources/js/login.js'])
    @vite(['resources/css/login.css'])
</head>

<body>
    <div class="overlay">

        <form class="form" method="POST" action="/login">
            <div class="flex-column">
                <label>Email </label>
            </div>
            <div class="inputForm">
                <svg height="60" viewBox="0 -9 32 32" width="40" xmlns="http://www.w3.org/2000/svg">
                    <g id="Layer_3" data-name="Layer 3">
                        <path
                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z">
                        </path>
                    </g>
                </svg>
                <input id='email' name="email" type="text" class="input" placeholder="Digite seu email*" required/>
            </div>

            <div class="flex-column">
                <label>Senha </label>
            </div>
            <div class="inputForm">
                <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
                    </path>
                    <path
                        d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
                    </path>
                </svg>
                <input id='password' name="password" type="password" class="input" placeholder="Digite sua senha*" required/>
            </div>

            <button id='submit' class="button-submit disabled-btn" disabled>Sign Up</button>
            <p class="p">Não tem conta ainda? <span class="span"><a href="cadastro">cadaste-se</a></span></p>
            <div class="flex-row">
            </div>
        </form>

    </div>

</body>

</html>
