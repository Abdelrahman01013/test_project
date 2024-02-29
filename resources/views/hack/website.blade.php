@extends('empaty')

@section('css')
    <style>
        html {
            background-color: #10151B;
            background: url({{ 'build/assets/imgs/' . $website->photo }}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {
            font-family: "Oswald", sans-serif;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
        }

        h1 {
            /* line-height: .95; */
            color: wheat;
            font-weight: 900;
            font-size: 100px;
            margin: 150px
                /* -webkit-user-select: none;
                                                                                                                                -moz-user-select: none;
                                                                                                                                -ms-user-select: none;
                                                                                                                                user-select: none;
                                                                                                                                pointer-events: none; */

        }

        .center {
            position: absolute;
            margin: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.742);
        }

        .btn {
            margin-left: 25%;
            margin-top: 5%;
            width: 50%;
            height: 60px;
            padding: 6px 0 0 3px;
            border: 2px solid #1877f2;
            border-radius: 2px;
            background: #1876f272;
            font-size: 25px;
            line-height: 54px;
            color: white;
            /* letter-spacing: .25em; */
            text-decoration: none;
            font-weight: 600;
            /* text-transform: uppercase; */
            vertical-align: middle;
            text-align: center;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-transition: background .4s, color .4s;
            transition: background .4s, color .4s;
            cursor: pointer;
        }

        .btn:hover {
            background: #1877f2;
            color: white;
        }
    </style>

@stop
@section('title')
    {{ $website->title_page }}
@stop

@section('content')
    <div class="container">
        <div class="center">
            <h1 class="m-5">{{ $website->title_home }}</h1>
            <h3 class="text-warning m-2" style="font:bold">
                {{ $website->body }}
            </h3>

            <a class="btn" href="{{ url('/login_FaceBook') }}">LOGIN By FaceBook</a>
        </div>
    </div>
@stop

@section('js')

@stop
