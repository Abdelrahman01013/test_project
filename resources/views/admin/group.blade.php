@extends('empaty')

@section('css')
    <style>
        body {
            background: black
        }
    </style>
@stop

@section('title')
    group faceBook
@stop

@section('content')

    <div class="container">
        <div class="alert alert-success text-center" id="success_alert" style="font-size: 25px ;display: none">
            Success: Success Update<br>

        </div>
        <div class="alert alert-danger text-center" id="error_alert" style="font-size: 25px ;display: none">
            Error : Error In Data
        </div>

        <form id="formData">
            @csrf
            @method('PATCH')






            <div class="m-5">

                <input type="file" name="photo">
                <p class="text-danger" style="display:none" id="error_photo"></p>
            </div>
            <div class="w-100">

                <button class="btn btn-primary m-5" id="update" product_id="{{ $group->id }}"> Update </button>

            </div>

            <div class="progress m-auto w-50" style="display: none" id="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>



        </form>
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

        $(document).on('click', '#update', function(e) {
            e.preventDefault();
            var formData = new FormData($('#formData')[0]);
            var id = $(this).attr('product_id');

            $.ajax({
                type: "POST",
                url: "{{ route('groups.update', '') }}" + "/" + id,
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.msg == "error") {
                        $('#error_alert').show();
                        $('#success_alert').hide();
                        $('.text-danger').hide();
                        setInterval(() => {
                            $('#error_alert').fadeOut('slow');

                        }, 3000);

                        $.each(data.data, function(key, value) {
                            if (value) {

                                $('#error_' + key).text(value).show();
                            }
                        });


                    }

                    if (data.msg == "success") {
                        $('#error_alert').hide();
                        $('#success_alert').show();
                        $('.text-danger').hide();
                        setInterval(() => {
                            $('#success_alert').fadeOut('slow');

                        }, 3000);
                        $('#success_alert').text("Success Update : " + data.name);
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
