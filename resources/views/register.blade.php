@extends('layout')
@section('content')
    <div class="card card-form">
        <h5 class="card-header">Register</h5>
        @if ($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="btn-dev">

                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="/">Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
