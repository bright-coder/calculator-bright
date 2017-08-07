<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/foundation.min.css">
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/foundation.min.js"></script>
        <script type="text/javascript" src="/js/what-input.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Minus (ลบ)
                </div>
                {{ Form::open(array('action'=> 'InputController@minus','method'=> 'POST')) }}
                <div class="grid-x grid-margin-x">
                    <div class="medium-4 cell">
                        <input type="number" name="num1" step="any">
                    </div>
                    <div class="medium-2 cell">
                        <h4>-</h4>
                    </div>
                    <div class="medium-4 cell">
                        <input type="number" name="num2" step="any">
                    </div>
                    <div class="medium-2 cell">
                        <button type="submit" class="button primary expanded"><img src="/asset/equal-symbol.png" /></button>
                    </div>
                </div>
                {{ Form::close() }}
                <hr>
                <div class="grid-x grid-margin-x">
                    <div class="medium-12">
                        <center><h3>{{ $answer }}</h3></center>
                    </div>
                </div>
                <hr>
                <div class="links">
                    <a class="clear button secondary" href="{{ route('home') }}"> Back (กลับสู่หน้าหลัก)</a>
                </div>
            </div>
        </div>
                
    </body>
</html>
