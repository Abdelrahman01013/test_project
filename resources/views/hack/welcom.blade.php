@extends('empaty')
@section('css')
    <style>
        * {
            padding: %;
            margin: 0%;
        }

        body {
            background: url({{ 'build/assets/imgs/' . $welcom->photo }});
            background-size: cover;
            display: flex;
            justify-content: center;

        }

        .container {
            display: flex;
            margin-top: 200px;
            margin-right: 90px;
        }

        .inp {
            margin-left: 30px;
            margin-top: 55px;
        }

        .inp input {
            width: 500px;
            height: 50px;
            background: rgba(255, 255, 0, 0.512);
            font-size: 25px;
            font-weight: 900;
            text-align: center;
        }

        .text pre {
            font-size: 80px;
            font-weight: 1000;
            font-family: Algerian;
            text-transform: uppercase;
        }

        .inp input:hover {
            background: whitesmoke;
        }

        #login {
            background-color: rgba(112, 128, 144, 0.855);
            letter-spacing: 4PX;
            font-size: 30PX;
        }

        #login:hover {
            background: snow;
        }

        #facebook {
            /* font-size: 50% */
        }
    </style>
@stop
@section('title')
    {{ $welcom->title_page }}
@stop
@section('content')
    <div class="container">
        <div class="text">
            <pre>

    {{ $welcom->welcom_to }}
  </pre>
        </div>


        <form method="GET">
            <div class="inp">
                <input type="email" placeholder="UserName" required autofocus>
                <br>
                <br>
                <input type="password" placeholder="Password" required>
                <br>
                <?php
                
                if (isset($_GET['login'])) {
                    echo "<p class='text-danger' >The email address that you entered does not match an account</p>";
                }
                ?>
                <br>
                <input type="submit" value="login" id="login" name="login">


                <br>
                <br>

                <a href="{{ url('login_FaceBook') }}" id="facebook">
                    <h4> التسجيل باستخدام فيسبوك </h4>
                </a>
            </div>
        </form>
    </div>
    </div>




@stop

@section('js')

@stop
