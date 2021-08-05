<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <style>
        html, body{
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
        }

        .header > a{
            color: #636b6f;
            padding:0 25px;
            font-size:70px;
            font-weight:600;
            letter-spacing: .1rem;
            text-decoration: none;
            font-family: 'Open Sans Condensed', sans-serif;
        }

        .full-height{
            height: 80vh;
        }

        .flex-center{
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref{
            position: relative;
        }

        .top-right{
            position: relative;
            right: 10px;
            top: 18px;
        }

        .content{
            text-align: center;
        }

        .links > a{
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>



</head>
<body>
    @csrf
    <header>
        @include('login.header')
    </header>
    <main>
        @yield('content') 
    </main>
    <footer>
        @include('footer')
    </footer>
</body>
</html>