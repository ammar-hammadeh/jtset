<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .center-form {
            width: 400px;
            margin: auto;
            margin-top: 25vh;
        }

        .img {
            width: 100vw;
            height: 100vh;
            top: 0;
            position: absolute;
        }

        .card-form {
            background: #0e0e0e61;
            color: #fff;
        }

        .card-header {
            text-align: center;
            font-weight: bolder;
            font-size: 30px;

        }

        .btn {
            background-image: linear-gradient(to right, #14475f, #04befe, #4481eb, #3f86ed);
            box-shadow: 0 4px 15px 0 rgb(17 61 81);
            width: 80%;
            font-weight: 600;
            font-size: 20px;
            margin: 20px;
            height: 55px;
            text-align: center;
            border: none;
            background-size: 300% 100%;
            border-radius: 50px;
            moz-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .btn-dev {
            text-align: center
        }

        a {
            color: #fff !important;
        }

        a:link {
            text-decoration: none;
        }


        a:visited {
            text-decoration: none;
        }


        a:hover {
            text-decoration: none;
        }


        a:active {
            text-decoration: none;
        }
    </style>
</head>

<body class="antialiased">
    <img class="img" src="{{ asset('imgs/bg3.jpg') }}">
    <div class="center-form">
        @yield('content')
    </div>
</body>
